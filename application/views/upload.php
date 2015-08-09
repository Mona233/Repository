<div class="container">
           <div class="row text-center pad-row" >
            <div class="col-md-12">
                
                <?php echo $error;?>
<form action="<?php echo base_url();?>index.php/welcome/upload" method="POST" enctype="multipart/form-data" >
    <input type='file' name='userfile' size='20' />
    <input type='submit' name='submit' value='upload' />
</form>
            </div>
           </div>
</div>
