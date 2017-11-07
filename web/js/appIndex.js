$( document ).ready(function() {

	var burger = Object.create(Burger);
	burger.init();

	var scroll = Object.create(Scroll);
	scroll.init();

	var removeNavBarTop = Object.create(RemoveNavBarTop);
	removeNavBarTop.init();
});