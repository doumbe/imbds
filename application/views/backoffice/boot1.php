<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src= "<?php echo base_url() ?>bootstrap/js/bootstrap.min.js"></script>

    <link href=" <?php echo base_url(); ?>bootstrap/css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <h1>Liste des Contacts</h1>

   
       <div class="panel-body">
        <div class="table-responsive">
         
          <table class="table table-bordered" >

            <caption>
            <h4>Liste des contacts </h4>
            </caption>
            <thead>
              <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Entreprise</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
               <?php 
                foreach ($contact as $row): ?>
                <tr>
                   <td class="table_left"><?php echo $row->GMCON_CODE;?></td>
                   <td class="table_left"><?php echo $row->GMCON_NOM;?></td>
                   <td class="table_left"><?php echo $row->GMCON_PRENOM;?></td>
                   <td class="table_left"><?php echo $row->GMEN_NOM;?></td>
                   <td>
                      <a href="C:../documentmodele/10402918_868834649809694_2912441880729614958_n.jpg"> Supprimer</a>
                      <a href="<?php echo base_url()?>backoffice/ajouterContact"> modifier</a>
                  </td>
                </tr>
                
              <?php endforeach;?>

            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.panel-body -->


  </body>
</html>