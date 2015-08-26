<section id="home" class="text-center">
                         <div id="carousel-example" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                       <div class="item active">

                            <img src="<?=base_url();?>assets/img/ffzg1.jpg" alt="" style="width: 100%; height: auto;" />
                            <div class="carousel-caption" >
                                <h4 class="back-light">Dobrodošli na repozitorij radova Filozofskog fakulteta u Zagrebu</h4>
                            </div>
                        </div>

                        <div class="item">
                            <img src="<?=base_url();?>assets/img/ffzg.jpg" alt="" style="width: 100%; height: auto;" />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Dobrodošli na repozitorij radova Filozofskog fakulteta u Zagrebu</h4>
                            </div>
                        </div>
                    </div>

                  <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                    </ol>
                </div>
           
       </section>
  
    <!--/.SLIDESHOW END-->
            <div class="container">
           <div class="row text-center" >
            <div class="col-md-12">
             
                 <div class="row text-center pad-row  ">
                     <section id="pricing-one" style="position: inherit">
            <div class="container">
           <div class="row text-center pad-row" >
               
            <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                             <h4>ZAVRŠNIH RADOVA</h4> 
                            </div>
                            <div class="panel-body">

                               <ul class="plan"> 
                                   <?php for($i=0; $i<count($zavrsni); $i++) {?>
                                   <li class="price"><strong><?= html_escape($zavrsni[$i]->ukupno); ?></strong></li> 
                                   <?php } ?>  
                           </ul>
                            </div>
                            <div class="panel-footer">
                                <form method="post" action="<?php echo base_url(); ?>index.php/welcome/browseFromHome">
                                    <button type="submit" name="type" value="= 3" class="btn btn-success ">Pregledaj</button>
                                </form>
                            </div>
                        </div>
                    </div>
               
                <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                             <h4>DIPLOMSKIH RADOVA</h4> 
                            </div>
                            <div class="panel-body">
                                <ul class="plan"> 
                               <?php for($i=0; $i<count($diplomski); $i++) {?>
                                   <li class="price"><strong><?= html_escape($diplomski[$i]->ukupno); ?></strong></li> 
                               <?php } ?> 
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <form method="post" action="<?php echo base_url(); ?>index.php/welcome/browseFromHome">
                                    <button name="type" value="= 1" type="submit" class="btn btn-primary ">Pregledaj</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
               
                <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                             <h4>DOKTORSKIH RADOVA</h4> 
                            </div>
                            <div class="panel-body">
                                <ul class="plan"> 
                               <?php for($i=0; $i<count($doktorski); $i++) {?>
                                   <li class="price"><strong><?= html_escape($doktorski[$i]->ukupno); ?></strong></li> 
                               <?php } ?> 
                                </ul>
                            </div>
                            <div class="panel-footer">
                               <form method="post" action="<?php echo base_url(); ?>index.php/welcome/browseFromHome">
                                   <button type="submit" name="type" value=" = 2" class="btn btn-success ">Pregledaj</button>
                               </form>
                            </div>
                        </div>
                    </div>
               
               <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                             <h4>OSTALIH RADOVA</h4> 
                            </div>
                            <div class="panel-body">

                               <ul class="plan"> 
                               <?php for($i=0; $i<count($ostali); $i++) {?>
                                   <li class="price"><strong><?= html_escape($ostali[$i]->ukupno); ?></strong></li> 
                               <?php } ?> 
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <form method="post" action="<?php echo base_url(); ?>index.php/welcome/browseFromHome">
                                    <button type="submit" name="type" value="NOT IN (1,2,3)" class="btn btn-primary ">Pregledaj</button>
                                </form>
                            </div>
                        </div>
                    </div>
               
               </div>
        </div>
        </section>
                      
                 </div>
            </div>
         </div>
   
           <div class="row text-center pad-bottom" >
            <div class="col-md-12">
                <i class="fa fa-5x"></i>
                <h4><strong><em>Posljednji rad dodan u repozitorij:</em></strong></h4>
            </div>
           </div>
                
      
           <div class="row   alert alert-info" >
                 <div class="col-md-8 col-sm-8">
                      <?php for($i=0; $i<count($last); $i++) {?>
                      <h3>"<?= html_escape($last[$i]->title); ?>" </h3>
                      
                 </div>
               
                 <div class="col-md-4 col-sm-4" style="padding-top: 15px;">
                     <form method="POST" action="<?php echo base_url(); ?>index.php/welcome/download">
                         <button class="btn btn-primary btn-lg" name="workid" value="<?= html_escape($last[$i]->id); ?>">Preuzmite rad</button> 
                     </form>
                 </div> 
                    <?php } ?>
               </div>
                <br><br>
      </div>