<?php
	
	$page_ids = get_field("pages");
	
	if(!is_array($page_ids) || count($page_ids) == 0){
		echo "Keine Seite verlinkt";
		return;
	}
	
	foreach($page_ids as $page_id){
		
		$url = "/wp-json/ec-emmen/download/" . $page_id;
		
		echo "<div class='border-b-2 border-red pb-4 my-4 flex items-center'>";
			
			echo '<a download class="hover:text-red flex items-center" href="' . $url . '" title="Alle Bilder herunterladen">';
				echo '<i class="fas fa-cloud-download-alt text-3xl w-10 h-auto mr-2"></i>';
			echo '</a>';
			
			echo '<a class="hover:text-red flex" href="' . get_permalink($page_id) . '" title="Zur Gallerie">';
				echo get_the_title($page_id);
			echo '</a>';
			
		echo "</div>";	
	}
	
?>