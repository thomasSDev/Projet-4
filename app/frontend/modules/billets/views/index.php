
<div id="index">

	<div id="prefaceIndex">

		<h2>Préface</h2>
		<?php foreach ($listePreface as $preface)
		{
		?>
	  		<p><?= nl2br($preface['contenu']) ?></p>
		<?php
		}

		if ($user->isAuthenticated()) { ?>
	      <span><a href="/admin/preface-update-<?= $preface['id'] ?>.html">Modifier la préface</a></span>
		<?php }
		?>

	</div>
	
</div>