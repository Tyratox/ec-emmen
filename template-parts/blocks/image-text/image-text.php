<?php
	
	$text = get_field("text");
	$image = get_field("image");
	
	echo '<div class="mb-8">';
	
		echo '<div class="text-white relative">';
		
			echo '<img src="' . $image . '">';
			
			echo '<div class="absolute left-0 right-0 bottom-0 bottom-top-gradient" style="top:75%"></div>';
			
			echo '<div class="absolute bottom-0 left-0 right-0 pb-8 text-4xl text-center"><div class="container px-8">' . $text .'</div></div>';
		
		echo '</div>';
	echo '</div>';
?>