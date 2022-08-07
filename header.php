<!DOCTYPE html>
<html <?php echo get_language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
		
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(array("font-body bg-gray-200")); ?>>
		<nav class="header fixed top-0 left-0 right-0 z-20">
			<div class="relative h-full w-full">
				<div class="relative z-20">
					<div class="bg-white">
						<div class="container mx-auto">
							<div class="mx-auto flex flex-wrap justify-between items-center px-4 py-4 sm:px-6 sm:py-4 lg:px-8 md:justify-start md:space-x-10">
								<div>
									<a href="/" class="flex">
										<img class="h-12 sm:h-10 lg:h-24 w-auto" src="<?php echo get_template_directory_uri() . "/images/logo.png"; ?>">
									</a>
								</div>
								<div class="-mr-2 -my-2 md:hidden">
									<button type="button" class="toggle-mobile-navigation inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
										<svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#f00">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
										</svg>
									</button>
								</div>
								<div class="hidden md:flex flex-1 flex-wrap items-center justify-between">
						  			<?php
							  			wp_nav_menu(
								  			array(
									  			'menu_class' => '',
									  			'container' => false,
									  			'before' => '',
									  			'after' => '',
									  			'link_before' => '',
									  			'link_after' => '',
									  			'theme_location' => 'header',
									  			'items_wrap' => '%3$s',
									  			'walker' => new Custom_Walker_Nav_Menu(),
									  			'depth' => 2,
									  			'fallback_cb'=> '__return_false'
								  			)
							  			)
							  		?>
								</div>
							</div>
						</div>
					</div>
					<div class="diagonal relative h-5 sm:h-8 md:h-10 lg:h-10">
						<div class="clip-left-upper-triangle bg-white absolute left-0 top-0 right-0 bottom-0"></div>
						<div class="clip-diagonal-bottom-left bg-red absolute left-0 top-0 right-0 bottom-0"></div>
					</div>
					
				</div>
				
				<div class="mobile-navigation hidden overflow-y-scroll bg-white absolute left-0 top-0 right-0 bottom-0" style="padding-top: 6rem;">
					<div class="mt-8 px-8">
						<div class="text-center text-2xl">
							<?php
								
								wp_nav_menu(
						  			array(
							  			'menu_class' => '',
							  			'container' => false,
							  			'before' => '',
							  			'after' => '',
							  			'link_before' => '',
							  			'link_after' => '',
							  			'theme_location' => 'header',
							  			'items_wrap' => '%3$s',
							  			'walker' => new Custom_Walker_Mobile_Nav_Menu(),
							  			'depth' => 2,
							  			'fallback_cb'=> '__return_false'
						  			)
					  			)
									
							?>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<div class="h-10 sm:h-10 md:h-24"></div>