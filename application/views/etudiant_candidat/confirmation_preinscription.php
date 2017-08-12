<?php
if(  !( $this->session->userdata('username')and $this->session->userdata('etat_candidat')=='candidat'  )  )
 {    
   redirect('signup');
 } 
?>
<html>
	<head>
    <meta charset="utf-8">

  <?php  include("/script_backoffice.php");?>
<?php $this->load->view('backoffice/script_backoffice.php');?>
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

      $("#GMEM_DATE_EMBAUCHE").datepicker({
        format: 'yyyy-mm-dd',
        startDate: currentdate-1
    });
    $("#GMEM_DATE_FIN").datepicker({
        format: 'yyyy-mm-dd',
        startDate: currentdate
    });

  //alert($('tr').find('input[type=hidden][name="GMEM_ACTUEL"]').val());

  $('tbody[id^="info_emploi_"]').on('click','.a_delete_emploi',function(e)
  {
    e.preventDefault();
    var mess = "<?php print lang('confirm_delete_emploi'); ?>";
    if (confirm(mess)){
      $(this).parent('div').find('form').submit();
    }
    return false;
  });

   $('tbody[id^="info_emploi_"]').on('click','.a_modify_emploi',function(e)
  {
    e.preventDefault();
    //$(this).parents('tr').find('.sps_title').css( "background-color", "red" );
    var tr = $(this).parents('tbody');
    var valid = "<?php print lang('modify'); ?>";
    $('#GMEM_CODE').val(tr.find('.emploi_nom').find('span').text());
    $('#GMEM_FONCTION').val(tr.find('.emploi_fonction').text());
    $('#GMEM_NOM_ENTREPRISE').val(tr.find('.emploi_nom').text());
    $('#GMEM_TYPE_CONTRAT').val(tr.find('.emploi_type').text());
    $('#GMEM_DATE_EMBAUCHE').val(tr.find('.emploi_date_deb').text());
    //alert(tr.find('.emploi_date_fin').text());
    $('#GMEM_DATE_FIN').val(tr.find('.emploi_date_fin').text().replace(/[\s]+/g, ' '));
    $('#GMEM_SALAIRE_ANNUEL').val(tr.find('.emploi_salaire').text());
    $('#GMEM_EMAIL').val(tr.find('.emploi_email').text());
    $('#GMEM_TELEPHONE').val(tr.find('.emploi_telephone').text());
    $('#GMEM_ADRESSE').val(tr.find('.emploi_adresse').text());
    $('#GMEM_CODE_POSTAL').val(tr.find('.emploi_code_postal').text());
    $('#GMEM_VILLE').val(tr.find('.emploi_ville').text());
    $('#GMEM_PAYS').val(tr.find('.emploi_pays').text());
    $('#tr_add').find('input[type="submit"]').removeClass('btn-info');
    $('#tr_add').find('input[type="submit"]').addClass('btn-warning');
    $('#tr_add').find('input[type="submit"]').val(valid);
    $('#tr_add').find('input[type="submit"]').attr("name", 'modifier');
    $('#tr_add').find('input[type=hidden][name="GMEM_CODE"]').val(tr.find('.a_delete_emploi').attr('id'));
  // alert($('#tr_add').find('input[type=hidden][name="GMEM_CODE"]').attr('name'));
  });

});
    </script>
  </head>

    <body><div id = 'page'>

      <div id = 'header'>
        <?php include("header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/candidat_menu_gauche.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>

    	<div id="Message">
    		<h2>
    			<?php echo lang('Candidat_dossier_inscription').' - '.lang('candidat_emplois');?>
    		</h2>
    	</div>

    	
    <div  id="div_page_emploi" class="panel-body">
      <?php include("/deconnexion.php");?>
</br></br>
<?php if($avis_jury!='accepté'){    ?> </br><p style='color:#1B4F9C;'><?php
  echo "Vous n'etes pas encore autorisé a efféctué cette operation.";
}?> </p>
  <?php if($avis_jury=='accepté'and $confirmation=='1'){
     ?> </br><p style='color:#1B4F9C;'><?php echo "Vous avez confirmé votre préinscription.";?></p><?php
   }
    if($avis_jury=='accepté'and $confirmation=='0'){

             echo form_open ('candidat_c/confirmer_preinscription/') ;?>

<label for="schoolGroups" style="color:#1B4F9C;" >Confirmation  :</label>  
        <select name="schoolGroups" style=" border-radius: 7px;">
               <option value="" selected="selected">Non</option>
               <option value="oui">Oui</option>
       </select><br /><br />
            
<label for="contrat" style="color:#1B4F9C;"> Uploader le contrat d’inscription   </label>
<input type="file" name="contrat" style=" border-radius: 7px;"/>
<?php echo form_error('contrat','<span class="error" style="color :red;">','</span>') ;?><br /><br />


<label for="accord" style="color:#1B4F9C;">Uploader l’accord de confidentialité et propriété intellectuelle</label>
<input type="file" name="accord" style=" border-radius: 7px;" />
<?php echo form_error('accord','<span class="error" style="color :red;">','</span>') ;?><br />

</br></br>
<input type="submit" name='valider' value='Envoyer' style="background:#1B4F9C;color:white; border-radius: 7px;"/>
             
            <?php echo form_close(); }?> 
     
<?php //if($avis_jury!='accepté'){
//'vous n\'etes pas encore autorisé a effectué cette operation' ;
?>
   
</div>
</div>
	

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


 	</body>
</html>

    
