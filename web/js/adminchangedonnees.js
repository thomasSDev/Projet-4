var AdminChangeDonnees = {
	divFormDonneesAdmin:false,
	accesDonneesAdmin:false,
	init : function(){
		divFormDonneesAdmin = $("#divFormDonneesAdmin");
		accesDonneesAdmin = $("#accesDonneesAdmin");
		accesDonneesAdmin.click(function(e){
			divFormDonneesAdmin.css("display", "block");
		});
	}
}