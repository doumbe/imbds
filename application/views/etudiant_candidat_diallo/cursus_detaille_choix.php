<!DOCTYPE html>
<html lang="en">
  <head>
<?php  include("/script_backoffice.php");?>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/site_mbds.css">
<script src="<?php echo base_url(); ?>js/jquery/jquery-ui-1.11.0.custom/external/jquery/jquery-1.11.1.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker/js/bootstrap-datepicker.js"></script>
    <link href=" <?php echo base_url(); ?>css/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>js/datepicker/css/datepicker.css">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/candidature_css.css">
    <?php include("/../script_backoffice.php");?>
    <title><?php echo lang('mbds_back').lang('gest_cursus_detaille');?></title>
  </head>
  <body>

    <div id = 'page'>

      <div id = 'header'>
        <?php include("header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/candidat_menu_gauche.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>
         <div id="message">
        <h2>
          <?php echo lang('cursus_detaille') ;?>
        </h2>
      </div>
    <div class ="recherche recherche_cursus">
    <!-- liste des entreprises-->
     <?php echo form_open('candidat_c/affichage_cursus_detaille');?>
            <div class ="choix">  
              <p>    <?php echo form_label(lang('cursus'));?>
                  <?php echo form_dropdown('formation',$formations);?>

          <?php $defaut = array('name'=>'annee',
                          'id'=>'annee',
                          'class' => 'form-control',
                          'placeholder'=>sprintf(lang('val_annee'),date('Y')),
                          'size'=>'50'
                          ); 
          ?>
          <?php echo form_input($defaut);?>

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