<?php /* Template Name: Blackhawk */ ?>

<?php
	
	get_header();
	
?>
	<div class="bg-black relative">
		<div class="absolute top-0 left-0 right-0 bg-red clip-blackhawk py-16">
			<div class="container mx-auto px-8">
				<div class="w-1/5">
					<img class="h-8 w-auto sm:h-32" src="<?php echo get_template_directory_uri() . "/images/blackhawks-logo.png"; ?>">
					
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
		<div class="py-16 relative z-2 w-3/5" style="margin-left: 20%;">
			<div class="ml-16 bg-white p-8">
				<?php
		
					the_content();
					
				?>
			</div>
		</div>
	</div>

<?php
		
	get_footer("black");
?>