<html>
  <head>
    <?php include("/../script_backoffice.php");?>
    <title>
      <?php echo lang('add_questionnaire');?>
    </title>
    <script>
          $(function() {
           //alert("debut");
            var div_gen = $('#div_new_questionnaire');
            var i = $('#div_new_questionnaire p').size();
            var lang_nom = '<?php echo html_entity_decode(lang("num_question"), ENT_NOQUOTES, "UTF-8");?>';
            var lang_description = '<?php echo html_entity_decode(lang("desc_question"), ENT_NOQUOTES, "UTF-8");?>';
            var set_nom = '<?php echo html_entity_decode(set_value("GMQQ_NOM"), ENT_NOQUOTES, "UTF-8");?>';
            var set_description = '<?php echo html_entity_decode(set_value("GMQQ_DESCRIPTION"), ENT_NOQUOTES, "UTF-8");?>';
            var lang_delete = '<?php echo html_entity_decode(lang("delete"), ENT_NOQUOTES, "UTF-8");?>';
            //alert("fin set var");
           
           $('#anchor_add_question').on('click', function() {
                $('<p>').attr({id: 'GMQQ_Questionnaire_'+i}).appendTo(div_gen);
                   var p_gen=$('#GMQQ_Questionnaire_'+i);

                   $('<input>').attr({
                        type: 'text',
                        id: 'GMQQ_NOM',
                        name: 'GMQQ_NOM['+(i-1)+']',
                        placeholder:lang_nom,
                        class: 'form-control',
                        value: set_nom,
                        size:'50'
                    }).appendTo(p_gen);
                   
                    $('<input>').attr({
                        type: 'text',
                        id: 'GMQQ_DESCRIPTION',
                        name: 'GMQQ_DESCRIPTION['+(i-1)+']',
                        placeholder:lang_description,
                        class: 'form-control',
                        value: set_description,
                        size:'50'
                    }).appendTo(p_gen);
                    
                    $('<a>').text(lang_delete).attr({
                        href: '#',
                        id: 'remove_question'
                    }).appendTo(p_gen);

                    i++;
               // alert("i = "+i);
                    return false;
            });
            
            $('#remove_question').on('click', function(){
            //$('#anchor_add_question').on('click', function() {
            alert("je suis icic"); 
                    if( i > 2 ) {
                            $(this).parents('p').remove();
                            i--;
                    }
                  return false;
            });
    });

    </script>
  </head>

    <body>
        <div id = 'page'>

      <div id = 'header'>
        <?php include("/../header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/../menu.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>

      <div id="Message">
        <h2>
          <?php echo lang('create_questionnaire') ;?>
        </h2>
      </div>
<?php echo validation_errors(); ?>

    <?php echo form_open('backoffice_ajout/ajouterQuestionnaire');?>
  <div id="div_new_questionnaire">
    
		

     <p>
        <?php $defaut = array('name'=>'GMQQ_ANNEE',
                          'placeholder'=>sprintf(lang("val_annee"),date('Y')),
                          'id'=>'GMQQ_ANNEE',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMQQ_ANNEE')
                          ); 
          $error_annee=form_error('GMQQ_ANNEE');
          $error_annee=str_replace("<p>",'', $error_annee);
          $error_annee=str_replace("</p>",'', $error_annee);
          if(!empty($error_annee))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_annee;
          }
              
          echo form_label(lang('annee_questionnaire'));
          echo form_input($defaut);
          if(!empty($error_annee))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_annee.'</div>';
          }
          $i=1;
        ?>
    </p>

		<p id="GMQQ_Questionnaire_<?php echo $i;?>">
   			<?php $defaut_nom = array('name'=>'GMQQ_NOM[0]',
                          'placeholder'=>lang('num_question'),
                          'id'=>'GMQQ_NOM',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value'=>set_value('GMQQ_NOM')
                          ); 

              $defaut_desc = array('name'=>'GMQQ_DESCRIPTION[0]',
                          'placeholder'=>lang('desc_question'),
                          'id'=>'GMQQ_DESCRIPTION',
                          'rows' => '6',
                          'cols' => '35',
                          'class' => 'form-control',
                          'value'=>set_value('GMQQ_DESCRIPTION')
                          ); 

    		 echo form_label(lang('num_&_question'));
         echo form_input($defaut_nom); echo form_input($defaut_desc);
        ?>
 		</p>

    </div>
    <div class ="ajout_element">
      <?php echo '<a href="#" id="anchor_add_question"><span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span>'.lang('add_question').'</a>';?> 
    </div>
    <div id="div_new_langue_buttons" class="btn-group" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>
    <?php echo form_close();?>
  </body>
</html>
