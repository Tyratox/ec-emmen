<?php
	
	echo '<div class="container my-8">';
	
		$video = get_field("video");
		$width = get_field("width");
		$height = get_field("height");
		
		echo '<video class="max-w-full max-h-full" controls src="' . $video . '" width="' . $width . '" height="' . $height . '">';
			echo 'Sorry, dein Browser unterstützt dieses Videoformat nicht.';
			echo 'Du kannst es aber <a href="' . $video . '">hier herunterladen</a> und dann ansehen.';
		echo '</video>';

		
	echo '</div>';
?>