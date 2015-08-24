<?php

class Work_model extends MY_Model{
    
    const DB_TABLE = 'work';
    const DB_TABLE_PK = 'id';

    public $id;
    public $title;
    public $author;
    public $date;
    public $type;
    public $mentor;
    public $summary;
    public $keywords;
    public $discipline;
    public $path;
    public $course;
    public $user;
  
  /**
   * catch all work where type is 3 = zavrsni
   */  
    public function getAllZavrsni(){
        $query = "SELECT COUNT(*) as ukupno FROM work WHERE type = 3";
        $result = $this->db->query($query);
        return $result->result();
        
    }
    
    
  /**
   * catch all work where type is 1 = diplomski
   */  
    public function getAllDiplomski(){
        $query = "SELECT COUNT(*) as ukupno FROM work WHERE type = 1";
        $result = $this->db->query($query);
        return $result->result();
        
    }
    
    
   /**
   * catch all work where type is 2 = doktorski
   */  
    public function getAllDoktorski(){
        $query = "SELECT COUNT(*) as ukupno FROM work WHERE type = 2";
        $result = $this->db->query($query);
        return $result->result();
        
    }
    
    
  /**
   * catch all work where type is not in 1,2 or 3
   */  
    public function getAllOstali(){
        $query = "SELECT COUNT(*) as ukupno FROM work WHERE type NOT IN (1,2,3)";
        $result = $this->db->query($query);
        return $result->result();
        
    }

 /**
  * get all work where id is the clicked id
  */
 public function getAllWork($id){
     $query = "SELECT * FROM work WHERE id = ".$id."";
     $result = $this->db->query($query);
     return $result->result();
 }
 
 
 /**
  * select work by type
  */
  public function getWorkByType($id){
      $query = "SELECT work.*, type_of_work.title AS typename, disciplines.title AS discname, courses.title AS course FROM work JOIN type_of_work ON work.type = type_of_work.id
                                  JOIN disciplines ON work.discipline = disciplines.id 
                                  JOIN courses ON work.course = courses.id where work.type ".$id."";
      $result = $this->db->query($query);
      return $result->result();
      
  }
  
  /**
   * get last added work
   */
  public function getLastAdded(){
      $query = "SELECT * FROM work ORDER BY timestamp DESC LIMIT 1";
      $result = $this->db->query($query);
      return $result->result();
  }
    
}