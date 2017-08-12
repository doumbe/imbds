
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/site_mbds.css">
<script src="<?php echo base_url(); ?>js/jquery/jquery-ui-1.11.0.custom/external/jquery/jquery-1.11.1.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>js/menu_gauche_futurEtudiant.js"></script>

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
        DEPOSER DOSSIER DE CANDIDATURE 
     
        </h2>
     
      </div>
<div class="fiche">

<!--<p><?php echo var_dump($candidat); ?></p>
<br/>
-->

  <div id="div_fiche_condition">
  
    <h2>Vous informations ont été enregistré </h2>
   <p style="margin-top: 41px;"">Pour télécharger le dossier d'inscription veuillez cliquer<em><a href="/iMBDS/public/index.php/candidat_c/candidat_dossier_inscription" style="text-decoration: underline;""> ici</a></em></p>

    </div>

</div>

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


  </body>
</html>



