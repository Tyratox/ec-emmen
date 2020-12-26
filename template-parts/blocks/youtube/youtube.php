<?php
	
	echo '<div class="container my-8">';
	
		$url = get_field("url");
		$width = get_field("width");
		$height = get_field("height");
		preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
		
		$video_id = $matches[1];
		
		if(empty($video_id)){
			echo "Ungültiger Youtube Link!";
		}else{
			echo '<iframe class="max-w-full max-h-full" width="' . $width . '" height="' . $height . '" src="https://www.youtube-nocookie.com/embed/' . $video_id . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';	
		}

		
	echo '</div>';
?>