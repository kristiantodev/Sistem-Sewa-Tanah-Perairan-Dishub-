<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class retribusi extends My_Controller {

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

        $retribusi = $this->db->query("SELECT*FROM retribusi 
            LEFT JOIN jenis_retribusi ON jenis_retribusi.id_jenis_retribusi = retribusi.id_jenis_retribusi WHERE retribusi.deleted=0");
        $jenis_retribusi = $this->db->query("SELECT*FROM jenis_retribusi WHERE deleted=0");

         $data=array(
            "retribusiku"=>$retribusi->result(),
            "jenis_retribusiList"=>$jenis_retribusi->result()
        );
		 $this->Mypage('isi/adm/retribusi',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_retribusi', 'nm_retribusi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/retribusi');
        }else{
            $data=array(
                "nm_retribusi"=>$_POST['nm_retribusi'],
                "id_jenis_retribusi"=>$_POST['id_jenis_retribusi'],
                "deleted" => 0
            );
            $this->db->insert('retribusi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/retribusi');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_retribusi', 'nm_retribusi', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/retribusi');
        }else{
            $data=array(
                "nm_retribusi"=>$_POST['nm_retribusi'],
                "id_jenis_retribusi"=>$_POST['id_jenis_retribusi']
            );
            $this->db->where('id_retribusi', $_POST['id_retribusi'] );
            $this->db->update('retribusi',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/retribusi');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/retribusi');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_retribusi', $id);
            $this->db->update('retribusi',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/retribusi');
        }
    }


	
}
