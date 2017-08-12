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
        REMPLIR LE FORMULAIRE CI-DESSUS 
        </h2>
      </div>
<div class="fiche">

<!--<p><?php echo var_dump($candidat); ?></p>
<br/>
-->

  <div id="div_fiche_condition">
     <form >
    <fieldset>
       <legend>Informations personnelles</legend>
       <label for="nom" >Nom :</label><input type="text" id="nom" size="50" /><br />
       <label for="Prenom" >Prenom :</label><input type="text" name="passconf" value="" size="50" /><br />  
       <label for="sexe" >Sexe :</label>  <select name="Sexe" id="pays">
               <option value="france">Masculin</option>
               <option value="espagne">Féminin</option>
             </select>
             <br/>
           <br/>
       <label for="Date de naissance">Date de naissance :</label><input type="text" name="Date de naissance" value="" size="50" /> <br />       <label for="Email">Email :</label><input type="text" name="Email" value="" size="50" />        <br />
       <label for="Code postal">Code postal :</label><input type="text" name="Code postal" value="" size="50" />   <br />          
       <label for="Téléphone">Téléphone :</label><input type="text" name="Téléphone" value="" size="50" />     <br /> 
       <label for="Code postal">Code postal :</label><input type="text" name="Code postal" value="" size="50" />   <br />          
       <label for="Ville">Ville :</label><input type="text" name="Ville" value="" size="50" />   <br />          

       <label for="Pays">Pays :</label><input type="text" name="Pays" value="" size="50" />     <br /  >         
       <label for="Nationalite">Nationalité :</label><input type="text" name="Nationalité" value="" size="50" /> <br />                 
       
       <label for="Dernier diplome obtenu">Dernier diplome obtenu :</label><input type="text" name="Dernier diplome obtenu" value="" size="50"/><br />
<label for="nom" >Nom :</label><input type="text" id="nom" size="50" /><br />
       <label for="Prenom" >Prenom :</label><input type="text" name="passconf" value="" size="50" /><br />  
       <label for="sexe" >Sexe :</label>  <select name="Sexe" id="pays">
               <option value="france">Masculin</option>
               <option value="espagne">Féminin</option>
             </select>
             <br/>
           <br/>
       <label for="Date de naissance">Date de naissance :</label><input type="text" name="Date de naissance" value="" size="50" /> <br />       <label for="Email">Email :</label><input type="text" name="Email" value="" size="50" />        <br />
       <label for="Code postal">Code postal :</label><input type="text" name="Code postal" value="" size="50" />   <br />          
       <label for="Téléphone">Téléphone :</label><input type="tel" name="Téléphone" value="" size="50" />     <br /> 
       <label for="Code postal">Code postal :</label><input type="text" name="Code postal" value="" size="50" />   <br />          
       <label for="Ville">Ville :</label><input type="text" name="Ville" value="" size="50" />   <br />          

       <label for="Pays">Pays :</label><input type="text" name="Pays" value="" size="50" />     <br /  >         
       <label for="Nationalite">Nationalité :</label><input type="text" name="Nationalité" value="" size="50" /> <br />                 
       
       <label for="Dernier diplome obtenu">Dernier diplome obtenu :</label><input type="text" name="Dernier diplome obtenu" value="" size="50"/><br />
       <br />               

     <input type="submit" value="Submit" align="center" />
     </fieldset>
</form> 
    </div>

</div>

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
  </body>
</html>



