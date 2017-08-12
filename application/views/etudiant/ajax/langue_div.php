<table class="table table-bordered" >
								<thead>
									<tr>
										<th><?php echo lang('langue');?></th>
										<th><?php echo lang('lu');?></th>
										<th><?php echo lang('ecrit');?></th>
										<th><?php echo lang('parle');?></th>
										<th><?php echo lang('nom_certification');?></th>
										<th><?php echo lang('note_certification');?></th>
										<th class="right"><?php echo lang('action');?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$es=0;
									foreach ($langues as $langue):?>
										<?php $es++;?>
										<tr id = "info_langue_<?php echo $es; ?>" name="<?php echo $langue->GMLA_CODE;?>">
											<td>
												<?php if(!is_null($langue->GMLA_DRAPEAU)){ ?>
												<img class="logo_langue" src="<?php echo base_url().$langue->GMLA_DRAPEAU; ?>"/>
												<?php } ?>
												<?php echo '<span class="el_lang">'.$langue->GMLA_LANGUE.'</span>';?>
											</td>
											<td class="el_lu"><?php echo $langue->GMEL_LU;?></td>
											<td class="el_ecrit"><?php echo $langue->GMEL_ECRIT;?></td>
											<td class="el_parle"><?php echo $langue->GMEL_PARLE;?></td>
											<td class="el_nom"><?php echo $langue->GMEL_CERTIFICATION_NOM;?></td>
											<td class="el_note"><?php echo $langue->GMEL_CERTIFICATION_NOTE;?></td>
											<td>
												<span>
										<?php
											$edit_langue = array(
											 					'class' => 'link a_edit_langue',
											 					'title' => sprintf(lang('editlangue'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM, $langue->GMLA_LANGUE)
											 				);
											echo anchor("etudiant_c/form_edit_langue",'<span class="glyphicon glyphicon-pencil pencil_langue"></span>',$edit_langue);
											$delet_langue = array(
											 					'class' => 'link a_delete_langue',
											 					'title' => sprintf(lang('deletelangue'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM, $langue->GMLA_LANGUE)
											 				);
											echo anchor("etudiant_c/delete_langue",'<span class="glyphicon glyphicon-trash trash_langue"></span>',$delet_langue);
										?>
									</span>
											</td>
										</tr>
									<?php endforeach;?>
								</tbody>
								</table>