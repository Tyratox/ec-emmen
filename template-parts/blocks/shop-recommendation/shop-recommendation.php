<?php
	
	$image = get_field("image");
	$text = get_field("text");
	$url = get_field("url");
	
	$layout = get_field("layout");
	
	echo "<div>";
		echo "<hr class='border-red border-t-4 mb-8'>";
		
		echo "<div class='flex flex-wrap'>";
		
			if($layout === "text-right"){
				echo "<div class='w-full sm:w-1/2 pr-4 pb-8'>";
					echo "<img src='" . $image . "'>";
				echo "</div>";
				
				echo "<div class='w-full sm:w-1/2 pl-4'>";
					echo "<p>";
						echo $text;
					echo "</p>";
					
					echo "<a href='" . $url . "' class='bg-red text-white inline-block p-2 mt-4 text-center sm:text-left'>";
						echo "Zum Shop";
					echo "</a>";
				echo "</div>";
			}else{
				
				echo "<div class='w-full sm:w-1/2 pr-4 pb-8'>";
					echo "<p>";
						echo $text;
					echo "</p>";
					
					echo "<a href='" . $url . "' class='bg-red text-white inline-block p-2 mt-4'>";
						echo "Zum Shop";
					echo "</a>";
				echo "</div>";
				
				echo "<div class='w-full sm:w-1/2 pl-4'>";
					echo "<img src='" . $image . "'>";
				echo "</div>";
			}
		
		echo "</div>";
	
	echo "</div>";
	
?>