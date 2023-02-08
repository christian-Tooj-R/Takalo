<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."controllers/Mysession.php");
class Profil extends Mysession {

	public function index($reservation="",$idobjet="",$idpropriety=""){
		$iduser = $this->session->user['iduser'];
        $this->load->model('Produit');
		$this->load->model('Users');
		$list = array();
		$list['prod'] = "ListeProduit";
		$list['objects'] = $this->Produit->objectperpersonne($iduser);
		$list['images'] = $this->Produit->allimage($iduser);
		$list['reservation'] = $reservation;
		$list['idechange'] = $idobjet;
		$list['idpropriety'] = $idpropriety;
		$list['info'] = $this->Users->infouser($iduser);
		$this->load->view('Profil',$list);
	}
	public function ajout($name='')
	{
		
		$iduser = $this->session->user['iduser'];;

		$this->load->model('Users');
        $this->load->model('Produit');

		$list = array();
		$list['prod'] = $name;
		$list['info'] = $this->Users->infouser($iduser);

		$obj1['objects'] = $this->Produit->getobject($iduser);
		$obj2['images'] = $this->Produit->imageperobject($iduser);

		$tab = array();
		$tab['images'] = $obj2;
		$tab['objects'] = $obj1;
		
		$list['ob'] = $tab;

		$this->load->view('Profil',$list);
	}
	
	public function thejson(){
		header("Content-Type: application/json");
		
        $this->load->model('Produit');
		$iduser = $this->session->user['iduser'];
		$name = $this->input->post("nomobj");
		$desciption = $this->input->post("description");
		$idcategory = $this->input->post("categorie");
		$prixestime = $this->input->post("prixestime");

		$idobj=$this->input->post("idob");
		$this->Produit->modifobjectpers($iduser,$idcategory,$name,$desciption,$prixestime,$idobj);

		

      	$tab =  $this->Produit->getobject($idobj);

		echo json_encode($tab);
	}
}
