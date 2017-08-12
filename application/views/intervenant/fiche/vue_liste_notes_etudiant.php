<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title><?php echo "MBDS ".lang('gest_procedure_admin');?></title>
    <script type="text/javascript">
    function confirmDialog(){
      var mess = "<?php print lang('confirm_delete_document_modele'); ?>";
      return confirm(mess);
    }
    </script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/intervenant_css.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ancien_css.css">
    

  </head>

   <body>
    <?php $this->load->view('intervenant/script_intervenant.php');?>

    <div id = 'page'>
    
      <div id = 'header'>
        <?php $this->load->view('intervenant/header.php'); ?>

      </div><!--header-->
      
      <div id = 'contenu'>
        
       <?php $this->load->view('/intervenant/menu.php');?>
        <div id = 'content' class = 'narrowcolumn'>
          
          <div id="message">
            <h2><?php echo lang("procedure_administrative_title");?></h2>
        </div>
    <div class ="recherche">
    <!-- liste des entreprises-->
    <?php echo form_open('intervenant_list/list_notes_etudiant');?>
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
<!--
    <br/><br/>
    <div class ="ajout_element">
      <?php echo anchor("intervenant_ajout/ajouterProcedure",'<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('procedure_administrative_new').'</span>');?> 
    </div>
   -->
       <div class="panel-body">
        <div class="table-responsive">
         
         <?php if(!empty($etudiant)){ ?>

          <table class="table table-bordered" >
            <br/>
            <caption>
              <h4><?php echo lang("procedure_administrative_list");?></h4>
            </caption>
            <thead>
              <tr>
                <th><?php echo lang("th_nom");?></th>
                <th><?php echo lang("th_prenom");?></th>
                <th><?php echo lang("val_description");?></th>
                <th class="table_center"><?php echo lang("th_document");?></th>
                <th><?php echo lang("th_action");?></th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($procedure_administrative as $row): ?>
                <?php if($row->GMPA_NOM=="demande vacation" or $row->GMPA_NOM=="demande de paiement") {?>
                <tr>
                  <td class="table_left table_vertical_center"><?php echo $row->GMPA_NOM;?></td>
                   <td class="table_left table_vertical_center"><?php echo $row->GMPA_TYPE;?></td>
                   <td class="table_left table_vertical_center"><?php echo $row->GMPA_DESCRIPTION;?></td>
                   <td class="table_center">
                    <?php if(!is_null($row->GMPA_DOCUMENT)){?>
                      <?php $GMPA_FORMAT= explode('.',$row->GMPA_DOCUMENT); ?>
                          <a target="_blank" href="<?php echo base_url().$row->GMPA_DOCUMENT;?>">
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
                   <td class="table_vertical_center">
                      <?php echo anchor('intervenant_modification/fiche_procedure_administrative/'.$row->GMPA_CODE, lang('details'));?>
                  </td>
                </tr>
                <?php }?>
                
              <?php endforeach;?>

            </tbody>
          </table>
        </div>
        <?php }?>
        <div id="message_alerte">
          <?php if(empty($procedure_administrative)){ echo lang('no_procedure_administrative');}?>
        </div>
        <!-- /.table-responsive -->
        <?php 
          if(isset($link))
            echo $link;
          else
          {
            echo form_open('intervenant_list/list_procedure_admin');
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