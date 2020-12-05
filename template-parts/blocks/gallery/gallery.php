<?php
	
	$gallery = get_field("gallery");
	
	echo "<div class='flex flex-wrap'>";
	
		$social_media_links = array(
			array(
				'icon-classes' => 'fab fa-instagram',
				'name' => 'Instagram',
				'url' => get_field('link-instagram', 'option')
			),
			array(
				'icon-classes' => 'fab fa-youtube',
				'name' => 'Youtube',
				'url' => get_field('link-instagram', 'option')
			),
			array(
				'icon-classes' => 'fab fa-facebook',
				'name' => 'Facebook',
				'url' => get_field('link-facebook', 'option')
			),
		);
		
		foreach($social_media_links as $link){
			if($link['url']){
				echo "<div class='w-1/3 px-8 mb-4'>";
					echo '<a class="hover:text-red flex flex-col items-center justify-center" href="' . $link['url'] . '">';
						echo '<i class="' . $link['icon-classes'] . ' text-4xl w-10 h-auto mr-2 mb-4"></i>';
						echo $link['name'];
					echo '</a>';
				echo "</div>";
			}
		}
	
		foreach($gallery as $image){
			echo "<div class='w-full sm:w-1/2 md:w-1/3 px-8 pb-8'>";
				echo "<img class='clip-person' src='" . $image . "'>";
			echo "</div>";
		}
	
	echo "</div>";
	
?>