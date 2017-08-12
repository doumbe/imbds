<html>
  <head>
    

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src= "<?php echo base_url() ?>js/bootstrap.min.js"></script>
    
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src= "<?php echo base_url() ?>js/datepicker-fr.js"></script>
    <script src= "<?php echo base_url() ?>js/menu_gauche_backoffice.js"></script> 

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/site_mbds.css">
    <script src="<?php echo base_url(); ?>js/jquery/jquery-ui-1.11.0.custom/external/jquery/jquery-1.11.1.js"></script>
     <script src="<?php echo base_url(); ?>js/datepicker/js/bootstrap-datepicker.js"></script>
    <link href=" <?php echo base_url(); ?>css/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>js/datepicker/css/datepicker.css">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/candidature_css.css">
    <title>
      <?php echo lang('candidature');?>
    </title>
  </head>

    <body><div id = 'page'>

      <div id = 'header'>
        <?php include("/header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/candidat_menu_gauche.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>

      <div id="Message">
        <h2>
          <?php //echo lang('candidat_title_condition');?>
        REMPLIR LE FORMULAIRE CI-DESSUS 
        </h2>
      </div>
<div class="fiche">

  <div id="div_fiche_condition">

    <h2>Etape 1: Informations personnelles</h2><br/>
     Les réponses aux questions suivantes doivent nous permettre de mieux apprécier votre candidature.</br>
     Nous vous suggérons donc d'y répondre avec sincérité et spontanéité.
     <?php //echo form_open('candidat_c/recrutement'); ?>
     <?php //echo form_close() ;?>
<br/>
</br/>

<div>
<fieldset> 
  1. Exposez les motifs de votre candidature au MASTERMBDS:<br/>
  <br/>
  <textarea name="Remarque"  style="width:97% ; height : 150px;"></textarea>
<br/>
</fieldset> 
</div> 
<br/>
<div>
<fieldset> 
  
2. Quelles expériences et/ou quels contacts avez-vous déjà eus dans le domaine du développement d’application en informatique d’entreprise ?
 <br/><br/>  <textarea name="Remarque"  style="width:97% ; height : 150px;"></textarea>
<br/> 
</fieldset> 
</div>
<br/>
<div>
<fieldset> 
  3. En quelques mots, comment envisagez-vous votre avenir professionnel :<br/>  
  a) À la sortie de la formation ?<br/>
  b) Dans cinq ans ?<br/>
 <br/> <textarea name="Remarque"  style="width:97% ; height : 150px;"></textarea><br/> 
</fieldset> 
       <input type="submit" value="Suivant" align="center" /></br>
</div> 
 
</div>

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page--><?php
  echo date('Y') +1 ;?>
  </body>
</html>



