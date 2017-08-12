<html>
	<head>
  <?php  include("/script_backoffice.php");?>
    <meta charset="utf-8">
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

    	$("#GMSPS_DATE_DE_DEBUT").datepicker({
		    format: 'yyyy-mm-dd',
		    startDate: currentdate-1
		});
		$("#GMSPS_DATE_DE_FIN").datepicker({
		    format: 'yyyy-mm-dd',
		    startDate: currentdate
		});
		
	/*$('.div_hide').hide();

	$('#input_lieu_residence').change(function()
		{
			$(this).find("option").each(function()
			{
				$('#div_if_residence_' + this.value).hide();
			});
			
			$('#div_if_residence_' + this.value).show();

		});
	*/
  $('tr[id^="info_sps_"]').on('click','.a_delete_sps',function(e)
  {
    e.preventDefault();
    var mess = "<?php print lang('confirm_delete_stage_projet'); ?>";
    if (confirm(mess)){
      $(this).parent('div').find('form').submit();
    }
    return false;
  });

   $('tr[id^="info_sps_"]').on('click','.a_modify_sps',function(e)
  {
    e.preventDefault();
    //$(this).parents('tr').find('.sps_title').css( "background-color", "red" );
    var tr = $(this).parents('tr');
    var valid = "<?php print lang('modify'); ?>";
    $('#GMSPS_TITRE').val(tr.find('.sps_title').text());
    $('#GMSPS_DESCRIPTION').val(tr.find('.sps_desc').text());
    $('#GMSPS_ENTREPRISE').val(tr.find('.sps_entreprise').text());
    $('#GMSPS_RESPONSABLE').val(tr.find('.sps_resp').text());
    $('#GMSPS_DATE_DE_DEBUT').val(tr.find('.sps_deb').text());
    $('#GMSPS_DATE_DE_FIN').val(tr.find('.sps_fin').text());
    $('#GMSPS_NATURE_STAGE').val(tr.find('.sps_nat').text());
    $('#GMSPS_TYPE').val(tr.find('.sps_type').text());
    $('#GMSPS_PAYS').val(tr.find('.sps_pays').text());
    $('#tr_add').find('input[type="submit"]').removeClass('btn-info');
    $('#tr_add').find('input[type="submit"]').addClass('btn-warning');
    $('#tr_add').find('input[type="submit"]').val(valid);
    $('#tr_add').find('input[type="submit"]').attr("name", 'modifier');
    $('#tr_add').find('input[type=hidden][name="GMSPS_CODE"]').val(tr.find('.a_delete_sps').attr('id'));
   // alert($('#tr_add').find('input[type=hidden][name="GMSPS_CODE"]').attr('name'));
  });

});
   /*function confirmDialog() {

        var mess = "<?php print lang('confirm_delete_stage_projet'); ?>";
        alert("lalala");
       /* if confirm(mess)
        {
          $("#target").submit();
        }  
      }*/

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
    			<?php echo lang('Candidat_dossier_inscription').' - '.lang('candidat_stage_projet');?>
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
    <div  id="div_page_stage_projet" class="panel-body">
            <div class="table-responsive">
              <table id="table_stage_projet" class="table table-bordered liste_table" >
    	<thead>
    		<tr>
    			<th><?php echo lang('th_candidat_sps_titre');?></th>
    			<th><?php echo lang('th_candidat_sps_desc');?></th>
    			<th><?php echo lang('th_candidat_sps_entreprise');?></th>
    			<th><?php echo lang('th_candidat_sps_responsable');?></th>
    			<th><?php echo lang('th_candidat_sps_date_deb');?></th>
    			<th><?php echo lang('th_candidat_sps_date_fin');?></th>
    			<th><?php echo lang('th_candidat_sps_nature_stage');?></th>
    			<th><?php echo lang('th_candidat_sps_type');?></th>
    			<th><?php echo lang('th_candidat_sps_pays');?></th>
    			<th><?php echo lang('th_action');?></th>
    		</tr>
    	</thead>
    	<tbody>
    		 <?php 
                $i=0;
                foreach ($stage_projet as $row): ?>
                <?php $i++;?>
                <tr id="info_sps_<?php echo $i; ?>">
                	
                   <td class="table_left sps_title"><?php echo $row->GMSPS_TITRE;?></td>
                   <td class="table_left sps_desc"><?php echo $row->GMSPS_DESCRIPTION;?></td>
                   <td class="table_left sps_entreprise"><?php echo $row->GMSPS_ENTREPRISE;?></td>
                   <td class="table_left sps_resp"><?php echo $row->GMSPS_RESPONSABLE;?></td>
                   <td class="table_left sps_deb"><?php echo $row->GMSPS_DATE_DE_DEBUT;?></td>
                   <td class="table_left sps_fin"><?php echo $row->GMSPS_DATE_DE_FIN;?></td>
                   <td class="table_left sps_nat"><?php echo $row->GMSPS_NATURE_STAGE;?></td>
                   <td class="table_left sps_type"><?php echo $row->GMSPS_TYPE;?></td>
                   <td class="table_left sps_pays"><?php echo $row->GMSPS_PAYS;?></td>
				   <td>
            <?php 

				   	  		$attr = array(
                                      'title'=>lang('modify'),
                                      'class' => 'a_modify_sps'
                                      );
				   	  		echo '<div>'.anchor('#', '<span class="glyphicon glyphicon-pencil"></span>',$attr).'</div>';
				   
                        $attr = array(
                        			  'title'=>lang('delete'),
                                'class' => 'a_delete_sps',
                                'id' => $row->GMSPS_CODE
                                   //'onclick'=>'return confirmDialog();'
                                      );
                        echo '<div>'.anchor('#','<span class="glyphicon glyphicon-trash"></span>',$attr);
                        echo form_open('candidat_c/candidature_stage_projet/'.$candidat->GMCA_CODE);
                        echo form_hidden('GMCA_CODE',$candidat->GMCA_CODE);
                        echo form_hidden('GMET_CODE',$candidat->GMET_CODE);
                        echo form_hidden('GMSPS_CODE',$row->GMSPS_CODE);
                        echo form_hidden('delete','delete');
                        echo form_close().'</div>';
                        
                      ?>
                    </td>
                </tr>
                
              <?php endforeach;?>
    		<tr id="tr_add">
    			<?php echo form_open('candidat_c/candidature_stage_projet/'.$candidat->GMCA_CODE);?>
    			<?php echo form_hidden('GMET_CODE',$candidat->GMET_CODE);
           echo form_hidden('GMSPS_CODE','');
           echo form_hidden('GMCA_CODE',$candidat->GMCA_CODE);?>
    			<td>
    				<?php 
    					$defaut = array('name'=>'GMSPS_TITRE',
                          'placeholder'=>lang('info_candidat_sps_titre'),
                          'id'=>'GMSPS_TITRE',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
    					$error_titre=form_error('GMSPS_TITRE');
    					$error_titre=str_replace("<p>",'', $error_titre);
    					$error_titre=str_replace("</p>",'', $error_titre);
    					if(!empty($error_titre))
    					{
    						$defaut['class'] = 'form-control background_error';
    						$defaut['title'] = $error_titre;
     					}
    					echo form_input($defaut);
        			?>
    			</td>
    			<td>
    				<?php 
    					$defaut = array('name'=>'GMSPS_DESCRIPTION',
                          'placeholder'=>lang('info_candidat_sps_desc'),
                          'id'=>'GMSPS_DESCRIPTION',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
    					$error_desc=form_error('GMSPS_DESCRIPTION');
    					$error_desc=str_replace("<p>",'', $error_desc);
    					$error_desc=str_replace("</p>",'', $error_desc);
    					if(!empty($error_desc))
    					{
    						$defaut['class'] = 'form-control background_error';
    						$defaut['title'] = $error_desc;
    					}
    					echo form_input($defaut);
        			?>
    			</td>
    			<td>
    				<?php 
    					$defaut = array('name'=>'GMSPS_ENTREPRISE',
                          'placeholder'=>lang('info_candidat_sps_entreprise'),
                          'id'=>'GMSPS_ENTREPRISE',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
    					echo form_input($defaut);
        			?>
    			</td>
    			<td>
    				<?php 
    					$defaut = array('name'=>'GMSPS_RESPONSABLE',
                          'placeholder'=>lang('info_candidat_sps_responsable'),
                          'id'=>'GMSPS_RESPONSABLE',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
    					echo form_input($defaut);
        			?>
    			</td>

    			<td>
    				<?php
    					$date_deb_para = array(
                          'id' => 'GMSPS_DATE_DE_DEBUT',
                          'name' => 'GMSPS_DATE_DE_DEBUT',
                          'placeholder'=>lang('info_candidat_date_naiss'),
                          'class' => 'form-control'
                          );
    					$error_date_deb=form_error('GMSPS_DATE_DE_DEBUT');
    					$error_date_deb=str_replace("<p>",'', $error_date_deb);
    					$error_date_deb=str_replace("</p>",'', $error_date_deb);
    					if(!empty($error_date_deb))
    					{
    						$date_deb_para['class'] = 'form-control background_error';
    						$defaut['title'] = $error_date_deb;
    					}
						echo form_input($date_deb_para);
					?>
    			</td>
    			<td>
    				<?php
    					$date_fin_para = array(
                          'id' => 'GMSPS_DATE_DE_FIN',
                          'name' => 'GMSPS_DATE_DE_FIN',
                          'placeholder'=>lang('info_candidat_date_naiss'),
                          'class' => 'form-control'
                          );
    					$error_date_fin =form_error('GMSPS_DATE_DE_FIN');
    					$error_date_fin=str_replace("<p>",'', $error_date_fin);
    					$error_date_fin=str_replace("</p>",'', $error_date_fin);
    					if(!empty($error_date_fin))
    					{
    						$date_fin_para['class'] = 'form-control background_error';
    						$defaut['title'] = $error_date_fin;
    					}
						echo form_input($date_fin_para);
					?>
    			</td>
    			<td>
    				<?php 
    					$defaut = array('name'=>'GMSPS_NATURE_STAGE',
                          'placeholder'=>lang('info_candidat_sps_nature_stage'),
                          'id'=>'GMSPS_NATURE_STAGE',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
    					echo form_input($defaut);
        			?>
    			</td>
    			<td>
    				<?php 
    					$defaut = array('name'=>'GMSPS_TYPE',
                          'placeholder'=>lang('info_candidat_sps_type'),
                          'id'=>'GMSPS_TYPE',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
    					$error_type=form_error('GMSPS_TYPE');
    					$error_type=str_replace("<p>",'', $error_type);
    					$error_type=str_replace("</p>",'', $error_type);
    					
    					if(!empty($error_type))
    					{
    						
    						$defaut['class'] = 'form-control background_error';
    						$defaut['title'] =  $error_type;
    					}
    					echo form_input($defaut);
        			?>
    			</td>
    			<td>
    				<?php 
    					$defaut = array('name'=>'GMSPS_PAYS',
                          'placeholder'=>lang('info_candidat_sps_pays'),
                          'id'=>'GMSPS_PAYS',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
    					echo form_input($defaut);
        			?>
    			</td>
    			<td>
    				 <div style="width:;float:letf;margin-left:-225px;"><?php echo form_submit('valider','+', 'class="btn btn-info confirm_button"');?>
    			</div></td>
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

