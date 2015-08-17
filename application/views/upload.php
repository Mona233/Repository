<section id="home" class="head-main-img">
         
               <div class="container">
           <div class="row text-center pad-row" >
            <div class="col-md-12">
              <h1>  Dodajte rad u bazu </h1>
                </div>
               </div>
            </div>   
           
       </section>


<section >
             <div class="container">
             <div class="row text-center pad-row">
            
                 <div class="ibox-content">
                     
                     
                <form action="<?php echo base_url();?>index.php/welcome/upload" method="POST" enctype="multipart/form-data" >
                     <p style="color:red"><?php if(!empty($error)) {var_dump($error);} ?></p>
                      <div class="form-group"><label class="col-lg-2 control-label" style="color: red" >*Sva polja su obavezna</label>
                         <div class="col-lg-10" >
                          </div><br><br>
                     </div>
                     
                     <div class="form-group"><label class="col-lg-2 control-label">Naslov</label>
                         <div class="col-lg-10" ><input type="text" class="form-control" name="title" id="title" required=""> 
                          </div><br><br>
                     </div>
                     <div class="form-group"><label class="col-lg-2 control-label">Autor</label>
                         <div class="col-lg-10" ><input type="text" required="" placeholder="Unesite ime i prezime, titula nije potrebna" class="form-control" name="author" id="author"> 
                          </div><br><br>
                     </div>
                     <div class="form-group"><label class="col-lg-2 control-label">Datum</label>
                         <div class="col-lg-10" > <input type="date" required="" class="form-control" name="date" value="" placeholder = "npr. 2015-01-01" id="date"> 
                          </div><br><br>
                     </div>
                     <div class="form-group"><label class="col-lg-2 control-label">Mentor</label>
                         <div class="col-lg-10" ><input type="text" required="" placeholder="Unesite ime i prezime, titula nije potrebna" class="form-control" name="mentor" id="mentor"> 
                          </div><br><br>
                     </div>
                     <div class="form-group"><label class="col-lg-2 control-label">Sažetak</label>
                         <div class="col-lg-10" ><input type="textfield" class="form-control" required="" name="summary" id="summary"> 
                          </div><br><br>
                     </div>
                     <div class="form-group"><label class="col-lg-2 control-label">Ključne riječi</label>
                         <div class="col-lg-10" ><input type="text" required="" class="form-control" placeholder="Ključne riječi odvojite zarezom, primjerice: rad,titula,sažetak" name="keywords" id="keywords"> 
                          </div><br><br>
                     </div>
                     <div class="form-group"><label class="col-lg-2 control-label">Disciplina</label>
                                    <div class="col-lg-10">
                                        <select required="" class="form-control" id="discipline" style="width: 100%;" name="discipline">
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
                                            <option value="">Odaberite već postojeći kolegij ili u iduće polje dodajte novi</option>
                                             <?php for($i=0; $i<count($course); $i++) {?>
                                             <option onclick="CourseID(<?= html_escape($course[$i]->id); ?>)" value="<?= html_escape($course[$i]->id); ?>" name="course" id="course"><?= html_escape($course[$i]->title); ?></option>
                                             <?php } ?>
                                        </select>
                                    </div><br><br>
                    </div>
                     
                     <div class="form-group"><label class="col-lg-2 control-label">Naziv novog kolegija</label>
                         <div class="col-lg-10" ><input type="text" class="form-control" name="newCourse" id="newCourse"> 
                          </div><br><br>
                     </div>
                     
                     <div class="form-group"><label class="col-lg-2 control-label">Tip rada</label>
                                    <div class="col-lg-10">
                                        <select required="" class="form-control" id="type" style="width: 100%;" name="type">
                                            <option value="">Odaberite tip rada</option>
                                             <?php for($i=0; $i<count($type); $i++) {?>
                                             <option onclick="TypeID(<?= html_escape($type[$i]->id); ?>)" value="<?= html_escape($type[$i]->id); ?>" name="type" id="type"><?= html_escape($type[$i]->title); ?></option>
                                             <?php } ?>
                                        </select>
                                    </div><br><br>
                    </div>
                 
                   <div class="form-group"><label class="col-lg-2 control-label">Odaberite datoteku</label>
                       <div class="col-lg-10" ><input required="" value="" type='file' size='20' name="upload" id="upload"> 
                          </div><br><br>
                     </div>
                     
                      <button type="submit" class="btn btn-info" id="submit" name="submit" value='upload' >Dodaj rad</button>
                     
                </form>
                 </div>
             
            </div>
                
                 </div>
         </section>

