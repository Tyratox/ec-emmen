<div class="z-0 h-hero overflow-hidden relative glider-contain">
	<div class="glider h-full">
		<?php
			$images = get_field("images");
			
			echo '<div><div class="z-0 relative w-full h-hero bg-center bg-cover" style="background-image: url(' . $images[0]['url'] . ')"></div></div>';
			
			for($i=1;$i<count($images);$i++){
				echo '<div><div class="z-0 relative w-full h-hero bg-center bg-cover lazy" data-bg="' . $images[$i]['url'] . '"></div></div>';
			}
		?>
	</div>
	
	<button aria-label="Previous" class="glider-prev top-1/2" style="left: 2rem;">
		<i class="fa fa-chevron-left text-3xl w-10 h-auto mr-2 text-white hover:text-red transition duration-300 ease-in-out"></i>
	</button>
	<button aria-label="Next" class="glider-next top-1/2" style="right: 2rem;">
		<i class="fa fa-chevron-right text-3xl w-10 h-auto mr-2 text-white hover:text-red transition duration-300 ease-in-out"></i>
	</button>
	<div role="tablist" class="absolute glider-dots dots left-0 right-0" style="bottom: 3rem;"></div>
	<svg class="absolute bottom-0 left-0 right-0 w-full h-auto" width="100" height="4" viewBox="0 0 100 4" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			<polygon fill="#fff" points="0 0 100 4 0 8"></polygon>
		</g>
	</svg>
</div>