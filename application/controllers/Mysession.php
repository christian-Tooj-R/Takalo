<?php ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mysession extends CI_Controller {
	public function __construct(){
        parent::__construct();
        if ($this->session->has_userdata('user') == false){
            redirect(site_url('login/index'));
        }     
    }
   
}
