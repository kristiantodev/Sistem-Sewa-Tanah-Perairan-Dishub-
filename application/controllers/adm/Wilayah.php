<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends My_Controller {

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

        $wilayah = $this->db->query("SELECT*FROM wilayah WHERE deleted=0");

         $data=array(
            "wilayahku"=>$wilayah->result(),
        );
		 $this->Mypage('isi/adm/wilayah',$data);
	}


	
      public function add()
    {
        $this->form_validation->set_rules('nm_wilayah', 'nm_wilayah', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/wilayah');
        }else{
            $data=array(
                "nm_wilayah"=>$_POST['nm_wilayah'],
                "deleted" => 0
            );
            $this->db->insert('wilayah',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/wilayah');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_wilayah', 'nm_wilayah', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('adm/wilayah');
        }else{
            $data=array(
                "nm_wilayah"=>$_POST['nm_wilayah']
            );
            $this->db->where('id_wilayah', $_POST['id_wilayah'] );
            $this->db->update('wilayah',$data);
            $this->session->set_flashdata('sukses',"berhasil");
            redirect('adm/wilayah');
        }
    }

    public function hapus($id)
    {
        if($id==""){
            $this->session->set_flashdata('error',"Data Gagal Di Hapus");
            redirect('adm/wilayah');
        }else{
            $data=array(
                "deleted"=> 1
            );
            $this->db->where('id_wilayah', $id);
            $this->db->update('wilayah',$data);
            $this->session->set_flashdata('sukses',"hapus");
            redirect('adm/wilayah');
        }
    }


	
}
