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


  <div id="div_fiche_condition">

      
       <?php echo form_open ('candidat_c/candidat_formulaire_inscription') ;?>

       <fieldset style="width:800px;border:outset">
       <legend>Informations personnelles</legend>
       <label for="Nom">Nom *:</label>
       <input type="text" name="Nom" size="50"    />
       <?php echo form_error('Nom','<span class="error" style="color :red;">','</span>'); ?><br />

       <label for="Prenom" >Prenom *:</label>
       <input type="text" name="Prenom" value="" size="50"  />  
     <?php echo form_error('Prenom','<span class="error" style="color :red;" >','</span>') ;?><br />

      <label for="Sexe" >Sexe :</label> 
       <?php //echo form_error('sexe','<span class="error">','</span>') ;?>

        <select name="Sexe" id="pays" >
               <option value="Masculin">Masculin</option>
               <option value="Féminin">Féminin</option>
             </select>

       <?php echo form_error('Sexe','<span class="error" >','</span>') ;?><br />

             
           <br/>
       <label for="Date_de_naissance">Date de naissance *:</label>

       <?php //echo form_error('Prenom','<span class="error">','</span>') ;?>
       <input type="date" name="Date_de_naissance" value="<?php echo set_value('Date_de_naissance')?>" size="50" />
       <?php echo form_error('Date_de_naissance','<span class="error" style="color :red;">','</span>') ;?><br />

   
      
      <label for="Email">Email *:</label>
      <?php //echo form_error('Email','<span class="error">','</span>') ;?>
      <input type="email" name="Email" value="<?php echo set_value('Email'); ?>" size="50" />     
     
      <?php echo form_error('Email','<span class="error" style="color :red;" >','</span>') ;?><br />

      <label for="Telephone">Téléphone portable:</label>
      <input  type="tel" name="Telephone" value="<?php echo set_value('Telephone'); ?>" size="50" /> 
       <?php  echo form_error('Telephone','<span class="error" style="color :red;">','</span>')  ;?>


          <br /> 
       
      <label for="Code_postal">Code postal *:</label>
      <input type="number" min="10" max="100000" name="Code_postal" value="<?php echo set_value('Code_postal'); ?>" size="50"  />            
      <?php echo form_error('Code_postal','<span class="error" style="color :red;">','</span>') ;?>

        <br /> 

       <label for="Ville">Ville *:</label>
       <?php //echo form_error('Ville','<span class="error">','</span>') ;?>
       <input type="text" name="Ville" value="<?php echo set_value('Ville'); ?>" size="50" style="border:inset;" />   
         <?php echo form_error('Ville','<span class="error" style="color :red;">','</span>') ;?><br />

      
            <label for="Pays"> Pays *:</label>
       <?php //echo form_error('Pays','<span class="error">','</span>') ;?>
       <input type="text" name="Pays" value="<?php echo set_value('Pays'); ?>" size="50" />   
                     <?php echo form_error('Pays','<span class="error" style="color :red;">','</span>') ;?><br />
 
       <label for="Nationalite">Nationalité *:</label>
       <?php //echo form_error('Nationalite','<span class="error">','</span>') ;?>
       <input type="text" name="Nationalite" size="50" value="<?php echo set_value('Nationalite');?>"  /> 

              <?php echo form_error('Nationalite','<span class="error" style="color :red;">','</span>') ;?><br />

       <label for="Dernier_diplome_obtenu">Dernier diplôme obtenu :</label>
       <?php // echo form_error('Dernier_diplome_obtenu','<span class="error">','</span>') ;?>
       <input type="text" name="Dernier_diplome_obtenu" size="50" value="<?php echo set_value('Dernier_diplome_obtenu'); ?>"  />

         <?php echo form_error('Dernier_diplome_obtenu','<span class="error" style="color :red;">','</span>') ;?><br />
      

       <br /><br />               

<input type="submit" name='Valider' value='Valider' />
       
             
            <?php echo form_close(); ?> 
    </fieldset>
    </div>

</div>

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
  </body>
</html>



