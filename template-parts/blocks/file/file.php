<?php
	
	$file = get_field("file");
	
	echo "<div class='border-b-2 border-red pb-4 my-4'>";
		
		echo '<a download class="hover:text-red flex items-center" href="' . $file['url'] . '">';
			echo '<i class="fas fa-cloud-download-alt text-3xl w-10 h-auto mr-2"></i>';
			echo $file['title'];
			if(!empty($file['caption'])){
				echo ", " . $file['caption'];
			}
			if(!empty($file['description'])){
				echo ", " . $file['description'];
			}
		echo '</a>';
		
	echo "</div>";
	
?>