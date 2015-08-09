<section id="home" class="head-main-img">
         
               <div class="container">
           <div class="row text-center pad-row" >
            <div class="col-md-12">
              <h1>  Pretražite repozitorij prema kriterijima  </h1>
                </div>
               </div>
            </div>   
           
       </section>


<section >
             <div class="container">
             <div class="row text-center pad-row">
            
                 <div class="ibox-content">
<!--                     <form method="post" action="<?php echo base_url(); ?>index.php/welcome/pickupData">-->
                     <div class="form-group"><label class="col-lg-2 control-label">Naslov</label>
                          <div class="col-lg-10" ><input type="text" class="form-control" name="title" id="title"> 
                          </div><br><br>
                     </div>
                     <div class="form-group"><label class="col-lg-2 control-label">Autor</label>
                         <div class="col-lg-10" ><input type="text" placeholder="Molimo, unesite samo ime i/ili prezime, titula nije potrebna" class="form-control" name="author" id="author"> 
                          </div><br><br>
                     </div>
                     <div class="form-group"><label class="col-lg-2 control-label">Datum</label>
                          <div class="col-lg-2" > <input type="text" class="datepicker" name="date" value="" id="date"> 
                          </div><br><br>
                     </div>
<!--                     <div class="form-group"><label class="col-lg-2 control-label">Vrsta rada</label>
                         <div class="col-lg-8">
                         <?php //foreach ($type as $row){?>
                             <input class="checkbox-inline" onclick="addID(<? =html_escape($row->id); ?>);" type="checkbox" name="type" value="<? = html_escape($row->id);?>" id="type">
                             <? = $row->title;?>      
                         <?php //} ?>
                         </div>
                     </div><br><br>-->
                     <div class="form-group"><label class="col-lg-2 control-label">Mentor</label>
                         <div class="col-lg-10" ><input type="text" placeholder="Molimo, unesite samo ime i/ili prezime, titula nije potrebna" class="form-control" name="mentor" id="mentor"> 
                          </div><br><br>
                     </div>
                     <div class="form-group"><label class="col-lg-2 control-label">Sažetak</label>
                         <div class="col-lg-10" ><input type="textfield" class="form-control" name="summary" id="summary"> 
                          </div><br><br>
                     </div>
                     <div class="form-group"><label class="col-lg-2 control-label">Ključne riječi</label>
                         <div class="col-lg-10" ><input type="text" class="form-control" placeholder="Molimo, ključne riječi odvojite samo zarezom, primjerice: rad,titula,sažetak" name="keywords" id="keywords"> 
                          </div><br><br>
                     </div>
                     <div class="form-group"><label class="col-lg-2 control-label">Disciplina</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="discipline" style="width: 100%;" name="discipline">
                                            <option value="">Odaberite disciplinu</option>
                                             <?php for($i=0; $i<count($discipline); $i++) {?>
                                             <option onclick="DisciplineID(<?= html_escape($discipline[$i]->id); ?>)" value="<?= html_escape($discipline[$i]->id); ?>" name="discipline" id="discipline"><?= html_escape($discipline[$i]->title); ?></option>
                                             <?php } ?>
                                        </select>
                                    </div><br><br>
                    </div>
                     
                     <div class="form-group"><label class="col-lg-2 control-label">Kolegij</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="course" style="width: 100%;" name="course">
                                            <option value="">Odaberite kolegij</option>
                                             <?php for($i=0; $i<count($course); $i++) {?>
                                             <option onclick="CourseID(<?= html_escape($course[$i]->id); ?>)" value="<?= html_escape($course[$i]->id); ?>" name="course" id="course"><?= html_escape($course[$i]->title); ?></option>
                                             <?php } ?>
                                        </select>
                                    </div><br><br>
                    </div>
                     
                     <button type="submit" class="btn btn-success" id="search">Pretraži repozitorij</button>
                     <!--</form>-->
                     
                 </div>
             
            </div>
                 
                 <div class="ibox-content myData">
                   <!-- table inserted via Search_model-->     
                    </div>
         
                 </div>
         </section>
<script>
    $(document).ready(function () {
        $(".datepicker").datepicker( "setDate", "");
         $('.dataTables-example').dataTable({
            "pageLength": 10,
            responsive: true,
            "dom": 'T<"clear">lfrtip'
        });
        
       $('#discipline').on('change', function(e){
            e.preventDefault();
            discipline = $('#discipline').val();
            //console.log(discipline);
            });
            
      $('#course').on('change', function(e){
            e.preventDefault();
            course = $('#course').val();
            //console.log(course);
            });
        
        $('#search').on('click', function(e){
            e.preventDefault();
            
            title = $('#title').val();
            author = $('#author').val();
            date = $('#date').val();
            mentor = $('#mentor').val();
            summary= $('#summary').val();
            keywords = $('#keywords').val();
            course = $('#course').val();
            discipline = $('#discipline').val();
            
            //console.log(disciplineID);
            
             $.ajax({
                type: 'POST',
                url: base_url + 'welcome/pickupData',
                data: {
                    discipline: discipline,
                    title: title,
                    author: author,
                    date: date,
                    mentor: mentor,
                    summary: summary,
                    keywords: keywords,
                    course: course
                },
                success: function (msg) {
//                console.log(msg);
                $(".myData").html(msg);
                $(".dataTables-example1").dataTable({
                  "pageLength": 10,
                   responsive: false,
                  "dom": 'T<"clear">lfrtip'
        });
            }
            });
        });
        
    });
//        
//        
//        $('#type').on('click', function(e){
//            e.preventDefault();
//            typeID = $('#type').val();
//            console.log(typeID);
//            
//             $.ajax({
//                type: 'POST',
//                url: base_url + 'welcome/search',
//                data: {
//                    id: typeID
//                },
//                success: function (data) {
////                    console.log(data);
//                }
//            });
//        });
//    });
//    
// var ids = [];
// var i = [];
// 
// //when type is checked in, collect its id, write 'dodajem' in console, when unchecked, write 'brisem element'
//function addID(id) {
//    var flag = 0;
//    var index = ids.indexOf(id);
//    if (index !== -1) {
//        console.log('brisem element br.' + i + 'vrijednost: ' + ids[i]);
//        ids.splice(index, 1);
//        flag = 1;
//    }
//    if (!flag) {
//        console.log('dodajem ' + id);
//        ids [ids.length] = id;
//    }
//}
////send collected ids in 'ids' array to the php script in controller
//function sendArrayToScript() {
////    alert(JSON.stringify(mona));
//    $.ajax({
//        type: 'POST',
//        url: base_url + 'welcome/search',
//        datatype: 'json',
//        data: {
//            ids: JSON.stringify(ids)
//        },
//        success: function (data) {
//            console.log(data);
//            
//        window.location.reload();
//        }
//    });
//}
     
 

</script>