<?php
	
	$height = get_field("height");
	
	echo "<div class='" . (empty($height) ? "h-8" : $height) . "'></div>";
?>