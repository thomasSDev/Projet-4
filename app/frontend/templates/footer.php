<?php if($urlUri !=("/user-destroy.html")){ ?>
<div id="blocFooter" class="col-xs-12 col-md-12 col-lg-12">
	

	<div id="liensSocial" class="col-xs-12 col-md-6 col-lg-4 liensFooter">
		<ul>
			<li><a href="http://twitter.com/share"><img src="/images/icones-cercle-vide/twitter.png"></a></li><br>
			<li><a href="https://www.facebook.com/sharer/sharer.php?u=https://blog-projet4.sutrethomas.fr/blog/"><img src="/images/icones-cercle-vide/facebook.png"></a></a>
			</li>
		</ul>	

		<ul>
			<li><a href="https://plus.google.com/share?url=http%3A%2F%2Fwww.aliasdmc.com%2Fdeveloppement%2Fwebmaster%2Ffaire_un_lien_de_partage_sur_les_reseaux_sociaux.php&hl=fr"><img src="/images/icones-cercle-vide/g+.png"></a></li><br>
			<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=https://blog-projet4.sutrethomas.fr/blog/"><img src="/images/icones-cercle-vide/linkedin.png"> </a></li>
		</ul>	
	</div>

	<div id="liensCommerce" class="col-xs-0 col-md-6 col-lg-4 liensFooter"><span>Retrouvez mes oeuvre sur :</span>
		<div id="liensCommerceUnder" class="col-xs-12 col-md-12 col-lg-12">
			<ul>
				<li><a href="https://www.fnac.com/livre.asp#bl=MMli"><img class="imgLiens" src="/images/fnac.gif"></a></li><br>
				<li><a href="https://www.amazon.fr/gp/bestsellers/books/ref=amb_link_1?pf_rd_m=A1X6FK5RDHNB96&pf_rd_s=merchandised-search-leftnav&pf_rd_r=2T9P49FWVBBN1MECA04T&pf_rd_r=2T9P49FWVBBN1MECA04T&pf_rd_t=101&pf_rd_p=f1fc718f-c59a-4005-9827-67daf3b3422b&pf_rd_p=f1fc718f-c59a-4005-9827-67daf3b3422b&pf_rd_i=301061/"><img class="imgLiens" src="/images/logo-amazon.png"></a></li>
			</ul>

			<ul>
				<li><a href="http://www.priceminister.com/nav/Livres_Litterature#xtatc=PUB-[fonc]-[Header]-[Livres]-[LitteratureFiction]-[VoirtoutLitteratureFiction]-[]-[]"><img class="imgLiens" src="/images/priceMinister.png"></a></li><br>
				<li><a href="https://www.cdiscount.com/search/10/librairie.html?NavigationForm.CurrentSelectedNavigationPath%3Df%2F1%2F19#_his_/"><img class="cdisc" src="/images/Logo-CDiscount.gif"></a></li>
			</ul>
		</div>
	</div>

	<div id="menuFooter" class="col-lg-4 liensFooter">
		<span>Pages du blog :</span>
		<ul>
			<li><a href="/">Page d'accueil</a></li>
			<li><a href="/billet.html">Liste des billet</a></li>
			<?php if ($users->isAuthenticated()) { ?>
		        <li><a href="/admin/">Admin</a></li>
		        <li><a href="/admin/billet-insert.html">Ajouter un billet</a></li>
				<li><a href="/admin/">Modifier ou supprimer un billet</a></li>
				<li><a href="/admin/preface-update-1.html">Modifier la préface</a></li>
				<li><a href="/admin/intro-update-1.html">Modifier le texte d'introduction</a></li>
				<li><a href="/admin/description-auteur-update-1.html">Modifier la description de l'auteur</a></li>
				<li><a href="/admin/commentaires-signales.html">Modération des commentaires signalés</a></li>
				<li><a href="/admin/user-liste.html">Gérer les comptes administrateur</a></li>
				<li><a href="/admin/user-destroy.html">Déconnexion</a></li>
          	<?php } 
          	else{ ?>
          		<li><a href="/admin/">S'identifier</button></li>
          	<?php } ?>
		</ul>
	</div>
</div>

<?php } ?>
