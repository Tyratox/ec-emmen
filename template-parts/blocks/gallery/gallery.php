<?php
	
	global $gallery_count;
	
	if(!isset($gallery_count)){
		$gallery_count = 0;
	}
	
	$gallery = get_field("gallery");
	
	echo "<div class='flex flex-wrap'>";
	
		$social_media_links = array(
			array(
				'icon-classes' => 'fab fa-instagram',
				'name' => 'Instagram',
				'url' => get_field('link-instagram', 'option'),
				'username' => get_field('instagram-username', 'option'),
			),
			array(
				'icon-classes' => 'fab fa-youtube',
				'name' => 'Youtube',
				'url' => get_field('link-youtube', 'option'),
				'username' => get_field('youtube-username', 'option'),
			),
			array(
				'icon-classes' => 'fab fa-facebook',
				'name' => 'Facebook',
				'url' => get_field('link-facebook', 'option'),
				'username' => get_field('facebook-username', 'option'),
			),
		);
		
		foreach($social_media_links as $link){
			if($link['url']){
				echo "<div class='w-1/3 px-8 mb-4'>";
					echo '<a class="hover:text-red flex flex-col items-center justify-center text-center" href="' . $link['url'] . '">';
						echo '<i class="' . $link['icon-classes'] . ' text-4xl w-10 h-auto mb-4"></i>';
						if(empty($link['username'])){
							echo $link['name'];	
						}else{
							echo $link['username'];	
						}
					echo '</a>';
				echo "</div>";
			}
		}
	
		foreach($gallery as $image){
			echo "<div class='w-full sm:w-1/2 md:w-1/3 px-8 pb-8'>";
				echo '<div class="clip-person relative">';
					echo '<div class="absolute left-0 top-0 right-0 bottom-0 bg-center bg-cover lazy" data-bg="' . $image . '">';
						echo "<img class='absolute left-0 top-0 w-full h-full glightbox opacity-0 cursor-pointer' src='" . $image . "' data-gallery='gallery-" . ($gallery_count) . "'>";
					echo '</div>';
				echo '</div>';
			echo "</div>";
		}
	
	echo "</div>";
	
	$gallery_count++;
	
?>