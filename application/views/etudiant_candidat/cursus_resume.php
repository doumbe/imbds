<html>
  <head>
  	 <?php  include("/script_backoffice.php");?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/site_mbds.css">
<script src="<?php echo base_url(); ?>js/jquery/jquery-ui-1.11.0.custom/external/jquery/jquery-1.11.1.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker/js/bootstrap-datepicker.js"></script>
    <link href=" <?php echo base_url(); ?>css/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>js/datepicker/css/datepicker.css">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/candidature_css.css">
    <title> 
      <?php echo lang('candidature');?>
    </title>
  </head>
  <body>

<div id = 'page'>

      <div id = 'header'>
        <?php include("/header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>

          <?php include("/candidat_menu_gauche.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>
        	 <div id="message">
        <h2>
          <?php echo lang('cursus_resume') ;?>
        </h2>
        
      </div>
				<div class="panel-body">
			    	<div class="table-responsive">
					
					<?php 
					if(is_null($cursus_resume) or empty($cursus_resume))
					{
						echo sprintf(lang('no_cursus_by_year_formation'),$formation, $annee);
						echo form_open('candidat_c/affichage_choix_cursus_resume');
        				echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');
       					echo form_close();
					}
						else{
					?>
                       <h2 style="text-align: center;">Année <?php echo $annee ;echo "/"; echo $annee+1  ;?></h2>

						<TABLE id="cursus_resume" border="1" class="table table-bordered">

							<CAPTION><EM><?php echo sprintf(lang('cursus_resume_year_formation'),$formation, $annee);?></EM></CAPTION>
							<tr>
								<th style="background-color:#A8A8A8;color:#000000;"><?php echo sprintf(lang('th_cursus'),$formation);?></th>
								<th style="background-color:#A8A8A8;color:#000000;"><?php echo lang('th_nom_responsable');?></th>
							    <th style="background-color:#A8A8A8;color:#000000;"><?php echo lang('th_nb_spe');?></th>
							    <th style="background-color:#A8A8A8;color:#000000;"><?php echo lang('th_volume_heure');?></th>
							    <th style="background-color:#A8A8A8;color:#000000;"><?php echo lang('th_credit_ects');?></th>
							</tr>
							<?php $value_SEM = ""; $value_UE = ""; $value_MA = ""; $i=1;?>
							<?php foreach($cursus_resume as $cursus): ?>
								<?php if($value_SEM!= $cursus->GMSEM_NOM){?>
									<tr>
										<th style="background-color:#FBEF60;color:#000000;">
											<?php
												echo ($value_SEM <> $cursus->GMSEM_NOM) ? $cursus->GMSEM_NOM : ''; 
												
										    ?>
										</th>
									<td style="background-color:#FBEF60;color:#000000;"></td>
										<td style="background-color:#FBEF60;color:#000000;"></td>
										<td style="background-color:#FBEF60;color:#000000;">
											<?php
												echo $cursus->GMSEM_NBH_TOTAL;
											?>
										</td>
										<td style="background-color:#FBEF60;color:#000000;">
											<?php
												echo $cursus->GMSEM_CREDIT_ECTS;
											?>
										</td>
									</tr>
								<?php }?>
								<?php if($value_UE!=$cursus->GMUE_DESCRIPTION){?>
									<tr>
										<TH style="background-color:#A2ED8B;color:#000000;">
											<?php
												$ue = explode(' ', $cursus->GMUE_NOM);
												if(is_null($cursus->GMUE_COORDINATEUR2) || empty($cursus->GMUE_COORDINATEUR2))
													echo ($value_UE <> $cursus->GMUE_DESCRIPTION) ? $ue[0].' : '.$cursus->GMUE_DESCRIPTION.sprintf(lang('coordinateur_1'), $cursus->GMUE_COORDINATEUR1) : ''; 
												else
													echo ($value_UE <> $cursus->GMUE_DESCRIPTION) ? $ue[0].' : '.$cursus->GMUE_DESCRIPTION.sprintf(lang('coordinateur_2'),$cursus->GMUE_COORDINATEUR1, $cursus->GMUE_COORDINATEUR2 ) : '';
												$value_UE = $cursus->GMUE_DESCRIPTION; 
										    ?>
										</th>
										<td style="background-color:#A2ED8B;color:#000000;"></td>
										<td style="background-color:#A2ED8B;color:#000000;"></td>
										<td style="background-color:#A2ED8B;color:#000000;">
											<?php
												echo $cursus->GMUE_NBH_TOTAL;
											?>
										</td>
										<td style="background-color:#A2ED8B;color:#000000;">
											<?php
												echo $cursus->GMUE_CREDIT_ECTS;
											?>
										</td>
									</tr>
								<?php }?>
								<?php if($value_MA!= $cursus->GMMA_NOM and !is_null($cursus->GMMA_NOM)){?>
									<tr>
										<TH style="background-color:#FFFFFF;color:#000000;" >
											<?php
												echo ($value_MA<> $cursus->GMMA_NOM) ? 'MA'.$i.' : '.$cursus->GMMA_NOM : ''; 
										    	$value_MA = $cursus->GMMA_NOM; 
										    ?>
										</th>
										<td style="background-color:#FFFFFF;color:#000000;">
											<?php
												echo $cursus->GMIN_NOM.' '.$cursus->GMIN_PRENOM;
												if($cursus->GMIN_LIEU_TRAVAIL=="UNS")
													echo ' ('.$cursus->GMIN_LIEU_TRAVAIL.')';
											?>
										</td> 
										<td style="background-color:#FFFFFF;color:#000000;">
											<?php
												echo $cursus->GMMA_NOMBRE_SPECIALITE;
											?>
										</td> 
										<td style="background-color:#FFFFFF;color:#000000;">
											<?php
												echo $cursus->GMMA_NBH_TOTAL;
											?>
										</td> 
										<td style="background-color:#FFFFFF;color:#000000;"></td> 
									</tr>
									<?php $i++; ?>
								<?php }?>
								<?php $value_SEM = $cursus->GMSEM_NOM;?>
							<?php endforeach;?>
						</TABLE>

					<?php }?>
			<!--	<p>Pour plus d'informations cliquer<a href='/iMBDS/infosmbds.pdf'> ici.</a></p>
				-->	</div>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>