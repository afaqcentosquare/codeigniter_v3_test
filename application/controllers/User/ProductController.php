<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ProductController extends CI_Controller {

	
    public function __construct()
    {
        parent::__construct();

        $this->load->model('ProductModel');
    
    }

	public function index()
	{
        $products = new ProductModel();
        $data['data'] = $products->getActiveProducts();
		$this->load->view('user/products', $data);
	}


    public function orderView()
    {
        $this->load->view('user/order');
    }

   
}
