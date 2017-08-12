<nav id="menu_links" class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li >
        	<?php 
			     $fiche = array(
				      'id' => 'etu_menu_fiche',
				      'class' => 'link a_link_file',
				      'title' => lang('fiche_perso')
			      );
            echo anchor("intervenant_c/intervenant_details/".$intervenant->GMIN_CODE, lang('fiche_perso'), $fiche);
          ?>
        </li>
    <!--
    <li>
      <?php$langue = //array(
         // 'id' => 'etu_menu_langues',
          //'class' => 'link a_link_file',
          //'title' => lang('langue'));
      //echo anchor("inter")
?>
      -->
    </ul>
    </div>
  </div>
</nav>