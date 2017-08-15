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

        			
        			


						<TABLE border="1" id="tableMatiereNote"
          summary="L'affichage des Notes de Etudiant par Unités d'Enseignement">
							<CAPTION><EM>L'affichage des Notes de Etudiant par Matière</EM></CAPTION>
							<tr>
								<th>UE</th>
								<th>Matière</th>
								<th>Excusé</th>
								<th>Date</th>
								<th>Tranche Horaire</th>
							</tr>
							<?php foreach($absence as $a): ?>
								<tr>
									<td><?= $a->gmue_code ?></td>
									<td><?= $a->gmma_nom ?></td>
									<td><?= $a->gmpre_statut ?></td>
									<td><?= $a->gmsea_date ?></td>
									<td><?= $a->gmsea_heure_debut.' - '.$a->gmsea_heure_fin ?></td>
									
								
						

								</tr>
							<?php endforeach;?>
						</TABLE>

						
							
					</div>
				</div>
			</div>
		</div>
	</body>
</html>