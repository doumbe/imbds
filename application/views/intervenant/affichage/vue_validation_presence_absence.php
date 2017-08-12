<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('intervenant/script_intervenant.php');?>
    <title><?php echo "MBDS ".lang('gestion_planning');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_seance'); ?>";
        return confirm(mess);    
      }
    </script>


  </head>

   <body>

    <div id = 'page'>

      <div id = 'header'>
        <?php $this->load->view('intervenant/header.php'); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php $this->load->view('intervenant/menu.php');?>
       
        <div id = 'content' class = 'narrowcolumn'>
          
          <div id="message">
             <h2><?php echo lang('liste_presences_absences');?></h2>
          </div>
          <?php echo " données enregistrées avec succes"; ?>

          </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
  </body>
</html>