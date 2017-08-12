<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('intervenant/script_intervenant.php');?>
    <title><?php echo "MBDS ".lang('gestion_planning');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_seance'); ?>";
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
             <h2><?php echo lang("planning_title");?></h2>
          </div>

           <?php echo form_open('intervenant_list/listSeance');?>
            <div class ="choix">  
                  <?php echo form_label(lang('planning'));?>
                  <?php echo form_dropdown('planning',$plannings);?>
               
                  <?php  $bouton = array('name' =>'selection',
                                          'value' =>lang('select'),
                                          'class' =>"btn btn-primary");?>
                  <?php echo form_submit($bouton);?>
            </div>  
            
          <?php echo form_close();?>
          <br/>
<?php if(isset($seance) && !is_null($seance) && !empty($seance)){?>

    <div class ="recherche">
    <!-- liste des entreprises-->
    <?php echo form_open('intervenant_list/rechercheseance');?>
    <?php echo form_fieldset(lang('search'));?>

        <div id = "nomcours">
          <?php $defaut = array('name'=>'cours',
                          'id'=>'cours',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_cours_title'),
                          'size'=>'50'
                          ); 
          ?>
          <?php echo form_label(lang('cours'));?>
          <?php echo form_input($defaut);?>
           <?php echo form_hidden('selected_planning',$selected_planning_code);?>
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
<!--
    <br/><br/>
    <div class ="ajout_element">
      <?php// echo anchor("backoffice_ajout/ajouterseance",'<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('seance_new').'</span>');?> 
    </div>
   -->
       <div class="panel-body">
        <div class="table-responsive">
         
          <table class="table table-bordered" id="tab_seance">

            <caption>
            <h4><?php echo lang('planning').' '.$selected_planning_nom.' - '.lang('annee').' '.$selected_planning_annee;?></h4>
            </caption>
            <thead>
              <tr>
                <th><?php echo lang("th_jour");?></th>
                <th><?php echo lang("th_date");?></th>
                <th><?php echo lang("th_heure_deb");?></th>
                <th><?php echo lang("th_heure_fin");?></th>
                <th><?php echo lang("val_statut");?></th>
                <th><?php echo lang("val_matiere");?></th>
                <th><?php echo lang("th_cours");?></th>
                <th><?php echo lang("th_infos_comp");?></th>
                <th><?php echo lang("th_salle");?></th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($seance as $row): ?>
                

                <tr>
                   <td class="table_left"><?php echo $row->GMSEA_JOUR;?></td>
                   <td class="table_left"><?php echo $row->GMSEA_DATE;?></td>
                   <td class="table_left"><?php echo $row->GMSEA_HEURE_DEBUT;?></td>
                   <td class="table_left"><?php echo $row->GMSEA_HEURE_FIN;?></td>
                   <td class="table_left"><?php echo $row->GMSEA_STATUT;?></td>
                   <td class="table_left"><?php echo $row->GMMA_CODE_APOGEE;?></td>
                   <td class="table_left"><?php echo $row->GMCO_NOM;?></td>
                   <td class="table_left"><?php echo $row->GMSEA_INFOS_COMPLEMENTAIRES;?></td>
                   <td class="table_left"><?php echo $row->GMSA_NOM;?></td>
                   <!--
                   <td>
                      <?php/* echo anchor('backoffice_modification/ficheseance/'.$row->GMSEA_CODE, lang('details'));?>
                      <?php echo anchor('backoffice_modification/modifierseance/'.$row->GMSEA_CODE, lang('modify'));?>
                      <?php 
                        $attr = array(
                                      'onclick'=>'return confirmDialog();'
                                      );
                        echo anchor('backoffice_liste/deleteseance/'.$row->GMSEA_CODE, lang('delete'),$attr);*/
                      ?>
                      
                  </td>
                -->
                </tr>
                
              <?php endforeach;?>

            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
        <?php echo $link;?>

      </div>
      <!-- /.panel-body -->
<?php }?>

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