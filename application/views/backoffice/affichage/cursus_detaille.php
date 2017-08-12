<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').sprintf(lang('cursus_detaille_year_formation'),$formation, $annee);?></title>
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
          <?php echo lang('cursus_detaille') ;?>
        </h2>
      </div>
				<div class="panel-body">
			    	<div class="table-responsive">
					
					<?php 
					if(is_null($cursus_detail) or empty($cursus_detail))
					{
						echo sprintf(lang('no_cursus_by_year_formation'),$formation, $annee);
						echo form_open('backoffice_affichage/affichage_choix_cursus_detaille');
        				echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');
       					echo form_close();
					}
						else{
					?>


						<TABLE id="cursus_detail" border="1" class="table table-bordered">

							<CAPTION><EM><?php echo sprintf(lang('cursus_detail_year_formation'),$niveau, $formation, $annee-1, $annee);?></EM></CAPTION>
							<tr>
								<th style="background-color:#A2ED8B;color:#000000;" colspan='2' rowspan='2'><?php echo sprintf(lang('th_cursus'),$formation);?></th>

								<th style="background-color:#B6A2D7;color:#000000;" colspan='4'><?php echo lang('th_cours_contact');?></th>
								<th style="background-color:#B6A2D7;color:#000000;" colspan='2'></th>

								<th style="background-color:#A2ED8B;color:#000000;"  rowspan='2'><?php echo lang('th_rang');?></th>
								<th style="background-color:#A2ED8B;color:#000000;"  rowspan='2'><?php echo lang('statut_planifie');?></th>
								<th style="background-color:#A2ED8B;color:#000000;" rowspan='2'><?php echo lang('statut_realise');?></th>
								<th style="background-color:#A2ED8B;color:#000000;" rowspan='2'><?php echo lang('th_credit_ects');?></th>
								<th style="background-color:#A2ED8B;color:#000000;" ><?php echo lang('val_code_apogee');?></th>
								<th style="background-color:#A2ED8B;color:#000000;" rowspan='2'><?php echo lang('val_mode_eval');?></th>

								<th style="background-color:#A2ED8B;color:#000000;" colspan='3'><?php echo lang('th_professeur');?></th>

							</tr>
							
							<tr>
								<th style="background-color:#B6A2D7;color:#000000;"><?php echo lang('seance_type_cm');?></th>
								<th style="background-color:#B6A2D7;color:#000000;"><?php echo lang('seance_type_td');?></th>
								<th style="background-color:#B6A2D7;color:#000000;"><?php echo lang('seance_type_tp');?></th>
								<th style="background-color:#B6A2D7;color:#000000;"><?php echo lang('th_total');?></th>
								<th style="background-color:#B6A2D7;color:#000000;"><?php echo lang('th_equiv_td');?></th>
								<th style="background-color:#B6A2D7;color:#000000;"><?php echo lang('th_h_libres');?></th>

							    <th style="background-color:#A2ED8B;color:#000000;"><?php echo $formation;?></th>
							    <th style="background-color:#A2ED8B;color:#000000;"><?php echo lang('th_nom');?></th>
							    <th style="background-color:#A2ED8B;color:#000000;"><?php echo lang('th_entreprise');?></th>
							    <th style="background-color:#A2ED8B;color:#000000;"><?php echo lang('val_email');?></th>
							</tr>
							<?php $value_SEM = ""; $value_UE = ""; $value_MA = ""; $i=1; $index=0;?>
							<?php foreach($cursus_detail as $cursus): ?>
								<?php if($value_SEM!= $cursus->GMSEM_NOM){?>
									<tr>
										<th style="background-color:#89C5D1;color:#000000;" colspan='2'>
											<?php
												echo ($value_SEM <> $cursus->GMSEM_NOM) ? $cursus->GMSEM_NOM : ''; 
												
										    ?>
										</th>
										
										<th style="background-color:#89C5D1;color:#000000;"><?php echo $cursus->GMSEM_NOMBRE_HEURES_CM;?></th>
										<th style="background-color:#89C5D1;color:#000000;"><?php echo $cursus->GMSEM_NOMBRE_HEURES_TD;?></th>
										<th style="background-color:#89C5D1;color:#000000;"><?php echo $cursus->GMSEM_NOMBRE_HEURES_TP;?></th>
										<th style="background-color:#89C5D1;color:#000000;">
											<?php
												echo $cursus->GMSEM_NBH_TOTAL;
											?>
										</th>
										<th style="background-color:#89C5D1;color:#000000;"><?php echo $cursus->GMSEM_NOMBRE_HEURES_CM*1.5+$cursus->GMSEM_NOMBRE_HEURES_TD*1;?></th>
										<th style="background-color:#89C5D1;color:#000000;"><?php echo $cursus->GMSEM_NOMBRE_HEURES_LIBRES;?></th>
										<th style="background-color:#89C5D1;color:#000000;" colspan='3'></th>
										<th style="background-color:#89C5D1;color:#000000;"><?php echo $cursus->GMSEM_CREDIT_ECTS;?></th>
										<th style="background-color:#89C5D1;color:#000000;" colspan='5'></th>
									</tr>
								<?php }?>
								<?php if($value_UE!=$cursus->GMUE_DESCRIPTION){?>
									<tr>
										<th style="background-color:#FE9896;color:#000000;" colspan='18'>
											<?php
												$ue = explode(' ', $cursus->GMUE_NOM);
												if(is_null($cursus->GMUE_COORDINATEUR2) || empty($cursus->GMUE_COORDINATEUR2))
													echo ($value_UE <> $cursus->GMUE_DESCRIPTION) ? $ue[0].' : '.$cursus->GMUE_DESCRIPTION.sprintf(lang('coordinateur_1'), $cursus->GMUE_COORDINATEUR1) : ''; 
												else
													echo ($value_UE <> $cursus->GMUE_DESCRIPTION) ? $ue[0].' : '.$cursus->GMUE_DESCRIPTION.sprintf(lang('coordinateur_2'),$cursus->GMUE_COORDINATEUR1, $cursus->GMUE_COORDINATEUR2 ) : '';
												$value_UE = $cursus->GMUE_DESCRIPTION; 
										    ?>
										</th>
									</tr>
									<tr>
										<th style="background-color:#FE9896;color:#000000;" colspan='2'>
										</th>
										<th style="background-color:#FE9896;color:#000000;"><?php echo $cursus->GMUE_NOMBRE_HEURES_CM;?></th>
										<th style="background-color:#FE9896;color:#000000;"><?php echo $cursus->GMUE_NOMBRE_HEURES_TD;?></th>
										<th style="background-color:#FE9896;color:#000000;"><?php echo $cursus->GMUE_NOMBRE_HEURES_TP;?></th>
										<th style="background-color:#FE9896;color:#000000;">
											<?php
												echo $cursus->GMUE_NBH_TOTAL;
											?>
										</th>
										<th style="background-color:#FE9896;color:#000000;"><?php echo $cursus->GMUE_NOMBRE_HEURES_CM*1.5+$cursus->GMUE_NOMBRE_HEURES_TD*1;?></th>
										<th style="background-color:#FE9896;color:#000000;"><?php echo $cursus->GMUE_NOMBRE_HEURES_LIBRES;?></th>
										<th style="background-color:#FE9896;color:#000000;" colspan='3'></th>
										<th style="background-color:#FE9896;color:#000000;">
											<?php
												echo $cursus->GMUE_CREDIT_ECTS;
											?>
										</th>
										<th style="background-color:#FE9896;color:#000000;"><?php echo $cursus->GMUE_CODE_APOGEE;?></th>
										<th style="background-color:#FE9896;color:#000000;" colspan='4'></th>
									</tr>
								<?php }?>
								<?php if($value_MA!= $cursus->GMMA_NOM and !is_null($cursus->GMMA_NOM)){?>
									<?php $fin_matiere=1; ?>
									<tr>
										<th style="background-color:#FFFFFF;color:#000000;" colspan='18'>
											<?php
												echo ($value_MA<> $cursus->GMMA_NOM) ? 'MA'.$i.' : '.$cursus->GMMA_NOM.' '.sprintf(lang('th_resp_matiere'),$cursus->GMMA_NOM_RESPONSABLE) : ''; 
										    	$value_MA = $cursus->GMMA_NOM; 
										    ?>
										</th>
									</tr>
									
								<tr>
									<?php $i++;?>

								<?php }?>
								<?php if(!is_null($cursus->GMCO_NOM)){?>
								<tr>
									<td style="background-color:#FFFFFF;color:#000000;" colspan="2"><?php echo $cursus->GMCO_NOM; ?></td>
									<td style="background-color:#B6A2D7;color:#000000;"><?php echo $cursus->GMCO_HEURES_CM;?></td>
									<td style="background-color:#B6A2D7;color:#000000;"><?php echo $cursus->GMCO_HEURES_TD;?></td>
									<td style="background-color:#B6A2D7;color:#000000;"><?php echo $cursus->GMCO_HEURES_TP;?></td>
									<th style="background-color:#B6A2D7;color:#000000;">
										<?php
											echo $cursus->GMCO_NBH_TOTAL;
										?>
									</th>
									<th style="background-color:#B6A2D7;color:#000000;"><?php echo $cursus->GMCO_HEURES_CM*1.5+$cursus->GMCO_HEURES_TD*1;?></th>
									<td style="background-color:#B6A2D7;color:#000000;"><?php echo $cursus->GMCO_HEURES_LIBRES;?></td>
									<td style="background-color:#FFFFFF;color:#000000;"><?php echo $cursus->GMCO_RANG;?></td>
									<td style="background-color:#FFFFFF;color:#000000;">
										<?php
											if($cursus->GMCO_PLANIFIE==1)
												echo lang('yes');
											else
												echo lang('no');
										?>
									</td>
									<td style="background-color:#FFFFFF;color:#000000;">
										<?php
											if($cursus->GMCO_REALISE==1)
												echo lang('yes');
											else
												echo lang('no');
										?>
									</td>
									<td style="background-color:#FFFFFF;color:#000000;"></td>
									<td style="background-color:#FFFFFF;color:#000000;"><?php echo $cursus->GMMA_CODE_APOGEE;?></td>
									<td style="background-color:#FFFFFF;color:#000000;"><?php echo $cursus->GMCO_NOTATION;?></td>
									<td style="background-color:#FFFFFF;color:#000000;"><?php echo $cursus->GMCO_NOM_INTERVENANT;?></td>
									<td style="background-color:#FFFFFF;color:#000000;"><?php echo $cursus->GMIN_LIEU_TRAVAIL;?></td>
									<td style="background-color:#FFFFFF;color:#000000;"><?php echo $cursus->GMIN_EMAIL;?></td>
								</tr>
								<?php }?>
								<?php if($value_MA== $cursus->GMMA_NOM AND $value_MA!=$cursus_detail[$index+1]->GMMA_NOM){?>
									<tr>
										<th style="background-color:#FFFFFF;color:#000000;" colspan='2'><?php echo lang('th_total'); ?></th>
										<th style="background-color:#B6A2D7;color:#000000;"><?php echo $cursus->GMMA_NOMBRE_HEURES_CM;?></th>
										<th style="background-color:#B6A2D7;color:#000000;"><?php echo $cursus->GMMA_NOMBRE_HEURES_TD;?></th>
										<th style="background-color:#B6A2D7;color:#000000;"><?php echo $cursus->GMMA_NOMBRE_HEURES_TP;?></th>
										<th style="background-color:#B6A2D7;color:#000000;">
											<?php
												echo $cursus->GMCO_NBH_TOTAL;
											?>
										</th>
										<th style="background-color:#B6A2D7;color:#000000;"><?php echo $cursus->GMMA_NOMBRE_HEURES_CM*1.5+$cursus->GMMA_NOMBRE_HEURES_TD*1;?></th>
										<th style="background-color:#B6A2D7;color:#000000;"><?php echo $cursus->GMMA_NOMBRE_HEURES_LIBRES;?></th>
										
										<th style="background-color:#FFFFFF;color:#000000;" colspan='3'></th>
										<th style="background-color:#FFFFFF;color:#000000;"><?php echo $cursus->GMMA_CREDIT_ECTS; ?></th>
										<th style="background-color:#FFFFFF;color:#000000;" colspan='6'></th>
										</tr>
								<?php }?>
								<?php $value_SEM = $cursus->GMSEM_NOM; $index++;?>
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