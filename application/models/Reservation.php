<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservation extends CI_Model{

    /**
     * Summary of getlistempersoneechange1
     * @return mixed
     */
    public function getlistempersoneechange1(){
        $sql = "select users.nom,users.prenom,historique.dataechange,object.name from users
            join historique on historique.encientuser=users.iduser
            join object on object.idobject=historique.idobject
        order by  historique.dataechange";
        return $this->db->query($sql)->result_array(); 
    }

    /**
     * Summary of listeobjectdemandeechange
     * @param mixed $idobject
     * @return mixed
     */
    public function listeobjectdemandeechange($idobject){
        $query = "select * from object join reservation on object.idobject=reservation.idtakalo where reservation.idobject=%d";
        $query = sprintf($query,$this->db->escape(intval($idobject)));
        return $this->db->query($query)->result_array(); 
    }


    public function reservationobject($idobject){
        $query = "select * from reservation where idobject=%d";
        $query = sprintf($query,$this->db->escape(intval($idobject)));
       
        return $this->db->query($query)->result_array();      
    }
    public function reservation(){
        $query = "select * from reservation";
        return $this->db->query($query)->result_array();       
    }

    /**
     * Summary of insertreservation
     * @param mixed $idpropriety
     * @param mixed $iduser
     * @param mixed $idobject
     * @return void
     */
    public function insertreservation($idpropriety, $iduser, $idobject,$idtakalo){
        $sql = "insert into reservation values(null,%d,%d,%d,%d,now())";
        $sql = sprintf($sql,$this->db->escape(intval($idpropriety)) ,$this->db->escape(intval($iduser)) , $this->db->escape(intval($idobject)),$this->db->escape(intval($idtakalo)));
        $this->db->query($sql); 
    }

    /**
     * Summary of reservationcancellation
     * @param mixed $iduser
     * @param mixed $idobject
     * @return void
     */
    public function reservationcancellation($iduser,$idobject){
        $sql = "delete from reservation where iduser=%d and idobject=%d";
        $sql = sprintf($sql,$this->db->escape(intval($iduser)), $this->db->escape(intval($idobject)) );
        $this->db->query($sql);
    }

    /**
     * Summary of canceldemandereserv
     * @param mixed $iduser
     * @param mixed $idobject
     * @return void
     */
    public function canceldemandereserv($idobject ,$idtakalo){
        $sql = "delete from reservation where idtakalo=%d and idobject=%d";
        $sql = sprintf($sql,$this->db->escape(intval($idtakalo)),$this->db->escape(intval($idobject)) );
        
        $this->db->query($sql);
    }
}