<table id="table_promotion">
	<tbody>
		<?php foreach (array_chunk($promo, 6) as $etudiants): ?>
			<tr>
			  <?php foreach ($etudiants as $etu): ?>
			    <td>
			      <img class="th_photo" src="<?php echo base_url().$etu->GMET_PHOTO;?>"  />
			      <p>
			        <?php echo anchor("etudiant_c/etudiant_details/".$etu->GMET_CODE.'/'.lang('afficher'),$etu->GMET_NOM.' '.$etu->GMET_PRENOM);?>
			      </p>
			    </td>
			  <?php endforeach;?>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>