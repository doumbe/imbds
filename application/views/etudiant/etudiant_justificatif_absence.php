<html>
	<head>
	  <title><?php echo lang('titre').' '.$etudiant->GMET_NOM.' '.$etudiant->GMET_PRENOM;?></title>
	  <?php include("/../base_site/script_base_site.php");?>
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/etudiant_css.css">
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/ancien_css.css">
	   	
	  
	</head>
	<body>
		<div id="page">
      		<div id="contenu">
        		<?php include("/../etudiant/etudiant_menu_gauche.php");?>
        		<div id="content" class="narrowcolumn">
					<div id="detail_ancien_content" class="post">
						<div id="menu_ancien">
													
						</div>
						<div id="err">
							<?= (isset($error))?$error:''?>
						</div>
						<div id="hidden_values">

					<!-- multipart = upload de fichier  -->
							
						<?php
							echo form_open_multipart("etudiant_c/deposer_justificatif_absence/$etudiant->GMET_CODE");
							echo form_hidden('GMET_CODE',$etudiant->GMET_CODE)
						?>
							<input type="text" name="seance" placeholder="GMSEA14008"><br>
							<input type="text" name="excuse_absence" placeholder="maladie"><br>
							<input type="file" name="justificatif_absence"><br>
							<button type="submit">Valider</button>


						<?php
							echo form_close();
						?>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
