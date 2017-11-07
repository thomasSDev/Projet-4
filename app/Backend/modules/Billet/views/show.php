<div id="showAdmin" class="writeZone">

	<div id="billetShowAdmin">

		<p>Par <em><?= $billet['auteur'] ?></em>, le <?= $billet['dateAjout']->format('d/m/Y à H\hi') ?></p>
		<h2><?= $billet['titre'] ?></h2>
		<p><?= nl2br($billet['contenu']) ?></p>
		 
		<?php if ($billet['dateAjout'] != $billet['dateModif']) { ?>
		  <p><small><em>Modifiée le <?= $billet['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
		<?php } ?>
		<span class="btnIcone">
			<a href="/admin/billet-update-<?= 
			  $billet['id']?>.html">
		 	<button class="btn btn-warning btn-lg" data-toggle="tooltip" title="Modifier le billet"><i class="glyphicon glyphicon-pencil " style="font-size:25px;" aria-hidden="true"></i></a></button>		

		 	<button class="btn btn-danger btn-lg" data-toggle="tooltip" title="Supprimer le billet"><i class="glyphicon glyphicon-trash" style="font-size:25px;" aria-hidden="true"></i></a></button>
		</span>



	</div> 

</div>