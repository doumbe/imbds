
<html>
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
    <title>
      <?php echo lang('candidature');?>
    </title>
  </head>

    <body><div id = 'page'>

      <div id = 'header'style='height:130px;'>
        <?php include("/header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/candidat_menu_gauche.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>

      <div id="Message">
        <h2>
          <?php //echo lang('candidat_title_condition');?>
        ESPACE FUTUR ETUDIANT
     
        </h2>
     
      </div>
<div class="fiche">

<!--<p><?php echo var_dump($candidat); ?></p>
<br/>
-->

  <div id="div_fiche_condition">
  
    
  <ul>
    <li class="very_important first_li"><h2>Procedure d'inscription</h2></li>
      <ul>
        <li>- Télécharger le dossier d'inscription</li>
        <li>- Déposer le dossier de candidature en deux étapes</li>

              <ul>
                <li>- Première étape: remplir les informations personnelles</li>
                <li>- Deuxième étape: déposer les pièces jointes remplies et complètes</li>
                <ul>
                <li>- Déposer le CV : le nom du fichier doit être de format : CV_nom _prenom.doc</li>
                <li>- Le dossier télécharger</li>
                <li>- Déposer la Lettre de recommandation1 : le nom du fichier doit être (lettre1_nom_prenom.docx)</li>
                <li>- Déposer les relevés de notes en format compressé(ZIP)</li>
                <li>- Déposer les diplômes en format compressé(ZIP)</li>
              </ul>
              
                <li></li>
       </ul>
  </ul>

  </ul>

  </div>

</div>

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


  </body>
</html>



