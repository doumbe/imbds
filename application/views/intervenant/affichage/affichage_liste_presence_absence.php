<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('intervenant/script_intervenant.php');?>
    <title><?php echo "MBDS ".lang('gest_cours');?></title>


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
            <h2>
              <?php echo lang('liste_presences_absences');?>
            </h2>
          </div>

          <div class="panel-body">
              <div class="table-responsive">
            
            <?php 
            if(is_null($etudiant) or empty($etudiant))
            {
              echo sprintf(lang('no_study_by_seance_formation'),$cours, $annee);
              echo form_open('intervenant_affichage/affichage_choix_liste_presences_absences');
                  echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');
                  echo form_close();
            }
              else{
            ?>



              <TABLE id="enseignant_per_matiere" border="1" class="table table-bordered">

              <CAPTION><EM><?php echo sprintf(lang('etudiant_per_matiere_year_formation'),$cours, $annee);?></EM></CAPTION>
              <tr>
                  <th style="background-color:#A2ED8B;color:#000000;" colspan='14'><?php echo $cours;?></th>
              </tr>

              <tr>
                <th style="background-color:#FBEF60;color:#000000;" colspan='2' ><?php echo strtoupper(lang('th_nom'));?></th>
                <th style="background-color:#FBEF60;color:#000000;" colspan='2' ><?php echo strtoupper(lang('th_prenom'));?></th>
                <th style="background-color:#FBEF60;color:#000000;" colspan='2' ><?php echo strtoupper(lang('th_statut'));?></th>
                <th style="background-color:#FBEF60;color:#000000;" colspan='2' ><?php echo lang('th_modification');?></th>


                
              </tr>
               


               <?php foreach($etudiant as $row): ?>
              <td class="table_left table_vertical_center" colspan='2'><?php echo $row->GMET_NOM;?></td>
              <td class="table_left table_vertical_center" colspan='2'><?php echo $row->GMET_PRENOM;?></td>
            <!-- <td class="table_left table_vertical_center" colspan='2'><?php// echo form_dropdown('statut',$statut);?></td>  affiche la liste deroulante -->
             <td class="table_left table_vertical_center" colspan='2'><?php echo $row->GMPRE_STATUT;?></td>
             <td class="table_vertical_center">
                      <?php echo anchor('intervenant_modification/modifier_statut_etudiant/'.$row->GMET_CODE, lang('modify'));?>
              </td>


              </tr>

             
              <?php endforeach;?>

          



            </TABLE>
            


           <!-- <?php/* echo form_open('intervenant_modification/modifier_statut_presence_absence_etudiant');?>
            <?php  $bouton = array('name' =>'modify',
                                    'value' =>lang('modify'),
                                    'class' =>"btn btn-primary");?>
         <center><?php echo form_submit($bouton);?></p></center>
         <?php echo form_close();*/?>-->
            <?php }?>
          
        
          </div>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>