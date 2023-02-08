<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Model{

    /**
     * Function all categories
     * @return mixed
     */
    public function allcategories(){
        $query =$this->db->query("select * from category");
        return $query->result_array();
    }
    /**
     * Function insert category
     * @param mixed $categoryname
     * @return void
     */
    public function insertcategorie($categoryname){
        $query = "insert into category values (null,%s)";
        $query = sprintf($query, $this->db->escape($categoryname));
        $this->db->query($query);
    }


	
	
}