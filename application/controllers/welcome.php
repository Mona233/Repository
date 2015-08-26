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
         
         $last = $this->Work_model->getLastAdded();
         $data['last'] = $last;
       
         //put home view inside the main view
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
    
    $date = $this->input->post('date');;
    $title = $this->input->post('title');
    $author = $this->input->post('author');
    $mentor = $this->input->post('mentor');
    $keywords = $this->input->post('keywords');
    $summary = $this->input->post('summary');
    $disc = $this->input->post('discipline');
    $course = $this->input->post('course');
    
    //send data to model's two functions
    $this->load->model('Search_model');
    $this->Search_model->query($title,$author,$mentor,$keywords,$summary,$disc,$course,$date);
    $this->Search_model->dataLoad($title,$author,$mentor,$keywords,$summary,$disc,$course,$date);
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
     $file_path_url = 'http://repository.zz.mu/uploads/' .$var1[0];
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
     $file_path_url = 'http://repository.zz.mu/uploads/' .$var1[0];
     $file_name = $var1[0];
     
//     echo $file_path_url;
     $data = file_get_contents($file_path_url); // Read the file's contents
     force_download($file_name, $data);
     
 }
        
 /**
 * when 'Preuzmi' on homebrowsing/lastadded/search is clicked, download the file
 */
 public function download() {
     //catch work id when button is clicked
     if (!empty(($this->input->post('typesubmit')))){
        $id = $this->input->post('typesubmit');}
    elseif (!empty (($this->input->post('workid')))) {
        $id = $this->input->post('workid');}
    elseif (!empty (($this->input->post('searchsubmit')))) {
        $id = $this->input->post('searchsubmit');}
        
     //based on that id, select all data about that particular work
     $this->load->model('Work_model'); 
     $work = $this->Work_model->getAllWork($id);
     
     //from aray of object get arry of strings
     $var1 = array_map(function ($object) { return $object->path; }, $work);
  
     //define parameters for force download
     $file_path_url = 'http://repository.zz.mu/uploads/' .$var1[0];
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
     
  $view = $this->load->view('upload',$data,TRUE);
  $data['body'] = $view;
  $this->load->view('main', $data);
     
 }
 
/**
 * upload new work
 */
 public function upload(){
     
    //configuration for upload
    $config = array(
    'upload_path' => "./uploads/",
    'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx|txt|mp3|mp4|zip|rar",
    'overwrite' => TRUE,
    'max_size' => "5048000",
    'max_height' => "768",
    'max_width' => "1024"
    );
    
    //create folder for upload if it doesn't exist
    if (!file_exists($config['upload_path'])) {
          if (!mkdir($config['upload_path'], 0777, true)) {
          die('Failed to create folders...');
            }
        }
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if($this->upload->do_upload('upload')){
        //$data = array('upload_data' => $this->upload->data());
        $view = $this->load->view('upload_success',array("page" => base_url() . "index.php/welcome/uploadview"), TRUE);//$data);
        $data['body'] = $view;
        $this->load->view('main', $data);
        
        //if file is uploaded, insert users input information into database
        $this->load->model('Work_model');
        $work = new Work_model();
        $new = $this->input->post('newCourse');
        
        $work->title = $this->input->post('title');
        $work->author = $this->input->post('author');
        $work->date = $this->input->post('date');
        $work->mentor = $this->input->post('mentor');
        $work->keywords = $this->input->post('keywords');
        $work->summary = $this->input->post('summary');
        $work->discipline = $this->input->post('discipline');
        $work->type = $this->input->post('type');
        
        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];
        $file = str_replace('', '_', $file_name);
        $work->path = $file;
        
        //if new course is selected and created, choose last inserted id
           if(!empty($new)){
            $this->load->model('Course_model');
            $course = new Course_model();
            $course->title = $new;
            $course->save();
            $course2 = $this->db->insert_id();
            $work->course = $course2;
             }else{
            $work->course = $this->input->post('course');
            }
         $work->save();
          }else{
                $error = array('error' => $this->upload->display_errors());
//                var_dump($data);
                $data['error'] = $error;

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

                $view = $this->load->view('upload',$data,TRUE);
                $data['body'] = $view;
                $this->load->view('main', $data);
                
                }
      }

}