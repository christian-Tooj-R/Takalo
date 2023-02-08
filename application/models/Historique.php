<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Historique extends CI_Model{

    public function coontechange(){
        $sql = "select count(*) from historique";
        return $this->db->query($sql)->row_array(); 
    }

    public function insethistorique($idobjet,$idencient){
        $sql = "insert into historique values(null,%d,%d,now())";
        $query = sprintf($sql,$this->db->escape(intval($idobjet)),$this->db->escape(intval($idencient)));
        $this->db->query($query);
    }
}