<?php

class Search_model extends MY_Model{
    
  
  /**
   * search query
   */  
 public function query($title,$author,$mentor,$keywords,$summary,$disc,$course){
     
     $data = array();
//     if ($date != '') {$data['date'] = $date;}
     if ($title != '') {$data['title'] = $title;}
     if ($author != '') {$data['author'] = $author;}
     if ($mentor != '') {$data['mentor'] = $mentor;}
     if ($keywords != '') {$data['keywords'] = $keywords;}
     if ($course != '') {$data['course'] = $course;}
     if ($summary != '') {$data['summary'] = $summary;}
     if ($disc != '') {$data['discipline'] = $disc;}

 
 //var_dump($data);  
//   if ($workType != '') {$data['type'] = $workType;}
  
    if (!empty($data)){
        
    $query = "SELECT * FROM work WHERE title LIKE '%".$title."%' AND author LIKE '%".$author."%' AND mentor LIKE '%".$mentor."%'"
            . "AND keywords LIKE '%".$keywords."%' AND summary LIKE '%".$summary."%' AND course LIKE '".$course."%' AND discipline LIKE '".$disc."%'";
    
    //echo $query;
    $result = $this->db->query($query);
    return $result->result();

 }
 }
  
  /**
   * form query result make datatable
   */
  public function dataLoad($title,$author,$mentor,$keywords,$summary,$disc,$course){
    $get = $this->query($title,$author,$mentor,$keywords,$summary,$disc,$course);
          $html = '<table class="table table-striped table-bordered table-hover dataTables-example1">
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
                              
                                   
                                    for($i=0;$i<count($get);$i++) {
                                       $html .= ' <tr>
                                            <td>'.$get[$i]->title.'</td>
                                            <td>'.$get[$i]->author.'</td>
                                            <td>'.$get[$i]->date.'</td>
                                            <td>'.$get[$i]->type.'</td>
                                            <td>'.$get[$i]->mentor.'</td>
                                            <td>'.$get[$i]->summary.'</td>
                                            <td>'.$get[$i]->keywords.'</td>
                                            <td>'.$get[$i]->discipline.'</td>
                                            <td>'.$get[$i]->course.'</td>
                                            <td>
                                                <form method="POST" action="'.base_url().'index.php/welcome/searchdownload">
                                            <button type="submit" class="btn btn-success" name="searchsubmit" value="'.$get[$i]->id.'">Preuzmi</button>
                                                </form>
                                            </td>
                                            
                                        </tr>';
                                        
                                        
                                    }
                                
                               
                           $html .= ' </tbody>
                        </table>';
     
     echo $html;
  }
    
}