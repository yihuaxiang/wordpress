<?php get_header(); ?>
	<!-- Column 1 /Content -->

	<div id="main">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/archive.css" />
		<div id="archive" class="shadow_box">
			<div class="sort_by">
				<ul>
					<li class="button"><a <?php if ( isset($_GET['order']) && ($_GET['order']=='rand') ) echo 'class="current"'; ?> href="<?php echo get_option("home") . '?' . http_build_query(array_merge($_GET, array('order' => 'rand'))); ?>">随机阅读</a></li>
					<li class="button"><a <?php if ( isset($_GET['order']) && ($_GET['order']=='commented') ) echo 'class="current"'; ?> href="<?php echo  get_option("home") . '?' . http_build_query(array_merge($_GET, array('order' => 'commented'))); ?>">评论最多</a></li>
					<li class="button"><a <?php if ( isset($_GET['order']) && ($_GET['order']=='alpha') ) echo 'class="current"'; ?> href="<?php echo  get_option("home") . '?' . http_build_query(array_merge($_GET, array('order' => 'alpha'))); ?>">标题排序</a></li>
				</ul>
			</div>
			<h4>浏览<?php
			// If this is a category archive
			if (is_category()) {
				printf('分类:</h4>
			<h2>'.single_cat_title('', false).'</h2>' );
				if (category_description()) echo '<p>'.category_description().'</p>';
			// If this is a tag archive
			} elseif (is_tag()) {
				printf('标签:</h4>
			<h2>'.single_tag_title('', false).'</h2>' );
				if (tag_description()) echo '<p>'.tag_description().'</p>';
			// If this is a daily archive
			} elseif (is_day()) {
				printf('日期存档:</h4>
			<h2>'.get_the_time('Y年n月j日').'</h2>' );
			// If this is a monthly archive
			} elseif (is_month()) {
				printf('月份存档:</h4>
				<h2>'.get_the_time('Y年n月').'</h2>' );
			// If this is a yearly archive
			} elseif (is_year()) {
				printf('年份存档:</h4>
				<h2>'.get_the_time('Y年').'</h2>' );
				// If this is an author archive
			} elseif (is_author()) {
					echo '作者存档:';
			// If this is a paged archive
			} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
				echo '博客存档:';
			}
			?>
	</div>
	<div class="hr clearfix">&nbsp;</div>
<?php
global $wp_query;

if ( isset($_GET['order']) && ($_GET['order']=='rand') )
{
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args=array(
		'orderby' => 'rand',
		'paged' => $paged,
	);
	$arms = array_merge(
		$args,
		$wp_query->query
	);
	query_posts($arms);
}
else if ( isset($_GET['order']) && ($_GET['order']=='commented') )
{
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args=array(
		'orderby' => 'comment_count',
		'order' => 'DESC',
		'paged' => $paged,
	);
    $arms = array_merge(
		$args,
		$wp_query->query
	);
    query_posts($arms);
}
else if ( isset($_GET['order']) && ($_GET['order']=='alpha') )
{
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args=array(
		'orderby' => 'title',
		'order' => 'ASC',
		'paged' => $paged,
	);
    $arms = array_merge(
		$args,
		$wp_query->query
	);
    query_posts($arms);
} if (have_posts()) : while (have_posts()) : the_post(); ?>
		<!-- Blog Post -->
		<div class="post shadow_box clear">
			<!-- Post Title -->
			<h3 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<!-- Post Data -->
			<p class="sub"><?php the_tags('<span class="icon-price-tags"></span> : ', ', ', ''); ?> &bull; <span class="icon-clock"></span> <?php the_time('Y年n月j日') ?> &bull; <span class="icon-bubble"></span> <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?>
</p>
			<div class="hr dotted clearfix">&nbsp;</div>
			<!-- Post Content -->
			<?php the_excerpt(); ?>
			<?php //the_content('阅读全文...'); ?>
			<!-- Read More Button -->
			<p class="clearfix"><a href="<?php the_permalink(); ?>" class="button right">阅读全文</a></p>
		</div>
		<div class="hr clearfix">&nbsp;</div>
		<?php endwhile; ?>


        <br />
        <div class="pagenav clear"><p><?php native_pagenavi();?></p></div>
        <br />
		<!-- Blog Navigation -->
		<!-- <p class="clearfix"><?php previous_posts_link('&lt;&lt; 查看新文章', 0); ?> <span class="float right"><?php next_posts_link('查看旧文章 &gt;&gt;', 0); ?></span></p> -->

		<?php else : ?>
		<div class="post shadow_box">
			<h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
			<p>没有找到任何文章！</p>
		</div>
		<?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
