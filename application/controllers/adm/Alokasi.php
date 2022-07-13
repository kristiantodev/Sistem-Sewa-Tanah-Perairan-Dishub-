<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alokasi extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Administrator"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
	}

	public function index()
	{

        $alokasi = $this->db->query("SELECT*FROM alokasi 
            LEFT JOIN retribusi ON retribusi.id_retribusi=alokasi.id_retribusi
            LEFT JOIN jenis_retribusi ON retribusi.id_jenis_retribusi=jenis_retribusi.id_jenis_retribusi
            LEFT JOIN wilayah ON wilayah.id_wilayah=alokasi.id_wilayah
            WHERE alokasi.deleted=0");

        $wilayah = $this->db->query("SELECT*FROM wilayah WHERE deleted=0");
        $retribusi = $this->db->query("SELECT*FROM retribusi WHERE deleted=0");

         $data=array(
            "alokasiku"=>$alokasi->result(),
            "wilayahku"=>$wilayah->result(),
            "retribusiku"=>$retribusi->result(),
        );
		 $this->Mypage('isi/adm/alokasi',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('id_retribusi', 'id_retribusi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/alokasi');
        }else{
            $id = rand();
            $config['upload_path']          = './assets/images/alokasi/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_image = $_FILES['foto']['name'];

            if($upload_image){
              if ($this->upload->do_upload('foto')) {
                 $img = $this->upload->data('file_name');
                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('adm/alokasi');
                  }

              }else{
                $img = 'default.png';
              }

            $data=array(
                "id_retribusi"=>$_POST['id_retribusi'],
                "id_wilayah"=>$_POST['id_wilayah'],
                "keterangan"=>$_POST['keterangan'],
                 "harga"=>$_POST['harga'],
                "foto" => $img,
                "deleted" => 0
            );
            $this->db->insert('alokasi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/alokasi');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('id_alokasi', 'id_alokasi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/bahan');
        }else{
            $id = rand();
            $config['upload_path']          = './assets/images/alokasi/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_image = $_FILES['foto']['name'];

            if($upload_image){
                 if ($this->upload->do_upload('foto')) {

                 $img = $this->upload->data('file_name');

                 if($_POST['old_image'] != 'default.png'){
                    $path = './assets/images/alokasi/'.$_POST['old_image'];
                    chmod($path, 0777);
                    unlink($path);
                 }

                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('adm/alokasi');
                  }

              }else{
                $img = $_POST['old_image'];
              }

            $data=array(
                "id_retribusi"=>$_POST['id_retribusi'],
                "id_wilayah"=>$_POST['id_wilayah'],
                "keterangan"=>$_POST['keterangan'],
                 "harga"=>$_POST['harga'],
                "foto" => $img
            );
            $this->db->where('id_alokasi', $_POST['id_alokasi'] );
            $this->db->update('alokasi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/alokasi');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/bahan');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_alokasi', $id);
            $this->db->update('alokasi',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/alokasi');
        }
    }


	
}
