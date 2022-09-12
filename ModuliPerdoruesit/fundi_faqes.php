<footer id="footer">
	<section>
		<?php
            $rezultati = mysqli_query($lidhe004, "CALL umshs_fundi_pershkrimi");
			while ($rreshti = mysqli_fetch_assoc($rezultati)) 
			{
				extract($rreshti);		  
				if($rezultati==null)
				mysqli_free_result($rezultati);
				?>
					<h2><b><?php echo $Shenimi; ?></b></h2>
					<?php echo $Pershkrimi; ?>
				<?php 
			} 
		?>	
	</section>
	<section>
        <h2><b>Kontaktoni</b></h2>
		<dl class="alt">
			<?php
            	$rezultati = mysqli_query($lidhe005, "CALL umshs_fundi_tedhenat");
				while ($rreshti = mysqli_fetch_assoc($rezultati)) 
				{
					extract($rreshti);	  
					if($rezultati==null)
					mysqli_free_result($rezultati);
					?>
						<?php echo $Pershkrimi; ?>
					<?php 
				} 
			?>	
		</dl>
		<ul class="icons">
			<?php
            	$rezultati = mysqli_query($lidhe006, "CALL umshs_fundi_rrjetetsociale");
				while ($rreshti = mysqli_fetch_assoc($rezultati)) 
				{
					extract($rreshti);
					if($rezultati==null)
					mysqli_free_result($rezultati);
					?>
						<?php echo $Pershkrimi; ?>
					<?php 
				} 
			?>	
		</ul>
	</section>
	<p class="copyright">
		<?php
            $rezultati = mysqli_query($lidhe007, "CALL umshs_fundi_tedrejtatautoriale");
			while ($rreshti = mysqli_fetch_assoc($rezultati)) 
			{
				extract($rreshti);
				if($rezultati==null)
				mysqli_free_result($rezultati);
				?>
					<?php echo $Pershkrimi; ?>
				<?php 
			} 
		?>	
	</p>
</footer>