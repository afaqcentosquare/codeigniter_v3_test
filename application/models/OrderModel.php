<?php
class OrderModel extends CI_Model {



    public function store()
    {
        $data = array(
            "user_id" => $this->input->post('user_id'),
            "product_id" => $this->input->post('product_id'),
            "quantity" => $this->input->post('quantity'),
            "price" => $this->input->post('price'),
        );

       return $this->db->insert('orders', $data);
        
    }

}

?>