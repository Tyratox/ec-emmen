<div class="container mx-auto pb-8 px-8 <?php echo get_field("padding") ? "" : "sm:px-0"; ?>">
	<h1 class="text-4xl font-bold">
		<?php echo get_styled_title(get_field('title_1')) . ' ' . get_field('title_2'); ?>
	</h1>
	<h2 class="text-xl">
		<?php echo get_field('subtitle'); ?>
	</h2>
</div>