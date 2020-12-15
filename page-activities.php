<?php /* Template Name: Unsere Angebote */ ?>

<?php
	
	get_header();
	
?>

	<div class="bg-gray sm:pb-8">

		<div class="z-0 relative h-hero-lg bg-center bg-cover" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
		</div>
		
		<div class="z-1 relative container mx-auto -mt-64">
			<div class="sm:px-8">
				<div class="relative">
					<svg class="w-full h-auto" width="100" height="4" viewBox="0 0 100 4" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<polygon fill="#fff" points="0 0 100 4 0 8"></polygon>
						</g>
					</svg>
					
					<div class="bg-white px-8 pb-8 absolute left-0 right-0 sm:px-8 h-40">
					
						<h1 class="break-all text-4xl font-black mb-8 uppercase"><?php echo get_styled_title(get_the_title()); ?></h1>
					
					</div>
				</div>
			</div>
		</div>
		
		<div class="relative z-10 mt-10">
			<?php the_content(); ?>
		</div>
	
	</div>
	
<?php
		
	get_footer();
?>