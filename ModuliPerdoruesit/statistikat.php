<section id="second" class="main special">
	<header class="major">
        <?php
            $rezultati = mysqli_query($lidhe008, "CALL umshs_teksti_statistikat");
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
	</header>
    <?php
            $rezultati = mysqli_query($lidhe009, "CALL umshs_ikonat_statistikat");
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
</section>