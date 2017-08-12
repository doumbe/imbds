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
            <h2>
              <?php echo lang('Notes_par_cours');?>
            </h2>
          </div>

        <div class ="recherche recherche_cursus">
    <!-- liste des entreprises-->
     <?php echo form_open('intervenant_affichage/affichage_liste_notes_etudiants');?>
            <div class ="choix">  
                 <p> <?php echo form_label(lang('cours'));?>
                  <?php echo form_dropdown('cours',$cours_tab);?>


          <?php $defaut = array('name'=>'annee',
                          'id'=>'annee',
                          'class' => 'form-control',
                          'placeholder'=>"2014",
                          'value' =>'2014',
                          'size'=>'50',
                          'readonly'=>'true'
                          ); 
          ?>
          <?php echo form_input($defaut);?>
               
                  <?php  $bouton = array('name' =>'selection',
                                          'value' =>lang('select'),
                                          'class' =>"btn btn-primary");?>
                  <?php echo form_submit($bouton);?></p>
            </div>  
            
          <?php echo form_close();?>
          <br/>
    </div>
      </div>
      <!-- /.panel-body -->
</div><!--content-->
    </div><!--contenu-->

  </div><!--page-->

  </body>
</html>