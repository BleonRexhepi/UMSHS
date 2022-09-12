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
					<h2 style="text-align:left;">Shto Shërbimin e Sigurisë</h2>				
					<form 	enctype="multipart/form-data"  action="shto_sherbimin.php" method="post" name="form1">
						<div class="row gtr-uniform">
							<div class="col-6 col-12-xsmall">
								<input type="text" name="Emri_Sherbimit" id="demo-name" placeholder="Emri i shërbimit të sigurisë" />
							</div>
							<div class="col-6 col-12-xsmall">
								<input type="text" name="Veglat_Sherbimit" id="demo-name" placeholder="Veglat e shërbimit të sigurisë" />
							</div>
							<div class="col-6 col-12-xsmall">
								<textarea name="Pershkrimi_Sherbimit" id="demo-name" placeholder="Pershkrimi i shërbimit të sigurisë" rows="4"></textarea>
							</div>
							<div class="col-6 col-12-xsmall">
								<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
								<td><input type="file" name="Foto_Sherbimit" /></td>
							</div>
							<div class="col-6 col-12-xsmall">
								<select name="ID_Kategoria">
									<option selected="selected">Zgjedh kategorinë</option>
									<?php
										$rezultat= mysqli_query ($lidhe6, "CALL umshs_zgjedh_kategorin");
										while($rreshti=$rezultat->fetch_array()){
											?>
												<option value="<?php echo $rreshti['ID_Kategoria']; ?>"><?php echo $rreshti['Emri_Kategoris']; ?></option>
											<?php
										}
									?>
								</select><br />
							</div>
							<div class="col-12">
								<ul class="actions">
									<li><input type="submit" name="shto_sherbimin" value="Shto" class="primary" /></li>
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
									<h3>Kërko të dhënat e shërbimit të sigurisë për modifikim ose fshirje</h3>
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
									<th style="text-align:center;">Emri</th>
									<th style="text-align:center;">Foto</th>
									<th style="text-align:center;">Përshkrimi</th>
									<th style="text-align:center;">Veglat</th>
									<th style="text-align:center;">Kategoria</th>
									<th style="text-align:center;">Modifiko</th>
									<th style="text-align:center;">Fshije</th>
								</tr>
							</thead>					
							<?php
								if (!empty($_REQUEST['term'])) {
									$term = mysqli_real_escape_string($lidhe,$_REQUEST['term']);     
									$sql= mysqli_query ($lidhe5, "CALL umshs_zgjedhterm_sherbimin('$term')");
									while($rreshti = mysqli_fetch_array($sql)) { 		
										echo "<tr>";
											echo "<td>".$rreshti['Emri_Sherbimit']."</td>";
											echo "<td><img src=data:Foto_Sherbimit/jpeg;base64,".base64_encode($rreshti['Foto_Sherbimit'])." width='80'  height='100'/></td>";
                                            echo "<td>".$rreshti['Pershkrimi_Sherbimit']."</td>";
                                            echo "<td>".$rreshti['Veglat_Sherbimit']."</td>";
											echo "<td>".$rreshti['Emri_Kategoris']."</td>";			
											echo "<td><a href=\"modifiko_sherbimin.php?ID_Sherbimi=$rreshti[ID_Sherbimi]\" class='button primary'>Modifiko</a></td>";
											echo "<td><a href=\"fshij_sherbimin.php?ID_Sherbimi=$rreshti[ID_Sherbimi]\" onClick=\"return confirm('A jeni të sigurt se dëshironi të fshini shërbimin?')\"  class='button primary'>Fshije</a></td>";
										"</tr>";				
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