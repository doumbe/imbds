<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title><?php echo lang('mbds_back').lang('gest_formation');?></title>
    <script>
      function confirmDialog() {
        var mess = "<?php print lang('confirm_delete_formation'); ?>";
        return confirm(mess);    
      }
  </script>
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
            <h2><?php echo lang("formation_title");?></h2>
        </div>

    <div class ="recherche">
    <!-- liste des entreprises-->
    <?php echo form_open('backoffice_liste/rechercheformation');?>
    <?php echo form_fieldset(lang('search'));?>

        <div id = "nomformation">
          <?php $defaut = array('name'=>'formation',
                          'id'=>'formation',
                          'class' => 'form-control',
                          'placeholder'=>lang('th_formation'),
                          'size'=>'50'
                          ); 
          ?>

          <?php echo form_label(lang('formation'));?>
          <?php echo form_input($defaut);?>
        </div>
        <br/>
        <div id = "nomniveau">
          <?php $defaut = array('name'=>'niveau',
                          'id'=>'niveau',
                          'class' => 'form-control',
                          'placeholder'=>lang('th_niveau'),
                          'size'=>'10'
                          ); 
          ?>

          <?php echo form_label(lang('niveau'));?>
          <?php echo form_input($defaut);?>
        </div>
        <br/>
       <div class = "bouton_recherche">
             <?php  $bouton = array('name' =>'recherche',
                                    'value' =>lang('search'),
                                    'class' =>"btn btn-primary");?>
              <?php echo form_submit($bouton);?>
            </div>  <!--bouton_recherche-->
    <?php echo form_fieldset_close();?>
    <?php echo form_close();?>
  </div>

    <br/><br/>
    <div class ="ajout_element">
      <?php echo anchor("backoffice_ajout/ajouterformation",'<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> '.lang('formation_new').'</span>');?> 
    </div>
   
       <div class="panel-body">
        <div class="table-responsive">
         
          <table class="table table-bordered" >

            <caption>
            <h4><?php echo lang("formation_list");?></h4>
            </caption>
            <thead>
              <tr>
                <th><?php echo lang("th_formation");?></th>
                <th><?php echo lang("th_niveau");?></th>
                <th><?php echo lang("th_mention");?></th>
                <th><?php echo lang("th_domaine");?></th>
                <th><?php echo lang("th_action");?></th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($formation as $row): ?>
                <tr>
                   <td class="table_left"><?php echo $row->GMFO_FORMATION;?></td>
                   <td class="table_left"><?php echo $row->GMFO_NIVEAU;?></td>
                   <td class="table_left"><?php echo $row->GMFO_MENTION;?></td>
                   <td class="table_left"><?php echo $row->GMFO_DOMAINE;?></td>
                   <td>
                      <?php echo anchor('backoffice_modification/ficheformation/'.$row->GMFO_CODE, lang('details'));?>
                      <?php echo anchor('backoffice_modification/modifierformation/'.$row->GMFO_CODE, lang('modify'));?>
                      <?php 
                        $attr = array(
                                      'onclick'=>'return confirmDialog();'
                                      );
                        echo anchor('backoffice_liste/deleteformation/'.$row->GMFO_CODE, lang('delete'),$attr);
                      ?>
                      
                  </td>
                </tr>
                
              <?php endforeach;?>

            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
        <?php 
          if(isset($link))
            echo $link;
          else
          {
            echo form_open('Backoffice_liste/listFormation');
            echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');
            echo form_close();
          }
        ?>
      </div>
      <!-- /.panel-body -->


      <?php 
        $erreur = $this->session->flashdata('error'); 
        if(! empty($erreur)){
          echo "<script> alert('".$erreur."'); </script>";
        }
      ?>

 </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
  </body>
</html>