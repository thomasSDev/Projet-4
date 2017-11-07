<div id="adminUser" class="col-xs-12 col-md-12 col-lg-12 writeZone">

	<div id="tableUserAdmin">
		<h2>Liste des comptes actuellement disponibles</h2>
		<p style="text-align: center">Il y a actuellement <?= $nombreUsers ?> comptes. En voici la liste :</p>

		<table class="table table-hover">
			<thead class="thead-color">
		  		<tr>
		  			<td>Pseudo</td><td>Mail</td><td>Modifier</td><td>Supprimer</td>
		  		</tr>
		  	</thead>	
		<?php foreach ($listeUsers as $user)
		{
		  echo '<tr><td>', 
			  $user['pseudo'], 
			  '</td><td>', 
			  $user['mail'], 
			  '</td><td>', 
			  '
			  <a href="user-update-',$user['id'],'.html">
			  <button class="btn btn-warning btn-lg btnIcone" data-toggle="tooltip" title="Modifier le compte"><i class="glyphicon glyphicon-pencil " style="font-size:1.5em;" aria-hidden="true"></i></a>
			  </td><td>
			  <a href="user-delete-',$user['id'],'.html">
			  <button class="btn btn-danger btn-lg btnIcone" data-toggle="tooltip" title="Supprimer le compte"><i class="glyphicon glyphicon-trash" style="font-size:1.5em;" aria-hidden="true"></i></a></td></tr>', "\n";

		}?>
		</table>
	</div>

	<div>
		<a  type="submit" class="btn btn-primary btn-envoyer" href="/admin/user-save.html">Ajouter un compte administrateur</a>
	</div>
</div>	