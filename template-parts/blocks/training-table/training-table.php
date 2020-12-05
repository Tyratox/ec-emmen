<?php
	
	$table = get_field("table");
	
	echo "<div class='container mx-auto'>";
	
		echo "<table class='w-full block sm:table'>";
		
			echo "<thead class='block sm:table-header-group'>";
			echo "</thead>";
			
			echo "<tbody class='block sm:table-row-group'>";
			
				foreach($table as $row){
					echo "<tr class='block sm:table-row pt-8 sm:pt-0'>";
					
						echo "<td colspan='2'>";
						
							echo "<div class='text-red text-xl'>" . $row["day"] . "</div>";
						
						echo "</td>";
					
					echo "</tr>";
					
					foreach($row['trainings'] as $training){
						
						echo "<tr class='block sm:table-row'>";
						
							echo "<td class='align-top sm:pr-4 pt-4 sm:pt-0 sm:pb-8 w-full sm:w-1/4 block sm:table-cell'>";
						
								echo "<span>" . $training['time'] . "</span>";
							
							echo "</td>";
						
							echo "<td class='align-top sm:pl-4 sm:pb-8 w-full sm:w-3/4 block sm:table-cell'>";
						
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