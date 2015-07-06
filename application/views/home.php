    <section id="home" class="text-center">
         
<!--                <div id="carousel-example" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                       <div class="item active">

                            <img src="assets/img/ffzg1.jpg" alt="" />
                            <div class="carousel-caption" >
                                <h4 class="back-light">Dobrodošli na repozitorij radova Filozofskog fakulteta u Zagrebu</h4>
                            </div>
                        </div>-->

                        <div class="item">
                            <img src="assets/img/ffzg1.jpg" alt="" />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Dobrodošli na repozitorij radova Filozofskog fakulteta u Zagrebu</h4>
                            </div>
                        </div>
                    </div>

<!--                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="0"></li>
                    </ol>
                </div>-->
           
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
                        <div class="panel panel-danger">
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
                                <a href="#" class="btn btn-danger ">Pregledaj</a>
                            </div>
                        </div>
                    </div>
               
                <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="panel panel-success">
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
                                <a href="#" class="btn btn-success ">Pregledaj</a>
                            </div>
                        </div>
                    </div>
               
                <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="panel panel-info">
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
                                <a href="#" class="btn btn-info ">Pregledaj</a>
                            </div>
                        </div>
                    </div>
               
               <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="panel panel-danger">
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
                                <a href="#" class="btn btn-danger ">Pregledaj</a>
                            </div>
                        </div>
                    </div>
               
               </div>
        </div>
        </section>
                      
                 </div>
                
            </div>
               
               </div>
        </div>
      