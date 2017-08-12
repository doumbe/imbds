<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />

		<title><?php echo lang('acc_title');?></title>
		<?php $this->load->view('backoffice/script_backoffice.php');?>
	</head>
	<body>
	 <div id = 'page'>

      <div id = 'header'>
        <?php $this->load->view('backoffice/header.php'); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php $this->load->view('menu.php'); ?>

        <div id = 'content' class = 'narrowcolumn'>

        	<!--<?php// $this->load->view('accueil_menu_fiche.php');?>-->
        	<!--<?php// $this->load->view('/etudiant/etudiant_menu_fiche.php');?>-->
		
		<section>
			<h1><?php echo lang('acc_title');?></h1>
		</section>

	</div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
	</body>
</html>
