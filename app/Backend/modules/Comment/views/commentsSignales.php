<div id="commentsSignales" class="col-xs-12 col-md-12 col-lg-12 writeZone">
	<div id="listeCommentairesSignales">
		<h2>Liste des commentaires signalés</h2>
		<table class="table table-hover">
			<thead class="thead-color">
	  			<tr>
	  				<td>pseudo</td><td>Contenu</td><td class="dateAjout">Date d'ajout</td><td>Retirer</td><td>Modifier</td><td>Supprimer</td>
	  			</tr>
	  		</thead>	

			<?php foreach ($listeCommentairesSignales as $comment){
				echo 	'<tr><td>', $comment['pseudo'], 
						'</td><td>le ', $comment['contenu'], 
						'</td><td class="dateAjout">', ($comment['dateAjout']->format('d/m/Y à H\hi')), 

						'</td>
						<td><a href=/admin/comment-stop-signaler-',
						$comment["id"].'.html><button class="btn btn-success btn-lg" data-toggle="tooltip" title="Retirer de la liste"><i class="glyphicon glyphicon-ok" style="font-size:25px;" aria-hidden="true"></i></a> 
						</td>
						<td><a href=/admin/comment-update-',
						$comment["id"].'.html><button class="btn btn-warning btn-lg" data-toggle="tooltip" title="Modifier le commentaire"><i class="glyphicon glyphicon-pencil " style="font-size:25px;" aria-hidden="true"></i></a> 
						</td>
						<td><a href=/admin/comment-delete-', 
						$comment['id'].'.html><button class="btn btn-danger btn-lg" data-toggle="tooltip" title="Supprimer le commentaire"><i class="glyphicon glyphicon-trash" style="font-size:25px;" aria-hidden="true"></i></a></td></tr>', "\n";
			} ?>
		</table>	
	</div>
</div>
