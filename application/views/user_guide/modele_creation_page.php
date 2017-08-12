<html>
	<head>
	  <title><?php echo $message;?></title>
	  <?php include("/../base_site/script_base_site.php");?>

	  <!--mettre ici des fichiers css ou des scripts liés à cette page-->

	</head>

	<body>
		<div id="page">
      		<div id="header"> 
        		<?php include("/../base_site/header_base_site.php");?>
      		</div>
      		<div id="contenu">
        		<?php include("/../base_site/menu_gauche_base_site.php");?>
        		<div id="content" class="narrowcolumn">
				
				<!--mettre ici le contenu de votre page dans une div avec l'identifiant de votre choix faisant parti de la classe post -->
					<div id="auchoix" class="post">
						<? php echo "Mettre ici le contenu de votre page dans une div avec l'identifiant de votre choix faisant parti de la classe post";?>
					</div>

        		</div>
        	</div>
        	<?php include("/../base_site/footer_base_site.php");?>
        </div>
	</body>
</html>