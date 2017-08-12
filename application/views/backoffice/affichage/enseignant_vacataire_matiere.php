<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').sprintf(lang('enseignant_vac_matiere_year_formation'),$formation, $annee);?></title>
    <script>
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
        <h2>
          <?php echo lang('enseignant_vac_matiere') ;?>
        </h2>
      </div>
				<div class="panel-body">
			    	<div class="table-responsive">
					
					<?php 
					if(is_null($enseignant_matiere) or empty($enseignant_matiere))
					{
						echo sprintf(lang('no_cursus_by_year_formation'),$formation, $annee);
						echo form_open('backoffice_affichage/affichage_choix_enseignant_vacataire_matiere');
        				echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');
       					echo form_close();
					}
						else{
					?>


						<TABLE id="enseignant_vac_matiere" border="1" class="table table-bordered">

							<CAPTION><EM><?php echo sprintf(lang('enseignant_vac_matiere_year_formation'),$formation, $annee);?></EM></CAPTION>
							<tr>
								<th style="background-color:#FBEF60;color:#000000;"><?php echo strtoupper(lang('th_nom')).' '.lang('th_prenom');?></th>
								<th style="background-color:#FBEF60;color:#000000;"><?php echo lang('val_fonction');?></th>
							    <th style="background-color:#FBEF60;color:#000000;"><?php echo lang('th_entreprise');?></th>
							    <th style="background-color:#FBEF60;color:#000000;"><?php echo lang('th_ue_code');?></th>
							    <th style="background-color:#FBEF60;color:#000000;"><?php echo lang('th_ue');?></th>
							    <th style="background-color:#FBEF60;color:#000000;"><?php echo lang('th_matiere_code');?></th>
							    <th style="background-color:#FBEF60;color:#000000;"><?php echo lang('val_matiere');?></th>
							    <th style="background-color:#FBEF60;color:#000000;"><?php echo lang('val_nb_h_cm');?></th>
							    <th style="background-color:#FBEF60;color:#000000;"><?php echo lang('val_nb_h_td');?></th>
							    <th style="background-color:#FBEF60;color:#000000;"><?php echo lang('val_nb_h_td');?></th>
							    <th style="background-color:#FBEF60;color:#000000;"><?php echo lang('th_nb_h_total');?></th>
							</tr>
							<?php $value_SEM = ""; $value_UE = ""; $value_MA = ""; $i=1;?>
							<?php foreach($enseignant_matiere as $en_ma): ?>
								<tr >
								<?php if($value_SEM!= $en_ma->GMIN_NOM.' '.$en_ma->GMIN_PRENOM){?>
									<td style="background-color:#A2ED8B;color:#000000;">
											<?php
												echo ($value_SEM <>  $en_ma->GMIN_NOM.' '.$en_ma->GMIN_PRENOM) ?  $en_ma->GMIN_NOM.' '.$en_ma->GMIN_PRENOM : ''; 
												
										    ?>
										</td>
									<td style="background-color:#A2ED8B;color:#000000;">
										<?php
											echo ($value_SEM <>  $en_ma->GMIN_NOM.' '.$en_ma->GMIN_PRENOM) ?  $en_ma->GMIN_PROFESSION : ''; 
												
										?>
									</td>
									<td style="background-color:#A2ED8B;color:#000000;"><?php echo $en_ma->GMIN_LIEU_TRAVAIL;?></td>
								<?php } else{?>
									<td></td>
									<td></td>
									<td></td>
								<?php }?>
									<td><?php echo $en_ma->GMUE_CODE_APOGEE;?></td>
									<td><?php echo $en_ma->GMUE_DESCRIPTION;?></td>
									<td><?php echo $en_ma->GMMA_CODE_APOGEE;?></td>
									<td><?php echo $en_ma->GMMA_NOM.' ('.$en_ma->GMCO_NOM.')';?></td>
									<td><?php echo $en_ma->GMCO_HEURES_CM;?></td>
									<td><?php echo $en_ma->GMCO_HEURES_TD;?></td>
									<td><?php echo $en_ma->GMCO_HEURES_TP;?></td>
									<td><?php echo $en_ma->GMMA_NBH_TOTAL;?></td>
									</tr>
								<?php $value_SEM =  $en_ma->GMIN_NOM.' '.$en_ma->GMIN_PRENOM; ?>
							<?php endforeach;?>
						</TABLE>

					<?php }?>
				
					</div>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>