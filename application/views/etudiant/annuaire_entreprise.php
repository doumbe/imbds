<html>
  <head>
    <title><?php echo $message;?></title>
   <?php //$this->load->view('etudiant/script_entreprise.php');?>
    <link rel="stylesheet"  type="text/css" href="<?php //echo base_url(); ?>css/ancien_css.css">
     <script>

      $(document).ready(function()
      {

      });
    </script>
  </head>

  <body>
    <?php
/*
session_start();
if(empty($_SESSION['connecte']))
{
  $_SESSION['connecte'] = 'GMET168776';
}
*/
?>
    <div id="page">
      <div id="header"> 
      <?php $this->load->view('entreprise/header.php'); ?>
      </div>
      <div id="contenu">
        <?php //include("/../etudiant/etudiant_menu_gauche.php");?>
        <div id="content" class="narrowcolumn">
          <div id="etudiant_content" class="post">
            <h2><?php echo $message;?></h2>
            <div class="entry">
              <div class="panel-body">
              <div class="table-responsive">
               <div class ="recherche">
                <!-- liste des etudiants-->
                <?php echo form_open('entreprise_liste/list_etudiant');?>
                <?php echo form_fieldset(lang('search'));?>

                    <div id = "nomprocedure_administrative">
                      <?php $defaut = array('name'=>'nom',
                                      'id'=>'nom',
                                      'class' => 'form-control',
                                      'placeholder'=>lang('th_nom'),
                                      'size'=>'50'
                                      ); 
                      ?>

                      <?php echo form_label(lang('name'));?>
                      <?php echo form_input($defaut);?>
                    </div>

                   <div class = "bouton_recherche">
             <?php  $bouton = array('name' =>'recherche',
                                    'value' =>lang('search'),
                                    'class' =>"btn btn-primary");?>
              <?php echo form_submit($bouton);?>
            </div>  <!--bouton_recherche-->
    <?php echo form_fieldset_close();?>
    <?php echo form_close();?>
  </div>
   <br/>
   <br/>
              <table id="table_etudiant_actuel" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="table_left">Nom</th>
                    <th class="table_left">Secteur d'Activite</th>
                    <th class="table_left">Effectif</th>
                    <th class="table_left">chiffre d'Affaire</th> 
                    <th class="table_left">Adresse_Web</th>
                    <th class="table_left">Ville</th>
                  </tr> 
                </thead>
                <tbody>
                  <?php foreach ($result as $row): ?>
                    
                    <tr>
                      <td class="table_left" ><?= $row->GMEN_NOM;?></td>
                      <td class="table_left" ><?= $row->GMEN_SECTEUR_ACTIVITE;?></td>
                      <td class="table_left"><?= $row->GMEN_EFFECTIF;?></td>
                      <td class="table_left"><?= $row->GMEN_CHIFFRE_DAFFAIRE;?></td>
                      <td class="table_left"><a href="http://<?= $row->GMEN_SITE_WEB;?>"><?= $row->GMEN_SITE_WEB;?></a></td>
                      <td class="table_left"><?= $row->GMEN_VILLE;?></td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                  <!--<tr>
                    <td colspan="8">
                      <?php echo $links;?>
                    </td>
                  </tr>-->
                </tfoot>
              </table>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>
      <?php include("/../base_site/footer_base_site.php");?> 
    </div>
  </body>
</html>