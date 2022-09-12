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
		<?php
			include_once("konfiguro.php");

			if(isset($_POST['shto_kategorin'])) 
			{	
				$Emri_Kategoris = $_POST['Emri_Kategoris'];
			
				if(empty($Emri_Kategoris)) 
				{			
					if(empty($Emri_Kategoris)) 
					{
						echo "<font color='red'>Fusha Emri i kategorisë është e zbrazët.</font><br/>";
					}
				
					echo "<br/><a href='javascript:self.history.back();'>Kthehu mbrapa</a>";
				}
				else
				{
					if (strlen($Emri_Kategoris) < 4) 
					{
						trigger_error("Emri i kategorisë duhet të jetë mbi 6 karaktere");
						echo "<script>setTimeout(function(){window.location.href = 'menaxho_kategorin.php';}, 5000);</script>";
						echo"<p><b>Ju lutem pritni 5 sekonda për tu kthyer përsëri në formën për shtim të kategorisë.<b></p>";
					} 
					else 
					{ 	
						$rezultati = mysqli_query($lidhe, "CALL umshs_shto_kategorin ('$Emri_Kategoris')");
						echo "<script>setTimeout(function(){window.location.href = 'menaxho_kategorin.php';}, 5000);</script>";
						echo"<p><b>E dhëna është duke u regjistruar në sistem. Ju lutem pritni 5 sekonda. <b></p>";
					}
				}
			}
		?>
	</body>
</html>