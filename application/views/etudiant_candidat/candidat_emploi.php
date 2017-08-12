<?php
if(  !( $this->session->userdata('username')and $this->session->userdata('etat_candidat')=='candidat'  )  )
 {    
   redirect('signup');
 } 
?>
<html>
	<head>
    <meta charset="utf-8">
<?php  include("/script_backoffice.php");?>
<?php $this->load->view('backoffice/script_backoffice.php');?>
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

      $("#GMEM_DATE_EMBAUCHE").datepicker({
        format: 'yyyy-mm-dd',
        startDate: currentdate-1
    });
    $("#GMEM_DATE_FIN").datepicker({
        format: 'yyyy-mm-dd',
        startDate: currentdate
    });

  //alert($('tr').find('input[type=hidden][name="GMEM_ACTUEL"]').val());

  $('tbody[id^="info_emploi_"]').on('click','.a_delete_emploi',function(e)
  {
    e.preventDefault();
    var mess = "<?php print lang('confirm_delete_emploi'); ?>";
    if (confirm(mess)){
      $(this).parent('div').find('form').submit();
    }
    return false;
  });

   $('tbody[id^="info_emploi_"]').on('click','.a_modify_emploi',function(e)
  {
    e.preventDefault();
    //$(this).parents('tr').find('.sps_title').css( "background-color", "red" );
    var tr = $(this).parents('tbody');
    var valid = "<?php print lang('modify'); ?>";
    $('#GMEM_CODE').val(tr.find('.emploi_nom').find('span').text());
    $('#GMEM_FONCTION').val(tr.find('.emploi_fonction').text());
    $('#GMEM_NOM_ENTREPRISE').val(tr.find('.emploi_nom').text());
    $('#GMEM_TYPE_CONTRAT').val(tr.find('.emploi_type').text());
    $('#GMEM_DATE_EMBAUCHE').val(tr.find('.emploi_date_deb').text());
    //alert(tr.find('.emploi_date_fin').text());
    $('#GMEM_DATE_FIN').val(tr.find('.emploi_date_fin').text().replace(/[\s]+/g, ' '));
    $('#GMEM_SALAIRE_ANNUEL').val(tr.find('.emploi_salaire').text());
    $('#GMEM_EMAIL').val(tr.find('.emploi_email').text());
    $('#GMEM_TELEPHONE').val(tr.find('.emploi_telephone').text());
    $('#GMEM_ADRESSE').val(tr.find('.emploi_adresse').text());
    $('#GMEM_CODE_POSTAL').val(tr.find('.emploi_code_postal').text());
    $('#GMEM_VILLE').val(tr.find('.emploi_ville').text());
    $('#GMEM_PAYS').val(tr.find('.emploi_pays').text());
    $('#tr_add').find('input[type="submit"]').removeClass('btn-info');
    $('#tr_add').find('input[type="submit"]').addClass('btn-warning');
    $('#tr_add').find('input[type="submit"]').val(valid);
    $('#tr_add').find('input[type="submit"]').attr("name", 'modifier');
    $('#tr_add').find('input[type=hidden][name="GMEM_CODE"]').val(tr.find('.a_delete_emploi').attr('id'));
  // alert($('#tr_add').find('input[type=hidden][name="GMEM_CODE"]').attr('name'));
  });

});
    </script>
  </head>

    <body><div id = 'page'>

      <div id = 'header' style='height:130px;'>
        <?php include("/header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/candidat_menu_gauche.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>

    	<div id="Message">
    		<h2>
    			<?php echo lang('Candidat_dossier_inscription').' - '.lang('candidat_emplois');?>
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
    <div  id="div_page_emploi" class="panel-body">
      <?php include("/deconnexion.php");?>
            <div class="table-responsive">
              <table id="table_emploi" class="table table-bordered liste_table" >
    	<thead>
    		<tr>
          <th rowspan='2'><?php echo lang('th_candidat_emploi_ordre');?></th>
    			<th><?php echo lang('th_candidat_emploi_fonction');?></th>
    			<th><?php echo lang('th_candidat_emploi_nom');?></th>
    			<th><?php echo lang('th_candidat_emploi_type');?></th>
    			<th><?php echo lang('th_candidat_emploi_date_deb');?></th>
    			<th><?php echo lang('th_candidat_emploi_date_fin');?></th>
    			<th><?php echo lang('th_candidat_emploi_salaire');?></th>
    			<th rowspan='2'><?php echo lang('th_action');?></th>
    		</tr>
      <tr>
          <th><?php echo lang('th_candidat_emploi_email');?></th>
          <th><?php echo lang('th_candidat_emploi_tel');?></th>
          <th><?php echo lang('th_candidat_emploi_adr');?></th>
          <th><?php echo lang('th_candidat_emploi_cp');?></th>
          <th><?php echo lang('th_candidat_emploi_ville');?></th>
          <th><?php echo lang('th_candidat_emploi_pays');?></th>
        </tr>
      </thead>
   
    		 <?php //echo var_dump($emploi);
                $i=0;
                foreach ($emploi as $row): ?>
                <?php $i++;?>
              <tbody id="info_emploi_<?php echo $i; ?>">
                <tr class="<?php if($row->GMEM_ACTUEL==1) echo "actuel_background"?>" >
                	
                   <td rowspan='2' class="table_left emploi_ordre">
                    <?php echo $row->GMEM_NUMERO_ORDRE; ?></td>
                   <td class="table_left emploi_fonction"><?php echo $row->GMEM_FONCTION;?></td>
                   <td class="table_left emploi_nom"><?php echo $row->GMEM_NOM_ENTREPRISE;?></td>
                   <td class="table_left emploi_type"><?php echo $row->GMEM_TYPE_CONTRAT;?></td>
                   <td class="table_left emploi_date_deb"><?php echo $row->GMEM_DATE_EMBAUCHE;?></td>
                   <td class="table_left emploi_date_fin">
                    <?php 
                      if(strcmp($row->GMEM_DATE_FIN, "0000-00-00")!=0)
                      {
                          echo $row->GMEM_DATE_FIN;
                      }
                    ?>
                   </td>
                   <td class="table_left emploi_salaire"><?php echo $row->GMEM_SALAIRE_ANNUEL;?></td>
				   <td rowspan='2'>
            <?php 

				   	  		$attr = array(
                                      'title'=>lang('modify'),
                                      'class' => 'a_modify_emploi'
                                      );
				   	  		echo '<div>'.anchor('#', '<span class="glyphicon glyphicon-pencil"></span>',$attr).'</div>';
				   
                        $attr = array(
                        			  'title'=>lang('delete'),
                                'class' => 'a_delete_emploi',
                                'id' => $row->GMEM_CODE
                                   //'onclick'=>'return confirmDialog();'
                                      );
                        echo '<div>'.anchor('#','<span class="glyphicon glyphicon-trash"></span>',$attr);
                        echo form_open('candidat_c/candidature_emploi/');
                        echo form_hidden('GMCA_CODE',$candidat->GMCA_CODE);
                        echo form_hidden('GMET_CODE',$candidat->GMET_CODE);
                        echo form_hidden('GMEM_CODE',$row->GMEM_CODE);
                        echo form_hidden('GMEM_ACTUEL',$row->GMEM_ACTUEL);
                        echo form_hidden('delete','delete');
                        echo form_close().'</div>';
                        
                      ?>
                    </td>
                </tr>
                <tr  class="<?php if($row->GMEM_ACTUEL==1) echo "actuel_background"?>" >
                   <td class="table_left emploi_email"><?php echo $row->GMEM_EMAIL;?></td>
                   <td class="table_left emploi_telephone"><?php echo $row->GMEM_TELEPHONE;?></td>
                   <td class="table_left emploi_adresse"><?php echo $row->GMEM_ADRESSE;?></td>
                   <td class="table_left emploi_code_postal"><?php echo $row->GMEM_CODE_POSTAL;?></td>
                   <td class="table_left emploi_ville"><?php echo $row->GMEM_VILLE;?></td>
                   <td class="table_left emploi_pays"><?php echo $row->GMEM_PAYS;?></td>
                </tr>
                </tbody>
              <?php endforeach;?>
              <tbody id="tr_add">
    		<tr >
    			<?php echo form_open('candidat_c/candidature_emploi/');?>
    			<?php echo form_hidden('GMET_CODE',$candidat->GMET_CODE);
            echo form_hidden('GMEM_CODE','');
           echo form_hidden('GMCA_CODE',$candidat->GMCA_CODE);?>
           <td rowspan='2'></td>
           <td>
            <?php 
              $defaut = array('name'=>'GMEM_FONCTION',
                          'placeholder'=>lang('info_candidat_emploi_fonction'),
                          'id'=>'GMEM_FONCTION',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
              $error_fonction=form_error('GMEM_FONCTION');
              $error_fonction=str_replace("<p>",'', $error_fonction);
              $error_fonction=str_replace("</p>",'', $error_fonction);
              if(!empty($error_fonction))
              {
                $defaut['class'] = "form-control background_error";
                $defaut['title'] = $error_fonction;
              }
              echo form_input($defaut);
              ?>
          </td>
          <td>
            <?php 
              $defaut = array('name'=>'GMEM_NOM_ENTREPRISE',
                          'placeholder'=>lang('info_candidat_emploi_nom'),
                          'id'=>'GMEM_NOM_ENTREPRISE',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
              $error_nom=form_error('GMEM_NOM_ENTREPRISE');
              $error_nom=str_replace("<p>",'', $error_nom);
              $error_nom=str_replace("</p>",'', $error_nom);
              if(!empty($error_nom))
              {
                $defaut['class'] = "form-control background_error";
                $defaut['title'] = $error_nom;
              }
              echo form_input($defaut);
              ?>
          </td>
            <td>
            <?php 
              $defaut = 'id="GMEM_TYPE_CONTRAT" name="GMEM_TYPE_CONTRAT" placeholder="'.lang('info_candidat_emploi_type').'"  class = "form-control" size = "1"'; 
              $error_type=form_error('GMEM_TYPE_CONTRAT');
              $error_type=str_replace("<p>",'', $error_type);
              $error_type=str_replace("</p>",'', $error_type);
              $all_emplois = array(
                                    '' => '',
                                    'CDI' => lang('CDI'),
                                    'CDD' => lang('CDD'),
                                    'CDDOD' => lang('CDDOD'),
                                    'CA' => lang('CA'),
                                    'CAA' => lang('CAA'),
                                    'CP' => lang('CP'),
                                    'CTI' => lang('CTI'),
                                    'CTT' => lang('CTT'),
                                    'CDDS' => lang('CDDS'),
                                    'CUI-CAE' => lang('CUI-CAE'),
                                    'CUI-CIE' => lang('CUI-CIE'),
                                    'CV' => lang('CV'),
                                    'Autres' => lang('Autres')
                                  );

              if(!empty($error_type))
              {
                $defaut = 'id="GMEM_TYPE_CONTRAT" name="GMEM_TYPE_CONTRAT" placeholder="'.lang('info_candidat_emploi_type').'"  class = "form-control background_error" size = "1"  title = "'.$error_type.'"';
              }
              echo form_dropdown('GMEM_TYPE_CONTRAT',$all_emplois, '', $defaut);
              ?>
          </td>
          <td>
            <?php
              $date_deb_para = array(
                          'id' => 'GMEM_DATE_EMBAUCHE',
                          'name' => 'GMEM_DATE_EMBAUCHE',
                          'placeholder'=>lang('info_candidat_emploi_date_deb'),
                          'class' => 'form-control'
                          );
              $error_date_deb=form_error('GMEM_DATE_EMBAUCHE');
              $error_date_deb=str_replace("<p>",'', $error_date_deb);
              $error_date_deb=str_replace("</p>",'', $error_date_deb);
              if(!empty($error_date_deb))
              {
                $date_deb_para['class'] = 'form-control background_error';
                $date_deb_para['title'] = $error_date_deb;
              }
            echo form_input($date_deb_para);
          ?>
          </td>
          <td>
            <?php
              $date_fin_para = array(
                          'id' => 'GMEM_DATE_FIN',
                          'name' => 'GMEM_DATE_FIN',
                          'placeholder'=>lang('info_candidat_emploi_date_fin'),
                          'class' => 'form-control'
                          );
            $error_date_fin=form_error('GMEM_DATE_FIN');
              $error_date_fin=str_replace("<p>",'', $error_date_fin);
              $error_date_fin=str_replace("</p>",'', $error_date_fin);
              if(!empty($error_date_fin))
              {
                $date_fin_para['class'] = 'form-control background_error';
                $date_fin_para['title'] = $error_date_fin;
              }
            echo form_input($date_fin_para);
          ?>
          </td>
           <td>
            <?php 
              $defaut = array('name'=>'GMEM_SALAIRE_ANNUEL',
                          'placeholder'=>lang('info_candidat_emploi_salaire'),
                          'id'=>'GMEM_SALAIRE_ANNUEL',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
              $error_salaire=form_error('GMEM_SALAIRE_ANNUEL');
              $error_salaire=str_replace("<p>",'', $error_salaire);
              $error_salaire=str_replace("</p>",'', $error_salaire);
              if(!empty($error_salaire))
              {
                $defaut['class'] = "form-control background_error";
                $defaut['title'] = $error_salaire;
              }
              echo form_input($defaut);
              ?>
          </td>
          <td rowspan='2'>
           <div style="width:45px;float:letf;margin-left:-225px;"> <?php echo form_submit('valider',lang('add'), 'class="btn btn-info confirm_button"');?></div>
          </td>
        </tr>
        <tr>
          <td>
              <?php
              $defaut = array(
                          'id' => 'GMEM_EMAIL',
                          'name' => 'GMEM_EMAIL',
                          'placeholder'=>lang('info_candidat_emploi_email'),
                          'class' => 'form-control'
                          );
              $error_email=form_error('GMEM_EMAIL');
              $error_email=str_replace("<p>",'', $error_email);
              $error_email=str_replace("</p>",'', $error_email);
              if(!empty($error_email))
              {
                $defaut['class'] = 'form-control background_error';
                $defaut['title'] = $error_email;
              }
              
            echo form_input($defaut);
          ?>
          </td>
          <td>
             <?php
              $defaut = array(
                          'id' => 'GMEM_TELEPHONE',
                          'name' => 'GMEM_TELEPHONE',
                          'placeholder'=>lang('info_candidat_emploi_tel'),
                          'class' => 'form-control'
                          );
              $error_tel=form_error('GMEM_TELEPHONE');
              $error_tel=str_replace("<p>",'', $error_tel);
              $error_tel=str_replace("</p>",'', $error_tel);
              if(!empty($error_tel))
              {
                $defaut['class'] = 'form-control background_error';
                $defaut['title'] = $error_tel;
              }
              
              
            echo form_input($defaut);
          ?>
          </td>
          <td>
              <?php
              $defaut = array(
                          'id' => 'GMEM_ADRESSE',
                          'name' => 'GMEM_ADRESSE',
                          'placeholder'=>lang('info_candidat_emploi_adr'),
                          'class' => 'form-control'
                          );
              $error_adr=form_error('GMEM_ADRESSE');
              $error_adr=str_replace("<p>",'', $error_adr);
              $error_adr=str_replace("</p>",'', $error_adr);
              if(!empty($error_adr))
              {
                $defaut['class'] = 'form-control background_error';
                $defaut['title'] = $error_adr;
              }
              
            echo form_input($defaut);
          ?>
          </td>
          <td>
            <?php
              $defaut = array(
                          'id' => 'GMEM_CODE_POSTAL',
                          'name' => 'GMEM_CODE_POSTAL',
                          'placeholder'=>lang('info_candidat_emploi_cp'),
                          'class' => 'form-control'
                          );
              $error_cp=form_error('GMEM_CODE_POSTAL');
              $error_cp=str_replace("<p>",'', $error_cp);
              $error_cp=str_replace("</p>",'', $error_cp);
              if(!empty($error_cp))
              {
                $defaut['class'] = 'form-control background_error';
                $defaut['title'] = $error_cp;
              }
              
            echo form_input($defaut);
          ?>
          </td>
           <td>
            <?php 
              $defaut = array('name'=>'GMEM_VILLE',
                          'placeholder'=>lang('info_candidat_emploi_ville'),
                          'id'=>'GMEM_VILLE',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
              $error_ville=form_error('GMEM_VILLE');
              $error_ville=str_replace("<p>",'', $error_ville);
              $error_ville=str_replace("</p>",'', $error_ville);
              if(!empty($error_ville))
              {
                $defaut['class'] = "form-control background_error";
                $defaut['title'] = $error_ville;
              }
              echo form_input($defaut);
              ?>
          </td>
           <td>
            <?php 
              $defaut = array('name'=>'GMEM_PAYS',
                          'placeholder'=>lang('info_candidat_emploi_pays'),
                          'id'=>'GMEM_PAYS',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
              $error_pays=form_error('GMEM_PAYS');
              $error_pays=str_replace("<p>",'', $error_pays);
              $error_pays=str_replace("</p>",'', $error_pays);
              if(!empty($error_pays))
              {
                $defaut['class'] = "form-control background_error";
                $defaut['title'] = $error_pays;
              }
              echo form_input($defaut);
              ?>
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

