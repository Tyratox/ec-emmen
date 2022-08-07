<?php
	
	get_header();
 ?>	
	<div class="z-0 relative h-hero bg-center bg-cover" style="background-image: url(<?php echo get_field("post-index-hero-image", "option"); ?>)">
		<svg class="absolute bottom-0 left-0 right-0 w-full h-auto" width="100" height="4" viewBox="0 0 100 4" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				<polygon fill="#fff" points="0 0 100 4 0 8"></polygon>
			</g>
		</svg>
	</div>
	<div class="container mx-auto pb-8 px-8">
		<h1 class="text-4xl font-bold">
			<?php echo get_styled_title(get_field("post-index-title", "option")); ?>
		</h1>
	</div>
	
	<div class="container mx-auto my-10 px-8">
		<h3 class="text-red font-bold text-2xl mb-4">News</h3>
		<?php
			
			$i = 0;
			
			while(have_posts()){
				
				the_post();
				
				echo '<div class="mb-20">';
				
				$date = get_the_date("d.m.Y");
				$title = get_the_title();
				$content = get_the_content();
				$video_type = get_field("video-type", get_the_id());
				$thumbnail = get_the_post_thumbnail();
				
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
					
					echo str_replace("#PADDING", "sm:pr-4", $image);;
					echo str_replace("#PADDING", "sm:pl-4", $text);
				}
				
				echo '</div>';
				
				echo '</div>';
				
				$i++;
			}
			
		?>
		
		<?php
			global $paged, $wp_query;
			
			$max_page = $wp_query->max_num_pages;
			
			if(!$paged){
				$paged = 1;	
			}
			
			$next_page = intval($paged) + 1;
		?>
		
		<div class="text-center">
			<?php
				if ($paged > 1){
					echo '<a class="hover:text-red hover:underline" href="' . previous_posts(false) . '">' . __("&laquo; Previous Page") . '</a>';
				}
			?>
			<?php
				if ($next_page <= $max_page){
					echo '<a class="hover:text-red hover:underline" href="' . next_posts($max_page, false) . '">' . __("Next Page &raquo;") . '</a>';
				}
			?>
		</div>
	
	</div>
	
<?php
	get_footer();
?>