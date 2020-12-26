<?php /* Template Name: Mitgliederbereich */ ?>

<?php
	
	if(!is_user_logged_in()){
		wp_redirect("/login");
	}
	
	get_header();
	
?>
	
	<div class="bg-gray relative">
		<div class="container mx-auto relative">
			<div class="md:absolute md:top-0 md:left-0 md:right-0 bg-red clip-blackhawk py-16 md:pl-8">
				<div class="px-8 xl:pl-16">
					<div class="w-full md:w-1/5">
						<div class="h-20"></div>
						
						<div class="text-center sm:text-left text-white font-bold">
							<?php
					  			wp_nav_menu(
						  			array(
							  			'menu_class' => 'current-underline',
							  			'container' => 'ul',
							  			'before' => '',
							  			'after' => '',
							  			'link_before' => '',
							  			'link_after' => '',
							  			'theme_location' => 'member',
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
					<h1 class="text-4xl font-black">
						<?php echo get_styled_title(get_the_title()); ?>
					</h1>
					
					<?php
			
						the_content();
						
					?>
				</div>
			</div>
		</div>
	</div>

<?php
		
	get_footer();
?>