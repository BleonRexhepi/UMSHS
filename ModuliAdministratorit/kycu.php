<?php
	session_start();
	include("konfiguro.php"); 
	
	$error = ""; 
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["Emri"]) || empty($_POST["Fjalekalimi"]))
		{
			$error = "Kërkohet mbushja e të gjitha fushave!.";
		}
		else
		{
			$Emri=$_POST['Emri'];
			$Fjalekalimi = MD5($_POST['Fjalekalimi']);

			$sql="CALL umshs_zgjedh_perdoruesin('$Emri','$Fjalekalimi')";
			$rezultati=mysqli_query($lidhe,$sql);
			$rreshti=mysqli_fetch_array($rezultati,MYSQLI_ASSOC);

			if(mysqli_num_rows($rezultati) == 1)
			{
				$_SESSION['Emri'] = $Emri; 
				header("location: ballina.php"); 
			}
			else
			{
				$error = "Emri ose Fjalekalimi është gabim.";
			}
		}
	}
?>