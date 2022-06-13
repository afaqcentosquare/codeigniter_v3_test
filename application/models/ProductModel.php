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

}

?>