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
}

?>