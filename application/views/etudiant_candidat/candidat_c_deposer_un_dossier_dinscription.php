<html>
  <head>
    

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src= "<?php echo base_url() ?>js/bootstrap.min.js"></script>
    
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src= "<?php echo base_url() ?>js/datepicker-fr.js"></script>
    <script src= "<?php echo base_url() ?>js/menu_gauche_backoffice.js"></script> 

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

  <div id="div_fiche_condition">

    <h2>Etape 1: Informations personnelles</h2><br/>
     <?php echo form_open('candidat_c/recrutement'); ?>
    <fieldset>
       
      <p>* Champs obligatoire<p>
           <label for="Resident_en_france"  >Résident en france  :</label>  <select name="Resident_en_france" id="pays">
               <option value="1">Oui</option>
               <option value="0">Non</option>recretement
             </select>
             <br/><br/>
      <label for="Formation_principal" >Formation principal :</label>
             <select name="Formation_principal" >
               <option value="M2MBDS">M2MBDS</option>
               <option value="MIAGE2MBDS">MIAGE2MBDS</option>
             </select>
       <br /> </br>
       <label for="Civilite" >Civilité :</label>
  <select name="Civilite" >
               <option value="Monsieur">Monsieur</option>
               <option value="Madame">Madame</option>
             </select>
       <br />
       <br />
       <label for="Nom" >Nom :</label>
       <input type="text" name="Nom" size="50" />
       <?php echo form_error('Nom','<span class="error" style="color :red;  ">','</span>') ;?>

       <br />
       <label for="Prenom" >Prenom :</label>
       <input type="text" name="Prenom" value="" size="50" />
       <?php echo form_error('Prenom','<span class="error" style="color :red;  ">','</span>') ;?>

       <br />   
       <label for="Email">Email * :</label>
       <input type="email" name="Email" value="" size="50" />      
       <?php echo form_error('Email','<span class="error" style="color :red;  ">','</span>') ;?>

         <br />
       <label for="Date_de_naissance">Date de naissance *  :</label>
       <input type="date"  name="Date_de_naissance"  size="50" />  
       <?php echo form_error('Date_de_naissance','<span class="error" style="color :red;  ">','</span>') ;?> <br />

          
       <label for="Lieu_de_naissance">Lieu de naissance *  :</label>
       <input type="text" name="Lieu_de_naissance" value="" size="50" />     

       <?php echo form_error('Lieu_de_naissance','<span class="error" style="color :red;  ">','</span>') ;?> <br />
 
      <label for="Departement">Département :</label>
       <input type="text" name="Departement" value="" size="50" />  
      <?php echo form_error('Departement','<span class="error" style="color :red;  ">','</span>') ;?> <br />
         
       
       <label for="Nationalite">Nationalité * :</label>
       <input type="text" name="Nationalite" value="" size="50" /> 

      <?php echo form_error('Nationalite','<span class="error" style="color :red;  ">','</span>') ;?> <br />
          
       <label for="Pays">Pays * :</label>
       <input type="text" name="Pays" value="" size="50" />  
       <?php echo form_error('Pays','<span class="error" style="color :red;  ">','</span>') ;?> <br />
                       
       <label for="Telephone_portable">Téléphone portable * :</label>
       <input type="number" name="Telephone_portable"  value="" size=""/>
       <?php echo form_error('Telephone_portable','<span class="error" style="color :red;  ">','</span>') ;?> <br />
       
       <label for="Tel1">Téléphone domicile  :</label>
       <input type="tel" name="Tel1"  value="" size=""/><br />
       
       <label for="Adresse_en_france" >Adresse en France :</label>
       <input type="text" name="Adresse_en_france"  size="50" />
       <?php echo form_error('Adresse_en_france','<span class="error" style="color :red;  ">','</span>') ;?> <br />

        <label for="Code_postal" >Code postal :</label>
       <input type="number" min="1" max="1000000" name="Code_postal" value="" size="50" />
       <?php echo form_error('Code_postal','<span class="error" style="color :red;  ">','</span>') ;?> <br />

       <label for="Ville" >Ville :</label> 
       <input type="text" name="Ville" value="" size="50" /> 
       <?php echo form_error('Ville','<span class="error" style="color :red;  ">','</span>') ;?> <br />
       
       <label for="Dernier_diplome">Dernier diplôme * :</label>
       <input type="text" name="Dernier_diplome" value="" size="50" /> 
       <?php echo form_error('Dernier_diplome','<span class="error" style="color :red;  ">','</span>') ;?> <br />

       
       <label for="Classement_diplome">Classement du dernier diplôme obtenu :</label>
       <input type="number" name="Classement_diplome" min="1" max="300" value="" size="50" /> <br /> <br /> 
       
       <label for="Numero_S_Social">Numéro S. Social :</label>
       <input type="number" name="Numero_S_Social"  min="1000000000" max="10000000000000000000" value="" size="" />          
       <?php echo form_error('Numero_S_Social','<span class="error" style="color :red;  ">','</span>') ;?> <br /> 

       <label for="Numero_campus_France">Numéro campus France :</label>
       <input type="number" min="1" max="10000" name="Numero_campus_France" value="" size="50" />  
       <?php echo form_error('Numero_campus_France','<span class="error" style="color :red;  ">','</span>') ;?> <br />

       <label for="Adresse_etranger">Adresse étranger :</label>
       <input type="text" name="Adresse_etranger" value="" size="50" />        
       <?php echo form_error('Adresse_etranger','<span class="error" style="color :red;  ">','</span>') ;?> <br />

       <label for="Ville_etranger">Ville étranger :</label>
       <input type="text" name="Ville_etranger" vaNumero_S_Sociallue="" size="50" />          
       <?php echo form_error('Ville_etranger','<span class="error" style="color :red;  ">','</span>') ;?> <br />

       <label for="Date_arrivee_en_France">Date d’arrivée en France :</label>
       <input type="date" name="Date_arrivee_en_France" value="" size="50" />      
       <?php echo form_error('Date_arrivee_en_France','<span class="error" style="color :red;  ">','</span>') ;?> <br />

       <label for="Apprentissage">Alternance :</label>
       <select name="Apprentissage" >
               
               <option value="0">Non si vous êtes primo arrivant</option>
               <option value="1">Contrat pro ou apprentissage si vous avez moins de 26 ans et vous avez plus d'un an en france</option>
               <option value="1">Contrat pro si vous avez plus de 26 ans et vous avez plus d'un an en france</option>

             </select>
<br/><br/>



    <!--  <input type="text" name="Apprentissage" value="" size="50" /> <br />  -->                
       <label for="Annee_etudes">Année d’études :</label> 
        
       <label id="Annee_etudes"><?php  echo date('Y') ;echo "/"; echo date('Y') +1 ;?></label> <br />

    <!--   <input type="text" name="Annee_etudes<?php  echo date('Y') ;echo "/"; echo date('Y') +1 ;?>"  />--><br />
       <label for="Identifiant_skype">Identifiant Skype :</label>
       <input type="text" name="Identifiant_skype" value="" size="50" /> <br /><br />
      <label for="Remarque">Remarque :</label>
       <textarea name="Remarque"  style="width:340px ; height : 82px;">Situation actuelle : Recherche emploi | Formation financ&eacute;e par FONGECIF : NON | Formation financ&eacute;e par contrat pro : NON</textarea>
       <input type="submit" value="Valider" align="center" /></br>

     </fieldset>
<?php echo form_close() ;?>

 
</div>

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page--><?php
  echo date('Y') +1 ;?>
  </body>
</html>



