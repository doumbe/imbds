<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').lang('gest_planning');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_planning'); ?>";
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
            <h2><?php echo lang("planning_title");?></h2>
        </div>

    <div class ="recherche">
    <!-- liste des entreprises-->
    <?php echo form_open('backoffice_liste/rechercheplanning');?>
    <?php echo form_fieldset(lang('search'));?>

      

        <div id = "antenne">
          <?php echo form_label(lang('antenne'));?>
          <?php echo form_dropdown('antenne',$antennes, $defaut);?>
        </div>
        <br/>
        <div id = "anneeplanning">
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
      <?php echo anchor("backoffice_ajout/ajouterplanning",'<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('planning_new').'</span>');?> 
    </div>
   
       <div class="panel-body">
        <div class="table-responsive">
         
          <table class="table table-bordered" >

            <caption>
            <h4><?php echo lang("planning_list");?></h4>
            </caption>
            <thead>
              <tr>
                <th><?php echo lang("th_nom");?></th>
                <th><?php echo lang("val_antenne");?></th>
                <th><?php echo lang("th_annee");?></th>
                <th><?php echo lang("th_nbh");?></th>
                <th><?php echo lang("th_action");?></th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($planning as $row): ?>
                <tr>
                   <td class="table_left"><?php echo $row->GMPL_NOM;?></td>
                   <td class="table_left"><?php echo $row->antenne;?></td>
                   <td class="table_left"><?php echo $row->GMPL_ANNEE;?></td>
                   <td class="table_left"><?php echo $row->GMPL_NOMBRE_HEURES;?></td>
                   <td>
                      <?php echo anchor('backoffice_modification/ficheplanning/'.$row->GMPL_CODE, lang('details'));?>
                      <?php echo anchor('backoffice_modification/modifierplanning/'.$row->GMPL_CODE, lang('modify'));?>
                      <?php 
                        $attr = array(
                                      'onclick'=>'return confirmDialog();'
                                      );
                        echo anchor('backoffice_liste/deleteplanning/'.$row->GMPL_CODE, lang('delete'),$attr);
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
            echo form_open('Backoffice_liste/listPlanning');
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