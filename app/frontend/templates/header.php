<div id="navBarTop" class="col-xs-12 col-md-12 col-lg-12">

	<ul class=" burgerList nav nav-pills  navbar-justify navbar-fixed-top">
		<?php include_once("navBarTop.php"); ?>
	</ul>
</div>
<div id="removeNavBarTop">
	<button id="downNavBarTop"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>
	<button id="upNavBarTop"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>
</div>
<div id="navBarTopMini" class="col-xs-12 col-md-12 col-lg-12">
	<button class="burgerButton"><i class="fa fa-bars " aria-hidden="true"></i></button>
	<ul class=" burgerListMini nav  navbar-fixed-top">
		
		<?php include_once("navBarTopMini.php"); ?>
		<li><button class="burgerButtonEnd"><i class="fa fa-angle-double-up " aria-hidden="true"></i></button></li>
	</ul>
</div>



<div id="blocHeader" class="col-xs-12 col-md-12 col-lg-12">
	<div id="titreBlog" class="col-xs-12 col-md-12 col-lg-12">
		
		<h1>Billet simple pour l'Alaska</h1>
		<br>
		<h3>Jean Forteroche</h3>
	</div>

	<div id="divScrollIndex">
		<?php if($urlUri == '/'){ ?>
			<span class="texteDoubleDown">Bienvenue</span><br>
			<i id="doubleDown" class="fa fa-angle-double-down" aria-hidden="true"></i>
		<?php } ?>
		
		
	</div>	
</div>

