<?php /* Template Name: Mitgliederbereich */ ?>

<?php
	
	if(!is_user_logged_in()){
		wp_redirect("/login");
	}
	
	get_header();
	
?>
	<div class="bg-gray relative">
		<div class="absolute top-0 left-0 right-0 bg-red clip-blackhawk py-16">
			<div class="container mx-auto px-8">
				<div class="w-1/5">
					<div class="h-8 h-32"></div>
					
					<div class="text-white font-bold z-10">
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
		<div class="py-16 relative z-2 w-3/5" style="margin-left: 20%;">
			<div class="ml-16 bg-white p-8">
				
				<h1 class="text-4xl font-black">
					<?php echo get_styled_title(get_the_title()); ?>
				</h1>
				
				<?php
		
					the_content();
					
				?>
			</div>
		</div>
	</div>

<?php
		
	get_footer();
?>