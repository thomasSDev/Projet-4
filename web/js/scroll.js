var Scroll = {
	divScrollIndex:false,
	descriptionIndex:false,
	signe:0,
	sectDescriptionIndex:0,
	doubleDown:false,
	random:false,
	init : function(){
		this.blink();
		this.blinkLien();
		index = $("#index");
		divScrollIndex = $("#divScrollIndex");
		lienLireIndex = $("#lienLireIndex");
		doubleDown =$("#doubleDown");
		signe = -1;
		random = 0;
		divScrollIndex.click(function(){
			$('html, body').animate({
				scrollTop:index.offset().top
			}, 3000);
		});
	
	},
	blink : function(){
		function clignotant(){
			_this = this;
			var timeoutHandle;
			timeoutHandle=setTimeout(function () { 
				clignotant($("#doubleDown").animate({opacity:0.2},1000).animate({opacity:1}, 1000));
			});
		   	
		};
		setTimeout(clignotant(),4000);
	},
	blinkLien : function(){
		function clignotantLien(){
			_this = this;
			var timeoutHandle;
			timeoutHandle=setTimeout(function () { 
				clignotantLien($("#lienLireIndex").animate({opacity:0.5},1000).animate({opacity:1}, 1000));
			});
		   	
		};
		setTimeout(clignotantLien(),4000);
	}
	 
}