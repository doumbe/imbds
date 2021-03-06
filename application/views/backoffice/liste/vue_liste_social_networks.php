<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').lang('gest_social_networks');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_social_networks'); ?>";
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
            <h2><?php echo lang("social_networks_title");?></h2>
        </div>

    <div class ="recherche">
    <!-- liste des entreprises-->
    <?php echo form_open('backoffice_liste/recherche_social_networks');?>
    <?php echo form_fieldset(lang('search'));?>

        <div id = "nomsocial_networks">
          <?php $defaut = array('name'=>'social_network',
                          'id'=>'nom',
                          'class' => 'form-control',
                          'placeholder'=>lang('th_social_networks'),
                          'size'=>'50'
                          ); 
          ?>

          <?php echo form_label(lang('social_networks'));?>
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
      <?php echo anchor("backoffice_ajout/ajouterReseauSocial",'<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('social_networks_new').'</span>');?> 
    </div>
   
       <div class="panel-body">
        <div class="table-responsive">
         
         <?php if(!empty($social_networks)){ ?>

          <table class="table table-bordered" >

            <caption>
            <h4><?php echo lang("social_networks_list");?></h4>
            </caption>
            <thead>
              <tr>
                <th><?php echo lang("th_social_networks");?></th>
                <th class="table_center"><?php echo lang("th_logo");?></th>
                <th><?php echo lang("th_action");?></th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($social_networks as $row): ?>
                <tr>
                  <td class="table_left table_vertical_center"><?php echo $row->GMRS_NOM;?></td>
                   <td class="table_center">
                    <?php if(!empty($row->GMRS_LOGO)){?> 
                      <img class="th_logo" src="<?php echo base_url().$row->GMRS_LOGO;?>"  />
                    <?php }?>

                   </td>
                   <td class="table_vertical_center">
                      <?php echo anchor('backoffice_modification/fiche_social_networks/'.$row->GMRS_CODE, lang('details'));?>
                      <?php echo anchor('backoffice_modification/modifier_social_networks/'.$row->GMRS_CODE, lang('modify'));?>
                      <?php 
                        $attr = array(
                                      'onclick'=>'return confirmDialog();'
                                      );
                        echo anchor('backoffice_liste/delete_social_networks/'.$row->GMRS_CODE, lang('delete'),$attr);
                      ?>
                      
                  </td>
                </tr>
                
              <?php endforeach;?>

            </tbody>
          </table>
        </div>
        <?php }?>
        <div id="message_alerte">
          <?php if(empty($social_networks)){ echo lang('no_social_networks');}?>
        </div>
        <!-- /.table-responsive -->
        <?php 
          if(isset($link))
            echo $link;
          else
          {
            echo form_open('Backoffice_liste/list_social_networks');
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