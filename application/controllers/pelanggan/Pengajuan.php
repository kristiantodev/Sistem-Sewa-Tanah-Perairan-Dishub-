<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Pelanggan"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
	}

	public function index()
	{
        $idUser=$this->session->userdata('id_user');
        $pengajuan = $this->db->query("SELECT*FROM pengajuan 
             LEFT JOIN user ON user.id_user=pengajuan.id_user
            LEFT JOIN retribusi ON retribusi.id_retribusi=pengajuan.id_retribusi
            LEFT JOIN wilayah ON wilayah.id_wilayah=pengajuan.id_wilayah
            LEFT JOIN alokasi ON alokasi.id_alokasi=pengajuan.id_alokasi
            WHERE pengajuan.id_user='$idUser'
            ORDER BY pengajuan.tgl_pengajuan DESC");

        $wilayah = $this->db->query("SELECT*FROM wilayah WHERE deleted=0");
        $retribusi = $this->db->query("SELECT*FROM retribusi WHERE deleted=0");

         $data=array(
            "pengajuanku"=>$pengajuan->result(),
            "wilayahku"=>$wilayah->result(),
            "retribusiku"=>$retribusi->result(),
        );
		 $this->Mypage('isi/pelanggan/pengajuan',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('id_retribusi', 'id_retribusi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('pelanggan/alokasi');
        }else{
            
            $data=array(
                "id_retribusi"=>$_POST['id_retribusi'],
                "id_wilayah"=>$_POST['id_wilayah'],
                "message_to_uptd"=>$_POST['message_to_uptd'],
                "id_user"=>$this->session->userdata('id_user'),
                "tgl_pengajuan"=>date('Y-m-d H:i:s')
            );
            $this->db->insert('pengajuan',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('pelanggan/pengajuan');
        }
    }

    public function pilih(){
            $data=array(
                "id_user"=>$this->session->userdata('id_user')
            );
            $this->db->where('id_alokasi', $_POST['id_alokasi'] );
            $this->db->update('alokasi',$data);

            $dataPilih=array(
                   "id_alokasi"=>$_POST['id_alokasi'],
                   "acc_admin"=>1
            );

           $this->db->where('id_pengajuan', $_POST['id_pengajuan'] );
           $this->db->update('pengajuan',$dataPilih);

            $this->session->set_flashdata('sukses',"berhasil");

            redirect('pelanggan/pengajuan');
    }

     public function pembayaran()
    {
        $this->form_validation->set_rules('id_pengajuan', 'id_pengajuan', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('pelanggan/pengajuan');
        }else{

              $id = rand();
            $config['upload_path']          = './assets/images/bukti/';
            $config['allowed_types']        = 'pdf';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_image = $_FILES['file_pembayaran']['name'];

            if($upload_image){
              if ($this->upload->do_upload('file_pembayaran')) {
                 $img = $this->upload->data('file_name');
                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('pelanggan/pengajuan');
                  }

              }else{
                $img = 'default.png';
              }

            $data=array(
                "acc_final"=>$_POST['acc_final'],
                "file_pembayaran"=>$img
            );
            $this->db->where('id_pengajuan', $_POST['id_pengajuan'] );
            $this->db->update('pengajuan',$data);

            $this->session->set_flashdata('sukses',"berhasil");
            redirect('pelanggan/pengajuan');
        }
    }

	
}
