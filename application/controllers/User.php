<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

public function index(){
    
  $this->load->helper('url');
  if($this->input->post('upload') != NULL ){
     $data = array();
     if(!empty($_FILES['file']['name'])){

    $config['upload_path'] = site_url("uploads/"); 
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['max_size'] = '4096';
    $config['file_name'] = $_FILES['file']['name'];

    $this->load->library('upload',$config);

    if($this->upload->do_upload('file')){
           $uploadData = $this->upload->data();
           $filename = $uploadData['file_name'];

        $data['response'] = 'successfully uploaded '.$filename; 
    }else{
            $data['response'] = 'failed';
    }
    $this->load->view('AjoutObjet',$data);
     }
   }else{
      $this->load->view(base_url());
    }

}

}
