<html>
  <head>
    <?php  include("/script_backoffice.php");?>
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

      <div id = 'header'>
        <?php include("/header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/candidat_menu_gauche.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>

      <div id="Message">
        <h2>
          <?php //echo lang('candidat_title_condition');?>
        DEPOSER DOSSIER DE CANDIDATURE 
     
        </h2>
     
      </div>
<div class="fiche">

<!--<p><?php echo var_dump($candidat); ?></p>
<br/>
-->

  <div id="div_fiche_condition">
  
        <h2>Etape 2 :</h2><br/>
<p>(*) : champs obligatoire </p>
         <?php echo form_open ('candidat_c/candidat_upload_document') ;?>
<fieldset>
    <legend>Votre dossier personnel </legend>
     <label for="c_i">Photo copie de la carte d'identité * :</label>
     <input type="file" name="c_i" id="icone" />
       <?php echo form_error('c_i','<span class="error" style="color :red;  ">','</span>') ;?>

     <br />
     <label for="cv">CV (en Francais ) * :</label>
     <input type="file" name="cv" id="icone" />
       <?php echo form_error('cv','<span class="error" style="color :red;  ">','</span>') ;?>

     <br />
     <label for="dt">Le dossier télécharger * :</label>
     <input type="file" name="dt" id="icone" />
       <?php echo form_error('dt','<span class="error" style="color :red;  ">','</span>') ;?>

     <br />
     <label for="lr_1">Lettre de recommandation * :</label>
     <input type="file" name="lr_1" id="icone" />
       <?php echo form_error('lr_1','<span class="error" style="color :red;  ">','</span>') ;?>

     <br />

</fieldset>
<fieldset>
    <legend>Vos relevés de notes</legend>

     <label for="rns_1">Relevé de note du Semestre 1* :</label>
     <input type="file" name="rns_1" id="icone" />
       <?php echo form_error('rns_1','<span class="error" style="color :red;  ">','</span>') ;?>

     <br />
     <label for="rns_2">Relevé de note du Semestre 2 * :</label>
     <input type="file" name="rns_2" id="icone" /><br />
     <label for="rns_3">Relevé de note du Semestre 3 * :</label>
     <input type="file" name="rns_3" id="icone" /><br />
     <label for="rns_4">Relevé de note du Semestre 4 * :</label>
     <input type="file" name="rns_4" id="icone" />
       <?php echo form_error('rns_4','<span class="error" style="color :red;  ">','</span>') ;?>

     <br />
     <label for="rns_5">Relevé de note du Semestre 5 * :</label>
     <input type="file" name="rns_5" id="icone" /><br />
     <label for="rns_6">Relevé de note du Semestre 6 * :</label>
     <input type="file" name="rns_6" id="icone" /><br />
     <label for="statut_act" >Sélectionner votre statut actuel * :</label> 
        <select name="statut_act" id="pays">
               <option value="M1_enCours">Etudiant en master 1 (en cours)</option>
               <option value="M1_aquise">Diplômé d'un master 1 </option>
               <option value="M2_enCours">Etudiant en master 2 (en cours)</option>
               <option value="M2_aquis">Diplômé d'un master 2</option>
       </select>
       <br/><br/> <br/> 
     <label for="rns1m">Relevé de note du Semestre 1 du Master * :</label>
     <input type="file" name="rns1m" id="icone" />
       <?php echo form_error('rns_1m','<span class="error" style="color :red;  ">','</span>') ;?>

     <br /><br />
     <label for="rns2m">Relevé de note du Semestre 2 du Master </label>
     <input type="file" name="rns2m" id="icone" />
       <?php echo form_error('rns_2m','<span class="error" style="color :red;  ">','</span>') ;?>

     <br /><br />  
     <label for="rns3m">Relevé de note du Semestre 3 du Master </label>
     <input type="file" name="rns3m" id="icone" />
       <?php echo form_error('rns_3m','<span class="error" style="color :red;  ">','</span>') ;?>

     <br /><br />  
     <label for="rns4m">Relevé de note du Semestre 4 du Master </label>
     <input type="file" name="rns4m" id="icone" />
       <?php echo form_error('rns_4m','<span class="error" style="color :red;  ">','</span>') ;?>

     <br /><br />

 </fieldset>  
 
  <fieldset>
    <legend>Vos Diplômes</legend>   
    
  
    <label for="bac">Diplôme du Bac * : </label>
     <input type="file" name="bac" id="icone" />

       <?php echo form_error('bac','<span class="error" style="color :red;  ">','</span>') ;?>

     <br />  
    
     <label for="dl">Diplôme de Licence * :</label>
     <input type="file" name="dl" id="icone" />
       <?php echo form_error('dl','<span class="error" style="color :red;  ">','</span>') ;?>

     <br />
    
     <label for="dm">Diplôme du Master </label>
     <input type="file" name="dm" id="icone" /><br />
  
     <input type="submit" name="submit" value="Envoyer" />
</fieldset>
<?php echo form_close() ?>

    </div>

</div>

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


  </body>
</html>



