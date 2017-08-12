<html>
	<head>
		<title></title>
		
		
				

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/intervenant_css.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ancien_css.css">
		
	</head>


<body>
<?php $this->load->view('intervenant/script_intervenant.php');?>
<?php $this->load->view('intervenant/header.php'); ?>

	<div id="page">
		<div id="contenu">
			<?php $this->load->view('/intervenant/menu.php');?>
			<div id="content" class="narrowcolumn">
				<div id="detail_ancien_content" class="post">
					<div id="menu_ancien">
					
					</div>


					<div id="hidden_values">
						<?php
							echo form_open('');
							echo form_hidden('GMIN_CODE', $id);
							echo form_close();
						?>
					</div>
					<h2 class="title"><?php echo lang('titre').' '.$intervenant->GMIN_NOM.' '.$intervenant->GMIN_PRENOM; ?></h2>					
					<div class="entry" id="content_intervenant">
						<?php if(!empty($message)){ ?>
						<div id="message" class="alert alert-danger">
							<?php echo $message; ?>
						</div>
						<?php } ?>
						<div id="info_gen_photo">
							<div id = "info_general" class="info_ancien">
								<?php
								echo '<p><span class="label">'.lang('nom'). '</span>'.$intervenant->GMIN_NOM.'</p>';
								echo '<p><span class="label">'.lang('prenom').'</span>'.$intervenant->GMIN_PRENOM.'</p>';
								echo '<p><span class="label">'.lang('email').'</span>'.$intervenant->GMIN_EMAIL. '</p>';
								echo '<p><span class="label">'.lang('adresse').'</span>' .$intervenant->GMIN_ADRESSE. '</p>';
								echo '<p><span class="label">'.lang('code_postal').'</span>' .$intervenant->GMIN_CODE_POSTAL. '</p>';
								echo '<p><span class="label">'.lang('ville').'</span>' .$intervenant->GMIN_VILLE. '</p>';
								echo '<p><span class="label">'.lang('pays').'</span>' .$intervenant->GMIN_PAYS. '</p>';

								?>
							</div>
							<!--
							<div id = "info_photo" class="info_ancien">
							    <p><img class="photo" src="<?php// echo base_url().$etudiant->GMET_PHOTO; ?>" /></p>
							    <p><a id="change_photo" href="#"><?php// echo lang('modifier');?></a></p>
							</div>
						-->
						</div>



						<div id="info_file_social">
								<div id = "info_files" class="info_ancien">
									<?php  echo '<a href="#" class="plus_add" id="plus_div_file"><span class="glyphicon glyphicon-plus"></span></a>';?>
									<?php if (empty($files))
										{
											echo  sprintf(lang('nofile'),$intervenant->GMIN_NOM,$intervenant->GMIN_PRENOM);
										}
										else{ 
									?>
									<?php $i=0; $j=0; $k=0;?>
									<?php foreach ($files as $file):?>
									<?php if ($file->GMDA_STATUT=='actif')
										{
											$i++;
										}

										if ($file->GMDA_STATUT=='desactive')
										{
											$j++;
										}
										$k++;
									?>

									<?php echo form_open();?>
										<div class="div_info_files">
											<span>
												<?php 
													$target = array(
																	'class' => 'link',
																	'target' => '_blank',
																	'title' => $file->GMDA_NOM.' '.$file->GMDA_LANGUE.' ('.$file->GMDA_STATUT.')'
																	);
													echo anchor(base_url().$file->GMDA_DOCUMENT, '<img class="logo_sns" src="'.base_url().'images/logo/pdf.png"/>',$target);
												?>
											</span>
											<span>
												<?php
													$delet = array(
													 					'id' => 'a_delete'.$k,
													 					'class' => 'link a_link_file',
													 					'title' => sprintf(lang('deletefile'),$file->GMDA_LANGUE,$intervenant->GMIN_NOM,$intervenant->GMIN_PRENOM)
													 				);
													echo anchor("intervenant_c/delete_file",'<span class="glyphicon glyphicon-trash trash"></span>',$delet);
												?>
											</span>
											<span class="action_link">
												<?php 
													echo form_hidden('GMDA_CODE',$file->GMDA_CODE);
													
													if($file->GMDA_STATUT=="actif")
													{
													 	$desac = array(
													 					'id' => 'a_desactivate',
													 					'class' => 'link a_link_file',
													 					'title' => lang('desactive')
													 				);
														echo anchor("intervenant_c/desactivate_file",'<span class="glyphicon glyphicon-eye-close closed_eye_file"></span>',$desac);
													}
													else
													{
														$act = array(
													 					'id' => 'a_activate',
													 					'class' => 'link a_link_file',
													 					'title' => lang('actif')
													 				);
														echo anchor("intervenant_c/activate_file",'<span class="glyphicon glyphicon-eye-open opened_eye_file"></span>',$act);
													}
												?>
											</span>
											</div>
											<?php echo form_close();?>
									<?php endforeach;?>
									<p id="link_all_activate">
										<?php
											if($i>0)
											{
												$all_des = array(
												 					'id' => 'a_all_desactivate',
												 					'class' => 'link a_link_file'
												 				);
												echo anchor("intervenant_c/desactivate_all_files",lang('desactivateallfiles'),$all_des);
											}
											else if ($j>0)
											{
												$all_act = array(
												 					'id' => 'a_all_activate',
												 					'class' => 'link a_link_file'
												 				);
												echo anchor("intervenant_c/activate_all_files",lang('activateallfiles'),$all_act);
											}
										}
										?>
									</p>
								</div>
							</div>
						

						</div>
					</div>
