<?php

class Disciplines_model extends MY_Model{
    
    const DB_TABLE = 'disciplines';
    const DB_TABLE_PK = 'id';

    public $id;
    public $title;
  
  /**
   * catch all disciplines
   */  
    public function getAllDisciplines(){
        $query = "SELECT * FROM disciplines";
        $result = $this->db->query($query);
        return $result->result();
        
    }
    
}