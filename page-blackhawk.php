<?php /* Template Name: Blackhawk */ ?>

<?php
	
	get_header();
	
?>
	<div class="bg-black relative">
		<div class="container mx-auto relative">
			<div class="md:absolute md:top-0 md:left-0 md:right-0 bg-red clip-blackhawk py-16 md:pl-8">
				<div class="px-8 xl:pl-16">
					<div class="w-full md:w-1/5">
						<img class="h-32 w-auto mx-auto md:mx-0 md:h-24 mb-8 md:mb-0 lg:h-32" src="<?php echo get_template_directory_uri() . "/images/blackhawks-logo.png"; ?>">
						
						<div class="text-white font-bold">
							<?php
					  			wp_nav_menu(
						  			array(
							  			'menu_class' => 'current-underline',
							  			'container' => 'ul',
							  			'before' => '',
							  			'after' => '',
							  			'link_before' => '',
							  			'link_after' => '',
							  			'theme_location' => 'blackhawks',
							  			'depth' => 1,
							  			'fallback_cb'=> '__return_false'
						  			)
					  			)
					  		?>
						</div>
					</div>
				</div>
			</div>
			<div class="md:py-16 relative z-2 w-full md:w-3/5 blackhawks-margin">
				<div class="md:ml-16 bg-white p-8">
					<?php
			
						the_content();
						
					?>
				</div>
			</div>
		</div>
	</div>

<?php
		
	get_footer("black");
?>