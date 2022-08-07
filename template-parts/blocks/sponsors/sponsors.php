<div class="bg-gray py-10">
	<div class="container mx-auto px-8">
		<div class="flex flex-wrap">
			<div class="w-full sm:w-1/3">
				<h3 class="text-red font-bold text-2xl mb-4"><?php echo get_field("title") ?></h3>
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
						$sponsors = get_field("sponsors");
						
						foreach($sponsors as $sponsor){
							echo "<div class='w-full sm:w-1/3 pt-8 pr-8 pb-8 sm:p-8'>";
								echo "<a href='" . $sponsor["url"] . "'><img class='lazy' data-src='" . $sponsor["image"] . "' ></a>";
							echo "</div>";
						}	
					?>
				</div>
			</div>
		</div>
	</div>
</div>