<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("/../script_entreprise.php");?>
    <title><?php echo lang('mbds_back').lang('gest_proc_admin');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_list_etudiant'); ?>";
        return confirm(mess);    
      }
  </script>
  <style>
      body #page #contenu {
        display: flex;
      }

      body #page #content {
        margin-left:3px;
      }

  </style>

  </head>
  <body>
    <div id = 'page'>

      <div id = 'header'>
        <?php include("/../header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
       <?php include("/../entreprise_menu_gauche.php"); ?>

        <div id = "content" class = "narrowcolumn">

        <div id="message">
            <h2><?php echo lang("list_etudiant_title");?></h2>
        </div>
    <div class ="recherche">
    <!-- liste des entreprises-->
    <?php echo form_open('entreprise_liste/recherche_etudiant');?>
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
        <br/>
       <div class = "bouton_recherche">
             <?php  $bouton = array('name' =>'recherche',
                                    'value' =>lang('search'),
                                    'class' =>"btn btn-primary");?>
              <?php echo form_submit($bouton);?>
            </div>  <!--bouton_recherche-->
    <?php echo form_fieldset_close();?>
    <?php echo form_close();?>
  </div>

    <br/><br/>
   <!-- <div class ="ajout_element">
      <?php //echo anchor("entreprise_ajout/ajouterProcedure",'<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('procedure_administrative_new').'</span>');?> 
    </div> -->
   
       <div class="panel-body">
        <div class="table-responsive">
         <?php if((!isset($etudiant) || empty($etudiant)) && isset($list_etudiant)){$etudiant = $list_etudiant;};?>
         <?php if(!empty($etudiant)) { ?>

          <table class="table table-bordered" >

            <caption>
              <h4><?php echo lang("etudiant_list");?></h4>
            </caption>
            <thead>
              <tr>
                <!--<th>N° Etudiant</th> -->
                <th><?= lang("name");?></th>
                <th>Prénom</th>
                <th>Situation</th>
                <th class="table_center">CV</th>
                <th>Tél</th>
                <th>Courriel</th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($etudiant as $row): ?>
                <!-- <h3>$row</h3> -->
                <tr>
                  <!--<td class="table_left table_vertical_center"><?php //echo $row->GMET_NUMERO_ETUDIANT;?></td>-->
                   <td class="table_left table_vertical_center"><?php echo $row->GMET_NOM;?></td>
                   
                   <td class="table_vertical_center">
                      <?= $row->GMET_PRENOM;?>
                      
                  </td>
                   <td class="table_left table_vertical_center"><?php echo $row->GMET_REMARQUES;?></td> 
                   <td class="table_center">
                    <?php if(isset($row->GMDA_DOCUMENT) && !is_null($row->GMDA_DOCUMENT)){?>
                      <?php $GMPA_FORMAT= explode('.',$row->GMDA_DOCUMENT); ?>
                          <a target="_blank" href="<?php echo base_url().$row->GMDA_DOCUMENT;?>">
                            <?php if($GMPA_FORMAT[1]=="pdf"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/pdf.png';?>"  />
                            <?php }?>
                            <?php if($GMPA_FORMAT[1]=="docx" or $GMPA_FORMAT[1]=="doc"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/word.png';?>"  />
                            <?php }?>
                            <?php if($GMPA_FORMAT[1]=="xlsx" or $GMPA_FORMAT[1]=="xls"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/excel.png';?>"  />
                            <?php }?>
                            <?php if($GMPA_FORMAT[1]=="odt" or $GMPA_FORMAT[1]=="ppt"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/ppt.png';?>"  />
                            <?php }?>
                            <?php if($GMPA_FORMAT[1]=="txt"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/txt.png';?>"  />
                            <?php }?>
                          </a>
                    <?php }?>
                   </td>
                   <td class="table_left table_vertical_center">
                   <?= $row->GMET_TELEPHONE_PORTABLE; ?>
                   </td>
                   <td class="table_left table_vertical_center">
                   <?= $row->GMET_EMAIL; ?>
                   </td>

                   
                </tr>
                
              <?php endforeach;?>

            </tbody>
          </table>
        </div>
        <?php }?>
        <div id="message_alerte">
          <?php if(empty($list_etudiant)){ echo lang('no_list_etudiant');}?>
        </div>
        <!-- /.table-responsive -->
        <?php 
          if(isset($link))
            echo $link;
          else
          {
            echo form_open('entreprise_liste/list_etudiant');
            echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');
            echo form_close();
          }
        ?>
      </div>
      <!-- /.panel-body -->


      <?php 
        $erreur = $this->session->flashdata('error'); 
        if(! empty($erreur)){
          echo "<script> alert('".$erreur."'); </script>";
        }
      ?>

 </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
  </body>
</html>