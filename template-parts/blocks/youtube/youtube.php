<?php
	
	echo '<div class="container my-8">';
	
		$url = get_field("url");
		$size = get_field("size");
		$width = get_field("width");
		$height = get_field("height");
		preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
		
		$video_id = $matches[1];
		
		$vid = "";
		
		if(empty($video_id)){
			$vid = "Ungültiger Youtube Link!";
		}else{
			$vid = '<iframe class="max-w-full max-h-full lazy' . (empty($size) || $size === "full-width" ? " w-full h-auto" : "") . '" width="' . $width . '" height="' . $height . '" data-src="https://www.youtube-nocookie.com/embed/' . $video_id . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';	
		}
		
		$text = get_field("text");
		$placement = get_field("placement");
		
		if(!empty($text)){
			$video_block = "<div class='w-full md:w-1/2 md:pr-4'>";
				$video_block .= $vid;
			$video_block .= "</div>";
			
			$text_block = "<div class='w-full pt-8 md:w-1/2 md:pt-0 md:pl-4'>";
				$text_block .= nl2br($text);
			$text_block .= "</div>";
			
			echo "<div class='flex flex-wrap'>";
			switch($placement){
				case "video-right-text-left":
					echo $text_block;
					echo $video_block;
					break;
				case "video-left-text-right":
				default:
					echo $video_block;
					echo $text_block;
					break;
			}
			echo "</div>";
		}else{
			echo $vid;
		}

		
	echo '</div>';
?>