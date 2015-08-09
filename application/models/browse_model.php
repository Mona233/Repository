<?php

class Browse_model extends MY_Model{
    
  
  /**
   * browse by discipline query
   */  
 public function query2($disc){
     $query = "SELECT work.*, type_of_work.title AS typename, disciplines.title AS discname, courses.title AS course FROM work JOIN type_of_work ON work.type = type_of_work.id
                                  JOIN disciplines ON work.discipline = disciplines.id 
                                  JOIN courses ON work.course = courses.id
                                  WHERE work.discipline = ".$disc."";

     //var_dump($query);
     
     $discipline = $this->db->query($query);
     return $discipline->result();
  }
  
  public function dataLoad2($disc){
    $discipline = $this->query2($disc);
    
    
          $html = '<table class="table table-striped table-bordered table-hover dataTables-example2">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Naslov</th>
                                    <th style="text-align: center;">Autor</th>
                                    <th style="text-align: center;">Datum</th>
                                    <th style="text-align: center;">Vrsta</th>
                                    <th style="text-align: center;">Mentor</th>
                                    <th style="text-align: center;">Sažetak</th>
                                    <th style="text-align: center;">Ključne riječi</th>
                                    <th style="text-align: center;">Disciplina</th>
                                    <th style="text-align: center;">Kolegij</th>
                                    <th style="text-align: center;">Preuzimanje</th>
                                </tr>
                            </thead>
                            <tbody>';
                              
                                   
                                    for($i=0;$i<count($discipline);$i++) {
                                       $html .= ' <tr>
                                           
                                            <td style="text-align: center">'.$discipline[$i]->title.'</td>
                                            <td>'.$discipline[$i]->author.'</td>
                                            <td>'.$discipline[$i]->date.'</td>
                                            <td>'.$discipline[$i]->typename.'</td>
                                            <td>'.$discipline[$i]->mentor.'</td>
                                            <td style="text-align: center;">'.$discipline[$i]->summary.'</td>
                                            <td>'.$discipline[$i]->keywords.'</td>
                                            <td>'.$discipline[$i]->discname.'</td>
                                            <td>'.$discipline[$i]->course.'</td>
                                            <td>
                                                <form method="POST" action="'.base_url().'index.php/welcome/disciplinedownload">
                                            <button type="submit" class="btn btn-success" name="disciplinesubmit" value="'.$discipline[$i]->id.'">Preuzmi</button>
                                                </form>
                                            </td>
                                        </tr>';
                                        
                                        
                                    }
                                
                               
                           $html .= ' </tbody>
                        </table>';
     
     echo $html;
  }
  
  /**
   * browse by course query
   */  
 public function query3($course){
     $query = "SELECT work.*, type_of_work.title AS typename, disciplines.title AS discname, courses.title AS course FROM work JOIN type_of_work ON work.type = type_of_work.id
                                  JOIN disciplines ON work.discipline = disciplines.id 
                                  JOIN courses ON work.course = courses.id
                                  WHERE work.course = ".$course."";

     //var_dump($query);
     
     $courses = $this->db->query($query);
     return $courses->result();
  }
  
  
  public function dataLoad3($course){
     $courses = $this->query3($course);
    
    
          $html = '<table class="table table-striped table-bordered table-hover dataTables-example3">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Naslov</th>
                                    <th style="text-align: center;">Autor</th>
                                    <th style="text-align: center;">Datum</th>
                                    <th style="text-align: center;">Vrsta</th>
                                    <th style="text-align: center;">Mentor</th>
                                    <th style="text-align: center;">Sažetak</th>
                                    <th style="text-align: center;">Ključne riječi</th>
                                    <th style="text-align: center;">Disciplina</th>
                                    <th style="text-align: center;">Kolegij</th>
                                    <th style="text-align: center;">Preuzimanje</th>
                                </tr>
                            </thead>
                            <tbody>';
                              
                                   
                                    for($i=0;$i<count($courses);$i++) {
                                       $html .= ' <tr>
                                           
                                            <td>'.$courses[$i]->title.'</td>
                                            <td>'.$courses[$i]->author.'</td>
                                            <td>'.$courses[$i]->date.'</td>
                                            <td>'.$courses[$i]->typename.'</td>
                                            <td>'.$courses[$i]->mentor.'</td>
                                            <td>'.$courses[$i]->summary.'</td>
                                            <td>'.$courses[$i]->keywords.'</td>
                                            <td>'.$courses[$i]->discname.'</td>
                                            <td>'.$courses[$i]->course.'</td>
                                            <td>
                                                <form method="POST" action="'.base_url().'index.php/welcome/coursedownload">
                                            <button type="submit" class="btn btn-success" name="coursesubmit" value="'.$courses[$i]->id.'">Preuzmi</button>
                                                </form>
                                            </td>
                                        </tr>';
                                        
                                        
                                    }
                                
                               
                           $html .= ' </tbody>
                        </table>';
     
     echo $html;
  }
    
}