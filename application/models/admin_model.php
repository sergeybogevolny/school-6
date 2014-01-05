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

    public function addToInventory($data)
    {
        $this->load->database();
        $this->db->insert('inventory', $data);
        return $this->db->insert_id();
    }

    public function getInventory()
    {
        $this->load->database();
        $sql = "SELECT * FROM inventory";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0){
           return $query->result();
        } else {
            return false;
        } 
    }

    public function getOrders()
    {
        $this->load->database();
        $sql = "SELECT * FROM `order` JOIN `user` ON (`user`.`user_id` = `order`.`user_id` ) ORDER BY order_id DESC";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0){
            $orders = $query->result();
            foreach ($orders as $key => $value) {
                $query = $this->db->query("SELECT * FROM `order_item` JOIN `inventory` ON (order_item.item_id = inventory.item_id) WHERE order_id = '{$value->order_id}' ");
                $orders[$key]->items = $query->result();
            }
            return $orders;
        } else {
            return false;
        } 
    }

    public function updateOrderStatus($orderId, $status)
    {
        $this->load->database();
        $data = array('status' => getOrderStatus($status));
        $this->db->where('order_id', $orderId);
        $this->db->update('order', $data);
    }

}