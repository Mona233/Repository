<!doctype html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Repozitorij Filozofskog fakulteta Zagreb</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body >
    
    <div class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="assets/img/logo.jpg" alt="" />
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">NASLOVNA</a></li>
                     <li><a href="">O REPOZITORIJU</a></li>
                    <li><a href="">PRETRAŽIVANJE</a></li>
                     <li><a href="">PREGLEDAVANJE</a></li>
                      <li><a href="">KONTAKT</a></li>
                </ul>
            </div>
           
        </div>
    </div>
   <!--/.NAVBAR END-->
   
                  <?= $body ?>

    <!--/.NOTE END-->

    <section id="footer-sec" >
             
            <div class="container">
           <div class="row  pad-bottom" >
            <div class="col-md-4" style="text-align: center">
                <h4> <strong>O Filozofskom fakultetu</strong> </h4>
                <p>
                                 Započinje svoj rad akademske godine 1874/1875. U njegovu je
                                 sastavu u početku djelovalo 6 katedara (filozofija, opća povijest, hrvatska 
                                 povijest, slavenska filologija, klasična filologija latinska i klasična filologija 
                                 grčka), bilo je zaposleno 6 profesora, a upisano 26 studenata.
                                 <a href="http://www.ffzg.unizg.hr/povijest.html" target="blank">Pročitaj više..</a>
                            </p>
                </div>
               <div class="col-md-4" style="text-align: center">
                   <h4 style="text-align: center"> <strong>Filozofski fakultet na društvenim mrežama</strong> </h4>
                   <p>
                       <a href="https://www.facebook.com/filozofski?fref=ts" target="blank"><i class="fa fa-facebook-square fa-3x"  ></i></a>  
                       <a href="https://twitter.com/FFZG" target="blank"><i class="fa fa-twitter-square fa-3x"  ></i></a>  
                   </p><br><br>
                   <strong>Copyright</strong> FFZG &copy; 2015
                </div>
               
               <div class="col-md-4" style="text-align: center">
                   <h4> <strong>LOKACIJA</strong> </h4>
                            <p>
                                Filozofski fakultet Sveučilišta u Zagrebu<br>
                                Ivana Lučića 3<br>
                                HR-10000 Zagreb<br>
                            </p>
                    <!--<a href="#" class="btn btn-primary" >SEND QUERY</a>-->
                </div>
               </div>
            </div>
    </section>         
    <!--/.FOOTER END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/plugins/bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
