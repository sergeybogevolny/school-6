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
		$sql = "SELECT * FROM user WHERE user_id = ?";
		$query = $this->db->query($sql, array($id));

		if ($query->num_rows() > 0){
		   return $query->row();
		} else {
			return false;
		} 

    }



    public function getOrder($orderId)
    {
        $sql = "SELECT * FROM `order` WHERE order_id = '{$orderId}' ";
        $this->load->database();
        $query = $this->db->query($sql);
        if($query->num_rows() == 0){
            return false;
        }

        $order['order'] = $query->row();
        $sql = "SELECT * FROM `order_item` JOIN `inventory` ON (order_item.item_id = inventory.item_id) WHERE order_id = '{$orderId}' ";
        $query = $this->db->query($sql);

        if($query->num_rows() == 0){
            return false;
        }
        $order['order_item'] = $query->result();
        return $order;
    }

    public function getCustomer($user_id)
    {
        $this->load->database();
        $sql = "SELECT * FROM user WHERE user_id = '{$user_id}' ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0){
           return $query->row();
        }
    }

     public function getOrders($user_id)
    {
        $this->load->database();
        $sql = "SELECT * FROM `order` JOIN `user` ON (`user`.`user_id` = `order`.`user_id` ) WHERE `order`.`user_id` = '{$user_id}' ORDER BY order_id DESC";
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
}