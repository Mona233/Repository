<?php

class Course_model extends MY_Model{
    
    const DB_TABLE = 'courses';
    const DB_TABLE_PK = 'id';

    public $id;
    public $title;
  
  /**
   * catch all courses
   */  
    public function getAllCourses(){
        $query = "SELECT * FROM courses";
        $result = $this->db->query($query);
        return $result->result();
        
    }
    
}