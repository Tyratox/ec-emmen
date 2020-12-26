<?php
	
	$height = get_field("height");
	
	//this way tailwind cannot purge these classes
	$options = array("h-4", "h-8", "h-16", "h-24", "h-32");
	
	echo "<div class='" . (empty($height) ? "h-8" : $height) . "'></div>";
?>