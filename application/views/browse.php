<section id="home" class="head-main-img">
         
               <div class="container">
           <div class="row text-center pad-row" >
            <div class="col-md-12">
              <h1>  Pregledajte radove prema kriterijima  </h1>
                </div>
               </div>
            </div>   
           
       </section>


<section >
             <div class="container">
             <div class="row text-center pad-row">
            
                 <div class="ibox-content">
                     <h4>U izbornicima odaberite kriterije prema kojima želite pregledati radove. Rezultati će biti prikazani u tablici
                     iz koje je moguće vidjeti podatke o svakom radu, ali i preuzeti rad na svoje računalo. Tablica omogućava i dodatno
                     pretraživanje preko polja 'Search' te 
                     sortiranje radova prema bilo kojem od stupaca klikom na zaglavlje stupca.</h4><br><br>
                     
                     <div class="form-group"><label class="col-lg-2 control-label">Disciplina</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="discipline" style="width: 100%;" name="discipline">
                                            <option value="">Odaberite disciplinu</option>
                                             <?php for($i=0; $i<count($discipline); $i++) {?>
                                             <option onclick="DisciplineID(<?= html_escape($discipline[$i]->id); ?>)" value="<?= html_escape($discipline[$i]->id); ?>" name="discipline" id="discipline_id"><?= html_escape($discipline[$i]->title); ?></option>
                                             <?php } ?>
                                        </select>
                                    </div><br><br>
                    </div>
                     
                 </div>
             
            </div>
                 
                 <div class="ibox-content myData2">
                   <!-- table inserted via Browse_model-->     
                    </div>
         
                 </div>
</section>

<!-- ending discipline browsing, starting course browsing --------->



             <div class="container">
             <div class="row text-center pad-row">
        
                     <div class="form-group"><label class="col-lg-2 control-label">Kolegij</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" id="course" style="width: 100%;" name="course">
                                            <option value="">Odaberite kolegij</option>
                                             <?php for($i=0; $i<count($course); $i++) {?>
                                             <option onclick="CourseID(<?= html_escape($course[$i]->id); ?>)" value="<?= html_escape($course[$i]->id); ?>" name="course" id="course_id"><?= html_escape($course[$i]->title); ?></option>
                                             <?php } ?>
                                        </select>
                                    </div><br><br>
                    </div>
                 
             
            </div>
                 
                 <div class="ibox-content myData3">
                   <!-- table inserted via Browse_model-->     
                    </div>
         
                 </div>

       


<script>
 //catching discipline id
    $(document).ready(function () {
         $('.dataTables-example').dataTable({
            "pageLength": 10,
            responsive: true,
            "dom": 'T<"clear">lfrtip'
        });
        
        $('#discipline').on('change', function(e){
            e.preventDefault();
            disciplineID = $('#discipline').val();
//            console.log(disciplineID);
            
             $.ajax({
                type: 'POST',
                url: base_url + 'welcome/browse',
                data: {
                    id: disciplineID
                },
                success: function (msg) {
//                console.log(msg);
                $('.myData2').html(msg);
                $(".dataTables-example2").dataTable({
                  "pageLength": 10,
                   responsive: false,
                  "dom": 'T<"clear">lfrtip'
        });
            }
            });
        });
        
        
        $('#course').on('change', function(e){
            e.preventDefault();
            courseID = $('#course').val();
            //console.log(courseID);
            
             $.ajax({
                type: 'POST',
                url: base_url + 'welcome/browse2',
                data: {
                    id: courseID
                },
                success: function (msg) {
//                console.log(msg);
                $('.myData3').html(msg);
                $(".dataTables-example3").dataTable({
                  "pageLength": 10,
                   responsive: false,
                  "dom": 'T<"clear">lfrtip'
        });
            }
            });
        });

      
    }); 
    
</script>