<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Model{

    
    /**
     * Summary of countuser
     * @param mixed $admin
     * @return mixed
     */
    public function countuser($admin){
        $sql = "select count(*) from users where admin=%d";
        $query = sprintf($sql,$this->db->escape($admin));
        return $this->db->query($query)->row_array();
    }
    
    /**
     * /Summary of check_login
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public function check_login($email,$password){
        $query = "select iduser,admin from users where email=%s and password=%s limit 1";
        $query = sprintf($query,$this->db->escape($email),$this->db->escape($password));
        return $this->db->query($query)->row_array();     
    }

    /**
     * Summary of infouser
     * @param int $iduser
     * @return mixed
     */
    public function  infouser($iduser){
        $query = "select * from users where iduser=%d limit 1";
        $query = sprintf($query,$this->db->escape(intval($iduser)));
        return $this->db->query($query)->row_array(); 
    }
    /**
     * Summary of insert
     * @param string $name
     * @param string $firstname
     * @param string $sexe
     * @param string $email
     * @param string $password
     * @param string $contact
     * @param string $admin
     * @return void
     */  
    
    /**
     * Summary of insert
     * @param mixed $name
     * @param mixed $firstname
     * @param mixed $sexe
     * @param mixed $email
     * @param mixed $password
     * @param mixed $contact
     * @param mixed $admin
     * @return void
     */
    public function insert($name, $firstname, $sexe, $email, $password, $contact, $admin){
        $query = "insert into users values (null,%s,%s,%s,%s,%s,%s,%d,now())";
        $query = sprintf($query,$this->db->escape($name),$this->db->escape($firstname),$this->db->escape($sexe),$this->db->escape($email),$this->db->escape($password),$this->db->escape($contact),$this->db->escape($admin));
        $this->db->query($query);
        
    }
	

}
