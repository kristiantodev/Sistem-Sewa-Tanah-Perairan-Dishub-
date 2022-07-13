  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
         $this->form_validation->set_rules('username', 'Username','trim|required');
         $this->form_validation->set_rules('password', 'Password','trim|required');

         if($this->form_validation->run() == false){
          
          $this->load->view('login');
         
         }else{

            $this-> _auth();

         }
         
    }

    private function _auth(){

        $userku = $this->input->post('username');
        $passku = $this->input->post('password');
        $levelku = 'Administrator';

        $array = array('username' => $userku);
        $user_auth = $this->db->get_where('user', $array)->row_array();

        if($user_auth){
                
               if(password_verify($passku, $user_auth['password'])){

                $data = [
                'id_user' => $user_auth['id_user'],
                'username' => $user_auth['username'],
                'level' => $user_auth['level'],
                'nm_user' => $user_auth['nm_user']
                ];

                $this->session->set_userdata($data);

                  if($this->session->userdata('level')=="Administrator"){
                        redirect('adm/dashboard');
                    }else if($this->session->userdata('level')=="Pelanggan"){
                        redirect('pelanggan/dashboard');
                    }else if($this->session->userdata('level')=="UPTD"){
                        redirect('uptd/dashboard');
                    }else if($this->session->userdata('level')=="Dishub"){
                        redirect('dishub/dashboard');
                    }

               }else{

                $this->session->set_flashdata('pesan', 'Password yang Anda Masukan Salah !!');
                redirect('login/');

               }


        }else{
            $this->session->set_flashdata('pesan', 'Username atau Level User yang Anda Masukan Salah !!');
            redirect('login/');
        }

    }
    
    
        
    public function logout(){
         $this->session->sess_destroy();
         redirect('login/');
    }

    public function register(){
        
          
          $this->load->view('register');
            
    }

    public function register_add()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('error',"Data Gagal Di Tambahkan");
            redirect('login/register');
        }else{
            $idku = uniqid();
            $pass = password_hash ($_POST['password'], PASSWORD_DEFAULT);

            $myUsername=$_POST['username'];

            $cekQuery = $this->db->query("SELECT * FROM user WHERE username = '$myUsername'")->result_array();
            if(count($cekQuery) >= 1){
                   $this->session->set_flashdata('sukses',"Gagal Username Sudah Tersedia");
                   redirect('login/register');
            }
            $data=array(
                "id_user" => $idku,
                "username"=>$_POST['username'],
                "password"=>$pass,
                "nm_user"=>$_POST['nm_user'],
                "level"=>'Pelanggan',
                "foto"=>"1.jpg",
                "alamat"=>$_POST['alamat']
            );
            $this->db->insert('user',$data);

            $this->session->set_flashdata('sukses',"Registrasi Berhasil. Silahkan Login");
            redirect('login/register');
        }
    }

}
