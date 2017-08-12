<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').lang('gest_cursus_resume');?></title>
  </head>
  <body>

    <div id = 'page'>

      <div id = 'header'>
        <?php $this->load->view('backoffice/header.php'); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php $this->load->view('backoffice/menu.php'); ?>

        <div id = 'content' class = 'narrowcolumn'>
         <div id="message">
        <h2>
          <?php echo lang('cursus_resume') ;?>
        </h2>
      </div>
    <div class ="recherche recherche_cursus">
    <!-- liste des entreprises-->
     <?php echo form_open('backoffice_affichage/affichage_cursus_resume');?>
            <div class ="choix">  
                  <p><?php echo form_label(lang('cursus'));?>
                  <?php echo form_dropdown('formation',$formations);?>

          <?php $defaut = array('name'=>'annee',
                          'id'=>'annee',
                          'class' => 'form-control',
                          'placeholder'=>sprintf(lang('val_annee'),date('Y')),
                          'size'=>'50'
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