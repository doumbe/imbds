<html>
	<head>
    <meta charset="utf-8">
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/site_mbds.css">
<script src="<?php echo base_url(); ?>js/jquery/jquery-ui-1.11.0.custom/external/jquery/jquery-1.11.1.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker/js/bootstrap-datepicker.js"></script>
    <link href=" <?php echo base_url(); ?>css/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>js/datepicker/css/datepicker.css">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/candidature_css.css">
    <title>
      <?php echo lang('candidature');?>
    </title>
    <script>
    $(function()
	  	{

    	var currentdate = new Date();

    	$("#GMET_DATE_NAISSANCE").datepicker({
		    format: 'yyyy-mm-dd',
		    startDate: currentdate
		});
    	
		//$('#GMET_DATE_NAISSANCE').datepicker('setDate',new Date());

		$("#DATE_ARRIVEE_FRANCE").datepicker({
		    format: 'yyyy-mm-dd',
		    startDate: currentdate
		});
		//alert("i'mhere "+currentdate);
		//$('#DATE_ARRIVEE_FRANCE').datepicker('setDate',currentdate);
		//
		//
		//
		//
		
	$('.div_hide').hide();

	$('#input_lieu_residence').change(function()
		{
			$(this).find("option").each(function()
			{
				$('#div_if_residence_' + this.value).hide();
			});
			
			$('#div_if_residence_' + this.value).show();

		});
	});
    </script>
  </head>

    <body><div id = 'page'>

      <div id = 'header'>
        <?php include("/header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/candidat_menu_gauche.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>

    	<div id="Message">
    		<h2>
    			<?php echo lang('candidat_dossier_inscription').' - '.lang('candidat_infos_base');?>
    		</h2>
    	</div>
<div>

<p><?php echo sprintf(lang('candidat_info_valid_infos_base'),$result['nom'],$result['prenom'],$result['formation'],$result['annee']); ?></p>
<br/>

<p><label><?php echo lang('form_candidat_login'); ?></label><?php echo $result['login']; ?></p>
<p><label><?php echo lang('form_candidat_password'); ?></label><?php echo $result['password']; ?></p>
 	
 	
</div>



  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


 	</body>
</html>

