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
 
<!--    <link rel="stylesheet" href="<?php echo base_url();?>css/espace_connexion.css" />
    --><title></title>
  </head>
  <body>
  <div id = 'page'>

      <div id = 'header'style='height:130px;'>
        <?php include("/../header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/../menu.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>

        <center><h3 style="color:red;margin-top:10%;"><?php echo $titre;?></h3></center>

      <div style=" background:red;margin-left:-10%">'</div></br></br></br>     
<div style="margin-left:10%;color:red;">
  <p>votre demande est bien été enregistrée</p><p>votre mot de passe vous été envoie par mail</p>
   <?php //echo $nouveau_mot_de_passe ;
       //  echo $mail_recuperer ?>
</div>     
         
      </div>

         </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
      
    </div>
  </body>
</html>

