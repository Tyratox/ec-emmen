<div class="container mx-auto my-10 px-8">
	<h3 class="text-red font-bold text-2xl mb-4"><?php echo get_field('title'); ?></h3>
	<?php
		
		// get sticky posts from DB
		$sticky = get_option('sticky_posts');
		// check if there are any
		if (!empty($sticky)) {
		    // optional: sort the newest IDs first
		    rsort($sticky);
		    // override the query
		    $args = array(
		        'post__in' => $sticky,
		        'orderby' => array(
		        	'menu_order' => 'ASC',
		        	'date' => 'DESC'
		        ),
		    );
		    query_posts($args);
		    
		    $i = 0;
		    
		    // the loop
		    while (have_posts()) {
		        the_post();
		         
		        echo '<div class="mb-16">';
			
				$date = get_the_date("d.m.Y", get_the_id());
				$title = get_the_title(get_the_id());
				$content = get_the_content(null, false, get_the_id());
				$video_type = get_field("video-type", get_the_id());
				$thumbnail = get_the_post_thumbnail(get_the_id());
				
				$text = '<div class="w-full sm:w-1/2 order-1 mb-4 #PADDING">';
					$text .= '<div class="text-red">' . $date . '</div>';
					$text .= '<h4 class="font-bold text-2xl">' . $title . '</h4>';
					$text .= '<hr class="border-t-4 border-black">';
					$text .= '<p class="pt-4">' . $content . '</p>';
				$text .= '</div>';
				
				$image = '<div class="w-full sm:w-1/2 order-2 sm:order-1 #PADDING">' . $thumbnail . '</div>';
				
				$vid = "";
				if(empty($video_type) || $video_type === "none"){
					//
				}else {
					$size = get_field("size", get_the_id());
					$width = get_field("width", get_the_id());
					$height = get_field("height", get_the_id());
						
					if($video_type == "youtube"){
						$url = get_field("youtube-url", get_the_id());
			
						preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
						$video_id = $matches[1];
						
						if(empty($video_id)){
							$vid = "Ungültiger Youtube Link!";
						}else{
							$vid = '<iframe class="max-w-full max-h-full lazy' . (empty($size) || $size === "full-width" ? " w-full h-auto" : "") . '" width="' . $width . '" height="' . $height . '" data-src="https://www.youtube-nocookie.com/embed/' . $video_id . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';	
						}
						
					}else if($video_type == "file"){
						$url = get_field("video-url", get_the_id());
						
						$vid = '<video class="max-w-full max-h-full lazy' . (empty($size) || $size === "full-width" ? " w-full h-auto" : "") . '" controls data-src="' . $url . '" width="' . $width . '" height="' . $height . '">';
							$vid .= 'Sorry, dein Browser unterstützt dieses Videoformat nicht.';
							$vid .= 'Du kannst es aber <a href="' . $url . '">hier herunterladen</a> und dann ansehen.';
						$vid .= '</video>';
					}	
				}
				
				if(!empty($vid)){
					$image = '<div class="w-full sm:w-1/2 order-2 sm:order-1 #PADDING">' . $vid . '</div>';
				}
				
				echo '<div class="flex flex-wrap">';
				
				if($i % 2 == 0){
					//text left, image right
					
					echo str_replace("#PADDING", "sm:pr-4", $text);
					echo str_replace("#PADDING", "sm:pl-4", $image);
				}else{
					//image left, text right
					
					echo str_replace("#PADDING", "sm:pr-4", $image);
					echo str_replace("#PADDING", "sm:pl-4", $text);
				}
				
				echo '</div>';
					
				echo '</div>';
				
				$i++;
		    }
		}
		
	?>
	
	<div class="text-center">
		<a class="underline" href="<?php echo get_field("link-url"); ?>">
			<?php echo get_field("link-text"); ?>
		</a>
	</div>

</div>