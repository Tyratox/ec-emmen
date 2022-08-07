		<?php
			global $page_color;
		?>
		<footer class="relative pt-5" style="background-color: <?php echo $page_color; ?>">
			<div class="bg-white">
				<div class="diagonal relative h-5 sm:h-8 md:h-10 lg:h-10">
					<div class="clip-left-upper-triangle bg-gray absolute left-0 top-0 right-0 bottom-0"></div>
					<div class="clip-diagonal-bottom-left bg-red absolute left-0 top-0 right-0 bottom-0"></div>
				</div>
			
				<div class="container mx-auto my-5">
				
					<div class="flex flex-wrap md:divide-x-4 divide-red">
						<div class="w-full sm:w-1/2 md:w-1/3 px-10">
							<h3 class="text-xl font-bold mb-5"><?php echo get_styled_title("Stets Aktuell"); ?></h3>
							
							<ul class="list-none">
								<?php
									
									$social_media_links = array(
										array(
											'icon-classes' => 'fab fa-instagram',
											'name' => 'Instagram',
											'url' => get_field('link-instagram', 'option')
										),
										array(
											'icon-classes' => 'fab fa-youtube',
											'name' => 'Youtube',
											'url' => get_field('link-youtube', 'option')
										),
										array(
											'icon-classes' => 'fab fa-facebook',
											'name' => 'Facebook',
											'url' => get_field('link-facebook', 'option')
										),
									);
									
									foreach($social_media_links as $link){
										if($link['url']){
											echo '<li class="mt-2">';
												echo '<a class="hover:text-red flex items-center" href="' . $link['url'] . '">';
													echo '<i class="' . $link['icon-classes'] . ' text-3xl w-10 h-auto mr-2"></i>';
													echo $link['name'];
												echo '</a>';
											echo '</li>';
										}
									}
									
								?>
							</ul>
						</div>
						<div class="w-full sm:w-1/2 md:w-1/3 px-10 pt-8 sm:pt-0">
							<hr class="border-red border-t-4 mt-2 mb-4 sm:hidden">
							<h3 class="text-xl font-bold mb-5"><?php echo get_styled_title("Einrad Club") . " " . "Emmebrücke"; ?></h3>
							
							<ul class="list-none">
								<?php
									
									$links = get_field("footer-links", "option");
									
									if(is_array($links)){
										for($i=0;$i<count($links);$i++){
											$link = $links[$i];
											
											echo '<li class="' . ($i === count($links) - 1 ? "mt-4" : "mt-1") . '">';
												echo '<a class="underline" href="' . $link["url"] . '">' . $link["text"] . '</a>';
											echo '</li>';
										}
									}
								
								?>
							</ul>
						</div>
						<div class="w-full sm:w-1/2 md:w-1/3 px-10 pt-8 md:pt-0">
							<hr class="border-red border-t-4 mt-2 mb-4 md:hidden">
							<?php
								
								$logos = get_field("footer-logos", "option");
								
								if(is_array($logos)){
									foreach($logos as $logo){
										echo '<img class="w-3/4 h-auto lazy" data-src="' . $logo . '">';								
									}
								}
								
							?>
						</div>
					</div>
				
				</div>
			</div>
		</footer>
	
	<?php wp_footer(); ?>
	</body>
</html>