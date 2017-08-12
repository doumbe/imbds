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
    
                  <?php include("/../ancien/menu.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>


                <center><h3 style="color:red;margin-top:10%;"><?php echo $titre;?></h3></center>

      <div style=" background:red;margin-left:-10%;">'</div></br>  
    <div id="content" style="margin-left:10px;">
      
      <?php if(isset($error)):?>
       <div class="error" style='color:red;'><?php echo $error;?></div>
      <?php endif;?>
      
      <?php echo form_open('signup/EnvoiNouveauMotDePasse_ancien');?>
      
    
</br>
      <label for="email" style=" color: #1B4F9C;">Email:</label>
      <input type="email" name="email" value="<?php echo set_value('email');?>" style="width:25%; border-radius: 7px;"/>

      <?php echo form_error('email','<span class="error" style="color :red;">','</span>');?>     
          
             <h4><input type="submit" name='valider' value="Soumettre"style='margin-left:270px;width:114px;background:#1B4F9C;color:white; border-radius: 7px;'/></h>

       <?php echo form_close();?>
    </div>
  </body>
</html>