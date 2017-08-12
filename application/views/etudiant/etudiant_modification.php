<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/etudiant_css.css">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/ancien_css.css">
    <?php include("/../base_site/script_base_site.php");?>
    <title>
      <?php echo lang('titre').$etudiant->getNom().' '.$etudiant->getPrenom();?>
    </title>
    <script>
      $(function()
      {
        var date = $('input:hidden[name=date_naiss]').val();
        datebis = date.split('-');
        var newDate = new Date(datebis[0],datebis[1]-1,datebis[2]+1);
        $("#datepicker" ).datepicker(
        { 
          dateFormat: 'yy-mm-dd',
          defaultDate: newDate,
          clickInput: true,
          changeMonth : true,
          changeYear :true
        });
        $('#datepicker').datepicker('setDate',newDate);

        $('.verif-email').focusout(function()
        {
          alert('je suis ici');
          var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
          var emailblockReg = /^([\w-\.]+@(?!hotmail.fr)(?!hotmail.com)([\w-]+\.)+[\w-]{2,4})?$/;
          var emailaddressVal = $("#email").val();
          alert(emailaddressVal);
          if(emailaddressVal == '')
          {
            alert('Le champs est vide.');
          }
          else if(!emailReg.test(emailaddressVal))
          {
            alert('Ce n\'est pas une adresse email');
          }
          else if(!emailblockReg.test(emailaddressVal))
          {
            alert('N\'utilisez pas votre adresse hotmail ! GRRR');
          }
          else
          {
            $('.error').text('');
          }
        });
      });


      $(document).ready(function() {});
    </script>
  </head>
  <body>
    <div id="page">
      <div id="contenu">
        <?php include("/../etudiant/etudiant_menu_gauche.php");?>
        <div id="content" class="narrowcolumn">
          <div id="modifier_detail_ancien_content" class="post">
            <h3><?php echo $message;?></h3>
            <br/><br/>
            <?php echo form_open("etudiant_c/submit");?>
            <?php echo form_fieldset(lang('message_modifier').$etudiant->getNom().' '.$etudiant->getPrenom());?>
            <p>
              <?php echo form_hidden('GMAN_CODE',$etudiant->getId());?>

              <?php echo form_label(lang('civilite'),'GMAN_CIVILITE'); ?>
              <?php
                $civ = array(
                              'Monsieur' => lang('civ_m'),
                              'Madame' => lang('civ_mme'),
                              'Mademoiselle' =>lang('civ_mlle'),
                              'Docteur' =>lang('civ_dr'),
                              'Maitre' =>lang('civ_me'),
                              'Professeur' =>lang('civ_pr')
                            );
                echo form_dropdown('GMAN_CIVILITE',$civ,$etudiant->getCivilite());
              ?>
              <br/>

              <?php echo form_label(lang('nom'),'GMAN_NOM'); ?>
              <?php echo form_input('GMAN_NOM',$etudiant->getNom());?>
              <br/>

              <?php echo form_label(lang('prenom'),'GMAN_PRENOM'); ?>
              <?php echo form_input('GMAN_PRENOM',$etudiant->getPrenom());?>
              <br/>

              <?php echo form_label(lang('date_naissance'),'GMAN_DATE_DE_NAISSANCE');?>
              <?php echo form_hidden('date_naiss',$etudiant->getDateNaissance());?>
              <?php
                $date = array(
                              'id' => 'datepicker',
                              'name' => 'GMAN_DATE_DE_NAISSANCE',
                              'value' => ''
                              );
                echo form_input($date);
              ?>
              <br/>

              <?php echo form_label(lang('lieu_naissance'),'GMAN_LIEU_DE_NAISSANCE');?>
              <?php echo form_input('GMAN_LIEU_DE_NAISSANCE',$etudiant->getLieuNaissance());?>
              <br/>

              <?php echo form_label(lang('pays_naissance'),'GMAN_PAYS_DE_NAISSANCE');?>
              <?php echo form_input('GMAN_PAYS_DE_NAISSANCE',$etudiant->getPaysNaissance());?>
              <br/>

              <?php echo form_label(lang('nationalite'),'GMAN_NATIONALITE');?>
              <?php echo form_input('GMAN_NATIONALITE',$etudiant->getNationalite());?>
              <br/>

              <?php echo form_label(lang('adresse'),'GMAN_ADRESSE');?>
              <?php
                $adresse = array(
                                  'id' => 'adresse' ,
                                  'name' =>'GMAN_ADRESSE',
                                  'value' => $etudiant->getAdresse(),
                                  'maxlength'=>'100', 'size'=>'50',
                                  'style'=>'width:50%'
                                );
                echo form_input($adresse);
              ?>
              <br/>

              <?php echo form_label(lang('code_postal'),'GMAN_CODE_POSTAL');?>
              <?php echo form_input('GMAN_CODE_POSTAL',$etudiant->getCodePostal());?>
              <br/>

              <?php echo form_label(lang('ville'),'GMAN_VILLE');?>
              <?php echo form_input('GMAN_VILLE',$etudiant->getVille());?>
              <br/>

              <?php echo form_label(lang('pays'),'GMAN_PAYS');?>
              <?php echo form_input('GMAN_PAYS',$etudiant->getPays());?>
              <br/>

              <?php echo form_label(lang('telephone_personnel'),'GMAN_TEL_PERSO');?>
              <?php echo form_input('GMAN_TEL_PERSO',$etudiant->getTelPerso()); ?>
              <br/>

              <?php echo form_label(lang('portable'),'GMAN_PORTABLE');?>
              <?php echo form_input('GMAN_PORTABLE',$etudiant->getPortable());?>
              <br/>

              <?php echo form_label(lang('email'),'GMAN_EMAIL');?>
              <?php
                $email = array(
                                'id' => 'email',
                                'name' => 'GMAN_EMAIL',
                                'value' => $etudiant->getEmail(),
                                'maxlength'=>'100',
                                'size'=>'50',
                                'style'=>'width:50%',
                                'classe' =>'verif_email'
                              );
                echo form_input($email);
              ?>
              <div class="error"></div>

              <?php echo form_label(lang('dernier_diplome'),'GMAN_DERNIER_DIPLOME'); ?>
              <?php
                $dernier_dip = array('id' => 'dernier_dip',
                                      'name' => 'GMAN_DERNIER_DIPLOME',
                                      'value' => $etudiant->getDernierDiplome(),
                                      'maxlength'=>'100',
                                      'size'=>'50',
                                      'style'=>'width:50%'
                                    );
                echo form_input($dernier_dip);
              ?>
              <br/>

              <?php echo form_label(lang('titre_projet'),'GMAN_TITRE_PROJET');?>
              <?php echo form_input('GMAN_TITRE_PROJET',$etudiant->getTitreProjet());?>
              <br/>

              <?php echo form_label(lang('entreprise_projet'),'GMAN_ENTREPRISE_PROJET');?>
              <?php echo form_input('GMAN_ENTREPRISE_PROJET',$etudiant->getEntrepriseProjet());?>
              <br/>

              <?php echo form_label(lang('entreprise_stage'),'GMAN_ENTREPRISE_STAGE');?>
              <?php echo form_input('GMAN_ENTREPRISE_STAGE',$etudiant->getEntrepriseStage());?>
              <br/>


              <?php echo form_label(lang('responsable_stage'),'GMAN_RESP_STAGE');?>
              <?php echo form_input('GMAN_RESP_STAGE',$etudiant->getRespStage());?>
              <br/>


              <?php echo form_label(lang('nature_stage'),'GMAN_NATURE_STAGE');?>
              <?php
                $nature_stage = array(
                                        'Apprentissage' => lang('apprentissage'),
                                        'Contrat Professionnel' => lang('contrat_professionel'),
                                        'Stage' =>lang('stage'),
                                        'Stage Longue Durée' =>lang('stage_longue_duree')
                                      );
                echo form_dropdown('GMAN_NATURE_STAGE',$nature_stage,$etudiant->getNatureStage());
              ?>
              <br/>

              <?php echo form_label(lang('promotion'),'GMAN_PROMOTION');?>
              <?php
                $promotion = array();
                foreach ($promo as $row)
                {
                  $promotion[$row->GMPR_CODE] = $row->GMPR_NOM;
                }
                echo form_dropdown('GMAN_PROMOTION',$promotion,$etudiant->getPromotion());
              ?>
              <br/>

              <?php echo form_label(lang('option'),'GMAN_OPTION');?>
              <?php echo form_input('GMAN_OPTION',$etudiant->getOption());?>
              <br/>

              <?php echo form_label(lang('sigle_option'),'GMAN_SIGLE_OPTION');?>
              <?php
                $sigle_option = array(
                                        'BD' => 'BD',
                                        'MI' => 'MI'
                                      );
                echo form_dropdown('GMAN_SIGLE_OPTION',$sigle_option,$etudiant->getSigleOption());
              ?>
              <br/>

              <?php echo form_label(lang('sigle_diplome'),'GMAN_SIGLE_DIPLOME');?>
              <?php
                $sigle_diplome = array(
                                        'MSBDS' => 'MSBDS',
                                        'DU MBDS' => 'DU MBDS',      
                                        'DESS'=>'DESS',
                                        'MIAGE/MBDS' =>'MIAGE/MBDS',
                                        'MSBDS' => 'MSBDS'
                                      );
                echo form_dropdown('GMAN_SIGLE_DIPLOME',$sigle_diplome,$etudiant->getSigleDiplome());
              ?>
              <br/>

              <?php echo form_label(lang('observation'),'GMAN_OBSERVATION');?>
              <?php
                $obs = array(
                              'name' => 'GMAN_OBSERVATION',
                              'id' => 'observations',
                              'value' => $etudiant->getObservation(),
                              'rows' => '3',
                              'cols' => '50'
                            );
                echo form_textarea($obs);
              ?>
              <br/>

              <?php echo form_label(lang('cv'),'GMDOCA_NOM');?>
              <?php
                $upload = array(
                                  'name' => 'GMDOCA_NOM', 
                                  'Class' =>'upload'
                                );
                echo form_upload($upload);
              ?>

              <?php echo form_submit('submit',lang('modifier'));?>
            </p>
            <?php echo form_fieldset_close();?>

            <?php echo form_close();?>
          </div>
        </div>
      </div>
      <?php include("/../base_site/footer_base_site.php");?>
    </div>
  </body>
</html>