<?php
	$t1 = get_field('title_1');
	$t2 = get_field('title_2');
	$padding_bottom = get_field('padding-bottom');
?>

<div class="container mx-auto <?php echo get_field("padding") ? "px-8" : ""; echo $padding_bottom ? " pb-8" : "" ?>">
	<?php
		if(!empty($t1) || !empty($t2)):
	?>
		
	<h1 class="text-4xl font-black">
		<?php echo get_styled_title(get_field('title_1')) . ' ' . get_field('title_2'); ?>
	</h1>
		
	<?php
		endif;
	?>
	<h2 class="text-xl font-bold">
		<?php echo get_field('subtitle'); ?>
	</h2>
</div>