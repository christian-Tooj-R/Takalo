<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    /**
     * Summary of __construct
     */
    public function __construct(){
        parent::__construct(); 
        $this->load->model('Users'); 
        $this->load->helper('url');
    }
    /**
     * Summary of index
     * @return void
     */
    public function index(){
        $this->load->view('Login');
    }

    public function inscription(){
        $this->load->view('Inscription');
    }

    /**
     * Summary of insert_inscription
     * @return void
     */
    public function insert_inscription(){
            $name = $this->input->post('name');
            $firstname=$this->input->post('firstname');
            $sexe=$this->input->post('sexe');
            $email = $this->input->post('email');
            $contact = $this->input->post('contact');
            $password = $this->input->post('password');
            $password2 = $this->input->post('password2'); 
            $checkadmin = 0;
            if($name!="" && $firstname!="" && $email !="" && $contact!=""  && $password!="" && $password2!=""){
                if(strcmp($password2,$password )  !=0 ){
                    $error['error'] = "Les deux mots de passe doit etre identique";
                    $this->load->view('Inscription',$error);
                }else{
                    $this->Users->insert($name, $firstname,$sexe, $email, $password, $contact, $checkadmin);
                    $this->checklogin($email, $password);
                }
            }else{
                $error['error'] = "Veuillez remplir tout les champs";
                $this->load->view('Inscription',$error);
            }       
    }

    /**
     * Summary of checklogin
     * @param mixed $email
     * @param mixed $password
     * @return void
     */
    public function checklogin($email="",$password=""){
      
        if($this->input->post('email')!=null && $this->input->post('password')!= null){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $checkadmin = $this->input->post('admin');    
        }
       
        $result =$this->Users->check_login($email, $password);
        if($result != null){
            $iduser = $result['iduser'];
            if($checkadmin != null){
                if($result['admin'] == 1){
                    $users = array(
                        'iduser' => $iduser,
                        'admin' => 1
                    );
                    $this->session->set_userdata('user',$users);
                    redirect(site_url('Accueil/index'));
                }else{
                    $error['error'] = "Vous n'etes pas un administrateur";
                    $this->load->view('Login',$error); 
                }
              
            }else{
                $users = array(
                    'iduser' => $iduser,
                    'admin' => 0
                );
                $this->session->set_userdata('user',$users);
                redirect(site_url('Accueil/index'));
          
            }
           
        }else{
            $error['error'] = "Il y a une erreur";
            $this->load->view('Login',$error);   
        }
    }

    public function deconnexion(){
        $this->session->unset_userdata('user');
        redirect(base_url());
    }

    
}
 