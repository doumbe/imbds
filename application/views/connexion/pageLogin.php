<!DOCTYPE html>
<html>
  <meta charset="UTF-8">
  <head>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" />
    <title></title>
  </head>
  <body>
    <div id="content">
      
      <h1><?php echo $titre;?></h1>
      
      <?php if(isset($error)):?>
      <div class="error"><?php echo $error;?></div>
      <?php endif;?>
      
      <?php echo form_open('signup/login');?>
      
      <label for="pseudo" style=" color: #1B4F9C;">Pseudo:</label>
      <?php echo form_error('pseudo','<span class="error">','</span>');?>
      <input type="text" name="pseudo" value="<?php echo set_value('pseudo');?>" />
      
      
      <label for="pass" style=" color: #1B4F9C;">Mot de passe:</label>
      <?php echo form_error('pass','<span class="error">','</span>');?>
      <input type="password" name="pass" value="<?php echo set_value('pass');?>" />
      
      <input type="submit" value="Envoyer" />
      
      <?php echo form_close();?>
      
      <?php echo anchor('signup','M\'inscrire');?>
      
    </div>
  </body>
</html>