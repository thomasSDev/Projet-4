var AdminClick = {
	zoneTexteDefaut : false,
	zoneCreerBillet : false,
	zoneModifBillet : false,
	zoneModererCom : false,
	zoneModifIntro : false,
	zoneModifDescAuteur : false,
	boutonCreerBilletAdmin : false,
	boutonModifBilletAdmin : false,
	boutonModererComAdmin : false,
	boutonModifIntroAdmin : false,
	boutonModifDescAuteur : false,
	init : function(){
		zoneTexteDefaut = $("#zoneTexteDefaut");
		zoneCreerBillet = $("#zoneCreerBillet");
		zoneModifBillet = $("#zoneModifBillet");
		zoneModererCom = $("#zoneModererCom");
		zoneModifIntro = $("#zoneModifIntro");
		zoneModifDescAuteur = $("#zoneModifDescAuteur");
		boutonCreerBilletAdmin = $("#creerBilletAdmin");
		boutonModifBilletAdmin = $("#modifBilletAdmin");
		boutonModererComAdmin = $("#modererComAdmin");
		boutonModifIntroAdmin = $("#modifIntroAdmin");
		boutonModifDescAuteur = $("#modifDescAuteur");

		boutonCreerBilletAdmin.click(function(e){
			zoneCreerBillet.css("display", "block");
			zoneTexteDefaut.css("display", "none");
			zoneModifBillet.css("display", "none");
			zoneModererCom.css("display", "none");
			zoneModifIntro.css("display", "none");
			zoneModifDescAuteur.css("display", "none");
		});
		boutonModifBilletAdmin.click(function(e){
			zoneCreerBillet.css("display", "none");
			zoneTexteDefaut.css("display", "none");
			zoneModifBillet.css("display", "block");
			zoneModererCom.css("display", "none");
			zoneModifIntro.css("display", "none");
			zoneModifDescAuteur.css("display", "none");
		});	
		boutonModererComAdmin.click(function(e){
			zoneCreerBillet.css("display", "none");
			zoneTexteDefaut.css("display", "none");
			zoneModifBillet.css("display", "none");
			zoneModererCom.css("display", "block");
			zoneModifIntro.css("display", "none");
			zoneModifDescAuteur.css("display", "none");
		});			
		boutonModifIntroAdmin.click(function(e){
			zoneCreerBillet.css("display", "none");
			zoneTexteDefaut.css("display", "none");
			zoneModifBillet.css("display", "none");
			zoneModererCom.css("display", "none");
			zoneModifIntro.css("display", "block");
			zoneModifDescAuteur.css("display", "none");
		});		
		boutonModifDescAuteur.click(function(e){
			zoneCreerBillet.css("display", "none");
			zoneTexteDefaut.css("display", "none");
			zoneModifBillet.css("display", "none");
			zoneModererCom.css("display", "none");
			zoneModifIntro.css("display", "none");
			zoneModifDescAuteur.css("display", "block");
		});			
	}
}