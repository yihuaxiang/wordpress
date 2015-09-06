<?php
/*
Template Name: contract
*/
?>
<?php get_header(); ?>


<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/contact.css" />

<div id="sidebar" class="right">
	<!-- Column 2 / Sidebar -->
	<div id="info">
		<!-- Adress and Phone Details -->
		<h4>地址邮箱：</h4>
		<div class="hr dotted clearfix">&nbsp;</div>
		<ul>
			<li><span class="icon-location2"> </span>: 北京-朝阳</li>
			<li><span class="icon-phone"> </span>: 18215600321</li>
			<li><span class="icon-drive"> </span>: 100102</li>
		</ul>
		<!-- Email Addresses -->
		<h4>邮箱：</h4>
		<div class="hr dotted clearfix">&nbsp;</div>
		<ul>
			<li><span class="icon-mail"></span> : <a href="mailto:fudongdonguestc@gmail.com">fudongdonguestc@gmail.com</a></li>
		</ul>
		<!-- Social Profile Links -->
		<h4>照片展：</h4>
		<div class="hr dotted clearfix">&nbsp;</div>
		<ul>
			<li class="float"><a href="#"><img alt="" src="images/twitter.png" title="Twitter" /></a></li>
			<li class="float"><a href="#"><img alt="" src="images/facebook.png" title="Facebook" /></a></li>
			<li class="float"><a href="#"><img alt="" src="images/stumbleupon.png" title="StumbleUpon" /></a></li>
			<li class="float"><a href="#"><img alt="" src="images/flickr.png" title="Flickr" /></a></li>
			<li class="float"><a href="#"><img alt="" src="images/delicious.png" title="Delicious" /></a></li>
		</ul>
	</div>
</div>

<div class="hr grid_12 clearfix">&nbsp;</div>
<div id="main">
	<!-- Caption Line -->
	<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>

		<div id="intro_div">
			<h2 class="grid_12 caption clearfix"><?php echo the_title(); ?></h2>
			<?php the_content(); ?>
		</div>
		<div class="hr clearfix">&nbsp;</div>
	<!-- Column 1 / Content -->

		<?php comments_template(); ?>

	<?php else : ?>
	<div class="grid_8">
		暂无评论
	</div>
	<?php endif; ?>

	<div class="hr grid_12 clearfix">&nbsp;</div>
</div>

<?php get_footer(); ?>
