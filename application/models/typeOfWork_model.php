<?php

class TypeOfWork_model extends MY_Model{
    
    const DB_TABLE = 'type_of_work';
    const DB_TABLE_PK = 'id';

    public $id;
    public $title;
  
  /**
   * catch all types of work
   */  
    public function getAllTypes(){
        $query = "SELECT * FROM type_of_work";
        $result = $this->db->query($query);
        return $result->result();
        
    }
    
}