<?php
	$rezultati = mysqli_query($lidhe003, "CALL umshs_fillimi_faqes");
	while ($rreshti = mysqli_fetch_assoc($rezultati)) 
	{
		extract($rreshti);						  
		if($rezultati==null)
		mysqli_free_result($rezultati);
		?>
			<header id="header" class="alt">
				<span class="logo"><img src="<?php echo $Fajlli; ?>" alt="" /></span>
				<h1><b><?php echo $Shenimi; ?></b></h1>
				<p><?php echo $Pershkrimi; ?></p>
			</header>		
		<?php 
	} 
?>	
	