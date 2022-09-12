<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php include_once("konfiguro.php"); ?>
<html>
	<head>
		<title>UMSHS | Moduli i Përdoruesit</title>
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
			<?php include_once("meny_perdoruesit.php");	?>
					
			<!-- Main -->
			<div id="main">

				<!-- First Section -->
				<section id="first" class="main special">
					<header class="major">
						<h2 style="text-align:center;">Shkruani mesazhin tuaj!</h2>
					</header>
					<form method="post" action="shto_kontaktin.php">
						<div class="row gtr-uniform" style="margin: 0px 15px 0px 15px;">
							<div class="col-6 col-12-xsmall">
								<input type="text" name="EmriMbiemri" id="demo-name" placeholder="Emri Mbiemri"  style="width: 90%;" />
								<br>
								<input type="text" name="NumriTelefonit" id="demo-name" placeholder="Numri Telefonit" style="width: 90%;" />
								<br>
								<input type="email" name="Email" id="demo-email" placeholder="Email" style="width: 90%;" />
							</div>
							<div class="col-6 col-12-xsmall">
								<textarea name="Mesazhi" id="demo-message" placeholder="Mesazhi" rows="6"></textarea>
							</div>
							<div class="col-12"><br>
								<ul class="actions" style="margin-left:300px;">
									<li><input type="submit" name="shto_kontaktin" value="Dërgo" class="primary" /></li>
									<li><input type="reset" value="Reset" /></li>
								</ul>
							</div>
						</div>
					</form>
						
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