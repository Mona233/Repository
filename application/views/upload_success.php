   <?php
     header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
     header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // past date to encourage expiring immediately
    ?>

   <input type = "hidden" id = "page" value = "<?= $page ?>">
   <div id = "wrapper">
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
      

       
       <div class = "alert alert-success" style="text-align: center">Uspješno ste predali svoj rad! Kontaktirati ćemo Vas uskoro.<br>
                    <span style = "margin-left:50px;"> Povratak... </span>
                </div>


                 <!--<ul>
                <?php //foreach ($upload_data as $item => $value):?>
                     <li><?php// echo $item;?>: <?php // echo $value;?></li>
                <?php // endforeach; ?>
                </ul> -->
            
  </div>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
   

    <!--Mainly scripts -->
    <script src = "<?php echo base_url(); ?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>js/plugins/pace/pace.min.js"></script>

    <script>
        setTimeout(function () {
            window.location.href = $("#page").val();
        }, 5000);
    </script>

