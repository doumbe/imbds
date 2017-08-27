
<html>
  <head>

<?php $this->load->view('backoffice/script_backoffice.php');?>
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

    <body><div id = "page">

      <div id = "header">
        <?php $this->view('header.php'); ?>
      </div><!--header-->

      <div id = "contenu">
        <?php include('etudiant_menu_gauche.php'); ?>

        <div id = 'content' class = 'narrowcolumn'>

      <div id="Message">
        <h2>
          <?php echo lang('candidat_consulter_procedure');?>

        </h2>
     
      </div>
<div class="fiche">


  <div id="div_fiche_condition">
  
   <fieldset> <h2>Consulter les différentes procedures qui vous concerne</h2>
    <br/><br/>
    <p><a href="#">Procédure - Contrat d'apprentissage</a></p>
    <p><a href="#">Procédure - mise en place d’une convention de stage simple ou longue durée</a></p>
    <p><a href="#">Procédure - logement</a></p>
    <p><a href="#">Procédure - demander son diplôme</a></p>
    <p><a href="#">Procédure - demander un relevé de notes</a></p>
    <p><a href="#">Procédure - remboursement de frais d’inscription</a></p>
    <p><a href="#">Procédure - demande son attestation de réussite</a></p>
</fieldset>
    </div>

</div>

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


  </body>
</html>



