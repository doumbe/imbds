<?php
if(  !( $this->session->userdata('username')and $this->session->userdata('etat_candidat')=='candidat'  )  )
 {    
   redirect('signup');
 } 
?>
<html>
  <head>

  <?php  include("/script_backoffice.php");?>
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
  </head>

    <body><div id = 'page'>

      <div id = 'header' style='height:130px;'>
        <?php include("/header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/candidat_menu_gauche.php"); ?>


        <div id = 'content' class = 'narrowcolumn'>

      <div id="Message">
        <h2>
          <?php echo lang('candidat_demande_attestation_preinscription');?>

        </h2>
     
      </div>
  <div id="button_deco" style="margin-top:25px;margin-right:20px;width:200PX;float:right;">  
    <?php include("/deconnexion.php");?></div>

<div class="fiche" >

 
  <div id="div_fiche_condition" >



  </br></br></br></br><p><?php 
  if($avis_jury!='accepté')
    { 
      echo "Vous n'etes pas encore autorisé a efféctué cette demande !! 
    (votre demande de préinscription n'est pas encore acceptée)";  }
   
  if($avis_jury=='accepté' and $etat_demande=='0'
  ) {?> </p>

  <?php echo form_open ('candidat_c/demande_attestation_preinscription/');?>
   
       <fieldset style="width:800px;border:outset">
         
       <label for="S1" style="width:255px;">Souhaitez- vous obtenir une attestation de préinscription :</label>
        
<br />  <input name="S1" value="" id="non" checked="checked" type="radio">Non
 
       <input name="S1" value="oui" id="oui"  type="radio">Oui
<br /><br /><br />

      
  
      <label for="S2" style="width:255px;">Souhaitez-vous recevoir ce document en version électronique :</label>
         
<br />           
        <input name="S2" value="non" id="non" checked="checked" type="radio">Non
        <input name="S2" value="oui" id="oui" type="radio">Oui

        <br /><br /><br 

   <input  type="number" name="Numero_du_visa" value="<?php echo set_value('Numero_du_visa'); ?>" size="50" /> 
      
        
      <label for="S3" style="width:255px;"> Souhaitez-vous recevoir ce document en version papier :</label>
      <br />

        <input name="S3" value="non" id="non" checked="checked" type="radio">Non
               <input name="S3" value="oui" id="oui"  type="radio">Oui



       <br />  <br />


<input type="submit" name='Valider' value='Valider' style="background:#1B4F9C;color:white; border-radius: 10px;"/>
       
             
            <?php echo form_close(); ?> 

<?php 
}
?>
<?php if($avis_jury=='accepté' and $etat_demande=='1')
  //and $demande_attestation=='1')
{ echo 'Vous avez effectue une demande d\'attestation de préinscription.';
}
?>

    </div>

</div>

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


  </body>
</html>



