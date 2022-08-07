<?php
	
	$text = get_field("text");
	$image = get_field("image");
	$position = get_field("position");
	
	$text_block = '<div class="w-full md:w-1/2 order-1 mb-4 #PADDING">';
		$text_block .= '<p>' . nl2br($text) . '</p>';
	$text_block .= '</div>';
	
	$image_block = '<div class="w-full md:w-1/2 order-2 sm:order-1 #PADDING"><div><img src="' . $image . '"></div></div>';
	
	switch($position){
		case "image-left-text-right":
			echo "<div class='flex flex-wrap py-4'>";
				echo str_replace("#PADDING", "sm:pr-4", $image_block);
				echo str_replace("#PADDING", "sm:pl-4", $text_block);
			echo "</div>";
			break;
			
		case "text-left-image-right":
			echo "<div class='flex flex-wrap py-4'>";
				echo str_replace("#PADDING", "sm:pr-4", $text_block);
				echo str_replace("#PADDING", "sm:pl-4 flex justify-center", $image_block);
			echo "</div>";
			break;
		
		case "text-on-image":
		default:
			echo '<div class="mb-8 -mx-8 -mt-8 md:mx-0 md:mt-0">';
		
				echo '<div class="text-white relative">';
				
					echo '<img class="lazy" data-src="' . $image . '">';
					
					echo '<div class="absolute left-0 right-0 bottom-0 bottom-top-gradient" style="top:75%"></div>';
					
					echo '<div class="absolute bottom-0 left-0 right-0 pb-8 text-4xl text-center"><div class="container px-8">' . $text .'</div></div>';
				
				echo '</div>';
			echo '</div>';
			break;
	};
	
?>