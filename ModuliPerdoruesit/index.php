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

				<!-- Introduction -->	
				<?php
					$rezultati = mysqli_query($lidhe002,"CALL umshs_zgjedh_sherbimin_ballin()");
					while($rreshti=mysqli_fetch_array($rezultati))
					{
						extract($rreshti);
						if($rezultati==null)
						mysqli_free_result($rezultati);
						?>
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2><?php echo $Emri_Sherbimit; ?></h2>
										</header>
										<p style="text-align:justify;"><?php echo $Pershkrimi_Sherbimit; ?></p>
										<p>Veglat: <i><?php echo $Veglat_Sherbimit; ?></i></p>
										<h4><b><?php echo $Emri_Kategoris; ?></b></h4>
									</div>	
									<span class="image">
										<?php echo '<img src="data:Foto_Sherbimit/jpeg;base64,'.base64_encode( $rreshti['Foto_Sherbimit'] ).'" width="100%" height="100%">'; ?>
									</span>
								</div>
							</section>
                        <?php 
					}
					
				?>

				<?php include_once("statistikat.php");	?>

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