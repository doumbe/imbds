<html>
	<head>
    <meta charset="utf-8">
<?php  include("/script_backoffice.php");?>
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


  $('tr[id^="info_langue_"]').on('click','.a_delete_langue',function(e)
  {
    e.preventDefault();
    var mess = "<?php print lang('confirm_delete_langue'); ?>";
    if (confirm(mess)){
      $(this).parent('div').find('form').submit();
    }
    return false;
  });

   $('tr[id^="info_langue_"]').on('click','.a_modify_langue',function(e)
  {
    e.preventDefault();
    //$(this).parents('tr').find('.sps_title').css( "background-color", "red" );
    var tr = $(this).parents('tr');
    var valid = "<?php print lang('modify'); ?>";
    $( "#GMLA_CODE" ).val(tr.find('.langue_nom').find('span').text());
    $('#GMEL_LU').val(tr.find('.langue_lu').text());
    $('#GMEL_ECRIT').val(tr.find('.langue_ecrit').text());
    $('#GMEL_PARLE').val(tr.find('.langue_parle').text());
    $('#GMEL_CERTIFICATION_NOM').val(tr.find('.langue_certif_nom').text());
    $('#GMEL_CERTIFICATION_NOTE').val(tr.find('.langue_certif_note').text());
    $('#tr_add').find('input[type="submit"]').removeClass('btn-info');
    $('#tr_add').find('input[type="submit"]').addClass('btn-warning');
    $('#tr_add').find('input[type="submit"]').val(valid);
    $('#tr_add').find('input[type="submit"]').attr("name", 'modifier');
    $('#tr_add').find('input[type=hidden][name="GMLA_CODE"]').val(tr.find('.a_delete_langue').attr('id'));
   // alert($('#tr_add').find('input[type=hidden][name="GMSPS_CODE"]').attr('name'));
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
    			<?php echo lang('Candidat_dossier_inscription').' - '.lang('candidat_langues');?>
    		</h2>
    	</div>

    	<!--<?php 
    		$valid_error = validation_errors();
    		if(!empty($valid_error)){?>
		<div class="error_upload_file red error_message">
			<?php echo validation_errors();?>
		</div>
		<?php } else{?>
		<?php } ?>-->
    <div  id="div_page_langue" class="panel-body">
            <div class="table-responsive">
              <table id="table_langue" class="table table-bordered liste_table" >
    	<thead>
    		<tr>
    			<th><?php echo lang('th_candidat_langue_nom');?></th>
    			<th><?php echo lang('th_candidat_langue_lu');?></th>
    			<th><?php echo lang('th_candidat_langue_ecrit');?></th>
    			<th><?php echo lang('th_candidat_langue_parle');?></th>
    			<th><?php echo lang('th_candidat_langue_certif_nom');?></th>
    			<th><?php echo lang('th_candidat_langue_certif_note');?></th>
    			<th><?php echo lang('th_action');?></th>
    		</tr>
    	</thead>
    	<tbody>
    		 <?php 
                $i=0;
                foreach ($langue as $row): ?>
                <?php $i++;?>
                <tr id="info_langue_<?php echo $i; ?>">
                	
                   <td class="table_left langue_nom">
                    <?php if($row->GMLA_DRAPEAU != ""){
                      echo '<img class="mini_drapeau" src="'.base_url().$row->GMLA_DRAPEAU.'"/>';

                    } ?>
                        <?php echo $row->GMLA_LANGUE; ?>
                        <span class="hide"><?php echo $row->GMLA_CODE; ?></span></td>
                   <td class="table_left langue_lu"><?php echo $row->GMEL_LU;?></td>
                   <td class="table_left langue_ecrit"><?php echo $row->GMEL_ECRIT;?></td>
                   <td class="table_left langue_parle"><?php echo $row->GMEL_PARLE;?></td>
                   <td class="table_left langue_certif_nom"><?php echo $row->GMEL_CERTIFICATION_NOM;?></td>
                   <td class="table_left langue_certif_note"><?php echo $row->GMEL_CERTIFICATION_NOTE;?></td>
				   <td>
            <?php 

				   	  		$attr = array(
                                      'title'=>lang('modify'),
                                      'class' => 'a_modify_langue'
                                      );
				   	  		echo '<div>'.anchor('#', '<span class="glyphicon glyphicon-pencil"></span>',$attr).'</div>';
				   
                        $attr = array(
                        			  'title'=>lang('delete'),
                                'class' => 'a_delete_langue',
                                'id' => $row->GMLA_CODE
                                   //'onclick'=>'return confirmDialog();'
                                      );
                        echo '<div>'.anchor('#','<span class="glyphicon glyphicon-trash"></span>',$attr);
                        echo form_open('candidat_c/candidature_langue/'.$candidat->GMCA_CODE);
                        echo form_hidden('GMCA_CODE',$candidat->GMCA_CODE);
                        echo form_hidden('GMET_CODE',$candidat->GMET_CODE);
                        echo form_hidden('GMLA_CODE',$row->GMLA_CODE);
                        echo form_hidden('delete','delete');
                        echo form_close().'</div>';
                        
                      ?>
                    </td>
                </tr>
                
              <?php endforeach;?>
    		<tr id="tr_add">
    			<?php echo form_open('candidat_c/candidature_langue/'.$candidat->GMCA_CODE);?>
    			<?php echo form_hidden('GMET_CODE',$candidat->GMET_CODE);
           echo form_hidden('GMCA_CODE',$candidat->GMCA_CODE);?>
    			<td>
    				<?php 
    					$defaut = 'id="GMLA_CODE" placeholder="'.lang('info_candidat_langue_nom').'"  class = "form-control" size = "1"'; 
    					$error_nom=form_error('GMLA_CODE');
    					$error_nom=str_replace("<p>",'', $error_nom);
    					$error_nom=str_replace("</p>",'', $error_nom);
              $all_langues = array('' => '');
              //$all_langues['#']='#';
             foreach ($languages as $language)
              {
                 $all_langues[$language->GMLA_CODE] = $language->GMLA_LANGUE;
              }
    					if(!empty($error_nom))
    					{
    						$defaut = 'id="GMLA_CODE" placeholder="'.lang('info_candidat_langue_nom').'"  class = "form-control background_error" size = "1" title = "'.$error_nom.'"';
     					}
    					echo form_dropdown('GMLA_CODE',$all_langues, '', $defaut);
        			?>
    			</td>
          <td>
            <?php 
              $defaut = 'id="GMEL_LU" placeholder="'.lang('info_candidat_langue_lu').'"  class = "form-control little_select" size = "1"'; 
              $error_lu=form_error('GMEL_LU');
              $error_lu=str_replace("<p>",'', $error_lu);
              $error_lu=str_replace("</p>",'', $error_lu);
             $niveau =array(
                  ''=> '',
                  'A' => 'A',
                  'B' => 'B',
                  'C' => 'C',
                  'D' => 'D',
                  'E' => 'E'
              );
              if(!empty($error_lu))
              {
                $defaut = 'id="GMEL_LU" placeholder="'.lang('info_candidat_langue_lu').'"  class = "form-control background_error little_select" size = "1" title = "'.$error_lu.'"';
              }
              echo form_dropdown('GMEL_LU',$niveau, '', $defaut);
              ?>
          </td>
          <td>
            <?php 
              $defaut = 'id="GMEL_ECRIT" placeholder="'.lang('info_candidat_langue_ecrit').'"  class = "form-control little_select" size = "1"'; 
              $error_ecrit=form_error('GMEL_ECRIT');
              $error_ecrit=str_replace("<p>",'', $error_ecrit);
              $error_ecrit=str_replace("</p>",'', $error_ecrit);
              if(!empty($error_ecrit))
              {
                $defaut = 'id="GMEL_ECRIT" placeholder="'.lang('info_candidat_langue_ecrit').'"  class = "form-control background_error little_select" size = "1" title = "'.$error_ecrit.'"';
              }
              echo form_dropdown('GMEL_ECRIT',$niveau, '', $defaut);
              ?>
          </td>
           <td>
            <?php 
              $defaut = 'id="GMEL_PARLE" placeholder="'.lang('info_candidat_langue_parle').'"  class = "form-control little_select" size = "1"'; 
              $error_parle=form_error('GMEL_PARLE');
              $error_parle=str_replace("<p>",'', $error_parle);
              $error_parle=str_replace("</p>",'', $error_parle);
              if(!empty($error_parle))
              {
                $defaut = 'id="GMEL_PARLE" placeholder="'.lang('info_candidat_langue_parle').'"  class = "form-control background_error little_select" size = "1" title = "'.$error_parle.'"';
              }
              echo form_dropdown('GMEL_PARLE',$niveau, '', $defaut);
              ?>
          </td>
    			<td>
    				<?php 
    					$defaut = array('name'=>'GMEL_CERTIFICATION_NOM',
                          'placeholder'=>lang('info_candidat_langue_certif_nom'),
                          'id'=>'GMEL_CERTIFICATION_NOM',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
    					echo form_input($defaut);
        			?>
    			</td>
    			<td>
    				<?php 
    					$defaut = array('name'=>'GMEL_CERTIFICATION_NOTE',
                          'placeholder'=>lang('info_candidat_langue_certif_note'),
                          'id'=>'GMEL_CERTIFICATION_NOTE',
                          'class' => 'form-control little_input',
                          'size'=>'3'
                          ); 
    					echo form_input($defaut);
        			?>
    			</td>
    			<td>
    				<?php echo form_submit('valider',lang('add'), 'class="btn btn-info confirm_button"');?>
    			</td>
    			<?php echo form_close();?>
    		</tr>
    	</tbody>	
    </table>
</div>
</div>
	

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


 	</body>
</html>

