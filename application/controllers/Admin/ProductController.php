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
        $data['data'] = $products->getProducts();
		$this->load->view('admin/products/index', $data);
	}

    public function create()
    {
        $this->load->view('admin/products/create');
    }

    public function store()
    {
        $product = new ProductModel();
        $is_added =  $product->store();

        
        if($is_added){
                $this->session->set_flashdata("is_created","Product Added Successfully");
           
        }else{
            $this->session->set_flashdata("is_created","Something went wrong");
        }
        redirect(base_url('index.php/admin/product/create'));
    }

    public function edit($id)
    {
        $product = new ProductModel();
        $data = $product->editProduct($id);
        $this->load->view('admin/products/edit',array('data' => $data));
    }

    public function update($id)
    {
        $product = new ProductModel();
        $data = $product->updateProduct($id);
        redirect(base_url('index.php/admin/product/index'));
    }


    public function delete($id)
    {
        $product = new ProductModel();
        $data = $product->deleteProduct($id);
        redirect(base_url('index.php/admin/product/index'));
    }

   
}
