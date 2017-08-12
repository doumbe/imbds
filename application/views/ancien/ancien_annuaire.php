<html>
  <head>
    <title><?php echo $message;?></title>
    <?php  $this->load->view('base_site/script_base_site.php');?>
    <link rel="stylesheet"  type="text/css" href="<?php //echo base_url(); ?>css/ancien_css.css">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/candidature_c.css">

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
       <?php include("/header.php"); ?>
       </div>
      <div id="contenu">
      <?php include("/menu.php"); ?>
        <div id="content" class="narrowcolumn">
          <div id="ancien_content" class="post">
          	<h2><?php echo $message;?></h2>
         	  <div class="entry">
              <div class="panel-bod">
              <?php $nav_en_cours = 'rubrique1'; ?>  
              <div class="table-responsive">
              <table id="table_annuaire_ancie" class="table table-bordered" style="width:80%;margin-left:55px;">
                <thead>
                  <tr>
                    <th class="table_lef">
                      <?php  echo form_open('ancien_c/ancien_annuaireOrderBYannee/');
                   //  echo form_submit('retour','Année','class="btn btn-danger return_button"');
                     echo form_submit('retour','Année','class="btn btn-danger return_button"');

                     echo form_close();?><?php //echo lang('th_nom');?></th>


                     </th>
                    <th class="table_lef" style="width:21%;">
                    <?php  
                     echo form_open('ancien_c/ancien_annuaire/');

                     echo form_submit('retour','Nom','class="btn btn-danger return_butto"');

                     echo form_close();?><?php //echo lang('th_nom');?></th>
                    <th class="table_lef"><?php echo lang('th_prenom');?></th> 
                    <th><?php echo lang('cv');?></th>
                    <th><?php echo lang('th_linkedin');?></th>
                    <th><?php echo lang('th_detail');?></th>
                  </tr> 
                </thead>
                <tbody>
                  <?php foreach ($result as $row): ?>
                    <tr>
                      <td class="table_lef"><?php echo $row->GMPR_ANNEE;?></td>
                      <td class="table_lef" ><?php echo $row->GMET_NOM;?></td>
                      <td class="table_lef"><?php echo $row->GMET_PRENOM;?></td>
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
                      <center><?php echo $links;?></center>
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
      <?php $this->load->view('base_site/footer_base_site.php');?>
    </div>


    <style>
    .bouton_tableau_ancien{
      /*margin-left: 0px;
          text-align: center;
*/
    }
    form{
      /*width: 12%;
    */}
    input[type = 'submit']{
    /*  margin-left:5px;
      */
      text-align: center;
      font-weight : 800;
      background:red;
      width: 125px;
      height:28px;
    }
    #en-cours{
      color: red;
      background-color: red;
    }
    </style>
  </body>
</html>