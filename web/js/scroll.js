var Scroll = {
	texteDoubleDown:false,
	divScrollIndex:false,
	doubleDown:false,
	writeZone:false,
	init : function(){
		this.blink();
		texteDoubleDown = $(".texteDoubleDown");
		writeZone = $(".writeZone");
		divScrollIndex = $("#divScrollIndex");
		doubleDown =$("#doubleDown");
		divScrollIndex.click(function(){
			$('html, body').animate({
				scrollTop:writeZone.offset().top
			}, 2000);
		});
	
	},
	blink : function(){
		function clignotant(){
			var timeoutHandle;
			timeoutHandle=setTimeout(function () { 
				clignotant($("#doubleDown").animate({opacity:0.2},1000).animate({opacity:1}, 1000));

			});
		   	
		};
		clignotant();
	}
}