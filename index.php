
<?php get_header(); ?>






    <!-- Column 1 /Content -->
    <div id="main" class="clear">


        <!-- Blog Post -->
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


                <div class="post clear">
                    <!-- Post Title -->
                    <h3 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                    <!-- Post Data -->
                    <p class="sub "><?php the_tags('<span class="icon-price-tags"></span>：', ', ', ''); ?> &bull; <span class="icon-clock"> </span><?php the_time('Y年n月j日') ?> &bull; <span class="icon-bubble"> </span><?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?></p>
                    <div class="hr dotted clearfix">&nbsp;</div>
                    <!-- Post Image -->
                    <!--<img class="thumb" alt="" src="<?php bloginfo('template_url'); ?>/images//610x150.gif" />-->
                    <!-- Post Content -->
                    <?php the_excerpt(); ?>

                    <!-- Read More Button -->
                    <p class="clearfix"><a href="<?php the_permalink(); ?>" class="button right">阅读全文</a></p>
                </div>
                <div class="hr clearfix">&nbsp;</div>


        <?php endwhile; ?>



        <br />
        <div class="pagenav clear"><p><?php native_pagenavi();?></p></div>
        <br />
        <!-- Blog Navigation -->
        <!--<p class="clearfix"> <a href="#" class="button float">&lt;&lt; Previous Posts</a> <a href="#" class="button float right">Newer Posts >></a> </p>-->
        <!-- <p class="clearfix"><?php previous_posts_link('&lt;&lt; 上一页', 0); ?> <span class=""><?php next_posts_link('下一页 &gt;&gt;', 0); ?></span></p> -->
        <?php else : ?>
        <div class="post">
            <h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
            <p>没有找到任何文章！</p>
        </div>
        <?php endif; ?>
    </div>



<?php get_sidebar(); ?>
<?php get_footer(); ?>
