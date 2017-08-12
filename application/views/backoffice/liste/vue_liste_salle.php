<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').lang('gest_salle');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_salle'); ?>";
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
            <h2><?php echo lang("salle_title");?></h2>
        </div>

    <div class ="recherche">
    <!-- liste des entreprises-->
    <?php echo form_open('backoffice_liste/recherchesalle');?>
    <?php echo form_fieldset(lang('search'));?>

        <div id = "nomsalle">
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
        <div id = "lieusalle">
          <?php $defaut = array('name'=>'lieu',
                          'id'=>'lieu',
                          'class' => 'form-control',
                          'placeholder'=>lang('th_lieu'),
                          'size'=>'10'
                          ); 
          ?>

          <?php echo form_label(lang('lieu'));?>
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
      <?php echo anchor("backoffice_ajout/ajoutersalle",'<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('salle_new').'</span>');?> 
    </div>
   
       <div class="panel-body">
        <div class="table-responsive">
         
          <table class="table table-bordered" >

            <caption>
            <h4><?php echo lang("salle_list");?></h4>
            </caption>
            <thead>
              <tr>
                <th><?php echo lang("th_nom");?></th>
                <th><?php echo lang("th_lieu");?></th>
                <th><?php echo lang("th_capacite");?></th>
                <th><?php echo lang("th_action");?></th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($salle as $row): ?>
                <tr>
                   <td class="table_left"><?php echo $row->GMSA_NOM;?></td>
                   <td class="table_left"><?php echo $row->GMSA_LIEU;?></td>
                   <td class="table_left"><?php echo $row->GMSA_CAPACITE;?></td>
                   <td>
                      <?php echo anchor('backoffice_modification/fichesalle/'.$row->GMSA_CODE, lang('details'));?>
                      <?php echo anchor('backoffice_modification/modifiersalle/'.$row->GMSA_CODE, lang('modify'));?>
                      <?php 
                        $attr = array(
                                      'onclick'=>'return confirmDialog();'
                                      );
                        echo anchor('backoffice_liste/deletesalle/'.$row->GMSA_CODE, lang('delete'),$attr);
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
            echo form_open('Backoffice_liste/listSalle');
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