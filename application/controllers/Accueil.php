<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."controllers/Mysession.php");
class Accueil extends Mysession{


    

    public function __construct(){
        parent::__construct();  
        $this->load->helper('url');
        $this->load->model('Category');
        $this->load->model('Produit');
    }

    /**
     * Summary of index
     * @return void
     */
    public function index(){
        $datauser = $this->session->user;
        $iduser = $datauser['iduser'];
        $data = array();
        $data['category'] = $this->Category->allcategories();
        $data['objects'] = $this->Produit->allobject($iduser);
        $data['images'] = $this->Produit->allimage();
        $this->load->view('Accueil',$data);
    }
    public function search(){
        $this->load->model('Search');
        $data = array();
        $mot = $this->input->post('search');
        $category = $this->input->post('categorie');
        $data['category'] = $this->Category->allcategories();
        $data['search'] = $this->Search->find($mot,$category);
        $data['images'] = $this->Produit->allimage();

        $this->load->view('Accueil',$data);
    }

    public function calcul($calcul,$idobject,$dispo="profil"){
        $this->load->model('Users');
        $this->load->model('Reservation');
        $result = null;
        $datauser = $this->session->user;
        $iduser = $datauser['iduser'];
        $data = array();
        $result = $this->Produit->checkprourcentage($calcul, $idobject);
        $data['objectsdemande'] = $this->Produit->checkprourcentage($calcul, $idobject);
        $data['imagesdemande'] =  $this->Produit->allimage();       
        $data['category'] = $this->Category->allcategories();
        $data['images'] = $this->Produit->imageperobject($idobject);
        $data['object'] = $this->Produit->getobject($idobject);
        $object = $this->Produit->getobject($idobject);
        $data['info'] = $this->Users->infouser($iduser);
        $reservations = $this->Reservation->reservationobject($object['idobject']);    
         if($dispo == "profil"){
            $data['acceptation'] = "Modifier";
            $data['ref'] = 1;
           
        }else{
            $data['acceptation'] = "Annuler";   
        }

        foreach ($reservations as $reservation) {
            if($reservation['iduser']==$iduser && $reservation['idtakalo'] ==  $object['idobject'] ){
                $data['acceptation'] = "Annuler";
            break;
            }
        }
        $this->load->view('Detail',$data);
    }


  
    

    public function accepte($idobject, $idobjet2,$newprpriety){
        $this->load->model('Historique');     
        $datauser = $this->session->user;
        $iduser = $datauser['iduser'];

        $this->Produit->updatedispo($idobject,$newprpriety);
        $this->Historique->insethistorique($idobject, $newprpriety);

        $this->Produit->updatedispo($idobjet2,$iduser);
        $this->Historique->insethistorique($idobjet2,$iduser);
        redirect("Accueil/index");
    }

    public function annulerdemande($idobject,$idtakalo){
        $this->load->model('Reservation');
        $this->Reservation->canceldemandereserv($idobject,$idtakalo);
        redirect("Accueil/index");
    }

    

    public function supprimer($idobject){
        $datauser = $this->session->user;
        $iduser = $datauser['iduser'];
        $this->Produit->deleteobject($iduser, $idobject);
        redirect("Profil/index");

    }

    public function Reserver($idpropriety,$idobject){
        redirect("Profil/index/reserver/".$idobject."/".$idpropriety);
    }
    public function echange($idechange,$idobject,$idpropriety){
        $this->load->model('Reservation');
        
        $datauser = $this->session->user;
        $iduser = $datauser['iduser'];
        
        $this->Reservation->insertreservation($idpropriety, $iduser, $idobject,$idechange);
        $this->detail($idobject, "Annuler");
    }



    public function Annuler($idobject,$val,$val2=""){
        $this->load->model('Reservation');
        $datauser = $this->session->user;
        $iduser = $datauser['iduser'];
        $this->Reservation->reservationcancellation($iduser, $idobject);
        redirect("Accueil/index");
    }

    /**
     * Summary of detail
     * Function detail 
     * @param mixed $idobject
     * @return void
     */
    public function detail($idobject="",$dispo="" ){
        $this->load->model('Users');
        $this->load->model('Reservation');

        $datauser = $this->session->user;
        $iduser = $datauser['iduser'];

        $data = array();
        $data['category'] = $this->Category->allcategories();
        $data['images'] = $this->Produit->imageperobject($idobject);
        $data['object'] = $this->Produit->getobject($idobject);
        $object = $this->Produit->getobject($idobject);
        $data['info'] = $this->Users->infouser($object['iduser']);
        $reservations = $this->Reservation->reservationobject($object['idobject']);

        if($dispo==""){
            $data['acceptation'] = "Reserver";
        }else if($dispo == "profil"){
            $data['acceptation'] = "Modifier";
            $data['objectsdemande'] = $this->Reservation->listeobjectdemandeechange($idobject);
            $data['imagesdemande'] =  $this->Produit->allimage();
        }else{
            $data['acceptation'] = "Annuler";   
        }

        foreach ($reservations as $reservation) {
            if($reservation['iduser']==$iduser && $reservation['idtakalo'] ==  $object['idobject'] ){
                $data['acceptation'] = "Annuler";
                break;
            }
        }
        

        
        $this->load->view('Detail',$data);
    }
}
