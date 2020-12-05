<!DOCTYPE html>
<html <?php echo get_language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
		
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(array("font-body bg-gray-200")); ?>>
		<div class="relative z-20">
			<div class="bg-white">
				<div class="transform translate-y-5 container mx-auto">
					<div class="mx-auto flex justify-between items-center px-4 py-5 sm:px-6 sm:py-4 lg:px-8 md:justify-start md:space-x-10">
						<div>
							<a href="#" class="flex">
								<img class="h-16 sm:h-10 lg:h-24 w-auto" src="<?php echo get_template_directory_uri() . "/images/logo.png"; ?>">
							</a>
						</div>
						<div class="-mr-2 -my-2 md:hidden">
							<button type="button" class="toggle-mobile-navigation inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
								<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#f00">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
								</svg>
							</button>
						</div>
						<div class="hidden md:flex-1 md:flex md:items-center md:justify-between md:space-x-12">
							<nav class="flex space-x-10">
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
				  			</nav>
						</div>
					</div>
				</div>
			</div>
			<svg class="absolute -z-1 w-full h-auto" width="100" height="5" viewBox="0 0 100 5" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			        <polygon fill="#fff" points="0 0 100 0 0 4"></polygon>
			        <path d="M0,4.25 L100,0.25" stroke="#f00" stroke-width="0.5"></path>
			    </g>
			</svg>
		</div>
		<div class="mobile-navigation hidden bg-white fixed left-0 right-0 z-20 h-full">
			<svg class="absolute -z-1 w-full h-auto" width="100" height="5" viewBox="0 0 100 5" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			        <polygon fill="#fff" points="0 0 100 0 0 4"></polygon>
			        <path d="M0,4.25 L100,0.25" stroke="#f00" stroke-width="0.5"></path>
			    </g>
			</svg>
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