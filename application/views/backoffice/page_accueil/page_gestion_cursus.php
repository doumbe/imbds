<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src= "<?php echo base_url() ?>js/bootstrap.min.js"></script>

    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/site_mbds.css">
    <link href=" <?php echo base_url(); ?>css/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/backoffice_css.css">
    <title><?php echo lang('mbds_back').lang('gest_cursus');?></title>
  </head>
  <body>

    <div id = 'page'>

      <div id = 'header'>
        <?php include("/../header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/../menu.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>
        <div id="message">
        <h2>
          <?php echo lang('gest_cursus') ;?>
        </h2>
      </div>
   
    <div id ="gestion_cursus">
      <nav>
          <ul>
        <li class="page_item page-item-11">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_formation',
              'class' => 'link a_link_file',
              'title' => lang('gest_formation')
            );
            echo anchor("backoffice_liste/listFormation",lang('gest_formation'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-12">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_antenne',
              'class' => 'link a_link_file',
              'title' => lang('gest_antenne')
            );
            echo anchor("backoffice_liste/listAntenne",lang('gest_antenne'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-8">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_semestre',
              'class' => 'link a_link_file',
              'title' => lang('gest_semestre')
            );
            echo anchor("backoffice_liste/listSemestre",lang('gest_semestre'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-9">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_ue',
              'class' => 'link a_link_file',
              'title' => lang('gest_ue')
            );
            echo anchor("backoffice_liste/listUe",lang('gest_ue'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-5">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_matieres',
              'class' => 'link a_link_file',
              'title' => lang('gest_matieres')
            );
            echo anchor("backoffice_liste/listeMatieres",lang('gest_matieres'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-6">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_cours',
              'class' => 'link a_link_file',
              'title' => lang('gest_cours')
            );
            echo anchor("backoffice_liste/listeCours",lang('gest_cours'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-4">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_intervenants',
              'class' => 'link a_link_file',
              'title' => lang('gest_intervenants')
            );
            echo anchor("backoffice_liste/listeIntervenant",lang('gest_intervenants'),$fiche);
          ?>
        </li>
      </ul>
      <ul>
        <li class="page_item page-item-11">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_cursus_detaille',
              'class' => 'link a_link_file',
              'title' => lang('gest_cursus_detaille')
            );
            echo anchor("backoffice_affichage/affichage_choix_cursus_detaille",lang('gest_cursus_detaille'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-12">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_cursus_resume',
              'class' => 'link a_link_file',
              'title' => lang('gest_cursus_resume')
            );
            echo anchor("backoffice_affichage/affichage_choix_cursus_resume",lang('gest_cursus_resume'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-8">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_int_per_matiere',
              'class' => 'link a_link_file',
              'title' => lang('gest_int_per_matiere')
            );
            echo anchor("backoffice_affichage/affichage_choix_enseignant_permanent_matiere",lang('gest_int_per_matiere'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-9">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_int_vac_matiere',
              'class' => 'link a_link_file',
              'title' => lang('gest_int_vac_matiere')
            );
            echo anchor("backoffice_affichage/affichage_choix_enseignant_vacataire_matiere",lang('gest_int_vac_matiere'),$fiche);
          ?>
        </li>
      </ul>
      </nav>
   </div>
</div><!--content-->
    </div><!--contenu-->

  </div><!--page-->

  </body>
</html>