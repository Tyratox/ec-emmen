<?php
	$t1 = get_field('title_1');
	$t2 = get_field('title_2');
?>

<div class="container mx-auto pb-8 px-8 <?php echo get_field("padding") ? "" : "sm:px-0"; ?>">
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