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
    <title><?php echo lang('mbds_back').lang('gestion_contacts');?></title>
  </head>

  <body>

            <div id = 'page'>

              <div id = 'header'>
                <?php $this->load->view('intervenant/header.php'); ?>
              </div><!--header-->

              <div id = 'contenu'>
              <!--  <?php// $this->load->view('intervenant/menu.php');?>-->

                <div id = 'content' class = 'narrowcolumn'>
                <div id="message">
                <h2>
                  <?php echo lang('gest_vacation') ;?>
                </h2>
              </div>

              <div id ="gestion_vacation">
              <nav>
                    <ul class="hide_ul" id="ul_etudiant"> 
                        <li class="page_item page-item-14">
                          <?php
                            $fiche = array(
                                'id' => 'a_back_menu_addvacation',
                                'class' => 'link a_link_file',
                                'title' => lang('add_vacation')
                            );
                            echo anchor("intervenant_list/vacation", lang('add_vacation'), $fiche);
                            ?>
                        </li>
                    </ul>
                </nav>
            </div>
            </div>
            </div>
        </div>
    </body>
</html>