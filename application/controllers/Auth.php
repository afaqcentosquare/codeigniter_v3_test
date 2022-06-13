<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
        $this->load->library('encryption');
    
    }

	public function login()
	{
		$this->load->view('auth/login');
	}

    public function signup()
    {
        $this->load->view('auth/signup');
    }

    public function checkLogin()
    {
        $user = new UserModel();
        $is_login = $user->checkLogin();
        if($is_login){
            $data = array('id' => $is_login->id);
            $this->session->set_userdata($data);
            if($is_login->role == "admin"){
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                redirect(base_url('index.php/user/products'));
            }
        }else{
            $this->session->set_flashdata("is_login","Login Failed");
            redirect(base_url('index.php/auth/login'));
        }
    }

    public function register()
    {

        $user = new UserModel();
        $is_register =  $user->register();

        
        if($is_register){
            $encrypted_id = $this->encryption->encrypt($is_register->id);
            $verify_link = base_url('index.php/verify_email/'.$encrypted_id);
            $this->load->library('email');
            $this->email->from("mwaqasiu@gmail.com", 'mwaqasiu@gmail.com');
            $this->email->to($is_register->email);
            $this->email->subject("Verification Email");
            $this->email->message("please verify your email click on link <a href='".$verify_link."'>click here</a>");
            if($this->email->send()){
                $this->session->set_flashdata("is_register","Verification Email Send. Please check your email.");
            }else{
                $this->session->set_flashdata("is_register","Email not send");
            }
        }else{
            $this->session->set_flashdata("is_register","Registration Failed");
        }
        redirect(base_url('index.php/auth/signup'));
    }

    public function verifyEmail($token = null)
    {
        $decrypted_id = $this->encryption->decrypt($token);
        $user = new UserModel();
        $is_verify = $user->verifyEmail($decrypted_id);
        if($is_verify){
            $this->session->set_flashdata("is_login","Successfully Verified Please Enter your credentials to login.s");
            redirect(base_url('index.php/auth/login'));
        }else{
            $this->session->set_flashdata("is_login","Something went wrong");
            redirect(base_url('index.php/auth/login'));
        }
    }
}
