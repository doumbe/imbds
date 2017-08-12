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
          <?php echo lang('candidat_title_condition');?>
        </h2>
      </div>
<div class="fiche">

<!--<p><?php echo var_dump($candidat); ?></p>
<br/>
-->

  <div id="div_fiche_condition">
  <ul>
    <li class="very_important first_li"><?php echo lang('candidat_condition_1');?></li>
      <ul>
        <li class="autre_li important"><?php echo lang('candidat_condition_1.1');?></li>
          <ul>
            <li><?php echo lang('candidat_condition_1.1.1');?></li>
              <ul>
                <li class="autre_li"><?php echo lang('candidat_condition_1.1.1.1');?></li>
                <li class="autre_li"><?php echo lang('candidat_condition_1.1.1.2');?></li>
                <li class="autre_li"><?php echo lang('candidat_condition_1.1.1.3');?></li>
              </ul>
          </ul>
        <li class="autre_li important"><?php echo lang('candidat_condition_1.2');?></li>
        <li class="autre_li important"><?php echo lang('candidat_condition_1.3');?></li>
        <li class="autre_li"><?php echo lang('candidat_condition_1.4');?></li>
      </ul>
  </ul>
    
  </div>

</div>



  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


  </body>
</html>

