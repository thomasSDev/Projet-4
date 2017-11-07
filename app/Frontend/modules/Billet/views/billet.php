
<div id="billet" class="col-xs12 col-md-12 col-lg-12 writeZoneMedia">

	<div id="texteIntro" class="col-xs-12 col-md-12 col-lg-12 writeZoneMediaSmall">

		
		<?php foreach ($listeIntro as $intro)
		{ ?>
		  <h2><?= $intro['titre'] ?></a></h2>
		  <p><?= nl2br($intro['contenu']) ?></p>
		<?php
		}

		if ($users->isAuthenticated()) { ?>
	    	<span><a type="submit" class="btn btn-primary btn-envoyer" href="/admin/intro-update-<?= $intro['id'] ?>.html">Modifier le texte d'introduction</a></span>
		<?php
		} ?>

	</div>

	<div id="listeBillet" class="col-xs-12 col-md-7 col-lg-7  writeZoneMediaSmall">
		<h2>Liste des billet</h2>
		<?php foreach ($listeBillet as $billet)
		{
		?>
		  <h2><a href="billet-<?= $billet['id'] ?>.html"><?= $billet['titre'] ?></a></h2>
		  <p><?= nl2br($billet['contenu']) ?> <a class="lireSuite" href="billet-<?= $billet['id'] ?>.html">Lire la suite</a></p>
		<?php }
		?>
		
	</div>

	
	<div id="descriptionAuteurBillet" class="col-xs-12 col-md-5 col-lg-5  writeZoneMediaSmall">	

		

		<?php foreach ($listeDescriptionAuteur as $descriptionAuteur)
		{
		?>
		  <h2><?= $descriptionAuteur['titre'] ?></a></h2>
		  <p><?= nl2br($descriptionAuteur['contenu']) ?></p>
		<?php
		}
		if ($users->isAuthenticated()) { ?>

			<span><a  type="submit" class="btn btn-primary btn-envoyer" href="/admin/description-auteur-update-<?= $descriptionAuteur['id'] ?>.html">Modifier la description de l'auteur</a></span>
		<?php } ?>

	</div>
</div>	