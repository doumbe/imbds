<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">	
	  <title><?php //echo lang('titre').' '.$etudiant->GMET_NOM.' '.$etudiant->GMET_PRENOM;?></title>
	   
	  <?php $this->load->view('/base_site/script_base_site.php');?>
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/etudiant_css.css">
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/ancien_css.css">
	  
		<?php $this->load->view('backoffice/script_backoffice.php');?>

		<style>
			[data-page="etudiant_login"] form {
				margin-left: 39px;
			}
		</style>
	 
	</head>
	<body>
		
		<div id = 'header'>
        <?php $this->load->view('backoffice/header.php'); ?>
      </div>	
		<div id="page">
      		<div id="contenu" data-page="etudiant_login">
        		<?php $this->load->view('menu.php'); ?>
        		<div id="content" class="narrowcolumn">

					<?php echo validation_errors(); ?>
					<?php echo form_open('etudiant_c/etudiant_connexion'); ?>
						<input type= "text" name="login" placeholder="Login" autofocus required>
						<input type="password" name="password" placeholder="Mot de Passe" required>
						<button type="submit">Se Connecter</button>
					</form>
				</div>
        	</div>
        	
        </div>			
	</body>
</html>

