<?php
class UserModel extends CI_Model {

    public function checkLogin()
    {
        $query = $this->db->get_where('users',['email' => $this->input->post('email'),'password' => $this->input->post('password'),'email_verified' => 1]);

        return $query->row();
    }

    public function register()
    {
        $data = array(
            "email" => $this->input->post('email'),
            "password" => $this->input->post('password'),
            "name" => $this->input->post('name'),
        );

        $this->db->insert('users', $data);
        $id = $this->db->insert_id();
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }

    public function verifyEmail($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', array('email_verified' => 1));
    }

    public function getActiveUserCount()
    {
        $this->db->where('email_verified', 1);
        $this->db->where('role', 'user');
        return $this->db->count_all_results('users');        
    }

    public function getAttachProductUserCount()
    {
        $this->db->select('*')
            ->from('orders')
            ->group_by('user_id')
            ->get();

        return $this->db->count_all_results('products');

    }
}

?>