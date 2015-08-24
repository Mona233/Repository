<?php

class Search_model extends MY_Model{
    
  
  /**
   * search query
   */  
 public function query($title,$author,$mentor,$keywords,$summary,$disc,$course,$date){
     
     $data = array();
     
     if ($title != '') {$data['title'] = $title;}
     if ($author != '') {$data['author'] = $author;}
     if ($mentor != '') {$data['mentor'] = $mentor;}
     if ($keywords != '') {$data['keywords'] = $keywords;}
     if ($course != '') {$data['course'] = $course;}
     if ($summary != '') {$data['summary'] = $summary;}
     if ($disc != '') {$data['discipline'] = $disc;}
     if ($date != '') {$data['date'] = $date;}

 
    //var_dump($data);
  
    if (!empty($data)){
        
    $query = "SELECT work.*, type_of_work.title AS typename, disciplines.title AS discname, courses.title AS course FROM work 
                                  JOIN type_of_work ON work.type = type_of_work.id
                                  JOIN disciplines ON work.discipline = disciplines.id 
                                  JOIN courses ON work.course = courses.id WHERE work.title LIKE '%".$title."%' AND "
            . "work.author LIKE '%".$author."%' AND work.mentor LIKE '%".$mentor."%'"
            . "AND work.keywords LIKE '%".$keywords."%' AND work.summary LIKE '%".$summary."%' AND work.course LIKE '".$course."%' "
            . "AND work.discipline LIKE '".$disc."%' AND work.date LIKE '".$date."%'";
    
    //echo $query;
    $result = $this->db->query($query);
    return $result->result();

 }
 }
  
  /**
   * form query result make datatable
   */
  public function dataLoad($title,$author,$mentor,$keywords,$summary,$disc,$course,$date){
    $get = $this->query($title,$author,$mentor,$keywords,$summary,$disc,$course,$date);
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
                                            <td>'.$get[$i]->typename.'</td>
                                            <td>'.$get[$i]->mentor.'</td>
                                            <td>'.substr($get[$i]->summary, 0, 200). '...
                                                    <div class="text-center">
                                                    <a href="#" data-toggle="modal" data-target="#summary'.$get[$i]->id.'">
                                                       Više
                                                    </a>
                                                </div>
                                                <div class="modal inmodal fade" id="summary'.$get[$i]->id.'" tabindex="-1" role="dialog"  aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                <h4 class="modal-title">Sažetak</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>'.$get[$i]->summary.'</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Zatvori</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </td>
                                            <td>'.$get[$i]->keywords.'</td>
                                            <td>'.$get[$i]->discname.'</td>
                                            <td>'.$get[$i]->course.'</td>
                                            <td>
                                                <form method="POST" action="'.base_url().'index.php/welcome/download">
                                            <button type="submit" class="btn btn-primary" name="searchsubmit" value="'.$get[$i]->id.'">Preuzmi</button>
                                                </form>
                                            </td>
                                            
                                        </tr>';
                                        
                                        
                                    }
                                
                               
                           $html .= ' </tbody>
                        </table>';
     
     echo $html;
  }
    
}