<!--
							<div id = "info_photo" class="info_ancien">
								    <p><img class="photo" src="<?php// echo base_url().$intervenant->GMIN_PHOTO; ?>" /></p>
								    <p><a id="change_photo" href="#"><?php// echo lang('modifier');?></a></p>
							</div>
							-->




							<div id="info_coordonnees">
								<div id="info_coordonnees_1" class="info_ancien">
									<?php 
									echo '<p><span class="label">'.lang('portable').'</span>'.$intervenant->GMIN_TEL.'</p>';
									echo '<p><span class="label">'.lang('telephone_personnel').'</span>'.$intervenant->GMIN_TEL_PRO.'</p>';
									echo '<p><span class="label">'.lang('fax').'</span><span class="capital">'.$intervenant->GMIN_FAX.'</span></p>';
								?>
								</div>
								<div id = "info_coordonnees_2" class="info_ancien">
									<?php
									echo '<p><span class="label">'.lang('dernier_diplome').'</span>'.$intervenant->GMIN_DERNIER_DIPLOME.'</p>';
									echo '<p><span class="label">'.lang('statut').'</span>'.$intervenant->GMIN_STATUT.'</p>';
									echo '<p><span class="label">'.lang('profession').'</span>'.$intervenant->GMIN_PROFESSION.'</p>';
									echo '<p><span class="label">'.lang('lieu_de_travail').'</span>'.$intervenant->GMIN_LIEU_TRAVAIL.'</p>';
									?>
								</div>
							</div>

							<div id="div_file" class="div_hide">
								<?php
									echo '<p><a href="#" class="close" id="close_div_file"><span class="glyphicon glyphicon-remove"></span></a></p>';
							        echo form_open_multipart('intervenant_c/add_file');
							        $Fdata = array(
							     					'name' => 'GMDA_DOCUMENT',
							     					'class' => 'file form-control',
							     					'id' => 'GMDA_DOCUMENT'
							     				); 
							        echo form_hidden('GMIN_CODE',$intervenant->GMIN_CODE);
							        $name_cv =array(
							        				'name' => 'GMDA_NOM',
							        				'readonly' => 'readonly',
							        				'class' => 'form-control',
							        				'value' => lang('cv')
							        	);
							        $lab = array('class' => 'label');
							        echo '<p>'.form_label(lang('th_nom'),'GMDA_NOM',$lab).'</p>';
							        echo '<p>'.form_input($name_cv).'</p>';
							        $language ='id="select_langue" class="form-control"';
							        echo '<p>'.form_label(lang('langue'),'GMDA_LANGUE',$lab).'</p>';
                					echo '<p>'.form_dropdown('GMDA_LANGUE',$langue_cv,'',$language).'</p>';
                					echo '<p>'.form_label(lang('file'),'GMDA_DOCUMENT',$lab).'</p>';
							        echo '<p>'.form_upload($Fdata).'</p>'; 
							        echo '<p>'.form_submit('mysubmit', lang('add_file'),'class="btn btn-info submit_file"').'</p>'; 
							        echo form_close();
								?>
							</div>

					</div>
				</div>
			</div>

		</div>
	</div>

	</body>

</html>

