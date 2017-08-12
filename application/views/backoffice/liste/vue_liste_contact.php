<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').lang('gest_contacts');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_contact'); ?>";
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
        <?php $this->load->view('backoffice//menu.php'); ?>

        <div id = 'content' class = 'narrowcolumn'>
          <div id="message">
            <h2><?php echo lang("contact_title");?></h2>
        </div>

          <div class ="recherche">
          <!-- liste des entreprises-->
            <?php echo form_open('backoffice_liste/rechercheContact');?>
            <?php echo form_fieldset(lang('search'));?>
            
            <div id = "entreprisecontact">
              <?php echo form_label(lang('entreprise'));?>
              <?php echo form_dropdown('entreprise',$entreprises, $defaut);?>
            </div> <!--entreprise-->
            <br/>
            <div id = "nomcontact">
              <?php $defaut = array('name'=>'nom',
                          'placeholder'=>lang('contact_name'),
                          'id'=>'nom',
                          'class' => 'form-control',
                          'size'=>'50'
                          ); 
              ?>

              <?php echo form_label(lang('contact_name_2'));?>
              <?php echo form_input($defaut);?>
            </div> <!-- nomcontact-->
            <br/>
            <div class = "bouton_recherche">
             <?php  $bouton = array('name' =>'recherche',
                                    'value' => lang('search'),
                                    'class' =>"btn btn-primary");?>
              <?php echo form_submit($bouton);?>
            </div>  <!--bouton_recherche-->
          
            <?php echo form_fieldset_close();?>
            <?php echo form_close();?>
          </div> <!-- recherche-->

          <br/><br/>

          <div class ="ajout_element">
            <?php echo anchor('backoffice_ajout/ajouterContact','<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('contact_new').'</span>');?>
          </div><!--ajout_element-->

          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered liste_table" >

              <caption>
                <h4><?php echo lang("contact_list");?></h4>
              </caption>

              <thead>

                <tr>
                  <th><?php echo lang('th_nom');?></th>
                  <th><?php echo lang('th_prenom');?></th>
                  <th><?php echo lang('th_entreprise');?></th>
                  <th><?php echo lang('th_action');?></th>
               </tr>

            </thead>

            <tbody>
               <?php foreach ($contact as $row): ?>

                  <tr>
                    <td class="table_left"><?php echo $row->GMCON_NOM;?></td>
                    <td class="table_left"><?php echo $row->GMCON_PRENOM;?></td>
                    <td class="table_left"><?php echo $row->GMEN_NOM;?></td>
                    <td>
                      <?php echo anchor('backoffice_modification/fichePersonnelle/'.$row->GMCON_CODE, lang('details'));?>
                      <?php echo anchor('backoffice_modification/modifierContact/'.$row->GMCON_CODE,lang('modify'));?>
                      <?php 
                        $attr = array(
                                      'onclick'=>'return confirmDialog();'
                                      );
                        echo anchor('backoffice_liste/deleteContact/'.$row->GMCON_CODE,lang('delete'),$attr);?>
                        <!--<span class="glyphicon glyphicon-trash"  aria-hidden="true"></span>-->
                    </td>
                  </tr>
                
              <?php endforeach;?>

            </tbody>

            </table>
          </div><!-- /.table-responsive -->
        
           <?php 
          if(isset($link))
            echo $link;
          else
          {
            echo form_open('Backoffice_liste/listeContact');
            echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');
            echo form_close();
          }
        ?>
        </div><!-- /.panel-body -->
      
      </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
  </body>
</html>