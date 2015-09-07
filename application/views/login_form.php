
  <div class="modal-dialog" style="margin-top: 150px;">
      <div class="modal-header">
          
          <h1 class="text-center">Login</h1><br>
          <p class="text-center"><em>Repozitoriju možete pristupiti ukoliko posjedujete AAI@EduHr račun.</em></p>
          <p class="text-center"><?php if(isset($message)) echo $message?></p>
      </div>
      
      <div class="modal-body" style="border: none;">
          <form class="form col-md-12 center-block" method="POST" action="<?php echo base_url(); ?>index.php/login/check">
            <div class="form-group">
                <input type="text"  name="username" id="username" class="form-control input-lg" placeholder="Vaš email (npr. ihorvat@ffzg.hr)" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Lozinka" required="">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Pristupite repozitoriju</button>
              <span class="pull-right"><a href="http://www.carnet.hr/javni_posluzitelj/faq?faq_id=325" target="blank">Što je  AAI@EduHr ?</a></span>
              <!--<span class="pull-left"><a href="<? //=base_url(); ?>index.php/welcome">Nastavi bez logina</a></span>-->
            </div>
          </form>
      </div>
        <div class="modal-footer" style="border: none;">
          <div class="col-md-12">
          
		  </div>	
      </div>
 
  </div>
