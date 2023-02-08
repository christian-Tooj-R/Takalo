<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Search extends CI_Model{
       

        public function find($motcle,$idcategorie){
                $query = "select * from Object";
                $tab = array();
                $tab = $this->db->query($query)->result_array();
                $tables =  array();
                foreach($tab as $searchs){
                    $position = stripos($searchs['name'],$motcle);
                        
                        if($position === false){
                            
                        }else{
                            
                            if($idcategorie == $searchs['idcategory']){
                                $query = "select * from Object where name=%s and idcategory=%d";
                                $query = sprintf($query,$this->db->escape($searchs['name']),$this->db->escape(intval($idcategorie)));
                                $tables[] = $this->db->query($query)->result_array();
                                echo $query.'</br>';
                            }else{
                                
                            }
                        }
                }
            return $tables;
        }
    }
?>