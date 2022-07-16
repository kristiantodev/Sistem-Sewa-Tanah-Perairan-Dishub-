<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="Administrator"){
            $this->session->set_flashdata('pesan', 'Silahkan LOGIN Terlebih Dahulu Untuk Mengakses Halaman Tersebut !!');
            redirect(site_url('login/'));
        }
	}

	public function index(){
        $idUser=$this->session->userdata('id_user');
        $pengajuan = $this->db->query("SELECT*FROM pengajuan 
            LEFT JOIN user ON user.id_user=pengajuan.id_user
            LEFT JOIN retribusi ON retribusi.id_retribusi=pengajuan.id_retribusi
            LEFT JOIN wilayah ON wilayah.id_wilayah=pengajuan.id_wilayah
            LEFT JOIN alokasi ON alokasi.id_alokasi=pengajuan.id_alokasi
            ORDER BY pengajuan.tgl_pengajuan DESC");

        $wilayah = $this->db->query("SELECT*FROM wilayah WHERE deleted=0");
        $retribusi = $this->db->query("SELECT*FROM retribusi WHERE deleted=0");

         $data=array(
            "pengajuanku"=>$pengajuan->result(),
            "wilayahku"=>$wilayah->result(),
            "retribusiku"=>$retribusi->result(),
        );
		 $this->Mypage('isi/adm/pengajuan',$data);
	}

    public function perjanjian(){
        $this->form_validation->set_rules('id_pengajuan', 'id_pengajuan', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/pengajuan');
        }else{

              $id = rand();
            $config['upload_path']          = './assets/images/perjanjian/';
            $config['allowed_types']        = 'pdf';
            $config['file_name']            = $id;
            $config['overwrite']            = true;
            $config['max_size']             = 2024;

            $this->load->library('upload', $config);

            $upload_image = $_FILES['file_perjanjian']['name'];

            if($upload_image){
              if ($this->upload->do_upload('file_perjanjian')) {
                 $img = $this->upload->data('file_name');
                  }else{
                    $this->session->set_flashdata('sukses',"gagal");
                    redirect('adm/pengajuan');
                  }

              }else{
                $img = 'default.png';
              }

            $data=array(
                "acc_dishub"=>1,
                "file_perjanjian"=>$img
            );
            $this->db->where('id_pengajuan', $_POST['id_pengajuan'] );
            $this->db->update('pengajuan',$data);

            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/pengajuan');
        }
    }

    public function konfirmasiBayar($id){
        if($id==""){
            $this->session->set_flashdata('error',"Pembayaran Gagal di Konfirmasi");
            redirect('adm/pengajuan');
        }else{
            $data=array(
                "acc_final_admin"=> 1
            );
            $this->db->where('id_pengajuan', $id);
            $this->db->update('pengajuan',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/pengajuan');
        }
    }

	
}
