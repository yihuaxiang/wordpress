<?php
/** widgets */
if( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'First_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Second_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Third_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Fourth_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
}


function curPageURL() {
	$pageURL = 'http://';

	$this_page = $_SERVER["REQUEST_URI"];
	if (strpos($this_page , "?") !== false)
		$this_page = reset(explode("?", $this_page));

	$pageURL .= $_SERVER["SERVER_NAME"]  . $this_page;

	return $pageURL;
}

function aurelius_comment($comment, $args, $depth)
{
   $GLOBALS['comment'] = $comment; ?>
   <li class="comment" id="li-comment-<?php comment_ID(); ?>">
		<div class="gravatar"> <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?></div>
		<div class="comment_content" id="comment-<?php comment_ID(); ?>">
			<div class="clearfix">
					<?php printf(__('<cite class="author_name">%s</cite>'), get_comment_author_link()); ?>
					<div class="comment-meta commentmetadata">发表于：<?php echo get_comment_time('Y-m-d H:i'); ?></div>
					&nbsp;&nbsp;&nbsp;
			</div>

			<div class="comment_text">
				<?php if ($comment->comment_approved == '0') : ?>
					<em>你的评论正在审核，稍后会显示出来！</em><br />
      	<?php endif; ?>
      	<?php comment_text(); ?>
			</div>
		</div>
<?php } ?>

<?php
//以下代码增加编辑器，不过感觉不好用
// function add_editor_buttons($buttons) {

// $buttons[] = 'fontselect';

// $buttons[] = 'fontsizeselect';

// $buttons[] = 'cleanup';

// $buttons[] = 'styleselect';

// $buttons[] = 'hr';

// $buttons[] = 'del';

// $buttons[] = 'sub';

// $buttons[] = 'sup';

// $buttons[] = 'copy';

// $buttons[] = 'paste';

// $buttons[] = 'cut';

// $buttons[] = 'undo';

// $buttons[] = 'image';

// $buttons[] = 'anchor';

// $buttons[] = 'backcolor';

// $buttons[] = 'wp_page';

// $buttons[] = 'charmap';

// return $buttons;

// }

// add_filter("mce_buttons_3", "add_editor_buttons");

?>


<?php

/*@分页功能*/
function native_pagenavi(){
global $wp_query, $wp_rewrite;
$wp_query->query_vars["paged"] > 1 ? $current = $wp_query->query_vars["paged"] : $current = 1;
$pagination = array(
"base" => @add_query_arg("paged","%#%"),
"format" => "",
"total" => $wp_query->max_num_pages,
"current" => $current,
"prev_text" => "上一页",
"next_text" => "下一页"
);
if( $wp_rewrite->using_permalinks() )
$pagination["base"] = user_trailingslashit( trailingslashit( remove_query_arg("s",get_pagenum_link(1) ) ) . "paged/%#%/", "paged");
if( !empty($wp_query->query_vars["s"]) )
$pagination["add_args"] = array("s"=>get_query_var("s"));
echo paginate_links($pagination);
}





?>
