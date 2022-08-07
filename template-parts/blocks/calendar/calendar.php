<div class="container mx-auto px-8">
	<div class="">
		<div class="flex flex-wrap">
			<?php
				$query = new WP_Query(
					array(
						'post_type' => 'event',
						'posts_per_page' => -1,
						'meta_key' => 'date_to',
						'orderby' => 'meta_value',
						'order' => 'ASC',
						'meta_value'=> date('Ymd'),
						'meta_compare'=>'>=',
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
					
					$time = "";
					
					$cancelled = get_field("cancelled", $event);
					$cancelled = empty($cancelled) ? false : true;
					
					if($date_from === $date_to || empty($date_from)){
						
						if(!empty($time_from) && !empty($time_to)){
							$time = $date_to . " " . $time_from . " - " . $time_to;
						}else if(!empty($time_from)){
							$time = $date_to . ", ab " . $time_from;
						}else if(!empty($time_to)){
							$time = $date_to . ", bis " . $time_to;
						}else{
							$time = $date_to;
						}
						
					}else{
						
						if(!empty($time_from) && !empty($time_to)){
							$time = $date_from . " " . $time_from . "<br class='hidden sm:block'> - <br class='hidden sm:block'>" . $date_to . " " . $time_to;
						}else if(!empty($time_from)){
							$time = $date_from . " " . $time_from . "<br class='hidden sm:block'> - <br class='hidden sm:block'>" . $date_to;
						}else if(!empty($time_to)){
							$time = $date_from . "<br class='hidden sm:block'> - <br class='hidden sm:block'>" . $date_to . " " . $time_to;
						}else{
							$time = $date_from . "<br class='hidden sm:block'> - <br class='hidden sm:block'>" . $date_to;
						}
					}
					
					
					$link_text = get_field("link_text", $event);
					$link_url = get_field("link_url", $event);
					
					
					echo '<div class="w-full sm:w-1/4 sm:pr-4 pb-2 sm:pb-8 text-left md:text-center">';
						echo '<span class="text-red ' . ($cancelled ? "line-through" : "") . '">' . $time . '</span>';
					echo '</div>';
					
					echo '<div class="w-full sm:w-3/4 sm:pl-4 pb-16">';
						echo '<h3 class="font-bold">' . '<span class="' . ($cancelled ? "line-through" : "") . '">' . $event->post_title . "</span>" . ($cancelled ? " <span class='no-underline text-red'>Abgesagt</span>" : "") . '</h3>';
						echo '<hr class="border-black border-t-4">';
						echo '<span class="' . ($cancelled ? "line-through" : "") . '">' . get_field('description', $event) . '</span>';
						echo '<br>';
						if(!empty($link_url)){
							echo '<a target="_blank" href="' . $link_url . '">';
								echo $link_text;
								echo '<svg class="inline-block ml-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" viewBox="0 0 434 364" width="20" height="17">
									<g transform="matrix(-1 0 0 1 434 0)">
										<path id="agenda-arrow" fill="#f00" fill-opacity="1" stroke-dasharray="none" stroke-miterlimit="4" stroke-opacity="1" stroke-width="80" d="M182-1h100v258H182z" transform="skewX(-45) scale(1 .70808)"/>
										<use width="434" height="364" transform="matrix(1 0 0 -1 0 364)" xlink:href="#agenda-arrow"/>
										<path d="M67 132h368v100H67z" fill="#f00"/>
									</g>
								</svg>';
							echo '</a>';
						}
					echo '</div>';
				}
				
			?>
		</div>
	</div>
</div>