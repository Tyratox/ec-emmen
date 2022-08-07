<div class="flex flex-wrap">
	<?php
		
		$blocks = get_field("blocks");
		$bp = get_field("breakpoints");
		
		if(empty($bp)){
			$bp = "0";
		}
		
		$label_mapping = array(
			"0" => "w-full sm:w-1/2 md:w-1/3 lg:w-1/4",
			"1" => "w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6",
			"2" => "w-full sm:w-1/2",
			"3" => "w-full md:w-1/2",
			"4" => "w-full md:w-1/3",
			"5" => "w-full lg:w-1/3",
			"6" => "w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5",
		);
		
		$classes = $label_mapping[$bp];
		
		foreach($blocks as $key => $b){
			$text = $b["text"];
			
			echo "<div class='pb-4 pr-4 break-all " . $classes . "'>";
				echo nl2br($text);
			echo "</div>";
		}
		
	?>
</div>