<?php


class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function hashPassword($rawPassword)
    {
    	$salt = 'asd05)(*---++^&^#*..';
    	return md5($rawPassword.$salt);
    }


    public function getUserByUsername($username=false)
    {
    	if (empty($username)) {
    		return false;
    	}

    	$this->load->database();
		$sql = "SELECT * FROM user WHERE username = ?";
		$query = $this->db->query($sql, array($username));

		if ($query->num_rows() > 0){
		   return $query->row();
		} else {
			return false;
		} 

    }

    public function addNewUser($data)
    {
        $this->load->database();
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function getUserById($id=false)
    {
    	if (empty($id)) {
    		return false;
    	}

    	$this->load->database();
		$sql = "SELECT * FROM user WHERE id = ?";
		$query = $this->db->query($sql, array($id));

		if ($query->num_rows() > 0){
		   return $query->row();
		} else {
			return false;
		} 

    }
}