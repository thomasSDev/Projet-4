			<?php if($urlUri == "/"){ ?>
				<li class="bActive"> <a class="btn" href="/"><i class="fa fa-home"> Accueil</i></a></li>
			<?php }
			elseif($urlUri != "/") { ?>
				<li> <a class="btn bDefault" href="/"><i class="fa fa-home"> Accueil</i></a></li>
			<?php }
			if($urlUri == "/billet.html"){ ?>
				<li class="bActive"><a class="btn" href="/billet.html"><i class="fa fa-list-alt" aria-hidden="true"> Liste des billet</i></a></li>
			<?php }
			elseif($urlUri != "/billet.html") { ?>
				<li><a class="btn bDefault" href="/billet.html"><i class="fa fa-list-alt" aria-hidden="true"> Liste des billet</i></a></li>
			<?php }
			 if ($users->isAuthenticated()) {
				if(preg_match("#admin#" , $urlUri)){ ?>
					<li class="bActive">
						<a class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-unlock-alt" aria-hidden="true"> Administration du blog</i>
				    	<span class="caret"></span>
				  		</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a class="btn btn-after-drop bDefault" href="/admin/billet-insert.html">Ajouter un billet</a></li>
							<li><a class="btn btn-after-drop bDefault" href="/admin/">Modifier ou supprimer un billet</a></li>
							<li><a class="btn btn-after-drop bDefault" href="/admin/preface-update-1.html">Modifier la préface</a></li>
							<li><a class="btn btn-after-drop bDefault" href="/admin/intro-update-1.html">Modifier le texte d'introduction</a></li>
							<li><a class="btn btn-after-drop bDefault" href="/admin/description-auteur-update-1.html">Modifier la description de l'auteur</a></li>
							<li><a class="btn btn-after-drop bDefault" href="/admin/commentaires-signales.html">Modération des commentaires signalés</a></li>
							<li><a class="btn btn-after-drop bDefault" href="/admin/user-liste.html">Gérer les comptes administrateur</a></li>
							<li><a class="btn btn-after-drop bDefault" href="/admin/user-destroy.html">Déconnexion</a></li>
						</ul>
					</li>
				<?php }
			
				elseif($urlUri != "/admin/") { ?>	
			        <li>
						<a class="btn bDefault dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-unlock-alt" aria-hidden="true"> Administration du blog</i>
				    	
				    	<span class="caret"></span>
				  		</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a class="btn btn-after-drop bDefault" href="/admin/billet-insert.html">Ajouter un billet</a></li>
							<li><a class=" bDefault" href="/admin/">Modifier ou supprimer un billet</a></li>
							<li><a class="btn btn-after-drop bDefault" href="/admin/preface-update-1.html">Modifier la préface</a></li>
							<li><a class="btn btn-after-drop bDefault" href="/admin/intro-update-1.html">Modifier le texte d'introduction</a></li>
							<li><a class="btn btn-after-drop bDefault" href="/admin/description-auteur-update-1.html">Modifier la description de l'auteur</a></li>
							<li><a class="btn btn-after-drop bDefault" href="/admin/commentaires-signales.html">Modération des commentaires signalés</a></li>
							<li><a class="btn btn-after-drop bDefault" href="/admin/user-liste.html">Gérer les comptes administrateur</a></li>
							<li><a class="btn btn-after-drop bDefault" href="/admin/user-destroy.html">Déconnexion</a></li>
						</ul>
					</li>
	      		<?php } 
	      	}	
	      	else{ 
	      		if($urlUri == "/admin/") {?>
	      			<li class=" bActive"><a class="btn" href="/admin/"><i class="fa fa-address-card" aria-hidden="true"> S'identifier</i></a></li>
	      		<?php }
	      		elseif($urlUri != "/admin/"){ ?>
	      			<li><a class="btn bDefault" href="/admin/"><i class="fa fa-address-card" aria-hidden="true"> S'identifier</i></a></li>
	      		<?php }
	        } 

