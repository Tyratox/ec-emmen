<?php
	
	echo '<div class="container my-8">';
	
		echo '<div class="flex flex-wrap">';
		
			echo '<div class="w-full md:w-1/2 pr-4">';
			
				echo '<img class="clip-person" src="' . get_field("image") . '">';
			
			echo '</div>';
			
			echo '<div class="w-full md:w-1/2 pl-4">';
			
				$above = get_field("above");
				$first_name = get_field("first-name");
				$last_name = get_field("last-name");
				
				if(!empty($above)){
					echo "<div class='text-red'>" . $above . "</div>";
				}
				
				echo "<div class='text-2xl font-bold'>" . $first_name . "</div>";
				echo "<div class='text-xl font-bold'>" . $last_name . "</div>";
				
				$position = get_field("position");
				
				if(!empty($position)){
					echo "<hr class='border-red border-t-2 my-2'>";
					echo "<div class=''>" . $position . "</div>";
				}
				
			
			echo '</div>';
			
		echo '</div>';
	echo '</div>';
?>