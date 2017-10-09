<?php if($urlUri !=("/user-destroy.html")){ ?>
<div class="col-md-12">
	<div id="menu">
		<ul>
			<li><a href="/">Page d'accueil</a></li>
			<li><a href="/accueil.html">Liste des billets</a></li>
			<?php if ($user->isAuthenticated()) { ?>
		        <li><a href="/admin/">Admin</a></li>
		        <li><a href="/admin/billets-insert.html">Ajouter un billet</a></li>
		        <li><a href="/user-destroy.html">Se déconnecter</a></li>
          	<?php } 
          	else{ ?>
          		<li><a href="/admin/">S'identifier</button></li>
          	<?php } ?>
		</ul>
	</div>
	
</div>

<?php } ?>