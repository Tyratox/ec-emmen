<?php
	
	echo '<div class="container px-8 my-8">';
	
		echo '<div class="flex">';
		
			echo '<div class="w-full sm:w-1/2 md:w-1/3 pr-4">';
			
				echo '<div class="clip-person relative">';
					echo '<div class="absolute left-0 top-0 right-0 bottom-0 bg-center bg-cover" style="background-image: url(' . get_field("image") . ')"></div>';
				echo '</div>';
			
			echo '</div>';
			
			echo '<div class="w-full sm:w-1/2 md:w-2/3 pl-4">';
			
				$above = get_field("above");
				$name = get_field("name");
				$price = get_field("price");
				
				if(!empty($above)){
					echo "<div class='text-red'>" . $above . "</div>";
				}
				
				echo "<div class='text-2xl font-bold'>" . $name . "</div>";
				echo "<div class='text-xl font-bold'>" . $price . "</div>";
				
				$description = get_field("description");
				
				if(!empty($description)){
					echo "<hr class='border-red border-t-2 my-2'>";
					echo "<div class=''>" . $description . "</div>";
				}
				
			
			echo '</div>';
			
		echo '</div>';
	echo '</div>';
?>