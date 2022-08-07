<?php
	
	echo '<div class="container">';
	
		$video = get_field("video");
		$size = get_field("size");
		$width = get_field("width");
		$height = get_field("height");
		
		$vid = '<video class="max-w-full max-h-full lazy' . (empty($size) || $size === "full-width" ? " w-full h-auto" : "") . '" controls data-src="' . $video . '" width="' . $width . '" height="' . $height . '">';
			$vid .= 'Sorry, dein Browser unterstützt dieses Videoformat nicht.';
			$vid .= 'Du kannst es aber <a href="' . $video . '">hier herunterladen</a> und dann ansehen.';
		$vid .= '</video>';
		
		$text = get_field("text");
		$placement = get_field("placement");
		
		if(!empty($text)){
			$video_block = "<div class='w-full pt-8 order-2 md:order-1 md:w-1/2 md:pt-0 #PADDING'>";
				$video_block .= $vid;
			$video_block .= "</div>";
			
			$text_block = "<div class='w-full order-1 md:w-1/2 #PADDING'>";
				$text_block .= "<div class='wp-content'>" . $text . "</div>";
			$text_block .= "</div>";
			
			echo "<div class='flex flex-wrap py-4'>";
			switch($placement){
				case "video-right-text-left":
					echo str_replace("#PADDING", "md:pr-4", $text_block);
					echo str_replace("#PADDING", "md:pl-4", $video_block);
					break;
				case "video-left-text-right":
				default:
					echo str_replace("#PADDING", "md:pr-4", $video_block);
					echo str_replace("#PADDING", "md:pl-4", $text_block);
					break;
			}
			echo "</div>";
		}else{
			echo $vid;
		}

		
	echo '</div>';
?>