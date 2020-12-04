<div class="bg-gray py-8">
	<div class="container mx-auto p-4 px-8">
		<div class="flex flex-wrap">
			<div class="w-full sm:w-1/3 sm:pr-16 pb-8">
				<h3 class="text-red font-bold text-2xl mb-4"><?php echo get_field("title"); ?></h3>
				<a class="flex space-x-8" href="<?php echo get_field("link-url"); ?>">
					<span class="font-bold"><?php echo get_field("link-text"); ?></span>
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" viewBox="0 0 434 364" width="20" height="17">
						<g transform="matrix(-1 0 0 1 434 0)">
							<path id="agenda-arrow" fill="#f00" fill-opacity="1" stroke-dasharray="none" stroke-miterlimit="4" stroke-opacity="1" stroke-width="80" d="M182-1h100v258H182z" transform="skewX(-45) scale(1 .70808)"/>
							<use width="434" height="364" transform="matrix(1 0 0 -1 0 364)" xlink:href="#agenda-arrow"/>
							<path d="M67 132h368v100H67z" fill="#f00"/>
						</g>
					</svg>
				</a>
			</div>
			<div class="w-full sm:w-2/3">
				<div class="flex flex-wrap">
					<?php
					
						$query = new WP_Query(
							array(
								'post_type' => 'event',
								'posts_per_page' => 2,
								'meta_key' => 'date_from',
								'orderby' => 'meta_value',
								'order' => 'ASC'
							)
						);
						
						foreach($query->posts as $event){
							
							$date_from = get_field("date_from", $event);
							if(!empty($date_from)){
								$date_from = DateTime::createFromFormat('Ymd', $date_from)->format('d.m.Y');
							}
							$date_to = get_field("date_to", $event);
							if(!empty($date_to)){
								$date_to = DateTime::createFromFormat('Ymd', $date_to)->format('d.m.Y');	
							}
							$time_from = get_field("time_from", $event);
							$time_to = get_field("time_to", $event);
							
							$time = $date_from;
							
							if(!empty($time_from)){
								$time .= " " . $time_from;
							}
							
							if($date_from === $date_to || empty($date_to)){
								
								if(!empty($time_to)){
									$time .= " - " . $time_to;
								}
								
							}else{
								$time .= " bis " . $date_to;
								
								if(!empty($time_to)){
									$time .= " " . $time_to;
								}
							}
							
							
							
							echo '<div class="w-full sm:w-1/2 sm:pr-16 pb-8">';
								echo '<span class="text-red">' . $time . '</span>';
								echo '<h3 class="font-bold border-red">' . $event->post_title . '</h3>';
								echo '<hr class="border-red border-t-4">';
								echo '<span>' . get_field('description', $event) . '</span>';
							echo '</div>';
						}
						
					?>
				</div>
			</div>
		</div>
	</div>
</div>