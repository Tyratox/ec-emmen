<div class="container mx-auto px-8">
	<div class="">
		<div class="flex flex-wrap">
			<?php
				$query = new WP_Query(
					array(
						'post_type' => 'event',
						'posts_per_page' => -1,
						'meta_key' => 'date_from',
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
					
					$time = $date_from;
					
					if(!empty($time_from)){
						$time .= " " . $time_from;
					}
					
					if($date_from === $date_to || empty($date_to)){
						
						if(!empty($time_to)){
							$time .= " - " . $time_to;
						}
						
					}else{
						$time .= "<br>-<br>" . $date_to;
						
						if(!empty($time_to)){
							$time .= " " . $time_to;
						}
					}
					
					
					
					echo '<div class="w-full sm:w-1/4 sm:pr-4 pb-8 text-center">';
						echo '<span class="text-red">' . $time . '</span>';
					echo '</div>';
					
					echo '<div class="w-full sm:w-3/4 sm:pl-4 pb-16">';
						echo '<h3 class="font-bold border-red">' . $event->post_title . '</h3>';
						echo '<hr class="border-black border-t-4">';
						echo '<span>' . get_field('description', $event) . '</span>';
					echo '</div>';
				}
				
			?>
		</div>
	</div>
</div>