<?php
	
	$image = get_field("image");
	$text = get_field("text");
	$url = get_field("link-url");
	
	$layout = get_field("layout");
	
	echo "<div>";
		echo "<hr class='border-red border-t-4 mb-8'>";
		
		echo "<div class='flex flex-wrap mb-4'>";
		
			$image_block = "<div class='w-full md:w-1/2 pb-8 order-1 #PADDING'>";
				$image_block .= "<img src='" . $image . "'>";
			$image_block .= "</div>";
			
			$text_block = "<div class='w-full md:w-1/2 #PADDING order-2 md:order-1'>";
				$text_block .= "<p>";
					$text_block .= nl2br($text);
				$text_block .= "</p>";
				
				$text_block .= "<a href='" . $url . "' class='bg-red text-white inline-block p-2 mt-4 text-center sm:text-left'>";
					$text_block .= "Zum Shop";
				$text_block .= "</a>";
			$text_block .= "</div>";
		
			if($layout === "text-right"){
				//image left, text right
				
				echo str_replace("#PADDING", "sm:pr-4", $image_block);
				echo str_replace("#PADDING", "sm:pl-4", $text_block);
			}else{
				//text left, image right
				
				echo str_replace("#PADDING", "sm:pr-4", $text_block);
				echo str_replace("#PADDING", "sm:pl-4", $image_block);
			}
		
		echo "</div>";
	
	echo "</div>";
	
?>