<?php
if(  !( $this->session->userdata('username') and $this->session->userdata('etat_candidat')=='ancien'  )  )
{
   redirect('signup/ancien_etudiant');
 } 
?>
<html>
	<head>
		<?php $this->load->view('backoffice/script_backoffice.php');?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
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
          <?php $this->load->view('menu.php'); ?>
       
        <div id = 'content' class = 'narrowcolumn'>


    	<div id="Message">
    		<h2>
    			<?php echo sprintf(lang('candidat_infos_resume'),$candidat->GMET_NOM,$candidat->GMET_PRENOM);?>
    		</h2>
    	</div>
    	  <div id="button_deco" style="margin-top:25px;margin-right:20px;width:200PX;float:right;">  
    	   <?php include("/deconnexion.php");?></div>


<div class="fiche">

     
 
 <div class="btn-group div_buttons_validation_form" role="group">
      
    </div>






</div>



  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


 	</body>
</html>

