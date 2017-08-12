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

      <div id = 'header'>
        <?php include("/../header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/../candidat_menu_gauche.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>


                <center><h3 style="color:red;margin-top:8.4%;"><?php echo $titre;?></h3></center>

      <div style=" background:red;margin-left:-10%">'</div></br>  
    <div id="content" style="margin-left:10px;">
      
      <?php if(isset($error)):?>
      <div class="error" style='color:red;'><?php echo $error;?></div>
      <?php endif;?>
      <?php echo form_open('signup/authentification');?>
      
      <label for="login"    style=" color: #1B4F9C;">login</label>
      <input type="text" name="login" value="<?php echo set_value('login');?>" style="width:25%; border-radius: 7px;" />
     
      
      <?php  echo form_error('login','<span class="error" style="color :red;">','</span>')  ;?><br /> 
      
      <label for="mot_de_passe" style=" color: #1B4F9C;">Mot de passe</label>
      <input type="password" name="mot_de_passe" value="<?php echo set_value('mot_de_passe');?>" style="width:25%; border-radius: 7px;"/>
     
      
      <?php  echo form_error('mot_de_passe','<span class="error" style="color :red;">','</span>')  ;?>
                           
      <ul style='margin-left:322px;'>
          <li><h5><input type="submit" name='valider' value="Acceder a mon espace" style='margin-left:0px;width:40%;background:#1B4F9C;color:white; border-radius: 7px;'/></h5> </li>
          <li ><h5 style="color :red;"><?php echo anchor('signup/changementMotdePasse','Mot de passe oublié');?><h5></li>
          <li><h5><?php echo anchor("candidat_c/recrutement",'S\'incrire');?></h5> </li>
      </ul>      <?php echo form_close();?>
      
    </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
      
    </div>
  </body>
</html>
<!--
 <div style="margin-left:0%;">
        <ul>
        <li class=""><?php 

  echo anchor("candidat_c/candidature_stage_projet/".$candidat->GMCA_CODE.'/','Acceder a mon espace',$fiche); //GMCA160011
?>
</li>
<li class="">
<?php 
  echo anchor("http://localhost/imbds/public/index.php/signup/changementMotdePasse/".$candidat->GMCA_CODE.'/','Mot de passe oublier',$fiche); //GMCA160011
?>
</li>
<li class="" >
<?php 
  echo anchor("http://localhost/imbds/public/index.php/candidat_c/recretement/".$candidat->GMCA_CODE.'/','S\'inscrire',$fiche); //GMCA160011
?>
</li>
<ul>
        
      </div>