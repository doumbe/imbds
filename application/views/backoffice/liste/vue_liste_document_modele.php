<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').lang('gest_document_modele');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_document_modele'); ?>";
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
            <h2><?php echo lang("document_modele_title");?></h2>
        </div>

    <div class ="recherche">
    <!-- liste des entreprises-->
    <?php echo form_open('backoffice_liste/recherche_document_modele');?>
    <?php echo form_fieldset(lang('search'));?>

        <div id = "nomdocument_modele">
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
        <div id = "anneedocument_modele">
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
      <?php echo anchor("backoffice_ajout/ajouter_document_modele",'<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('document_modele_new').'</span>');?> 
    </div>
   
       <div class="panel-body">
        <div class="table-responsive">
         
         <?php if(!empty($document_modele)){ ?>

          <table class="table table-bordered" >

            <caption>
            <h4><?php echo lang("document_modele_list");?></h4>
            </caption>
            <thead>
              <tr>
                <th><?php echo lang("th_annee");?></th>
                <th><?php echo lang("th_nom");?></th>
                <th><?php echo lang("th_type");?></th>
                <th class="table_center"><?php echo lang("th_document");?></th>
                <th><?php echo lang("th_action");?></th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($document_modele as $row): ?>
                <tr>
                  <td class="table_left table_vertical_center"><?php echo $row->GMDM_ANNEE;?></td>
                   <td class="table_left table_vertical_center"><?php echo $row->GMDM_NOM;?></td>
                   <td class="table_left table_vertical_center"><?php echo $row->GMDM_TYPE;?></td>
                   <td class="table_center">
                    <?php if(!is_null($row->GMDM_DOCUMENT)){?>
                          <a target="_blank" href="<?php echo base_url().$row->GMDM_DOCUMENT;?>">
                            <?php if($row->GMDM_FORMAT=="pdf"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/pdf.png';?>"  />
                            <?php }?>
                            <?php if($row->GMDM_FORMAT=="word" or $row->GMDM_FORMAT=="doc"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/word.png';?>"  />
                            <?php }?>
                            <?php if($row->GMDM_FORMAT=="excel" or $row->GMDM_FORMAT=="xls"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/excel.png';?>"  />
                            <?php }?>
                            <?php if($row->GMDM_FORMAT=="powerpoint" or $row->GMDM_FORMAT=="ppt"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/ppt.png';?>"  />
                            <?php }?>
                            <?php if($row->GMDM_FORMAT=="texte" or $row->GMDM_FORMAT=="txt"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/txt.png';?>"  />
                            <?php }?>
                          </a>
                    <?php }?>
                   </td>
                   <td class="table_vertical_center">
                      <?php echo anchor('backoffice_modification/fiche_document_modele/'.$row->GMDM_CODE, lang('details'));?>
                      <?php echo anchor('backoffice_modification/modifier_document_modele/'.$row->GMDM_CODE, lang('modify'));?>
                      <?php 
                        $attr = array(
                                      'onclick'=>'return confirmDialog();'
                                      );
                        echo anchor('backoffice_liste/delete_document_modele/'.$row->GMDM_CODE, lang('delete'),$attr);
                      ?>
                      
                  </td>
                </tr>
                
              <?php endforeach;?>

            </tbody>
          </table>
        </div>
        <?php }?>
        <div id="message_alerte">
          <?php if(empty($document_modele)){ echo lang('no_document_modele');}?>
        </div>
        <!-- /.table-responsive -->
        <?php 
          if(isset($link))
            echo $link;
          else
          {
            echo form_open('Backoffice_liste/list_document_modele');
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