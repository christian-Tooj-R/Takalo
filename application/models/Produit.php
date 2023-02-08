<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produit extends CI_Model{

      /**
       * Summary of checkprourcentage
       * Fun
       * @param mixed $pourcentage
       * @param mixed $idobject
       * @return mixed
       */

    public function checkprourcentage($pourcentage,$idobject){
        $donne = $this->getobject($idobject);
        $moins = ($donne['prixestime'] - (($donne['prixestime'] * $pourcentage) / 100));
        $plus =  ($donne['prixestime'] + (($donne['prixestime'] * $pourcentage) / 100));
        $query = "select * from object where %d<=prixestime and prixestime<=%d and idobject != %d and disponibilite=0";
        $query = sprintf($query,$this->db->escape(intval($moins)), $this->db->escape(intval($plus)) ,  $this->db->escape(intval($idobject)));
        
        return $this->db->query($query)->result_array();  
    }

    /**
     * Summary of updatedispo
     * @param string $idobject
     * @return void
     */

    public function updatedispo($idobject,$idnewpropriety){
        $query = "update object set disponibilite=0,iduser=%d where idobject=%d";
        $query = sprintf($query,$this->db->escape(intval($idnewpropriety)),$this->db->escape(intval($idobject)));
        $this->db->query($query);
    }

    /**
     * Summary of getobject
     * @param string $idobject
     * @return mixed
     */
    public function getobject($idobject){
        $query = "select * from Object where idobject=%d ";
        $query = sprintf($query,$this->db->escape(intval($idobject)));
        return $this->db->query($query)->row_array();     
    }

      /**
       * Summary of imageperobject
       * @param string $idobject
       * @return mixed
       */

    public function imageperobject($idobject){
        $query = "select * from image where idobject=%d";
        $query = sprintf($query,$this->db->escape(intval($idobject)));
        return $this->db->query($query)->result_array();     
    }

    /**
     * Function object list by user by object
     * @param mixed $iduser
     * @param mixed $idobject
     * @return mixed
     */
    public function objectperpersobject($iduser,$idobject){
        $query = "select * from Object where iduser=%d and idobject=%d ";
        $query = sprintf($query,$this->db->escape(intval($iduser)),$this->db->escape(intval($idobject)));
        return $this->db->query($query)->row_array();     
    }

    /**
     * Function object list by user
     * @param mixed $iduser
     * @return mixed
     */
    public function objectperpersonne($iduser){
        $query = "select * from Object where iduser=%d and disponibilite=0";
        $query = sprintf($query,$this->db->escape(intval($iduser)));
        return $this->db->query($query)->result_array();     
    }

    /**
     * Summary of all object
     * @return mixed
     */
    public function allobject($iduser){
        $query = "select * from Object where disponibilite=0 and iduser != %d";
        $query = sprintf($query,$this->db->escape(intval($iduser)));
        return $this->db->query($query)->result_array();     
    }

    /**
     * Summary of allimage
     * @return mixed
     */
    public function allimage(){
        $query = "select * from image";
        return $this->db->query($query)->result_array();     
    }

    /**
     * Function object list by user by category
     * @param mixed $iduser
     * @param mixed $idcategory
     * @return mixed
     */
    public function objectperperscategory($iduser,$idcategory){
        $query = "select * from Object where iduser=%d and idcategory=%d";
        $query = sprintf($query,$this->db->escape(intval($iduser)),$this->db->escape(intval($idcategory)));
        return $this->db->query($query)->result_array();     
    }

    /**
     * Function insertion object
     * @param mixed $iduser
     * @param mixed $idcategory
     * @param mixed $name
     * @param mixed $desciption
     * @param mixed $prixestime
     * @return void
     */
    public function insertobject($iduser,$idcategory,$name,$desciption,$prixestime){
        $query = "insert into object values (null,%d,%d,%s,%s,%d)";
        $query = sprintf($query, $this->db->escape($iduser),$this->db->escape($idcategory),$this->db->escape($name),$this->db->escape($desciption),$this->db->escape(doubleval($prixestime)));
        $this->db->query($query);
    }

    /**
     * Function delete object per user
     * @param mixed $iduser
     * @return void
     */
    public function deleteobjectpers($iduser){
        $query = "delete from  object where idobject=%d";
        $query = sprintf($query,$this->db->escape(intval($iduser)));
        $this->db->query($query);
    }
    /**
     * Function modif object per user
     * @param mixed $iduser
     * @param mixed $idcategory
     * @param mixed $name
     * @param mixed $desciption
     * @param mixed $prixestime
     * @return void
     */
    
    public function modifobjectpers($iduser,$idcategory,$name,$desciption,$prixestime,$idobj){
        $query = "update object set idcategory=%d,name=%s,description=%s,prixestime=%g where iduser=%d and idobject=%d";
        $query = sprintf($query,$this->db->escape(intval($idcategory)),$this->db->escape($name),$this->db->escape($desciption),$this->db->escape(doubleval($prixestime)),$this->db->escape(intval($iduser)),$this->db->escape(intval($idobj)));
        $this->db->query($query);
    }

    public function deleteobject($iduser,$idobject){
        $sql2 = "delete  from image where  idobject=%d";
        $sql2 = sprintf($sql2,$this->db->escape(intval($idobject)));
        $this->db->query($sql2);
        $sql3 = "delete from reservation where idobject=%d or idtakalo=%d";
        $sql3 = sprintf($sql3,$this->db->escape(intval($idobject)),$this->db->escape(intval($idobject)) );
        $this->db->query($sql3);
        $sql = "delete from object where iduser=%d and idobject=%d";
        $sql = sprintf($sql,$this->db->escape(intval($iduser)), $this->db->escape(intval($idobject)) );
        $this->db->query($sql);
    }
	
	
}