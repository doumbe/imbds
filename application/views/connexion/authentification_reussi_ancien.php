<!DOCTYPE html>
<html>
  <meta charset="UTF-8">
  <head>
<?php include("/script_backoffice.php");?>
 <?php $this->load->view('backoffice/script_backoffice.php');?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/site_mbds.css">
<script src="<?php echo base_url(); ?>js/jquery/jquery-ui-1.11.0.custom/external/jquery/jquery-1.11.1.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker/js/bootstrap-datepicker.js"></script>
    <link href=" <?php echo base_url(); ?>css/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>js/datepicker/css/datepicker.css">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/candidature_css.css">
 
    <title></title>
  </head>
  <body>
      <div id = 'page'>

      <div id = 'header'style='height:130px;'>
        <?php include("/../header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
          <?php $this->load->view('menu.php'); ?>

        <div id = 'content' class = 'narrowcolumn'>


                <center><h3 style="color:red;margin-top:10%;"><?php echo $titre;?></h3></center>

      <div style=" background:red;margin-left:-10%">'</div></br>  
    <div id="content">
      
    <p>Bonojour <?php echo $candidat->GMET_PRENOM." ".$candidat->GMET_NOM;?>
</br></br>Vous etes actuellement connecté(e)</br></br>Bienvenu dans votre espace personnel <?php //echo $candidat->GMCA_CODE;?> </p>
       </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
      
    </div>
  </body>
</html>