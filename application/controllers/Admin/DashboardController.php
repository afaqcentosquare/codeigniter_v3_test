<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class DashboardController extends CI_Controller {

	
    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
    
    }

	public function dashboardView()
	{
		$this->load->view('admin/dashboard');
	}

   
}
