<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').lang('gest_intervenants');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_intervenant'); ?>";
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
            <h2><?php echo lang("intervenant_title");?></h2>
        </div>
    
    <div class ="recherche">
    <!-- liste des entreprises-->
    <?php echo form_open('backoffice_liste/rechercheIntervenant');?>
    <?php echo form_fieldset(lang('search'));?>

      
        <div id = "nom_intervenant">
          <?php $defaut = array('name'=>'nom',
                          'id'=>'nom',
                          'placeholder'=>lang('intervenant_name'),
                          'class' => 'form-control',
                          'size'=>'50'
                          ); 
          ?>

          <?php echo form_label(lang('intervenant_name_2'));?>
          <?php echo form_input($defaut);?>
        </div>
        <br/>
        <div id = "annee_intervenant">
          <?php $defaut = array('name'=>'annee',
                          'id'=>'annee',
                          'placeholder'=>sprintf(lang('val_annee'),date('Y')),
                          'class' => 'form-control',
                          'size'=>'50'
                          ); 
          ?>

          <?php echo form_label(lang('annee'));?>
          <?php echo form_input($defaut);?>
        </div>
        <br/>
        <div id = "statut_intervenant">
          <?php $defaut = array('name'=>'statut',
                          'id'=>'statut',
                          'placeholder'=>lang('val_statut'),
                          'class' => 'form-control',
                          'size'=>'50'
                          ); 
          ?>

          <?php echo form_label(lang('statut'));?>
          <?php echo form_dropdown('statut', $statuts,$default);?>
        </div>
        <br/>
        <div id = "antenne_intervenant">
          <?php $defaut = array('name'=>'antenne',
                          'id'=>'antenne',
                          'placeholder'=>lang('val_antenne'),
                          'class' => 'form-control',
                          'size'=>'50'
                          ); 
          ?>

          
          <?php echo form_label(lang('antenne'));?>
          <?php echo form_dropdown('antennes', $antennes,$default);?>
        </div>
        <br/>
        <div class = "bouton_recherche">
             <?php  $bouton = array('name' =>'recherche',
                                    'value' =>lang('search'),
                                    'class' =>"btn btn-primary");?>
              <?php echo form_submit($bouton);?>
            </div>  <!--bouton_recherche-->
      </div>

    <?php echo form_fieldset_close();?>
    <?php echo form_close();?>
    <br/><br/>
  <div class ="ajout_element">
    <?php echo anchor('backoffice_ajout/ajouterIntervenant','<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('intervenant_new').'</span>');?>
          </div>
   
       <div class="panel-body">
        <div class="table-responsive">
         
          <table class="table table-bordered" >

            <caption>
            <h4><?php echo lang("intervenant_list");?></h4>
            </caption>
            <thead>
              <tr>
                <th><?php echo lang('th_nom');?></th>
                <th><?php echo lang('th_prenom');?></th>
                <th><?php echo lang('val_statut');?></th>
                <th><?php echo lang('th_profession');?></th>
                <th><?php echo lang('th_action');?></th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($intervenants as $row): ?>
                <tr>
                   <td class="table_left"><?php echo $row->GMIN_NOM;?></td>
                   <td class="table_left"><?php echo $row->GMIN_PRENOM;?></td>
                   <td class="table_left"><?php echo $row->GMIN_STATUT;?></td>
                   <td class="table_left"><?php echo $row->GMIN_PROFESSION;?></td>
                   <td>
                    <?php echo anchor('backoffice_modification/ficheIntervenant/'.$row->GMIN_CODE, lang('details'));?>
                      <?php echo anchor('backoffice_modification/modifierIntervenant/'.$row->GMIN_CODE, lang('modify'));?>
                      <?php 
                        $attr = array(
                                      'onclick'=>'return confirmDialog();'
                                      );
                        echo anchor('backoffice_liste/deleteIntervenant/'.$row->GMIN_CODE,lang('delete'),$attr);
                      ?> 
                  </td>
                </tr>
                
              <?php endforeach;?>

            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      <?php 
        if(isset($link))
          echo $link;
        else
        {
          echo form_open('Backoffice_liste/listeIntervenant');
          echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');
          echo form_close();
        }
      ?>
      </div>
      <!-- /.panel-body -->

</div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
  </body>
</html>