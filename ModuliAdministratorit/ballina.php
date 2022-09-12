<?php
	include("kontrollo.php");	
?>

<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>UMSHS | Moduli i Administratorit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<?php include_once("fillimi_faqes.php");?>

				<!-- Nav -->
				<?php include_once("meny_administratorit.php");	?>

				<!-- Main -->
				<div id="main">

					<!-- Introduction -->
					<section id="intro" class="main">
						<div class="spotlight">
							<div class="content">
								<p style="text-align:right;">Përshëndetje, <em><?php  echo $perdoruesi;?>!</em></p>	
							</div>
						</div>
					</section>

					<!-- First Section -->
					<section id="first" class="main special">
						<header class="major">
							<h2>MENAXHIMI I UEBAPLIKACIONIT</h2>
						</header>
						<ul class="features">
							<li>
								<span class="icon major style3 fa-copy"></span>
								<a href="menaxho_kategorin.php"><h3>MENAXHO KATEGORITË E SHËRBIMEVE</h3></a>
								<p>Forma për menaxhimin e kategorisë së shëbimeve në uebaplikacion</p>
							</li>
							<li>
								<span class="icon major style5 fa-gem"></span>
								<a href="menaxho_sherbimin.php"><h3>MENAXHO SHËRBIMET E <br>SIGURISË</h3></a>
								<p>Forma për menaxhimin e shërbimeve të sigurisë në uebaplikacion</p>
							</li>
							<li>
								<span class="icon solid major style1 fa-code"></span>
								<a href="menaxho_tedhenat.php"><h3>MENAXHO TË DHËNAT E UEBAPLIKACIONIT</h3></a>
								<p>Forma për menaxhimin e të dhënave në uebaplikacion</p>
							</li>
						</ul>
					</section>
				</div>

				<!-- Footer -->
				<?php include_once("fundi_faqes.php");	?>
			</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>