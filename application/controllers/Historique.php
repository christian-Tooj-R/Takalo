<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."controllers/Mysession.php");
class Historique extends Mysession{
    public function index(){
        $this->load->helper('url');
        $this->load->model('Reservation');

        $data['donnes'] = $this->Reservation->getlistempersoneechange1();
        $this->load->view('Historychange', $data);
    }
}