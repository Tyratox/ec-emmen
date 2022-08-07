<?php
	$activities = get_field("activities");
	
	for($i = 0; $i < count($activities); $i++){
		
		$activity = $activities[$i];
		
		$title = $activity['title'];
		$image = $activity['image'];
		$description = $activity['description'];
		$url = $activity['link-url'];
		$btn_text = $activity['btn-text'];
		
		$clip = $i % 2 === 0 ? "clip-left" : "clip-right";
		$align = $i % 2 === 0 ? "text-left" : "text-right";
		
		echo "<div class='text-white activity " . (empty($description) ? "" : "hover") . "'>";
			
			echo '<div class="relative ' . $clip . ' bg-cover bg-center h-activity lazy" data-bg="' . $image . '">';
			
				echo '<div class="absolute left-0 right-0 bottom-0 top-1/4 bottom-top-gradient"></div>';
				
				echo '<div class="text absolute left-0 right-0 top-1 pb-16">';
					
					echo '<div class="container mx-auto px-8">';
			
						echo '<h2 class="text-4xl uppercase font-black ' . $align . '">';
						
							echo "<div class='inline-block'>";
						
								echo get_styled_title($title);
								
								if(!empty($description)){
									echo "<div class='block text-center text-base sm:hidden'>";
										echo '<i class="fa fa-chevron-down w-10 h-auto transition duration-300 ease-in-out transform"></i>';
									echo "</div>";	
								}
							
							echo "</div>";
								
						echo '</h2>';
						
						echo '<p>';
							echo nl2br($description);
						echo '</p>';
						
						if(!empty($url) && !empty($btn_text)){
							echo "<a class='bg-red text-white p-2 mt-4 inline-block' href='" . $url . "'>" . $btn_text . "</a>";	
						}
					
					echo '</div>';
				
				echo '</div>';
			
			echo '</div>';
		
		echo "</div>";
	}
?>