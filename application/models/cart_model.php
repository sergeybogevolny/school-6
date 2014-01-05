<?php


class Cart_model extends CI_Model {


	public function getCartItemData($cartItems)
	{
		if(empty($cartItems)){
			return false;
		}
		$this->load->database();
		$items = implode(', ', $cartItems); 
		$sql = "SELECT * FROM inventory WHERE item_id in ({$items}) ";
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0){
           return $query->result();
        }
        return false;
	}

}