<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').lang('gest_questionnaire');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_questionnaire'); ?>";
        return confirm(mess);    
      }
  </script>
  </head>
  <body>
    <div id = 'page'>

      <div id = 'header'>
        <?php $this->load->view('backoffice/header.php'); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php $this->load->view('backoffice/menu.php'); ?>

        <div id = 'content' class = 'narrowcolumn'>

          <div id="message">
            <h2><?php echo lang("questionnaire_title");?></h2>
        </div>

    <div class ="recherche">
    <!-- liste des entreprises-->
    <?php echo form_open('backoffice_liste/recherche_questionnaire');?>
    <?php echo form_fieldset(lang('search'));?>

        <div id = "anneequestionnaire">
          <?php $defaut = array('name'=>'annee',
                          'id'=>'annee',
                          'class' => 'form-control',
                          'placeholder'=>sprintf(lang('val_annee'),date('Y')),
                          'size'=>'50'
                          ); 
          ?>

          <?php echo form_label(lang('annee'));?>
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
    <div class ="ajout_element">
      <?php echo anchor("backoffice_ajout/ajouterQuestionnaire",'<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('questionnaire_new').'</span>');?> 
    </div>
   
       <div class="panel-body">
        <div class="table-responsive">
         <?php if(!empty($questionnaire)){ ?>
          <table class="table table-bordered" >

            <caption>
            <h4><?php echo lang("questionnaire_list");?></h4>
            </caption>
            <thead>
              <tr>
                <th><?php echo lang('th_questionnaire_annee');?></th>
                <th><?php echo lang("th_action");?></th>
              </tr>
            </thead>
            <tbody>
               <?php
                foreach ($questionnaire as $row): ?>
                <tr>
                   <td class="table_left"><?php echo sprintf(lang('val_questionnaire_annee'),$row->GMQQ_ANNEE);?></td>
                   <td>
                      <?php echo anchor('backoffice_modification/fichequestionnaire/'.$row->GMQQ_ANNEE, lang('details'));?>
                      <?php echo anchor('backoffice_modification/modifierquestionnaire/'.$row->GMQQ_ANNEE, lang('modify'));?>
                      <?php 
                        $attr = array(
                                      'onclick'=>'return confirmDialog();'
                                      );
                        echo anchor('backoffice_liste/delete_questionnaire/'.$row->GMQQ_ANNEE, lang('delete'),$attr);
                      ?>
                      
                  </td>
                </tr>
                
              <?php endforeach;?>

            </tbody>
          </table>
        </div>
           <?php }?>
        <div id="message_alerte">
          <?php if(empty($questionnaire)){ echo lang('no_questionnaire');}?>
        </div>
        <!-- /.table-responsive -->
        <?php 
          if(isset($link))
            echo $link;
          else
          {
            echo form_open('Backoffice_liste/list_questionnaire');
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