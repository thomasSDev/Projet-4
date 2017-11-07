

<div id="show" class="writeZone">

	<div id="billetShow">

		<p>Par <em><?= $billet['auteur'] ?></em>, le <?= $billet['dateAjout']->format('d/m/Y à H\hi') ?></p>
		<h2><?= $billet['titre'] ?></h2>
		<p><?= nl2br($billet['contenu']) ?></p>
		 
		<?php if ($billet['dateAjout'] != $billet['dateModif']) { ?>
		  <p><small><em>Modifiée le <?= $billet['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
		<?php }
		if ($users->isAuthenticated()) { ?>
		 <span>
		 	<a class="btn btn-warning btn-lg" href="/admin/billet-update-<?= $billet['id'] ?>.html" data-toggle="tooltip" title="Modifier le billet"><i class="glyphicon glyphicon-pencil " style="font-size:25px;" aria-hidden="true"></i></a>

		 	<a class="btn btn-danger btn-lg" href="/admin/billet-delete-<?= $billet['id'] ?>.html" data-toggle="tooltip" title="Supprimer le billet"><i class="glyphicon glyphicon-trash" style="font-size:25px;" aria-hidden="true"></i></a>
		</span><br>
		<?php
	}
		if (empty($comments))
		{
		?>
		<span class="texteAnnexe">Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</span>
		<?php } ?>

	</div> 

	<div id="commentairesShow">

		<?php foreach ($comments as $comment) : ?>
			<fieldset>
				<legend>
					Posté par <strong><?= htmlspecialchars($comment['pseudo']) ?></strong> 
					le <?= $comment['dateAjout']->format('d/m/Y à H\hi') ?>
				</legend>
				<p><?= nl2br(($comment['contenu'])) ?></p>
			</fieldset>
			<?php if ($users->isAuthenticated()) : ?> 
		  		<span><a type="submit" class="btn btn-primary btn-envoyer" href="/admin/comment-update-<?= $comment['id'] ?>.html">Modifier le commentaire</a></span>
		  		<span><a type="submit" class="btn btn-primary btn-envoyer" href="/admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer le commentaire</a></span>
			<?php endif ?>
			<span><a type="submit" class="btn btn-primary btn-envoyer" href="comment-signaler-<?= $comment['id'] ?>.html">Signaler le commentaire</a></span>
		<?php endforeach ?>

		<span><a type="submit" class="btn btn-primary btn-envoyer" href="commenter-<?= $billet['id'] ?>.html">Ajouter un commentaire</a></span>

	</div>	
	
</div>