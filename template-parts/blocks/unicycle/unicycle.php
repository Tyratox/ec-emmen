<?php
	
	echo '<div class="container px-8 my-8">';
	
		echo '<div class="flex">';
		
			echo '<div class="w-1/2 pr-4">';
			
				echo '<img class="" src="' . get_field("image") . '">';
			
			echo '</div>';
			
			echo '<div class="w-1/2 pl-4">';
			
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