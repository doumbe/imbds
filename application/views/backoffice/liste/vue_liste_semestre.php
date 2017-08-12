<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').lang('gest_semestre');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_semestre'); ?>";
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
            <h2><?php echo lang("semestre_title");?></h2>
        </div>

    <div class ="recherche">
    <!-- liste des entreprises-->
    <?php echo form_open('backoffice_liste/recherchesemestre');?>
    <?php echo form_fieldset(lang('search'));?>

      

        <div id = "formation">
          <?php echo form_label(lang('formation'));?>
          <?php echo form_dropdown('formation',$formations, $defaut);?>
        </div>
        <br/>
        <div id = "nomsemestre">
          <?php $defaut = array('name'=>'nom',
                          'id'=>'nom',
                          'class' => 'form-control',
                          'placeholder'=>lang('th_semestre'),
                          'size'=>'50'
                          ); 
          ?>

          <?php echo form_label(lang('semestre'));?>
          <?php echo form_input($defaut);?>
        </div>
        <br/>
        <div id = "codeapogee">
          <?php $defaut = array('name'=>'apogee',
                          'id'=>'apogee',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_code_apogee'),
                          'size'=>'10'
                          ); 
          ?>

          <?php echo form_label(lang('code_apogee'));?>
          <?php echo form_input($defaut);?>
        </div>
        <br/>
        <div id = "anneesemestre">
          <?php $defaut = array('name'=>'annee',
                          'id'=>'annee',
                          'class' => 'form-control',
                          'placeholder'=>sprintf(lang('val_annee'),date('Y')),
                          'size'=>'10'
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
      <?php echo anchor("backoffice_ajout/ajoutersemestre",'<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('semestre_new').'</span>');?> 
    </div>
   
       <div class="panel-body">
        <div class="table-responsive">
         
          <table class="table table-bordered" >

            <caption>
            <h4><?php echo lang("semestre_list");?></h4>
            </caption>
            <thead>
              <tr>
                <th><?php echo lang("th_formation");?></th>
                <th><?php echo lang("th_semestre");?></th>
                <th><?php echo lang("val_code_apogee");?></th>
                <th><?php echo lang("th_annee");?></th>
                <th><?php echo lang("th_cm");?></th>
                <th><?php echo lang("th_td");?></th>
                <th><?php echo lang("th_tp");?></th>
                <th><?php echo lang("th_action");?></th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($semestre as $row): ?>
                <tr>
                   <td class="table_left"><?php echo $row->formation_niveau;?></td>
                   <td class="table_left"><?php echo $row->GMSEM_NOM;?></td>
                   <td class="table_left"><?php echo $row->GMSEM_CODE_APOGEE;?></td>
                   <td class="table_left"><?php echo $row->GMSEM_ANNEE;?></td>
                   <td class="table_left"><?php echo $row->GMSEM_NOMBRE_HEURES_CM;?></td>
                   <td class="table_left"><?php echo $row->GMSEM_NOMBRE_HEURES_TD;?></td>
                   <td class="table_left"><?php echo $row->GMSEM_NOMBRE_HEURES_TP;?></td>
                   <td>
                      <?php echo anchor('backoffice_modification/fichesemestre/'.$row->GMSEM_CODE, lang('details'));?>
                      <?php echo anchor('backoffice_modification/modifiersemestre/'.$row->GMSEM_CODE, lang('modify'));?>
                      <?php 
                        $attr = array(
                                      'onclick'=>'return confirmDialog();'
                                      );
                        echo anchor('backoffice_liste/deletesemestre/'.$row->GMSEM_CODE, lang('delete'),$attr);
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
            echo form_open('Backoffice_liste/listSemestre');
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