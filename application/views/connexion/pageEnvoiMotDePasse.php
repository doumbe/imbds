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
      
      <p>Bienvenue <?php $this->session->userdata('login');?></p>
      
      <?php echo anchor('signup/logout','Logout');?>
      
    </div>
  </body>
</html>