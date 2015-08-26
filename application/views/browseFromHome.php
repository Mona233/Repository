<section id="home" class="head-main-img">
         
               <div class="container">
           <div class="row text-center pad-row" >
            <div class="col-md-12">
              <h1>  Pregledajte radove prema vrsti rada </h1>
                </div>
               </div>
            </div>   
           
       </section>


<section >
             <div class="container">
             <div class="row text-center pad-row">
            
                 <div class="ibox-content">
                     
                     <table class="table table-striped table-bordered table-hover dataTables-example">
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
                            <tbody>
                                
                                <?php for($i=0;$i<count($type);$i++) { ?>
                                       <tr>
                                           
                                            <td><?= $type[$i]->title ?></td>
                                            <td><?= $type[$i]->author ?></td>
                                            <td><?= $type[$i]->date ?></td>
                                            <td><?= $type[$i]->typename ?></td>
                                            <td><?= $type[$i]->mentor ?></td>
                                            <td><?= substr($type[$i]->summary, 0, 200) . '...'?>
                                                <div class="text-center">
                                                    <a href="#" data-toggle="modal" data-target="#summary<?=$type[$i]->id ?>">
                                                       Više
                                                    </a>
                                                </div>
                                                <div class="modal inmodal fade" id="summary<?=$type[$i]->id ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                <h4 class="modal-title">Sažetak</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><?=$type[$i]->summary ?></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Zatvori</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </td>
                                            <td><?= $type[$i]->keywords ?></td>
                                            <td><?= $type[$i]->discname ?></td>
                                            <td><?= $type[$i]->course ?></td>
                                            <td>
                                                <form method="POST" action="<?php echo base_url();?>index.php/welcome/download">
                                                    <button type="submit" class="btn btn-primary" name="typesubmit" value="<?php echo $type[$i]->id ?>">Preuzmi</button>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                        
                                    <?php } ?>
                            </tbody>
                        </table>
                     
                 </div>
             
            </div>
                 </div>
</section>
<script>
    //
    $('.dataTables-example').dataTable({
            "pageLength": 10,
            responsive: true,
            "dom": 'T<"clear">lfrtip'
        });

</script>