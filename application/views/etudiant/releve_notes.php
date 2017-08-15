<html>
	<head>
	  <title><?php echo lang('titre').' '.$etudiant->GMET_NOM.' '.$etudiant->GMET_PRENOM;?></title>
	  <?php $this->load->view('/base_site/script_base_site.php');?>
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/etudiant_css.css">
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/ancien_css.css">
	  <script>
	  </script>
	  <script type="text/javascript">
		  var baseurl = "<?php print base_url(); ?>";
		  var etu_id = "<?php print $etudiant->GMET_CODE; ?>";
		</script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>js/studies.js"></script>
	</head>
	<body>
		<div id = 'header'>
	        <?php $this->load->view('backoffice/header.php'); ?>
	        <!-- <style>
	        	header h1 {
        		    display: inline-block;
				    vertical-align: bottom;
				    margin-bottom: 0px;
	        	}

	        	header img {
				    display: inline-block;
				    vertical-align: bottom;
				}
			</style> -->
	    </div>
		<div id="page">
      		<div id="contenu">

        		<?php $this->load->view('/etudiant/etudiant_menu_gauche.php');?>
        		<div id="content" class="narrowcolumn">

        			<select name="affichage_note">
        				<option value="UE" selected>Par UE</option>
        				<option value="Matiere">Par Matière</option>

        			</select>

        			


					<div id="detail_releve_notes" class="post">
						<TABLE border="1" id="tableNoteUE"
          summary="L'affichage des Notes de Etudiant par Unités d'Enseignement">
							<CAPTION><EM>L'affichage des Notes de Etudiant par Unités d'Enseignement</EM></CAPTION>
							<tr>
								<th></th>
								<th><?php echo lang('note_continu');?></th>
							    <th><?php echo lang('note_projet');?></th>
							    <th><?php echo lang('note_examen');?></th>
							    <th><?php echo lang('note_finale');?></th>
							    <th><?php echo lang('rang_final');?></th>
							</tr>
							<?php $value_SEM = ""; $value_UE = ""; $value_MA = ""; ?>
							<?php foreach($notes as $note): ?>
								<?php if($value_SEM!= $note->GMSEM_NOM){?>
									<tr>
										<th style="background-color:#254B92;color:#FFFFFF;" colspan=4>
											<?php
												echo ($value_SEM <> $note->GMSEM_NOM) ? $note->GMSEM_NOM : ''; 
												
										    ?>
										</th>
										<td style="background-color:#254B92;color:#FFFFFF;">
											<?php
											if($note->GMNOSE_NOTE_FINALE==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNOSE_NOTE_FINALE;
											?>
										</td>
										<td style="background-color:#254B92;color:#FFFFFF;">
											<?php
											if($note->GMNOSE_RANG_FINAL==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNOSE_RANG_FINAL;
										?>
										</td>
									</tr>
								<?php }?>
								<?php if($value_UE!=$note->GMUE_DESCRIPTION){?>
									<tr>
										<TH style="background-color:#46B1D5;color:#000000;">
											<?php
												echo ($value_UE <> $note->GMUE_DESCRIPTION) ? $note->GMUE_DESCRIPTION : ''; 
												$value_UE = $note->GMUE_DESCRIPTION; 
										    ?>
										</th>
										<td style="background-color:#46B1D5;color:#000000;">
											<?php
											if($note->GMNOUE_NOTE_1==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNOUE_NOTE_1;
											?>
										</td>
										<td style="background-color:#46B1D5;color:#000000;">
											<?php
											if($note->GMNOUE_NOTE_2==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNOUE_NOTE_2;
											?>
										</td>
										<td style="background-color:#46B1D5;color:#000000;">
											<?php
											if($note->GMNOUE_NOTE_3==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNOUE_NOTE_3;
											?>
										</td>
										<td style="background-color:#46B1D5;color:#000000;">
											<?php
											if($note->GMNOUE_NOTE_FINALE==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNOUE_NOTE_FINALE;
											?>
										</td>
										<td style="background-color:#46B1D5;color:#000000;">
											<?php
											if($note->GMNOUE_RANG_FINAL==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNOUE_RANG_FINAL;
											?>
										</td>
									</tr>
								<?php }?>
								<?php if($value_MA!= $note->GMMA_NOM and !is_null($note->GMMA_NOM)){?>
									<tr>
										<TH style="background-color:#ACFBF7;color:#000000;" colspan=4>
											<?php
												echo ($value_MA<> $note->GMMA_NOM) ? $note->GMMA_NOM : ''; 
										    	$value_MA = $note->GMMA_NOM; 
										    ?>
										</th>
										<td style="background-color:#ACFBF7;color:#000000;">
											<?php
											if($note->GMNOMA_NOTE_FINALE==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNOMA_NOTE_FINALE;
										?>
										</td> 
										<td style="background-color:#ACFBF7;color:#000000;">
											<?php
											if($note->GMNOMA_RANG_FINAL==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNOMA_RANG_FINAL;
											?>
										</td> 
									</tr>
								<?php }?>
								<?php if(!is_null($note->GMCO_NOM)){?>
								<tr>
									<TH><?php echo $note->GMCO_NOM; ?></th>
									<td>
										<?php
											if($note->GMNO_CONTROLE_CONTINU==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNO_CONTROLE_CONTINU;
										?>
									</td>
									<td>
										<?php
											if($note->GMNO_PROJET==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNO_PROJET;
										?>
									</td>
									<td>
										<?php
											if($note->GMNO_EXAMEN==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNO_EXAMEN;
										?>
									</td>
									<td>
										<?php
											if($note->GMNO_FINALE==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNO_FINALE;
										?>
									</td>
									<td>
										<?php
											if($note->GMNO_RANG==-1)
												echo '<span style="color:transparent;">NR</span>';
											else
												echo $note->GMNO_RANG;
										?>
									</td>
								</tr>
								<?php }?>
								<?php $value_SEM = $note->GMSEM_NOM;?>
							<?php endforeach;?>
						</TABLE>

						<style>

							select{
								margin-top: 20px;
							}
							
							#tableMatiereNote{
								margin-top: 50px;
							}
						</style>


						<TABLE border="1" id="tableMatiereNote"
          summary="L'affichage des Notes de Etudiant par Unités d'Enseignement">
							<CAPTION><EM>L'affichage des Notes de Etudiant par Matière</EM></CAPTION>
							<tr>
								<th>Code APOGEE</th>
								<th>Code de la Matière</th>
								<th>Nom de la Matière</th>
								<th>Note Final</th>
							</tr>
							<?php foreach($notes_matieres as $nm): ?>
								<tr>
									<td><?= $nm->gmma_code_apogee ?></td>
									<td><?= $nm->gmue_code ?></td>
									<td><?= $nm->gmma_nom ?></td>
									<td><?= $nm->gmnoma_note_finale ?></td>									

								</tr>
							<?php endforeach;?>
						</TABLE>

						<script>
        				
	        				var affichage=document.getElementsByName('affichage_note')[0];
	        				var tableNoteUE=document.getElementById('tableNoteUE');
	        				var tableMatiereNote=document.getElementById('tableMatiereNote');

	        				function changerTable() {
	        					if (affichage.value=="UE"){
	        						tableNoteUE.style.display="table";
	        						tableMatiereNote.style.display="none";

	        					}else if(affichage.value=="Matiere"){
	        						tableNoteUE.style.display="none";
	        						tableMatiereNote.style.display="table";
	        					}
	        				}

	        				changerTable();

	        				affichage.onchange=changerTable;

	        			</script>
							
					</div>
				</div>
			</div>
		</div>
	</body>
</html>