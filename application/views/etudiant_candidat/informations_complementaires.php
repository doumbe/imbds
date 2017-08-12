<html>
	<head>
  <?php  include("/script_backoffice.php");?>
<?php $this->load->view('backoffice/script_backoffice.php');?>
    <meta charset="utf-8">
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/site_mbds.css">
<script src="<?php echo base_url(); ?>js/jquery/jquery-ui-1.11.0.custom/external/jquery/jquery-1.11.1.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker/js/bootstrap-datepicker.js"></script>
    <link href=" <?php echo base_url(); ?>css/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>js/datepicker/css/datepicker.css">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/candidature_cs.css">
    <title>
      <?php echo lang('candidature');?>
    </title>
    <script>
    $(function()
	  	{

    	var currentdate = new Date();

    	$("#GMSPS_DATE_DE_DEBUT").datepicker({            
		    format: 'yyyy-mm-dd',
		    startDate: currentdate-1
		});
		$("#GMSPS_DATE_DE_FIN").datepicker({
		    format: 'yyyy-mm-dd',
		    startDate: currentdate
		});
		
	/*$('.div_hide').hide();

	$('#input_lieu_residence').change(function()
		{
			$(this).find("option").each(function()
			{
				$('#div_if_residence_' + this.value).hide();
			});
			
			$('#div_if_residence_' + this.value).show();

		});
	*/
  $('tr[id^="info_sps_"]').on('click','.a_delete_sps',function(e)
  {
    e.preventDefault();
    var mess = "<?php print lang('confirm_delete_stage_projet'); ?>";
    if (confirm(mess)){
      $(this).parent('div').find('form').submit();
    }
    return false;
  });

   $('tr[id^="info_sps_"]').on('click','.a_modify_sps',function(e)
  {
    e.preventDefault();
    //$(this).parents('tr').find('.sps_title').css( "background-color", "red" );
    var tr = $(this).parents('tr');
    var valid = "<?php print lang('modify'); ?>";
    $('#GMSPS_TITRE').val(tr.find('.sps_title').text());
    $('#GMSPS_DESCRIPTION').val(tr.find('.sps_desc').text());
    $('#GMSPS_ENTREPRISE').val(tr.find('.sps_entreprise').text());
    $('#GMSPS_RESPONSABLE').val(tr.find('.sps_resp').text());
    $('#GMSPS_DATE_DE_DEBUT').val(tr.find('.sps_deb').text());
    $('#GMSPS_DATE_DE_FIN').val(tr.find('.sps_fin').text());
    $('#GMSPS_NATURE_STAGE').val(tr.find('.sps_nat').text());
    $('#GMSPS_TYPE').val(tr.find('.sps_type').text());
    $('#GMSPS_PAYS').val(tr.find('.sps_pays').text());
    $('#tr_add').find('input[type="submit"]').removeClass('btn-info');
    $('#tr_add').find('input[type="submit"]').addClass('btn-warning');
    $('#tr_add').find('input[type="submit"]').val(valid);
    $('#tr_add').find('input[type="submit"]').attr("name", 'modifier');
    $('#tr_add').find('input[type=hidden][name="GMSPS_CODE"]').val(tr.find('.a_delete_sps').attr('id'));
   // alert($('#tr_add').find('input[type=hidden][name="GMSPS_CODE"]').attr('name'));
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
    			<?php echo lang('Candidat_dossier_inscription').' - '.lang('candidat_stage_projet');?>
    		</h2>
    	</div>

  
    <div  id="div_fiche_condition">
      
 <div>
 <fieldset>
 <center><h3>Informations complémentaires  à la Fiche</h3> </center>
<center><h3>de candidature résumée </h3></center><br/>
<b>
Numéro de sécurité sociale en France :
</b><br/>
<input type="number" name="Numero_S_Social"  min="1000000000" max="10000000000000000000" value="" size="" />          
       <?php echo form_error('Numero_S_Social','<span class="error" style="color :red;  ">','</span>') ;?> <br /> 
<br/>  
<b>Votre numéro Campus France pour les étudiants postulant de l’étranger :
 </b><br/>
<input type="number" min="1" max="10000" name="Numero_campus_France" value="" size="50" />  
       <?php echo form_error('Numero_campus_France','<span class="error" style="color :red;  ">','</span>') ;?> <br />
 <br/>
<b>Sexe :</b>
<INPUT type="checkbox" name="choix1" value="1"> Homme
<INPUT type="checkbox" name="choix1" value="1"> Femme
  <br/>
<br/>

<b>Situation actuelle :</b>
                                   <INPUT type="checkbox" name="choix1" value="1">Étudiant(e)
                                   <INPUT type="checkbox" name="choix1" value="1"> Salarié(e)
                                   <INPUT type="checkbox" name="choix1" value="1">En recherche d'emploi<br/>
                                    <br/>
<b>Votre formation sera-t-elle financée :</b><br/><br/>
  <p>
    - Via le FONGECIF :<INPUT type="checkbox" name="choix1" value="1"> OUI  <INPUT type="checkbox" name="choix1" value="1">NON<br/>
  </p>
  <p>
    - Via un contrat de professionnalisation :<INPUT type="checkbox" name="choix1" value="1"> OUI   <INPUT type="checkbox" name="choix1" value="1"> NON<br/>
  </p>
  <p>
    - Via un contrat d’apprentissage           :<INPUT type="checkbox" name="choix1" value="1"> OUI   <INPUT type="checkbox" name="choix1" value="1"> NON<br/>
  </p>
<br/>

      <input type="submit" value="Suivant" align="center" /></br>

 </fieldset> 
 </div>
          

</div>
</div>
	

  </div><!--content-->
    </div><!--contenu-->

  </div>
<style>
input[type='checkbox']{
  width: 20px;
}
p{
  margin-left: 120px;
}
</style>
 	</body>
</html>

