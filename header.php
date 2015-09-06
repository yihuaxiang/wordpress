<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
    <?php
        if( is_home() ){
            bloginfo("name");echo "-";bloginfo("description");
        }elseif( is_category() ){
            bloginfo("name");
        }elseif( is_single() || is_page() ){
            single_post_title();
        }elseif( is_search() ){
            echo "搜索结果：";echo "-";bloginfo("name");
        }elseif( is_404() ){
            echo "页面未找到";
        }else{
            wp_title("",true);
        }
    ?>
</title>
<!-- Stylesheets -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/base.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/index.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/common.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/header.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/footer.css" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--feed 订阅-->
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo get_bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />

<?php wp_head(); ?>


<!--自己实现网页关键字和描述文字-->
<?php
$description = '';
$keywords = '';

if (is_home() || is_page()) {
   // 主页description
   $description = "符栋栋，web前端工程师，毕业于电子科技大学，就职于阿里巴巴移动互联网事业部高德地图";

   // 主页keywords
   $keywords = "符栋栋 web前端 js html css html5 css3 jquery 网站 开发 代码";
}
elseif (is_single()) {
   $description1 = get_post_meta($post->ID, "description", true);
   $description2 = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));

   // 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述
   $description = $description1 ? $description1 : $description2;

   // 填写自定义字段keywords时显示自定义字段的内容，否则使用文章tags作为关键词
   $keywords = get_post_meta($post->ID, "keywords", true);
   if($keywords == '') {
      $tags = wp_get_post_tags($post->ID);
      foreach ($tags as $tag ) {
         $keywords = $keywords . $tag->name . ", ";
      }
      $keywords = rtrim($keywords, ', ');
   }
}
elseif (is_category()) {
   // 分类的description可以到后台 - 文章 -分类目录，修改分类的描述
   $description = category_description();
   $keywords = single_cat_title('', false);
}
elseif (is_tag()){
   // 标签的description可以到后台 - 文章 - 标签，修改标签的描述
   $description = tag_description();
   $keywords = single_tag_title('', false);
}
$description = trim(strip_tags($description));
$keywords = trim(strip_tags($keywords));
?>
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />



</head>

<?php flush(); ?>
<body>
<div id="wrapper" class=>
    <div id="navi">
        <h1 ig="logo" class=""><a href="<?php echo get_option('home'); ?>"><span class="icon-home"></span><?php bloginfo("name"); ?></a></h1>
        <ul class=" clear">
            <?php wp_list_pages('depth=1&title_li=0&sort_column=menu_order'); ?>
            <li  <?php if (is_home()){echo "class=current";} ?> ><a class="left" title="<?php bloginfo('name'); ?>" href="<?php echo get_option('home'); ?>">主页</a></li>
        </ul>
    </div>

    <div class="hr grid_12 clearfix">&nbsp;</div>
    <!-- Caption Line -->
    <!--<h2 class="grid_12 caption clearfix">Our <span>blog</span>, keeping you up-to-date on our latest news.</h2>
    <div class="hr grid_12 clearfix">&nbsp;</div>-->
