<?php
	
	get_header();
 ?>	
	<div class="z-0 relative h-hero bg-center bg-cover" style="background-image: url(<?php echo get_field("post-index-hero-image", "option"); ?>)">
		<svg class="absolute bottom-0 left-0 right-0" width="100%" height="auto" viewBox="0 0 100 4" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				<polygon fill="#fff" points="0 0 100 4 0 8"></polygon>
			</g>
		</svg>
	</div>
	<div class="container mx-auto pb-8">
		<h1 class="text-4xl font-bold">
			<?php echo get_styled_title(get_field("post-index-title", "option")); ?>
		</h1>
	</div>
	
	<div class="container mx-auto my-10">
		<h3 class="text-red font-bold text-2xl mb-4">News</h3>
		<?php
			
			$i = 0;
			
			while(have_posts()){
				
				the_post();
				
				echo '<div class="mb-20">';
				
				$date = get_the_date("d.m.Y");
				$title = get_the_title();
				$content = get_the_content();
				$thumbnail = get_the_post_thumbnail();
				
				$text = '<div class="w-1/2">';
					$text .= '<div class="text-red">' . $date . '</div>';
					$text .= '<h4 class="font-bold text-2xl">' . $title . '</h4>';
					$text .= '<hr class="border-t-4 border-black">';
					$text .= '<p class="pt-4">' . $content . '</p>';
				$text .= '</div>';
				
				$image = '<div class="w-1/2">' . $thumbnail . '</div>';
				
				echo '<div class="flex space-x-8">';
				
				if($i % 2 == 0){
					//text left, image right
					
					echo $text;
					echo $image;
				}else{
					//image left, text right
					
					echo $image;
					echo $text;
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