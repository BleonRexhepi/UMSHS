<?php
	include("kontrollo.php");	
?>

<?php
	include_once("konfiguro.php");

	if(isset($_POST['modifiko_perdorues']))
	{	
		$ID_Perdoruesi = $_POST['ID_Perdoruesi'];
		$Emri=$_POST['Emri'];
		$Fjalekalimi= MD5($_POST['Fjalekalimi']);
		$Email=$_POST['Email'];
	
		if(empty($Emri) || empty($Fjalekalimi) || empty($Fjalekalimi)) 
		{	
			if(empty($Emri)) 
			{
				echo "<font color='red'>Fusha Emri është e zbrazët.</font><br/>";
			}
			if(empty($Fjalekalimi)) 
			{
				echo "<font color='red'>Fusha Fjalekalimi është e zbrazët.</font><br/>";
			}
			if(empty($Email)) 
			{
				echo "<font color='red'>Fusha Email është e zbrazët.</font><br/>";
			}
		}
		else 
		{	
			mysqli_query($lidhe, "SET @p_ID_Perdoruesi=${ID_Perdoruesi}");
			mysqli_query($lidhe, "SET @p_Emri='${Emri}'");
			mysqli_query($lidhe, "SET @p_Fjalekalimi='${Fjalekalimi}'");
			mysqli_query($lidhe, "SET @p_Email='${Email}'");
			$rezultati=mysqli_query($lidhe,"CALL umshs_modifiko_perdoruesin(@p_ID_Perdoruesi,@p_Emri,@p_Fjalekalimi,@p_Email)");
			if($rezultati)
			{
				header("Location:perdoruesit.php");
			}
			else
			{
				die("Nuk mund të ekzekutohet procedura e modifikimit!");
			}
		}
	}
?>

<?php
	$ID_Perdoruesi = $_GET['ID_Perdoruesi'];
	$rezultati = mysqli_query($lidhe3, "CALL umshs_zgjedhID_perdoruesin('$ID_Perdoruesi')");
	while($rezultat = mysqli_fetch_array($rezultati))
	{
		$Emri = $rezultat['Emri'];
		$Fjalekalimi = $rezultat['Fjalekalimi'];
		$Email = $rezultat['Email'];
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
						<h2>Modifiko të dhënat e përdoruesit</h2>
						<form method="post" action="modifiko_perdorues.php">
							<div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
									<h4>Emri</h4>
										<input type="text" name="Emri" id="Emri" value='<?php echo $Emri;?>' required /><br>
									<h4>Fjalekalimi</h4> 
										<input type="text" name="Fjalekalimi" id="Fjalekalimi" value='<?php echo $Fjalekalimi;?>' required /><br>
									<h4>Email</h4> 
										<input type="text" name="Email" id="Email" value='<?php echo $Email;?>' required />
								</div>
								<div class="col-12">
									<ul class="actions">
										<li><input type="hidden" name="ID_Perdoruesi" value='<?php echo $_GET['ID_Perdoruesi'];?>' /></li>
										<li><input type="submit" name="modifiko_perdorues" value="Modifiko" class="primary" /></li>
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