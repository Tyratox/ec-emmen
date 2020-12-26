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
		        'post__in' => $sticky
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
				$thumbnail = get_the_post_thumbnail(get_the_id());
				
				$text = '<div class="w-full sm:w-1/2 order-1 mb-4 #PADDING">';
					$text .= '<div class="text-red">' . $date . '</div>';
					$text .= '<h4 class="font-bold text-2xl">' . $title . '</h4>';
					$text .= '<hr class="border-t-4 border-black">';
					$text .= '<p class="pt-4">' . $content . '</p>';
				$text .= '</div>';
				
				$image = '<div class="w-full sm:w-1/2 order-2 sm:order-1">' . $thumbnail . '</div>';
				
				echo '<div class="flex flex-wrap">';
				
				if($i % 2 == 0){
					//text left, image right
					
					echo str_replace("#PADDING", "sm:pr-8", $text);
					echo $image;
				}else{
					//image left, text right
					
					echo $image;
					echo str_replace("#PADDING", "sm:pl-8", $text);
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