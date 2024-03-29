<?php
	
	get_header();
	
?>

	<div class="bg-gray sm:pb-8">

		<div class="z-0 relative h-hero bg-center bg-cover" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
		</div>
		
		<div class="z-10 relative container mx-auto -mt-32 sm:px-8">
			<svg class="w-full h-auto" width="100" height="4" viewBox="0 0 100 4" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<polygon fill="#fff" points="0 0 100 4 0 8"></polygon>
				</g>
			</svg>
			
			<div class="bg-white px-8 pb-8">
			
				<h1 class="break-all text-4xl font-black mb-8 uppercase"><?php echo get_styled_title(get_the_title()); ?></h1>
				<?php the_content(); ?>
			
			</div>
		</div>
	
	</div>
	
<?php
		
	get_footer();
?>