<?php
	$activities = get_field("activities");
	
	for($i = 0; $i < count($activities); $i++){
		
		$activity = $activities[$i];
		
		$title = $activity['title'];
		$image = $activity['image'];
		$description = $activity['description'];
		$url = $activity['link-url'];
		
		$clip = $i % 2 === 0 ? "clip-left" : "clip-right";
		$align = $i % 2 === 0 ? "text-left" : "text-right";
		
		echo "<div class='text-white activity " . (empty($description) ? "" : "hover") . "'>";
			
			echo '<div class="relative ' . $clip . ' bg-cover bg-center h-activity" style="background-image: url(' . $image . ')">';
			
				echo '<div class="absolute left-0 right-0 bottom-0 top-1/4 bottom-top-gradient"></div>';
				
				echo '<div class="text absolute left-0 right-0 top-1 pb-16">';
					
					echo '<div class="container mx-auto">';
			
						echo '<h2 class="text-4xl uppercase font-bold ' . $align . '">';
						
							echo get_styled_title($title);
								
						echo '</h2>';
						
						echo '<p>';
							echo $description;
						echo '</p>';
					
					echo '</div>';
				
				echo '</div>';
			
			echo '</div>';
		
		echo "</div>";
			
	}
?>