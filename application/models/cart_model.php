<?php


class Cart_model extends CI_Model {


	public function getCartItemData($cartItems)
	{
		if(empty($cartItems)){
			return false;
		}
		$cartItems = array_keys($cartItems);
		$this->load->database();
		$items = implode(', ', $cartItems); 
		$sql = "SELECT * FROM inventory WHERE item_id in ({$items}) ";
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0){
           return $query->result();
        }
        return false;
	}

	public function generateOrder($customer, $cart)
	{
		if (empty($customer) && empty($cart)) {
			return false;
		}

        $this->load->database();
        $order = array(
        	'date' => date('Y-m-d h:i:s'), 
        	'user_id' => $customer,
        	'status' => 'Order accepted'
        );
        $this->db->insert('order', $order);
        $orderId = $this->db->insert_id();

       	foreach ($cart as $itemId => $unit) {
			$orderItems = array (
				'order_id' => $orderId, 
				'item_id' => $itemId,
				'unit' => $unit
			);
			$this->db->insert('order_item', $orderItems);

			$sql = "SELECT `stock` FROM `inventory` WHERE `item_id` = '{$itemId}' ";
			$this->load->database();
			$query = $this->db->query($sql);
			$stock = $query->row()->stock;

			$stock = $stock - $unit;
			$data = array('stock' => $stock);
			$this->db->where('item_id', $itemId);
			$this->db->update('inventory', $data); 
		}
		return $orderId;

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

}