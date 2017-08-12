<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').lang('gest_entreprises');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_entreprise'); ?>";
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
            <h2><?php echo lang("entreprise_title");?></h2>
        </div>
  <div class ="recherche">
    <!-- liste des entreprises-->
    <?php echo form_open('backoffice_liste/rechercheEntreprise');?>
    <?php echo form_fieldset(lang('search'));?>

      
        <div id = "entreprise">
          <?php $defaut = array('name'=>'entreprise',
                          'placeholder'=>lang('th_entreprise'),
                          'class' => 'form-control',
                          'id'=>'pays',
                          'size'=>'50'
                          ); 
          ?>

          <?php echo form_label(lang('entreprise'));?>
          <?php echo form_input($defaut);?>
        </div>
        <br/>
        <div id = "pays_entreprise">
          <?php $defaut = array('name'=>'pays',
                          'placeholder'=>lang('val_pays'),
                          'class' => 'form-control',
                          'id'=>'pays',
                          'size'=>'50'
                          ); 
          ?>

          <?php echo form_label(lang('pays'));?>
          <?php echo form_input($defaut);?>
        </div>
        <br/>
        <div id = "ville_entreprise">
          <?php $defaut = array('name'=>'ville',
                          'placeholder'=>lang('val_ville'),
                          'class' => 'form-control',
                          'id'=>'ville',
                          'size'=>'50'
                          ); 
          ?>

          <?php echo form_label(lang('ville'));?>
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
    <?php echo anchor('backoffice_ajout/ajouterEntreprise','<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('entreprise_new').'</span>');?>
    </div>
       <div class="panel-body">
        <div class="table-responsive">
         
          <table class="table table-bordered" >

            <caption>
            <h4><?php echo lang('entreprise_list');?></h4>
            </caption>
            <thead>
              <tr>
                <th><?php echo lang('th_nom');?></th>
                <th><?php echo lang('val_ville');?></th>
                <th><?php echo lang('val_pays');?></th>
                <th><?php echo lang('th_action');?></th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($entreprises as $row): ?>
                <tr>
                   <td class="table_left"><?php echo $row->GMEN_NOM;?></td>
                   <td class="table_left"><?php echo $row->GMEN_VILLE;?></td>
                   <td class="table_left"><?php echo $row->GMEN_PAYS;?></td>
                   <td>
                      <?php echo anchor('backoffice_modification/ficheEntreprise/'.$row->GMEN_CODE, lang('details'));?>
                      <?php echo anchor('backoffice_modification/modifierEntreprise/'.$row->GMEN_CODE, lang('modify'));?>
                      <?php
                        $attr = array(
                                      'onclick'=>'return confirmDialog();'
                                      );
                        echo anchor('backoffice_liste/deleteEntreprise/'.$row->GMEN_CODE, lang('delete'), $attr);?>
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
            echo form_open('Backoffice_liste/listeEntreprise');
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