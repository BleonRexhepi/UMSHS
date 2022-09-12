<?php
	include("kontrollo.php");	
?>

<?php
	include_once("konfiguro.php");

	if(isset($_POST['modifiko_kategorin']))
	{	
		$ID_Kategoria = $_POST['ID_Kategoria'];
		$Emri_Kategoris=$_POST['Emri_Kategoris'];
	
		if(empty($Emri_Kategoris) ) 
		{	
			if(empty($Emri_Kategoris)) 
			{
				echo "<font color='red'>Fusha Emri i kategorisë është e zbrazët.</font><br/>";
			}
		} 
		else 
		{	
			mysqli_query($lidhe, "SET @p_ID_Kategoria=${ID_Kategoria}");
			mysqli_query($lidhe, "SET @p_Emri_Kategoris='${Emri_Kategoris}'");
			$rezultati = mysqli_query($lidhe,"CALL umshs_modifiko_kategorin(@p_ID_Kategoria,@p_Emri_Kategoris)");
			header("Location: menaxho_kategorin.php");
		}
	}
?>

<?php
	$ID_Kategoria = $_GET['ID_Kategoria'];

	$rezultati = mysqli_query($lidhe8, "CALL umshs_zgjedhID_kategorin('$ID_Kategoria')");
	while($rezultat = mysqli_fetch_array($rezultati))
	{
		$Emri_Kategoris = $rezultat['Emri_Kategoris'];
	}
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

				<!-- Get Started -->
				<section id="content" class="main">
					<section>
						<h2>Emri i kategorisë</h2>
						<form method="post" action="modifiko_kategorin.php">
							<div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
										<input type="text" name="Emri_Kategoris" id="Emri_Kategoris" value='<?php echo $Emri_Kategoris;?>' required />
								</div>
								<div class="col-12">
									<ul class="actions">
										<li><input type="hidden" name="ID_Kategoria" value='<?php echo $_GET['ID_Kategoria'];?>' /></li>
										<li><input type="submit" name="modifiko_kategorin" value="Modifiko" class="primary" /></li>
									</ul>
								</div>
							</div>
						</form> 
					</section>	
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