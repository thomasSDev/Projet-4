
<div id="accueil" class="col-xs12">

	<div id="texteIntro" class="col-xs-12 col-md-12 col-lg-12">

		<h3>Introduction</h3>
		<?php foreach ($listeIntro as $intro)
		{ ?>
		  <h2><?= $intro['titre'] ?></a></h2>
		  <p><?= nl2br($intro['contenu']) ?></p>
		<?php
		}

		if ($user->isAuthenticated()) { ?>
	    	<span><a href="/admin/intro-update-<?= $intro['id'] ?>.html">Modifier le texte d'introduction</a></span>
		<?php
		} ?>

	</div>

	<div id="listeBilletsAccueil" class="col-xs-12 col-md-8 col-lg-8">

		<?php foreach ($listeBillets as $billets)
		{
		?>
		  <h2><a href="billets-<?= $billets['id'] ?>.html"><?= $billets['titre'] ?></a></h2>
		  <p><?= nl2br($billets['contenu']) ?></p>
		<?php }
		?>
		
	</div>

	
	<div id="descriptionAuteurAccueil" class="col-xs-12 col-md-4 col-lg-4">	

		<h3>Présentation de l'auteur</h3>

		<?php foreach ($listeDescriptionAuteur as $descriptionAuteur)
		{
		?>
		  <h2><?= $descriptionAuteur['titre'] ?></a></h2>
		  <p><?= nl2br($descriptionAuteur['contenu']) ?></p>
		<?php
		}
		if ($user->isAuthenticated()) { ?>
			<a href="/admin/descriptionAuteur-update-<?= $descriptionAuteur['id'] ?>.html">Modifier la description de l'auteur</a>
		<?php } ?>

	</div>
</div>	
