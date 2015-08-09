<?php if ( ! defined('BASEPATH')) {exit('No direct script access allowed');}

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function index(){
   
         $this->load->model('Work_model'); 
        
         $zavrsni = $this->Work_model->getAllZavrsni();
         $data['zavrsni'] = $zavrsni;
         $diplomski = $this->Work_model->getAllDiplomski();
         $data['diplomski'] = $diplomski;
         $doktorski = $this->Work_model->getAllDoktorski();
         $data['doktorski'] = $doktorski;
         $ostali = $this->Work_model->getAllOstali();
         $data['ostali'] = $ostali;
       
	 $view = $this->load->view('home', $data, true);
         $data['body'] = $view;
         $this->load->view('main', $data);
	}
        
        
  //calling the 'about' view
 public function about(){
     
     $view = $this->load->view('about', '', true);
     $data['body'] = $view;
     $this->load->view('main', $data);
     
 }
 
 
 //calling the 'search' view
  public function searchview(){
      //get all work types
     $this->load->model('TypeOfWork_model');
     $type = new TypeOfWork_model();
     $types = $type->getAllTypes();
     $data['type'] = $types;
      
      //get all disciplines
     $this->load->model('Disciplines_model');
     $discipline = new Disciplines_model();
     $disciplines = $discipline->getAllDisciplines();
     $data['discipline'] = $disciplines;
     
     //get all courses
     $this->load->model('Course_model');
     $course = new Course_model();
     $courses = $course->getAllCourses();
     $data['course'] = $courses;
     
     
     $view = $this->load->view('search', $data, true);
     $data['body'] = $view;
     $this->load->view('main', $data);
     
 }
 
 /**
  * pick up user input sent by ajax and send it to search function
  */
 public function pickupData(){
    
//    $convert = $this->input->post('date');
//    $converted = new DateTime($convert);
    
    
    $title = $this->input->post('title');
    $author = $this->input->post('author');
    //$date = $converted->format('Y-m-d');
    $mentor = $this->input->post('mentor');
    $keywords = $this->input->post('keywords');
    $summary = $this->input->post('summary');
    $disc = $this->input->post('discipline');
    $course = $this->input->post('course');
    
    $this->load->model('Search_model');
    $this->Search_model->query($title,$author,$mentor,$keywords,$summary,$disc,$course);
    $this->Search_model->dataLoad($title,$author,$mentor,$keywords,$summary,$disc,$course);
 }
 

 /**
  * load browse view
  */
 public function browseview(){
     //get all disciplines
     $this->load->model('Disciplines_model');
     $discipline = new Disciplines_model();
     $disciplines = $discipline->getAllDisciplines();
     $data['discipline'] = $disciplines;
     
     //get all courses
     $this->load->model('Course_model');
     $course = new Course_model();
     $courses = $course->getAllCourses();
     $data['course'] = $courses;
     
     $view = $this->load->view('browse', $data, true);
     $data['body'] = $view;
     $this->load->view('main', $data);
 }
 
 /**
  * catch discipline id and send it to model functions
  */
 public function browse(){
     $disc = $this->input->post('id');
     //echo $disc;
     $this->load->model('Browse_model');
     $this->Browse_model->query2($disc);
     $this->Browse_model->dataLoad2($disc);
     
 }
 
 /**
  * catch course id and send it to model functions
  */
 public function browse2(){
     $course = $this->input->post('id');
     //echo $disc;
     $this->load->model('Browse_model');
     $this->Browse_model->query3($course);
     $this->Browse_model->dataLoad3($course);
     
 }
 
 
/**
 * when 'Preuzmi' on discipline browsing is clicked, download the file
 */
 public function disciplinedownload() {
     //catch work id when button is clicked
     $id = $this->input->post('disciplinesubmit');
    
     //based on that id, select all data about that particular work
     $this->load->model('Work_model'); 
     $work = $this->Work_model->getAllWork($id);
     
     //from aray of object get arry of strings
     $var1 = array_map(function ($object) { return $object->path; }, $work);
  
     //define parameters for force download
     $file_path_url = 'http://repository.zz.mu/assets/radovi/' .$var1[0];
     $file_name = $var1[0];
     
//     echo $file_path_url;
     
     $data = file_get_contents($file_path_url); // Read the file's contents
     force_download($file_name, $data);
     
    }
    
    
    
 /**
 * when 'Preuzmi' on course browsing is clicked, download the file
 */
 public function coursedownload() {
     //catch work id when button is clicked
     $id = $this->input->post('coursesubmit');
    
     //based on that id, select all data about that particular work
     $this->load->model('Work_model'); 
     $work = $this->Work_model->getAllWork($id);
     
     //from aray of object get arry of strings
     $var1 = array_map(function ($object) { return $object->path; }, $work);
  
     //define parameters for force download
     $file_path_url = 'http://repository.zz.mu/assets/radovi/' .$var1[0];
     $file_name = $var1[0];
     
//     echo $file_path_url;
     $data = file_get_contents($file_path_url); // Read the file's contents
     force_download($file_name, $data);
     
    }
    
    
 /**
 * when 'Preuzmi' on searching is clicked, download the file
 */
 public function searchdownload() {
     //catch work id when button is clicked
     $id = $this->input->post('searchsubmit');
    
     //based on that id, select all data about that particular work
     $this->load->model('Work_model'); 
     $work = $this->Work_model->getAllWork($id);
     
     //from aray of object get arry of strings
     $var1 = array_map(function ($object) { return $object->path; }, $work);
  
     //define parameters for force download
     $file_path_url = 'http://repository.zz.mu/assets/radovi/' .$var1[0];
     $file_name = $var1[0];
     
//     echo $file_path_url;
     $data = file_get_contents($file_path_url); // Read the file's contents
     force_download($file_name, $data);
     
    }
    
 /**
 * when 'Preuzmi' on home browsing is clicked, download the file
 */
 public function typedownload() {
     //catch work id when button is clicked
     $id = $this->input->post('typesubmit');
    
     //based on that id, select all data about that particular work
     $this->load->model('Work_model'); 
     $work = $this->Work_model->getAllWork($id);
     
     //from aray of object get arry of strings
     $var1 = array_map(function ($object) { return $object->path; }, $work);
  
     //define parameters for force download
     $file_path_url = 'http://repository.zz.mu/assets/radovi/' .$var1[0];
     $file_name = $var1[0];
     
//     echo $file_path_url;
     $data = file_get_contents($file_path_url); // Read the file's contents
     force_download($file_name, $data);
     
    }
 
 /**
  * browsing by type of work - from homepage
  */
 public function browseFromHome(){
  $id = $this->input->post('type');
  $this->load->model('Work_model');
  $type = $this->Work_model->getWorkByType($id);
  //var_dump($type);
  $data['type'] = $type;
 
  $view = $this->load->view('browseFromHome', $data, true);
  $data['body'] = $view;
  $this->load->view('main', $data);
 }
 
/**
 * load the upload view
 */ 
 public function uploadview(){
  $this->load->view('upload',array('error' => ' ' ));
//  $data['body'] = $view;
//  $this->load->view('main', $data);
     
 }
 
/**
 * upload new work
 */
 public function upload(){
    $config = array(
    'upload_path' => "assets/radovi",
    'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|txt",
    'overwrite' => TRUE,
    'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
    'max_height' => "768",
    'max_width' => "1024"
    );
    $this->load->library('upload', $config);
    if($this->upload->do_upload()){
        $data = array('upload_data' => $this->upload->data());
        $this->load->view('upload_success',$data);
       }else{
    $error = array('error' => $this->upload->display_errors());
    $this->load->view('upload', $error);
         }
      }
}