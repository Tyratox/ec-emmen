<?php
	
	$table = get_field("table");
	
	echo "<div class='container mx-auto'>";
	
		echo "<table class='w-full'>";
		
			echo "<thead>";
			echo "</thead>";
			
			echo "<tbody>";
			
				foreach($table as $row){
					echo "<tr>";
					
						echo "<td colspan='2'>";
						
							echo "<div class='text-red text-xl'>" . $row["day"] . "</div>";
						
						echo "</td>";
					
					echo "</tr>";
					
					foreach($row['trainings'] as $training){
						
						echo "<tr>";
						
							echo "<td class='align-top pr-4 pb-8 w-1/4'>";
						
								echo "<span>" . $training['time'] . "</span>";
							
							echo "</td>";
						
							echo "<td class='align-top pl-4 pb-8 w-3/4'>";
						
								echo "<h3 class='text-xl font-bold'>" . $training['training'] . "</h3>";
								
								echo "<hr class='border-black border-t-4 my-1'>";
								
								echo "<div>" . $training["location"] . "</div>";
							
							echo "</td>";
						
						echo "</tr>";
						
					}
				}
			
			echo "</tbody>";
		
		echo "</table>";
	
	echo "</div>";
	
?>