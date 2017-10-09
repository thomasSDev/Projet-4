var IndexIdentif = {
	divFormIndex:false,
	identif:false,
	init : function(){
		divFormIndex = $("#divFormIndex");
		identif = $("#identif");
		identif.click(function(e){
			divFormIndex.css("display", "block");
		});
	}
}