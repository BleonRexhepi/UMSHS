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
					<h2 style="text-align:left;">Shto Kategorin e Shërbimit të Sigurisë</h2>
					<form method="post" action="shto_kategorin.php">
						<div class="row gtr-uniform">
							<div class="col-6 col-12-xsmall">
								<input type="text" name="Emri_Kategoris" id="demo-name" placeholder="Kategoria" />
							</div>
							<div class="col-12">
								<ul class="actions">
									<li><input type="submit" name="shto_kategorin" value="Shto" class="primary" /></li>				
								</ul>
							</div>
						</div>
					</form>
				</section>

				<!-- Second Section -->
				<section id="second" class="main special">				
					<form action="" method="post">
						<div class="table-wrapper">
							<table>
								<tr>
									<h3>Kërko të dhënat e kategorive për modifikim ose fshirje</h3>
								</tr>
								<tr>
									<td>
										Shkruaj:
									</td>
									<td>
										<input type="text" name="term" value="%"/>
									</td>
									<td> 
										<input type="submit" value="Kërko" class="button primary"/>
									</td>
								</tr>
							</table> 
						</div>
					</form>				
					<div class="table-wrapper">
						<table>
							<thead>
								<tr>
									<th style="text-align:center;">Kategoria</th>
									<th style="text-align:center;">Modifiko</th>
									<th style="text-align:center;">Fshije</th>
								</tr>
							</thead>
							<?php
								if (!empty($_REQUEST['term'])) {
									$term = mysqli_real_escape_string
									($lidhe,$_REQUEST['term']);   
									$sql= mysqli_query ($lidhe4, "CALL umshs_zgjedhterm_kategorin('$term')"); 
									while($rreshti = mysqli_fetch_array($sql)) { 		
										echo "<tr>";
											echo "<td>".$rreshti['Emri_Kategoris']."</td>";
											echo "<td><a href=\"modifiko_kategorin.php?ID_Kategoria=$rreshti[ID_Kategoria]\" class='button primary'>Modifiko</a></td>";
											echo "<td><a href=\"fshij_kategorin.php?ID_Kategoria=$rreshti[ID_Kategoria]\" onClick=\"return confirm('A jeni të sigurt se dëshironi të fshini kategorinë e shërbimit?')\"  class='button primary'>Fshije</a></td>
										</tr>";		
									}
								}
							?>										
						</table>
					</div>
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