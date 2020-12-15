<?php
	
	$title = get_field("title");
	$size = get_field("size");
	$weight = get_field("weight");
	$border = get_field("border");
	
	$classes = empty($weight) ? array("font-black") : array($weight);
	
	if($size === "h1"){
		$classes[] = "text-4xl";
	}else if($size === "h2"){
		$classes[] = "text-3xl";
	}else if($size === "h3"){
		$classes[] = "text-2xl";
	}else if($size === "h4"){
		$classes[] = "text-xl";
	}else if($size === "h5"){
		$classes[] = "text-lg";
	}else if($size === "h6"){
		$classes[] = "text-base";
	}else{
		$size = "h6";
	}
	
	
	echo '<' . $size . ' class="' . implode(" ", $classes) . '">' . $title . '</' . $size . '>';
	
	if($border){
		echo '<hr class="border-t-4 border-black">';
	}
	
?>