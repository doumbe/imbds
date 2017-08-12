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
        <?php $this->load->view('intervenant/header.php'); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php $this->load->view('intervenant/menu.php');?>

        <div id = 'content' class = 'narrowcolumn'>
        <div id="message">
        <h2>
          <?php echo lang('gest_cours') ;?>
        </h2>
      </div>

      <div id ="gestion_cursus">
        <nav>
          <ul>
        <li class="page_item page-item-11">
         <?php
                    $fiche = array(
                        'id' => 'a_back_menu_pres_abs',
                        'class' => 'link a_link_file',
                        'title' => lang('gest_pres_abs')
                    );
                    echo anchor("intervenant_list/list_presence_absence",lang('gest_pres_abs'),$fiche);
                    ?>
        </li>
        <li class="page_item page-item-12">
                  <?php 
                    $fiche = array(
                        'id' => 'a_back_menu_note',
                        'class' => 'link a_link_file',
                        'title' => lang('gest_note')
                        );
                    echo anchor("intervenant_list/accueil_notes",lang('gest_note'), $fiche);
                    ?>
        </li>
        <li class="page_item page-item-8">
                  <?php
                    $fiche = array(
                        'id' => 'a_back_menu_matieres',
                        'class' => 'link a_link_file',
                        'title' => lang('fiche_descriptive_cours')
                    );
                    echo anchor("intervenant_list/listeCours", lang('fiche_descriptive_cours'), $fiche);
                    ?>
        </li>
        <li class="page_item page-item-9">
                  <?php
                    $fiche = array(
                        'id' => 'a_back_menu_cours',
                        'class' => 'link a_link_file',
                        'title' => lang('support_de_cours')
                    );
                    echo anchor("intervenant_list/support_cours", lang('support_de_cours'), $fiche);
                    ?>
        </li>
        <li class="page_item page-item-5">
                  <?php
                    $fiche = array(
                        'id' => 'a_back_menu_sujet',
                        'class' => 'link a_link_file',
                        'title' => lang('depot_sujet_examen')
                    );
                    echo anchor("intervenant_list/depotExamen", lang('depot_sujet_examen'), $fiche);
                    ?>
         </li>
         <!--
         <li class="page_item page-item-6">
          <?php /*
            $fiche = array(
              'id' => 'a_back_menu_cours',
              'class' => 'link a_link_file',
              'title' => lang('gest_cours')
            );
            echo anchor("backoffice_liste/listeCours",lang('gest_cours'),$fiche);*/
          ?>
        </li>
      -->
        </ul>
    </nav>
</div>
</div>
</div>
</div>
</body>
</html>
   