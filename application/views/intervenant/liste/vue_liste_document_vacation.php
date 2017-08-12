<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('intervenant/script_intervenant.php');?>
    <title><?php echo "MBDS ".lang('gest_cours');?></title>
    <script type="text/javascript">
    function confirmDialog(){
      var mess = "<?php print lang('confirm_delete_document_modele'); ?>";
      return confirm(mess);
    }
    </script>


  </head>

   <body>

    <div id = 'page'>

      <div id = 'header'>
        <?php $this->load->view('intervenant/header.php'); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php $this->load->view('intervenant/menu.php');?>
       
        <div id = 'content' class = 'narrowcolumn'>
          
          <div id="message">
            <h2><?php echo lang("depot_document_vacation_title");?></h2>
        </div>

    <div class ="recherche">
    <?php echo form_open('intervenant_list/recherche_document_vacation');?>
    <?php echo form_fieldset(lang('search'));?>

    <div id = "nomdocument_modele">
          <?php $defaut = array('name'=>'nom',
                          'id'=>'nom',
                          'class' => 'form-control',
                          'placeholder'=>lang('th_nom'),
                          'size'=>'50'
                          ); 
          ?>


          <?php echo form_label(lang('nom'));?>
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
      <?php echo anchor("intervenant_ajout/ajouter_document_vacation",'<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('document_vacation_new').'</span>');?> 
    </div>
    <br/>
    <div class ="ajout_element">
      <?php echo anchor("http://unice.fr/universite/travailler-a-luniversite/heures-complementaires",'<span class="btn btn-danger">'.lang('document_vacation_upload').'</span>');?> 
    </div>

    <div class="panel-body">
    	<div class="table-responsive">

    		<?php if(!empty($document_attache)){?>
    		<table class="table table-bordered">

    			<caption>
            <h4><?php echo lang("document_vacation_list");?></h4>
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
                foreach ($document_attache as $row): ?>
                <?php if($row->GMDA_TYPE == "VACATION" or $row->GMDA_TYPE == "vacation"){?>
                <tr>
                  <td class="table_left table_vertical_center"><?php echo $row->GMDA_ANNEE;?></td>
                   <td class="table_left table_vertical_center"><?php echo $row->GMDA_NOM;?></td>
                   <td class="table_left table_vertical_center"><?php echo $row->GMDA_TYPE;?></td>
                   <td class="table_center">
                    <?php if(!is_null($row->GMDA_DOCUMENT)){?>
                          <a target="_blank" href="<?php echo base_url().$row->GMDA_DOCUMENT;?>">
                            
                            <?php if($row->GMDA_FORMAT=="zip" or $row->GMDA_FORMAT=="rar"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/rar.png';?>"  />
                            <!--<?php }?>
                            <?php if($row->GMDA_FORMAT=="word" or $row->GMDA_FORMAT=="doc"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/word.png';?>"  />
                            <?php }?>
                            <?php if($row->GMDA_FORMAT=="excel" or $row->GMDA_FORMAT=="xls"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/excel.png';?>"  />
                            <?php }?>
                            <?php if($row->GMDA_FORMAT=="powerpoint" or $row->GMDA_FORMAT=="ppt"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/ppt.png';?>"  />
                            <?php }?>
                            <?php if($row->GMDA_FORMAT=="texte" or $row->GMDA_FORMAT=="txt"){?>
                              <img class="th_logo" src="<?php echo base_url().'images/logo/txt.png';?>"  />
                            <?php }?>-->
                          </a>

                    <?php }?>
                   </td>
                   <td class="table_vertical_center">
                      <?php echo anchor('intervenant_modification/fiche_document_vacation/'.$row->GMDA_CODE, lang('details'));?>
                      <?php echo anchor('intervenant_modification/modifier_document_vacation/'.$row->GMDA_CODE, lang('modify'));?>
                      <?php 
                        $attr = array(
                                      'onclick'=>'return confirmDialog();'
                                      );
                        echo anchor('intervenant_list/delete_document_vacation/'.$row->GMDA_CODE, lang('delete'),$attr);
                      ?>
                      
                  </td>
                </tr>
                <?php } ?>
              <?php endforeach;?>

            </tbody>
          </table>
        </div>
    	<?php } ?>
    	<div id="message_alerte">
          <?php if(empty($document_attache)){ echo lang('no_document_vacation');}?>
        </div>
        <!-- /.table-responsive -->
        <?php 
          if(isset($link))
            echo $link;
          else
          {
            echo form_open('intervenant_list/list_document_vacation');
            echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');
            echo form_close();
          }
        ?>
      </div>


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




