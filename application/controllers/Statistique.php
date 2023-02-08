<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."controllers/Mysession.php");
class Statistique extends Mysession{
    
    public function __construct(){
        parent::__construct();  
        $this->load->helper('url');
        $this->load->model('Historique');
        $this->load->model('Users');
    }

    public function index(){

        $data = array();
      
        $data['nombureinscrit'] = $this->Users->countuser("0");
        $data['numbureechange'] = $this->Historique->coontechange();

        $this->load->view('Statistiques',$data);

    }
}