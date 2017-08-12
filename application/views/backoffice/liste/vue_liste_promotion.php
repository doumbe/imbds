<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('backoffice/script_backoffice.php');?>
	<title><?php echo lang('mbds_back').lang('gest_promotion');?></title>
	<script>
	function confirmDialog(){
		var mess = "<?php print lang(confirm_delete_promotion'); ?>";
		return confirm(mess);
	}
	</script>
</head>
<body>
	<div id = 'page'>

		<div id = 'header'>
			<?php $this->load->view('backoffice/header.php'); ?>
		</div>

		<div id = 'contenu'>
			<?php $this->load->view('backoffice/menu.php'); ?>

			<div id = "message">
				<h2><?php echo lang("promotion_title"); ?></h2>
			</div>

			<?php if(isset(link))
					echo $link;
				  else
				  {
				  	echo form_open('Backoffice_liste/list_Promotion');
				  	echo form_submit('retour', lang('return'), 'class="btn-danger return_button"');
				  	echo form_close();
				  }
				  ?>
				</div>

				<?php 
				$erreur = $this->session->flashdata('error');
				if(! empty('erreur')){
					echo "<script> alert('".$erreur."'); </script>";
				}
				?>
		</div>
	</div> <!--page-->
</body>
</html>

