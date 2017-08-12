<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').lang('gest_jury');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_jury'); ?>";
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

    <div class ="recherche">
    <!-- liste des entreprises-->
    <?php echo form_open('backoffice_liste/recherche_jury');?>
    <?php echo form_fieldset(lang('search'));?>

        <div id = "nomjury">
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
        <div id = "nommembrejury">
          <?php $defaut = array('name'=>'nom_membre',
                          'id'=>'annee',
                          'class' => 'form-control',
                          'placeholder'=>sprintf(lang('th_membres_jury'),date('Y')),
                          'size'=>'10'
                          ); 
          ?>

          <?php echo form_label(lang('membres_jury'));?>
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
      <?php echo anchor("backoffice_ajout/ajouterjury",'<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('jury_new').'</span>');?> 
    </div>
   
       <div class="panel-body">
        <div class="table-responsive">
         
          <table class="table table-bordered" >

            <caption>
            <h4><?php echo lang("jury_list");?></h4>
            </caption>
            <thead>
              <tr>
                <th><?php echo lang("val_description");?></th>
                <th><?php echo lang("th_membres_jury");?></th>
                <th><?php echo lang("val_statut");?></th>
                <th><?php echo lang("th_action");?></th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($jury as $row): ?>
                <tr>
                   <td class="table_left"><?php echo $row->GMJU_DESCRIPTION;?></td>
                   <td class="table_left"><?php echo $row->GMJU_DESCRIPTION;?></td>
                   <td>
                      <?php echo anchor('backoffice_modification/fiche_jury/'.$row->GMJU_CODE.'/'.$row->GMMJ_CODE, lang('details'));?>
                      <?php echo anchor('backoffice_modification/modifier_jury/'.$row->GMJU_CODE.'/'.$row->GMMJ_CODE, lang('modify'));?>
                      <?php 
                        $attr = array(
                                      'onclick'=>'return confirmDialog();'
                                      );
                        echo anchor('backoffice_liste/delete_jury/'.$row->GMJU_CODE.'/'.$row->GMMJ_CODE, lang('delete'),$attr);
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
            echo form_open('Backoffice_liste/listJury');
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