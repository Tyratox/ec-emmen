<?php
	
	$page_ids = get_field("pages");
	
	if(!is_array($page_ids) || count($page_ids) == 0){
		echo "Keine Seite verlinkt";
		return;
	}
	
	foreach($page_ids as $page_id){
		// get all blocks of the page
		$blocks = parse_blocks(get_the_content(null, false, $page_id));
		
		// filter for galleries
		$galleries = array_values(array_filter($blocks, function($block){
			return $block["blockName"] == "acf/gallery";
		}));
		
		// ensure there is only a single one
		if(count($galleries) != 1){
			echo "Die verlinkte Seite muss genau eine einzelne Gallerie enthalten";
			return;
		}
		
		$gallery = $galleries[0];
		
		$attachment_ids = $gallery["attrs"]["data"]["gallery"];
		
		
		$url = "/wp-json/ec-emmen/download/" . implode(",", $attachment_ids);
		
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