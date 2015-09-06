<?php get_header(); ?>




	<!-- Column 1 /Content -->
	<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
	<div id="main" class="left clear" style="margin-top:14px;">
		<!-- Blog Post -->
		<div class="post">
			<!-- Post Title -->
			<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<!-- Post Title -->
			<p class="sub"><?php the_tags('<span class="icon-price-tags"></span>：', ', ', ''); ?> &bull; <span class="icon-clock"> </span><?php the_time('Y年n月j日') ?> &bull; <span class="icon-bubble"> </span><?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?></p>
			<div class="hr dotted clearfix">&nbsp;</div>
			<!-- Post Title -->
			<!--<img class="thumb" src="<?php bloginfo('template_url'); ?>/images//610x150.gif" alt=""/>-->
			<!-- Post Content -->
			<?php the_content(); ?>
			<!-- Post Links -->
			<p class=""> <a href="<?php echo get_option('home'); ?>" class="button float" >&lt;&lt; 返回首页</a> <a href="#comment_form" class="button float right" >发表评论</a> </p>
		</div>
		<div class="hr clearfix">&nbsp;</div>
		<?php comments_template(); ?>
	</div>
    <?php else : ?>
    <div class="errorbox">
        没有文章！
    </div>
    <?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
