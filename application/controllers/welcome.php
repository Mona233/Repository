<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
         $this->load->model('Radovi_model');   
         $zavrsni = $this->Radovi_model->getAllZavrsni();
         $data['zavrsni'] = $zavrsni;
         $diplomski = $this->Radovi_model->getAllDiplomski();
         $data['diplomski'] = $diplomski;
         $doktorski = $this->Radovi_model->getAllDoktorski();
         $data['doktorski'] = $doktorski;
         $ostali = $this->Radovi_model->getAllOstali();
         $data['ostali'] = $ostali;
            
	 $view = $this->load->view('home', $data, true);
         $data['body'] = $view;
         $this->load->view('main', $data);
	}
}
