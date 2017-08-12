
<html>
  <head>
<?php  include("/script_backoffice.php");?>
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
          <?php echo lang('candidat_consulter_procedure');?>

        </h2>
     
      </div>
<div class="fiche">


  <div id="div_fiche_condition">
  
   <fieldset> <h2>Consulter les différentes procedures qui vous concerne</h2>
    <br/><br/>
<p>- Procédure « <?php echo anchor("candidat_c//",lang('contrat d’apprentissage'),$fiche);?> »</p>
<p>- Procédure « <?php echo anchor ("candidat_c//",lang('scolarité d’un apprenti'),$fiche ); ?> »</p>
<p>- Procédure « <?php echo anchor ("candidat_c//",lang('recherche de logement'),$fiche );?> »</p>
<p>- Procédure « <?php echo anchor ("candidat_c//",lang('la mise en place d’une convention de stage'),$fiche);?>
  ».</p></fieldset>
    </div>

</div>

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


  </body>
</html>



