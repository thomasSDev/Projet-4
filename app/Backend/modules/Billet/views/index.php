<div id="admin" class="col-xs-12 col-md-12 col-lg-12 writeZone">
	<div id="tableBilletAdmin">
		<h2>Liste des billet actuellement en ligne</h2>
		<p style="text-align: center">Il y a actuellement <?= $nombreBillet ?> billet. En voici la liste :</p>
		 
		<table class="table table-hover">
			<thead class="thead-color"> 
		  		<tr>
		  			<td>Auteur</td><td>Titre</td><td class="dateAjout">Date d'ajout</td><td class="dateModif">Dernière modification</td><td>Lire</td><td> modifier</td><td>supprimer</td>
		  		</tr>
		  	</thead>
		<?php foreach ($listeBillet as $billet)
		{
		  echo '<tr><td>', 
			  $billet['auteur'], 
			  '</td><td>', 
			  $billet['titre'], 
			  '</td><td class="dateAjout">le ', 
			  $billet['dateAjout']->format('d/m/Y à H\hi'), 
			  '</td><td class="dateModif">', ($billet['dateAjout'] == $billet['dateModif'] ? '-' : 'le '.$billet['dateModif']->format('d/m/Y à H\hi')), 
			  '</td><td>
			  <a href="billet-', $billet['id'],'.html">
			  <button class="btn btn-info btn-lg btnIcone" data-toggle="tooltip" title="Lire le billet"><i class="glyphicon glyphicon-triangle-right" style="font-size:1.5em;" aria-hidden="true"></i></a>
			  </td><td>
			  <a href="billet-update-',$billet['id'],'.html">
			  <button class="btn btn-warning btn-lg btnIcone" data-toggle="tooltip" title="Modifier le billet"><i class="glyphicon glyphicon-pencil " style="font-size:1.5em;" aria-hidden="true"></i></a>
			  </td><td>
			  <a href="billet-delete-',$billet['id'],'.html">
			  <button class="btn btn-danger btn-lg btnIcone" data-toggle="tooltip" title="Supprimer le billet"><i class="glyphicon glyphicon-trash" style="font-size:1.5em;" aria-hidden="true"></i></a>
			  </td></tr>', "\n";

		}?>
		</table>
	</div>
</div>	