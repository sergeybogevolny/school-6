<?php

class Admin_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function getAdminByUsername($username=false)
    {
    	if (empty($username)) {
    		return false;
    	}

    	$this->load->database();
		$sql = "SELECT * FROM admin WHERE username = ?";
		$query = $this->db->query($sql, array($username));

		if ($query->num_rows() > 0){
		   return $query->row();
		} else {
			return false;
		} 

    }

    public function getAdminById($id=false)
    {
    	if (empty($id)) {
    		return false;
    	}

    	$this->load->database();
		$sql = "SELECT * FROM admin WHERE id = ?";
		$query = $this->db->query($sql, array($id));

		if ($query->num_rows() > 0){
		   return $query->row();
		} else {
			return false;
		} 

    }

    public function hashPassword($rawPassword)
    {
    	$salt = 'asd05)(*---++^&^#*..';
    	return md5($rawPassword.$salt);
    }

    public function changePassword($adminId, $newPassword)
    {
        $this->load->database();

        $data = array(
               'password' => $newPassword
            );

        $this->db->where('id', $adminId);
        $this->db->update('admin', $data); 
        return true;
    }

    public function AddToInventory($data)
    {
        $this->load->database();
        $this->db->insert('inventory', $data);
        return $this->db->insert_id();
    }

}