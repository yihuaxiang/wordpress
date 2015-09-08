   <!-- Column 2 / Sidebar -->
   <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/sidebar.css" />
   <div id="search_div" class="right shadow_box">
        <ul>
            <li>
                <form method="get" action="<?php echo get_option('home'); ?>">

                    <input type="search" id="search" name="s" placeholder="搜索关键字" />
                    <input type="hidden" value="submit" />
                    <button type="submit" id="button" >回车</button>
                    <div class="hr clearfix">&nbsp;</div>
                </form>
            </li>
        </ul>
   </div>
    <div id="sidebar" class="right shadow_box">
    <ul>

        <li>
            <h4>1分类目录</h4>
            <ul>
                <?php wp_list_categories('depth=1&title_li=&orderby=id&show_count=0&hide_empty=1&child_of=0'); ?>
            </ul>

        </li>
        <li>

            <h4>2最新文章</h4>
            <ul>
                <?php
                    $posts = get_posts('numberposts=6&orderby=post_date');
                    foreach($posts as $post) {
                        setup_postdata($post);
                        echo '<li title="'.get_the_title().'"><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                    }
                    $post = $posts[0];
                ?>
            </ul>

        </li>
        <li>

            <h4>3标签云</h4>
            <p><?php wp_tag_cloud('smallest=14&largest=14&unit=px'); ?></p>

        </li>
        <li>

            <h4>4文章存档</h4>
            <ul>
                <?php wp_get_archives('limit=10'); ?>
            </ul>
        </li>
        <li>

            <?php
            /**
             * 名称：WordPress显示最近评论的文章列表
             * 作者：露兜
             * 博客：http://www.ludou.org/
             * 最后修改：2010年12月06日
             */

            $pop = $wpdb->get_results("SELECT DISTINCT comment_post_ID
            FROM $wpdb->comments
            WHERE comment_approved = 1
            AND comment_post_ID NOT IN
            (
            SELECT ID FROM $wpdb->posts
            WHERE post_type != 'post'
            OR post_status != 'publish'
            OR post_password != ''
            )
            ORDER BY comment_ID DESC
            LIMIT 10"); ?>

            <h4>5最新评论</h4>
            <ul>
            <?php foreach($pop as $post) : ?>
            <li><a href="<?php echo get_permalink($post->comment_post_ID); ?>"><?php echo get_the_title($post->comment_post_ID); ?></a></li>
            <?php endforeach; ?>
            </ul>

        </li>
        <li>
            <h4>6热门文章</h4>
            <ul><?php $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , 5");
            foreach ($result as $post) {
            setup_postdata($post);
            $postid = $post->ID;
            $title = $post->post_title;
            $commentcount = $post->comment_count;
            if ($commentcount != 0) { ?>
            <li><a href="<?php echo get_permalink($postid); ?>"title="<?php echo $title ?>">
            <?php echo $title ?> (<?php echo $commentcount ?>)</a></li>
            <?php } } ?></ul>
        </li>
    </ul>
    </div>
    <div class="hr grid_12 clearfix">&nbsp;</div>
