<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title><?php echo "MBDS ".lang('gest_cours');?></title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/intervenant_css.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ancien_css.css">

  </head>

   <body>
    <?php $this->load->view('intervenant/script_intervenant.php');?>

    
    <div id = 'page'>

      <div id = 'header'>
        <?php $this->load->view('intervenant/header.php'); ?>
        
      </div><!--header-->

      <div id = 'contenu'>
       <?php $this->load->view('intervenant/menu.php');?>
       
        <div id = 'content' class = 'narrowcolumn'>
          
          <div id="message">
            <h2>
              <?php echo lang('liste_presences_absences');?>
            </h2>
          </div>

        <div class ="recherche recherche_cursus">
    <!-- liste des entreprises-->
     <?php echo form_open('intervenant_affichage/affichage_liste_presences_absences');?>
            <div class ="choix"> 

                  <?php echo form_label(lang('cours'));?>
                  <?php echo form_dropdown('cours',$cours_tab);?>
               
                  <p>
                  <?php echo form_label('Seance'); ?>
                  <?php echo form_dropdown('seance', $seances); ?>
                </p>
                <!--
          <?php/* $defaut = array('name'=>'annee',
                          'id'=>'annee',
                          'class' => 'form-control',
                          'placeholder'=>sprintf(lang('val_annee'),date('Y')),
                          'size'=>'50'
                          ); 
          ?>
          <?php echo form_input($defaut);*/?> -->
               
                  <?php  $bouton = array('name' =>'selection',
                                          'value' =>lang('select'),
                                          'class' =>"btn btn-primary");?>
                  <?php echo form_submit($bouton);?></p>
            </div>  
            
          <?php echo form_close();?>
          <br/>
    </div>
      </div>
      <!-- /.panel-body -->
</div><!--content-->
    </div><!--contenu-->

  </div><!--page-->

  </body>
</html>