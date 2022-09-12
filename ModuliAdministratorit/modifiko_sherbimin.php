<?php
	include("kontrollo.php");	
?>

<?php
	include_once("konfiguro.php");

	if(isset($_POST['modifiko_sherbimin']))
	{	
		$ID_Sherbimi=$_POST['ID_Sherbimi'];
		$Emri_Sherbimit=$_POST['Emri_Sherbimit'];
		$Foto_Sherbimit=addslashes (file_get_contents($_FILES['Foto_Sherbimit']['tmp_name']));

		$maxsize = 10000000; 

		$Emri_FotoSherbimit=$_FILES['Foto_Sherbimit']['name'];
		$Pershkrimi_Sherbimit=$_POST['Pershkrimi_Sherbimit'];
		$Veglat_Sherbimit=$_POST['Veglat_Sherbimit'];
		$ID_Kategoria=$_POST['ID_Kategoria'];	
	
		if(empty($Emri_Sherbimit) ) 
		{	
			if(empty($Emri_Sherbimit)) 
			{
				echo "<font color='red'>Fusha Emri i shërbimit të sigurisë është e zbrazët.</font><br/>";
			}
		} 
		else
		{	
			mysqli_query($lidhe, "SET @p_ID_Sherbimi='${ID_Sherbimi}'");
			mysqli_query($lidhe, "SET @p_Emri_Sherbimit='${Emri_Sherbimit}'");
			mysqli_query($lidhe, "SET @p_Foto_Sherbimit='${Foto_Sherbimit}'");
			mysqli_query($lidhe, "SET @p_Emri_FotoSherbimit='${Emri_FotoSherbimit}'");
			mysqli_query($lidhe, "SET @p_Pershkrimi_Sherbimit='${Pershkrimi_Sherbimit}'");
			mysqli_query($lidhe, "SET @p_Veglat_Sherbimit='${Veglat_Sherbimit}'");
			mysqli_query($lidhe, "SET @p_ID_Kategoria='${ID_Kategoria}'");
			$rezultati=mysqli_query($lidhe,"CALL umshs_modifiko_sherbimin(@p_ID_Sherbimi,@p_Emri_Sherbimit,@p_Foto_Sherbimit,@p_Emri_FotoSherbimit,@p_Pershkrimi_Sherbimit,@p_Veglat_Sherbimit, @p_ID_Kategoria)");
			if($rezultati)
			{
				header("Location:menaxho_sherbimin.php");
			}
			else
			{
				die("Nuk mund te ekzekutohet procedura e modifikimit!");
			}
		}
	}
?>

<?php
	$ID_Sherbimi = $_GET['ID_Sherbimi'];
	$rezultati = mysqli_query($lidhe9, "CALL umshs_zgjedhID_sherbimin('$ID_Sherbimi')");
	while($rezultat = mysqli_fetch_array($rezultati))
	{
		$Emri_Sherbimit = $rezultat['Emri_Sherbimit'];
		$Pershkrimi_Sherbimit = $rezultat['Pershkrimi_Sherbimit'];
		$Veglat_Sherbimit = $rezultat['Veglat_Sherbimit'];
		$ID_Kategoria = $rezultat['ID_Kategoria'];
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
						<h2>Modifiko të dhënat e shërbimit të sigurisë</h2>
						<form 	enctype="multipart/form-data"  action="modifiko_sherbimin.php" method="post" name="form1">
							<div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
									<h4>Emri i shërbimit të sigurisë</h4>
									<input type="text" name="Emri_Sherbimit" id="Emri_Sherbimit" value='<?php echo $Emri_Sherbimit;?>' required />
								</div>
								<div class="col-6 col-12-xsmall">
									<h4>Veglat e shërbimit të sigurisë</h4>
									<input type="text" name="Veglat_Sherbimit" id="Veglat_Sherbimit" value='<?php echo $Veglat_Sherbimit;?>' required />
								</div>
								<div class="col-6 col-12-xsmall">
									<h4>Përshkrimi i shërbimit të sigurisë</h4>
									<textarea name="Pershkrimi_Sherbimit"  rows="8" cols="10"><?php echo $Pershkrimi_Sherbimit;?></textarea>
								</div>
								<div class="col-6 col-12-xsmall">
									<h4>Foto e shërbimit të sigurisë</h4>
									<td><input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
									<td><input name="Foto_Sherbimit" type="file" /></td>
								</div>
								<div class="col-6 col-12-xsmall">
									<select name="ID_Kategoria">
										<option selected="selected" required>Zgjedh kategorinë</option>
										<?php
											$rezultat= mysqli_query ($lidhe6, "CALL umshs_zgjedh_kategorin");
											while($rreshti=$rezultat->fetch_array()){
												?>
													<option value="<?php echo $rreshti['ID_Kategoria']; ?>"><?php echo $rreshti['Emri_Kategoris']; ?></option>
												<?php
											}
										?>
									</select><br />
								<div class="col-12">
									<ul class="actions">
										<li><input type="hidden" name="ID_Sherbimi" value='<?php echo $_GET['ID_Sherbimi'];?>' /></li>
										<li><input type="submit" name="modifiko_sherbimin" value="Modifiko" class="primary" /></li>
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