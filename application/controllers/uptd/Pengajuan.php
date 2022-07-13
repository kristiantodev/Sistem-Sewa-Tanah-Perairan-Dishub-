<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends My_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->library('form_validation');
        $this->load->library('session');
        if($this->session->userdata('level')!="UPTD"){
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
            ORDER BY pengajuan.tgl_pengajuan DESC");

        $wilayah = $this->db->query("SELECT*FROM wilayah WHERE deleted=0");
        $retribusi = $this->db->query("SELECT*FROM retribusi WHERE deleted=0");

         $data=array(
            "pengajuanku"=>$pengajuan->result(),
            "wilayahku"=>$wilayah->result(),
            "retribusiku"=>$retribusi->result(),
        );
		 $this->Mypage('isi/uptd/pengajuan',$data);
	}


	
    public function konfirmasi()
    {
        $this->form_validation->set_rules('id_pengajuan', 'id_pengajuan', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('uptd/pengajuan');
        }else{
            $data=array(
                "acc_uptd"=>$_POST['acc_uptd'],
                "message_to_cust"=>$_POST['message_to_cust']
            );
            $this->db->where('id_pengajuan', $_POST['id_pengajuan'] );
            $this->db->update('pengajuan',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('uptd/pengajuan');
        }
    }


	
}
