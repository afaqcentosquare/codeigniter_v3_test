<?php
defined('BASEPATH') or exit('No direct script access allowed');


class OrderController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('OrderModel');
    }

    public function index($id)
    {
        $this->load->view('user/order', array("id" => $id));        
    }

    public function store()
    {
        $order = new OrderModel();
        $is_created =  $order->store();
        if ($is_created) {
            redirect(base_url('index.php/user/products'));
        } else {
            $this->session->set_flashdata("is_created", "Something went wrong");
            redirect(base_url('index.php/user/order/'.$this->input->post('product_id')));
        }
    }
}
