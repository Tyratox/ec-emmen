<!DOCTYPE html>
<html <?php echo get_language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(array("font-body bg-gray-200")); ?>>
		<div class="relative z-10">
			<div class="bg-white">
				<div class="transform translate-y-5 container mx-auto">
					<div class="mx-auto flex justify-between items-center px-4 py-5 sm:px-6 sm:py-4 lg:px-8 md:justify-start md:space-x-10">
						<div>
							<a href="#" class="flex">
								<img class="h-5 w-auto sm:h-24" src="<?php echo get_template_directory_uri() . "/images/logo.png"; ?>">
							</a>
						</div>
						<div class="-mr-2 -my-2 md:hidden">
							<button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
							<!-- Heroicon name: menu -->
							<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
			<svg class="absolute -z-1" width="100%" height="auto" viewBox="0 0 100 4.5" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			        <polygon fill="#fff" points="0 0 100 0 0 4"></polygon>
			        <path d="M0,4.25 L100,0.25" stroke="#f00" stroke-width="0.5"></path>
			    </g>
			</svg>
		</div>