
<div id="index" class="writeZone index">

	<div id="prefaceIndex">

		<h2>Préface</h2>
		<?php foreach ($listePreface as $preface)
		{
		?>
	  		<p><?= nl2br($preface['contenu']) ?></p>
		<?php
		}

		if ($users->isAuthenticated()) { ?>
	      <span><a  type="submit" class="btn btn-primary btn-envoyer" href="/admin/preface-update-<?= $preface['id'] ?>.html">Modifier la préface</a></span>
		<?php }
		?>

	</div>
	
</div>