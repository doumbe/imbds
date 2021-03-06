<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('intervenant/script_intervenant.php');?>
    <title><?php echo "MBDS ".lang('gest_cours');?></title>
    <!--
    <script>
      function confirmDialog() {
        var mess = "<?php// print lang('confirm_delete_cours'); ?>";
        return confirm(mess);    
      }
  	</script>
  -->
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
            <h2><?php echo lang("cours_big_title");?></h2>
        </div>

    <div class ="recherche">

    <?php echo form_open('intervenant_list/rechercheCours');?>
    <?php echo form_fieldset(lang('search'));?>


    <div id = "ue">
        <?php echo form_label(lang('ue'));?>
        <?php echo form_dropdown('ue',$ues,$defaut);?>
    </div>
       <br/>
    <div id = "semestre">
       <?php echo form_label(lang('semestre'));?>
       <?php echo form_dropdown('semestre',$semestres,$defaut);?>
    </div>
       <br/>
    <div id = "matiere">
       <?php echo form_label(lang('matiere'));?>
        <?php echo form_dropdown('matiere',$matieres,$defaut);?>
    </div>
       <br/>
    <div id = "nomcours">
       <?php $defaut = array('name'=>'nom',
                   'id'=>'nom',
                   'class' => 'form-control',
                   'placeholder'=>lang('val_cours_title'),
                   'size'=>'50'
                    ); 
          ?>




          <?php echo form_label(lang('cours_title'));?>
          <?php echo form_input($defaut);?>
        </div>
        <br/>
        <div id = "anneecours">
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
 
       <div class="panel-body">
        <div class="table-responsive">
         
          <table class="table table-bordered" >



          	<caption>
            <h4><?php echo lang("cours_list");?></h4>
            </caption>
            <thead>
              <tr>
                <th><?php echo lang("th_semestre");?></th>
                <th><?php echo lang("th_ue");?></th>
                <th><?php echo lang("val_matiere");?></th>
                <th><?php echo lang("th_cours");?></th>
                <th><?php echo lang("th_rang");?></th>
                <th><?php echo lang("th_intervenant");?></th>
                <th><?php echo lang("th_cm");?></th>
                <th><?php echo lang("th_td");?></th>
                <th><?php echo lang("th_tp");?></th>
                <th><?php echo lang('th_action');?></th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($cours as $row): ?>
                <tr>
                	<td class="table_left"><?php echo $row->GMSEM_CODE_APOGEE;?></td>
                   <td class="table_left"><?php echo $row->GMUE_CODE_APOGEE;?></td>
                   <td class="table_left"><?php echo $row->GMMA_CODE_APOGEE;?></td>
                   <td class="table_left"><?php echo $row->GMCO_NOM;?></td>
                   <td class="table_left"><?php echo $row->GMCO_RANG;?></td>
                   <td class="table_left"><?php echo $row->intervenant;?></td>
                   <td class="table_left"><?php echo $row->GMCO_HEURES_CM;?></td>
                   <td class="table_left"><?php echo $row->GMCO_HEURES_TD;?></td>
                   <td class="table_left"><?php echo $row->GMCO_HEURES_TP;?></td>
                   <td>
                   	<?php echo anchor('intervenant_modification/ficheCours/'.$row->GMCO_CODE, lang('details'));?>
                
                  </td>
                </tr>
                
              <?php endforeach;?>

            </tbody>
          </table>
        </div>

         <?php 
          if(isset($link))
            echo $link;
          else
          {
            echo form_open('intervenant_list/listeCours');
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