<?php

class Radovi_model extends MY_Model{
    
    const DB_TABLE = 'radovi';
    const DB_TABLE_PK = 'id';

    public $id;
    public $naziv;
    public $autor;
    public $datum;
    public $vrsta;
  
  /**
   * dohvati sve radove koji su vrsta 3 = zavrsni
   */  
    public function getAllZavrsni(){
        $query = "SELECT COUNT(*) as ukupno FROM radovi WHERE vrsta = 3";
        $result = $this->db->query($query);
        return $result->result();
        
    }
    
    
  /**
   * dohvati sve radove koji su vrsta 1 = diplomski
   */  
    public function getAllDiplomski(){
        $query = "SELECT COUNT(*) as ukupno FROM radovi WHERE vrsta = 1";
        $result = $this->db->query($query);
        return $result->result();
        
    }
    
    
   /**
   * dohvati sve radove koji su vrsta 2 = doktorski
   */  
    public function getAllDoktorski(){
        $query = "SELECT COUNT(*) as ukupno FROM radovi WHERE vrsta = 2";
        $result = $this->db->query($query);
        return $result->result();
        
    }
    
    
  /**
   * dohvati sve radove koji su vrsta 4, 5 i 6
   */  
    public function getAllOstali(){
        $query = "SELECT COUNT(*) as ukupno FROM radovi WHERE vrsta NOT IN (4,5,6)";
        $result = $this->db->query($query);
        return $result->result();
        
    }
    
}