<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class DashboardController extends CI_Controller {

	
    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
        $this->load->model('ProductModel');
        $this->load->model('OrderModel');
        $this->load->helper('currencyconverter');
    }

	public function dashboardView()
	{
        $user  = new UserModel();
        $products = new ProductModel();
        $data["active_count"] = $user->getActiveUserCount();
        $data['attached_product_user_count'] = $user->getAttachProductUserCount();
        $data['active_products'] = count($products->getActiveProducts());
        $data['non_attach_products'] = count($products->getNonAttachProducts());
        $data['total_amount_of_attach_products'] = $products->amountOfAllActiveAttachedProducts();
        $data['total_quantity_attach_products'] = $products->quantityOfAllActiveAttachedProducts();
        $data['product_info_by_user'] = $products->productsInfoByUser();
		$this->load->view('admin/dashboard', array('data' => $data));
	}

   
}
