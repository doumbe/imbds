<html>
  <head>
    <title><?php echo $message;?></title>
    <?php include("/../base_site/script_base_site.php");?>
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/ancien_css.css">
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
      </div>
      <div id="contenu">
        <?php //include("/../etudiant/etudiant_menu_gauche.php");?>
        <div id="content" class="narrowcolumn">
          <div id="ancien_content" class="post">
          	<h2><?php echo $message;?></h2>
         	  <div class="entry">
              <div class="panel-body">
              <div class="table-responsive">
              <table id="table_annuaire_ancien" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="table_left"><?php echo lang('th_annee');?></th>
                    <th class="table_left"><?php echo lang('th_nom');?></th>
                    <th class="table_left"><?php echo lang('th_prenom');?></th>
                    <th><?php echo lang('cv');?></th>
                    <th><?php echo lang('th_linkedin');?></th>
                    <th><?php echo lang('th_detail');?></th>
                  </tr> 
                </thead>
                <tbody>
                  <?php foreach ($result as $row): ?>
                    <tr>
                      <td class="table_left"><?php echo $row->GMPR_ANNEE;?></td>
                      <td class="table_left" ><?php echo $row->GMET_NOM;?></td>
                      <td class="table_left"><?php echo $row->GMET_PRENOM;?></td>
                      <td>
                        <?php if(!is_null($row->GMDA_DOCUMENT) and $row->GMDA_LANGUE=="francais" ){?>
                          <a target="_blank" href="<?php echo base_url().$row->GMDA_DOCUMENT;?>">
                            <img class="th_logo" src="<?php echo base_url().'images/logo/pdf.png';?>"  />
                          </a>
                        <?php }?>
                      </td>
                      <td>
                        <?php if(!is_null($row->GMERS_LINK) and $row->GMRS_NOM=="linkedin"){?>
                          <a target="_blank" href="<?php echo $row->GMERS_LINK;?>">
                          <img class="th_logo" src="<?php echo base_url().$row->GMRS_LOGO; ?>" /></a>
                        <?php }?>
                      </td>
                      <td>
                        <span class="link_span">
                        <?php //echo form_open('etudiant_c/etudiant_details'); ?>
                      <?php //echo form_hidden('GMET_CODE',$row->GMET_CODE); ?>
                        <?php 
                        $link = array(
                                    'id' => 'a_fiche',
                                    'class' => 'link',
                                    'title' => lang('voir'),
                                    'name' => 'fiche'
                                    //'value' => lang('voir')
                                  );
                        //echo form_submit($link);
                        echo anchor("etudiant_c/etudiant_details/".$row->GMET_CODE,lang('voir'),$link);
                        ?>
                        <?php //echo form_close(); ?>
                      </span>
                      </td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="8">
                      <?php echo $links;?>
                    </td>
                  </tr>
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