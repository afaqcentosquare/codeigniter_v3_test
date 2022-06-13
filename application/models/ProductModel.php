<?php
class ProductModel extends CI_Model {



    public function store()
    {
        $data = array(
            "title" => $this->input->post('title'),
            "description" => $this->input->post('description'),
            "status" => $this->input->post('status'),
        );

       return $this->db->insert('products', $data);
        
    }


    public function getProducts()
    {
        $query = $this->db->get('products');
        return $query->result();
    }

    public function editProduct($id)
    {
        $product = $this->db->get_where('products', array('id' => $id));
        return $product->row();
    }

    public function updateProduct($id)
    {
        $this->db->where('id', $id);
        $data = array(
            "title" => $this->input->post('title'),
            "description" => $this->input->post('description'),
            "status" => $this->input->post('status'),
        );
        return $this->db->update('products', $data);
    }

    public function deleteProduct($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }

    public function getActiveProducts()
    {
        $query = $this->db->get_where('products', array('status' => 'active'));
        return $query->result();
    }

    public function getNonAttachProducts()
    {
        $sql = "SELECT `product_id` FROM `orders`";
        $query_result = $this->db->query($sql);
        $order_result = $query_result->result_array();
        $arr = array_map(function($value){
            return $value['product_id'];
        },$order_result);
        $query = $this->db->select('*')->from('products');
        $result = $query->where_not_in('id', $arr)->get();
        return $result->result_array();
    }

    public function quantityOfAllActiveAttachedProducts()
    {
        $total_quantity = 0;
        $active_products = $this->db->get_where('products', array('status' => 'active'));
        $active_product_result = $active_products->result_array();
        $arr = array_map(function($value){
            return $value['id'];
        },$active_product_result);

        if(count($arr) > 0){
            $this->db->select("sum(quantity) as total_quantity");
            $this->db->from('orders');
            $this->db->where_in('product_id', $arr);
            $result_data = $this->db->get()->result_array();
            foreach($result_data as $data){
                $total_quantity += $data['total_quantity'];
            }
        }
        
        return $total_quantity;
    }

    public function amountOfAllActiveAttachedProducts()
    {
        $total_amount = 0;
        $active_products = $this->db->get_where('products', array('status' => 'active'));
        $active_product_result = $active_products->result_array();
        $arr = array_map(function($value){
            return $value['id'];
        },$active_product_result);

        if(count($arr) > 0){
            $this->db->select("sum(quantity * price) as total_active_price");
            $this->db->from('orders');
            $this->db->where_in('product_id', $arr);
            $result_data = $this->db->get()->result_array();
            foreach($result_data as $data){
                $total_amount += $data['total_active_price'];
            }
        }
        
        return $total_amount;
    }

    public function productsInfoByUser()
    {
            $this->db->select("name, user_id, sum(quantity * price) as total_price");
            $this->db->from('orders');
            $this->db->group_by('user_id');
            $this->db->join('users', 'orders.user_id = users.id');
            $result_data = $this->db->get()->result_array();
            return $result_data;
    }

}

?>