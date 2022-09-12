<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>UMSHS | Moduli i Perdoruesit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<?php
			include_once("konfiguro.php");

			if(isset($_POST['shto_kontaktin'])) 
			{	
				$EmriMbiemri = mysqli_real_escape_string($lidhe,$_POST['EmriMbiemri']);
				$NumriTelefonit = mysqli_real_escape_string($lidhe,$_POST['NumriTelefonit']);
				$Email = mysqli_real_escape_string($lidhe,$_POST['Email']);
				$Mesazhi = mysqli_real_escape_string($lidhe,$_POST['Mesazhi']);
					
				if(empty($EmriMbiemri) || empty($Email) || empty($Mesazhi)) 
				{			
					if(empty($EmriMbiemri)) {echo "<font color='red'>Fusha Emri Mbiemri është e zbrazët.</font><br/>";}
					if(empty($Email)) {echo "<font color='red'>Fusha Email është e zbrazët.</font><br/>";}
					if(empty($Mesazhi)) {echo "<font color='red'>Fusha Mesazhi është e zbrazët.</font><br/>";}
					echo "<br/><a href='javascript:self.history.back();'>Kthehu mbrapa</a>";
				}
				else 
				{ 
					$Email = filter_var($Email, FILTER_SANITIZE_EMAIL);
					if(filter_var($Email, FILTER_VALIDATE_EMAIL)==false)
					{
						echo "<b>$Email</b> nuk është valide";
						echo "<script>setTimeout(function(){window.location.href = 'shto_kontakt.php';}, 5000);</script>";
						echo"<p><b>Ju lutem pritni 5 sekonda për tu kthyer në formë përsëri<b></p>";
					}
					else 
					{ 
						$rezultati = mysqli_query($lidhe, "CALL umshs_shto_kontakt ('$EmriMbiemri','$NumriTelefonit','$Email','$Mesazhi')");
						echo "<script>setTimeout(function(){window.location.href = 'shto_kontakt.php';}, 5000);</script>";
						echo"<p><b>Mesazhi juaj është duke u regjistruar në sistem. Ju lutem prisni pak!<b></p>";
						echo"<p><b>Ju falënderojm për mesazhin tuaj! Ne do të ju kontaktojm sa më shpejtë të jetë e mundur.<b></p>";
					}
				}
			}
		?>
	</body>
</html>