<html>
	<head>
		 <?php $this->load->view('intervenant/script_intervenant.php');?>
    	<title><?php echo "MBDS ".lang('gest_cours');?></title>
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
            <h2><?php echo lang('create_document_examen');?></h2>
        </div>

        <?php echo form_open_multipart('intervenant_ajout/ajouter_document_examen');?>
        <div id="div_new_document_modele">

        	<p>
        		<?php $defaut = array('name' =>'GMDA_NOM',
        			'placeholder' =>lang("nom_cours"),
        			'id' => 'GMDA_NOM',
        			'size' => '30',
        			'class' => 'form_control',
        			'value' =>set_value('GMDA_NOM')
        			);

        		$error_nom_doc=form_error('GMDA_NOM');
        		$error_nom_doc=str_replace("<p>",'',$error_nom_doc);
        		$error_nom_doc=str_replace("</p>",'',$error_nom_doc);
        		if(!empty($error_nom_doc))
        		{
        			$defaut['class'] = 'form-control background_error';
            		$defaut['title'] = $error_nom_doc;
        		}
        		
        		echo form_label(lang('nom_cours'));
          		echo form_input($defaut);
          		if(!empty($error_nom_doc))
		        {
		            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nom_doc.'</div>';
		       	}
		        ?>
		    </p>

		    <p>

		    <?php $defaut = array('name'=>'GMDA_TYPE',
                          'placeholder'=>lang("val_type_doc"),
                          'id'=>'GMDA_TYPE',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value' =>set_value('GMDA_TYPE')
                          ); 
	          $error_type_doc=form_error('GMDA_TYPE');
	          $error_type_doc=str_replace("<p>",'', $error_type_doc);
	          $error_type_doc=str_replace("</p>",'', $error_type_doc);
	          if(!empty($error_type_doc))
	          {
	            $defaut['class'] = 'form-control background_error';
	            $defaut['title'] = $error_type_doc;
	          }
	              
	          echo form_label(lang('type_doc'));
	          echo form_input($defaut);
	          if(!empty($error_type_doc))
		        {
		            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_type_doc.'</div>';
		        }
		        ?>
		    </p>


		    <p>
		        <?php $defaut = array('name'=>'GMDA_FORMAT',
		                          'placeholder'=>lang("val_format"),
		                          'id'=>'GMDA_FORMAT',
		                          'size'=>'20',
		                          'class' => 'form-control',
		                          'value' =>set_value('GMDA_FORMAT')
		                          ); 
		          $error_format=form_error('GMDA_FORMAT');
		          $error_format=str_replace("<p>",'', $error_format);
		          $error_format=str_replace("</p>",'', $error_format);
		          if(!empty($error_format))
		          {
		            $defaut['class'] = 'form-control background_error';
		            $defaut['title'] = $error_format;
		          }
		              
		          echo form_label(lang('format'));
		          echo form_input($defaut);
		          if(!empty($error_format))
		          {
		            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_format.'</div>';
		          }
		        ?>
		    </p>

		    <p>
		        <?php $defaut = array('name'=>'GMDA_ANNEE',
		                          'placeholder'=>sprintf(lang("val_annee"),date('Y')),
		                          'id'=>'GMDA_ANNEE',
		                          'size'=>'4',
		                          'class' => 'form-control',
		                          'value' =>set_value('GMDA_ANNEE')
		                          ); 
		          $error_annee=form_error('GMDA_ANNEE');
		          $error_annee=str_replace("<p>",'', $error_annee);
		          $error_annee=str_replace("</p>",'', $error_annee);
		          if(!empty($error_annee))
		          {
		            $defaut['class'] = 'form-control background_error';
		            $defaut['title'] = $error_annee;
		          }
		              
		          echo form_label(lang('annee'));
		          echo form_input($defaut);
		          if(!empty($error_annee))
		          {
		            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_annee.'</div>';
		          }
		        ?>
    		</p>


    		    <p>
			       <div id = "uploder" class = "fichier">
			            <?php
			              $data = array(
			                            'name' => 'GMDA_DOCUMENT',
			                            'id' => 'GMDA_DOCUMENT', 
			                            'maxlength' =>'10000',
			                            'class' => 'form-control',
			                            'size'=>'3',
			                            'maxlength' =>'10000',
			                            'value' => set_value('GMDA_DOCUMENT')
			                            );
			              if(isset($error_document))
			              {
			                $data['class'] = 'form-control background_error';
			                $data['title'] = $error_document;
			              }
			              echo form_label(lang("document_modele"));
			              echo form_upload($data);

			              if(isset($error_document))
			              {
			                echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_document.'</div>';
			              }
			 
			            ?>    
			        </div>
    			</p>
				
			</div>
			<div id="div_new_document_modele_buttons" class="btn-group" role="group">
			      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
			      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
			      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
			</div>

    		<?php echo form_close();?>
  </body>
</html>