<?php
	$url = get_field("url");
	$width = get_field("width");
	$height = get_field("height");
	preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
	
	$video_id = $matches[1];
	
	$vid = "";
	
	if(empty($video_id)){
		$vid = "Ungültiger Youtube Link!";
	}else{
		$vid = '<iframe class="max-w-full max-h-full w-full h-auto" width="' . $width . '" height="' . $height . '" src="https://www.youtube-nocookie.com/embed/' . $video_id . '?rel=0&amp;autoplay=1&mute=1&controls=0&modestbranding&loop=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';	
	}
	
		
?>

<div class="z-0 relative">
	<?php echo $vid; ?>
	<svg class="absolute bottom-0 left-0 right-0 w-full h-auto" width="100" height="4" viewBox="0 0 100 4" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			<polygon fill="#fff" points="0 0 100 4 0 8"></polygon>
		</g>
	</svg>
</div>