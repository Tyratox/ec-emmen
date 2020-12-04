<div class="container mx-auto my-10 px-8">
	<h3 class="text-red font-bold text-2xl mb-4"><?php echo get_field('title'); ?></h3>
	<?php
		
		$posts = get_field("posts");
		
		$i = 0;
		
		foreach($posts as $post){
			
			echo '<div class="mb-16">';
			
			$date = get_the_date("d.m.Y", $post);
			$title = get_the_title($post);
			$content = get_the_content(null, false, $post);
			$thumbnail = get_the_post_thumbnail($post);
			
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
		
	?>
	
	<div class="text-center">
		<a class="underline" href="<?php echo get_field("link-url"); ?>">
			<?php echo get_field("link-text"); ?>
		</a>
	</div>

</div>