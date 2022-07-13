<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jenis_retribusi extends My_Controller {

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

        $jenis_retribusi = $this->db->query("SELECT*FROM jenis_retribusi WHERE deleted=0");

         $data=array(
            "jenis_retribusiku"=>$jenis_retribusi->result(),
        );
		 $this->Mypage('isi/adm/jenis_retribusi',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_jenis_retribusi', 'nm_jenis_retribusi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/jenis_retribusi');
        }else{
            $data=array(
                "nm_jenis_retribusi"=>$_POST['nm_jenis_retribusi'],
                "deleted" => 0
            );
            $this->db->insert('jenis_retribusi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/jenis_retribusi');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_jenis_retribusi', 'nm_jenis_retribusi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/jenis_retribusi');
        }else{
            $data=array(
                "nm_jenis_retribusi"=>$_POST['nm_jenis_retribusi']
            );
            $this->db->where('id_jenis_retribusi', $_POST['id_jenis_retribusi'] );
            $this->db->update('jenis_retribusi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/jenis_retribusi');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/jenis_retribusi');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_jenis_retribusi', $id);
            $this->db->update('jenis_retribusi',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/jenis_retribusi');
        }
    }


	
}
