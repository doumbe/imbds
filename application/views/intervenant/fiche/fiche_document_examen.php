<!DOCTYPE html>
<html lang="en">
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
            <h2> <?php echo sprintf(lang('fiche_document_cours'),$document_attache->GMDA_NOM, $document_attache->GMDA_ANNEE);?></h2>
          </div>
          <div id="div_fiche_document_modele" class="bloc_info">
          <p> <?php echo '<label>'.lang('nom_param').'</label><span id="fiche_document_modele_nom">'.$document_attache->GMDA_NOM.'</span>';?>
          </p>
          <p> <?php echo '<label>'.lang('type_doc').'</label><span id="fiche_document_modele_type">'.$document_attache->GMDA_TYPE.'</span>';?></p>
          <p> <?php echo '<label>'.lang('format').'</label><span id="fiche_document_modele_format">'.$document_attache->GMDA_FORMAT.'</span>';?></p>
          <p> <?php echo '<label>'.lang('annee').'</label><span id="fiche_document_modele_annee">'.$document_attache->GMDA_ANNEE.'</span>';?></p>
          <div id="div_logo_doc_mod">
             <?php
              
              $doc_name=explode("/", $document_attache->GMDA_DOCUMENT);
              $doc_name=$doc_name[count($doc_name)-1];
              
              $other = array(
                              'target' => '_blank',
                              'title' => $doc_name
                            );

              if(!is_null($document_attache->GMDA_DOCUMENT)){
                if($document_attache->GMDA_FORMAT=="pdf")
                {
                  echo anchor(base_url().$document_attache->GMDA_DOCUMENT,'<img class="fiche_doc_logo" src="'.base_url().'images/logo/pdf.png"/>',$other);
                }
                if($document_attache->GMDA_FORMAT=="word" or $document_attache->GMDA_FORMAT=="doc")
                {
                  echo anchor(base_url().$document_attache->GMDA_DOCUMENT,'<img class="fiche_doc_logo" src="'.base_url().'images/logo/word.png"/>',$other);
                }
                if($document_attache->GMDA_FORMAT=="excel" or $document_attache->GMDA_FORMAT=="xls")
                {
                  echo anchor(base_url().$document_attache->GMDA_DOCUMENT,'<img class="fiche_doc_logo" src="'.base_url().'images/logo/excel.png"/>',$other);
                }
                elseif($document_attache->GMDA_FORMAT=="powerpoint" or $document_attache->GMDA_FORMAT=="ppt")
                {
                  echo anchor(base_url().$document_attache->GMDA_DOCUMENT,'<img class="fiche_doc_logo" src="'.base_url().'images/logo/ppt.png"/>',$other);
                }
                elseif($document_attache->GMDA_FORMAT=="texte" or $document_attache->GMDA_FORMAT=="txt")
                {
                  echo anchor(base_url().$document_attache->GMDA_DOCUMENT,'<img class="fiche_doc_logo" src="'.base_url().'images/logo/txt.png"/>',$other);
                }
              }
              echo '<span id="fiche_document_modele_nom_doc">'.$doc_name.'</span>';
          ?>
          </div>
        </div>
         </br> 
        <?php echo form_open('intervenant_list/list_document_sujet_examen');?>
        <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
        <?php echo form_close();?>
