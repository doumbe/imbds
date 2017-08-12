<html>
  <head>
    <title><?php echo $message;?></title>
    <?php include("/../base_site/script_base_site.php");?>
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/promotion_css.css">
    <script>
      $(function()
      {
        $("#tabs").tabs(
        {
          beforeLoad: function( event, ui )
          {
            ui.jqXHR.error(function()
            {
              ui.panel.html(
              "Couldn't load this tab. We'll try to fix this as soon as possible. " +
              "If this wouldn't be a demo." );
            });
          }
        });
        $("button, input:submit, input:button").button();
        $('input:text, input:password, input[type=email],textarea').button()
        .addClass('ui-textfield')
        .off('mouseenter').off('mousedown').off('keydown')
        .css({
                            'font' : 'inherit',
                           'color' : '#1E53A2',
                      'background' : '#FFFFFF',
                      'text-align' : 'left',
                  'vertical-align' : 'center',
                         'outline' : 'none',
                          'cursor' : 'text',
                          'height' : '20px',
                       'font-size' : '0.85em'
                    });
       
      });

    </script>
  </head>

  <body>
    <div id="page">
      <div id="contenu">
        <div id="content" class="narrowcolumn">
          <div id="promotion_content" class="post">
          	<h2><?php echo $message.' '.$year;?></h2>
         	  <div class="entry">
              <div id="form_annee_promo">
              <?php
                echo form_open('promotion_c/promotion_by_year');
                $lab = array('class' => 'label');
                $year_conf =array(
                              'name' => 'year',
                              'value' => $year
                          );
                echo form_label(lang('search_by_year'),'year',$lab);
                echo form_input($year_conf);
                echo form_submit('search_promo_by_year', lang('search'));
                echo form_close();
              ?>
              </div>
              <div id="tabs">
                <ul>
                  <li><a href="#tabs-1">Preloaded</a></li>
                  <?php foreach ($villes as $ville):?>

                  <?php echo '<li><a href="promotion_by_year_and_city/'.$year.'/'.$ville->GMANT_VILLE.'/'.str_replace(array(' ', '/'), '-', $ville->GMFO_FORMATION).'">'.$ville->GMFO_FORMATION.' '.$ville->GMANT_VILLE.' ('.$ville->GMANT_PAYS.')</a></li>';?>
                  <?php endforeach;?>
                </ul>
                <div id="tabs-1">
                  <table id="table_promotion">
                    <tbody>
                      <?php foreach (array_chunk($promo, 6) as $etudiants): ?>
                        <tr>
                          <?php foreach ($etudiants as $etu): ?>
                            <td>
                              <img class="th_photo" src="<?php echo base_url().$etu->GMET_PHOTO;?>"  />
                              <p>
                                <?php echo anchor("etudiant_c/etudiant_details/".$etu->GMET_CODE,$etu->GMET_NOM.' '.$etu->GMET_PRENOM);?>
                              </p>
                            </td>
                          <?php endforeach;?>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
          	</div>
          </div>
        </div>
      </div>
      <?php include("/../base_site/footer_base_site.php");?>
    </div>
  </body>
</html>