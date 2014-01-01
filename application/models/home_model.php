<?php

class Home_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

   
    public function getHomeList()
    {
        $list = array();
        $this->load->database();

        foreach (getBookCategories() as $categoryId => $category) {
            $sql = "SELECT * FROM inventory WHERE category = {$categoryId} LIMIT 4";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0){
               $list[$categoryId] = $query->result();
            }
        }

        return $list;
    }

    public function getBooks($filters)
    {
        $this->load->database();
        $sql = "SELECT * FROM inventory ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0){
               return $query->result();
            } else{
                return false;
            }
    }
}