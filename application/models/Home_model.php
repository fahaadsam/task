<?php
class Home_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_users($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('user');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('user', array('slug' => $slug));
        return $query->row_array();
    }
    
    public function get_user_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('user');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_user($id = 0)
    {
        $this->load->helper('url');
 
        $slug = url_title($this->input->post('firstname'), 'dash', TRUE);
 
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'message' => $this->input->post('message'),
        );
        
        if ($id == 0) {
            return $this->db->insert('user', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('user', $data);
        }
    }
    
    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }
}