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
            $sql = "SELECT * FROM inventory WHERE category = {$categoryId} AND deleted != 1  LIMIT 4";
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

        $where[] = " deleted != 1 ";

        if(!empty($filters['search'])){
            $search = $this->db->escape_like_str($filters['search']);
            $where[] = " (`title` LIKE '%{$search}%' OR `description` LIKE '%{$search}%' ) ";
        }

        if(!empty($filters['category'])){
            $categoryId = $this->db->escape($filters['category']);
            $where[] = " `category` = {$categoryId} ";
        }

        if(!empty($where)){
            $where = ' WHERE '. implode(' AND ', $where);
        } else {
            $where = '';
        }

        $sql = "SELECT * FROM inventory " . $where;
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0){
               return $query->result();
            } else{
                return false;
            }
    }
}