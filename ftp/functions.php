<?php
add_filter('show_admin_bar', '__return_false'); //скроем на время админ бар сверху

//подключаем стили
function _s_styles()
{
	// Header
	wp_register_style('header', get_template_directory_uri(). '/css/header.css');
	wp_enqueue_style('header', get_template_directory_uri(). '/css/header.css');

	// Общие стили
	wp_register_style('total', get_template_directory_uri(). '/css/style.css');
	wp_enqueue_style('total', get_template_directory_uri(). '/css/style.css');

	// Footer
	wp_register_style('footer', get_template_directory_uri(). '/css/footer.css');
	wp_enqueue_style('footer', get_template_directory_uri(). '/css/footer.css');

	// Главная
	if ( is_page("main") )
	{
		wp_register_style('main', get_template_directory_uri(). '/css/main.css');
		wp_enqueue_style('main', get_template_directory_uri(). '/css/main.css');
	}

	// Single
	wp_register_style('single_css', get_template_directory_uri(). '/css/single.css');
	wp_enqueue_style('single_css', get_template_directory_uri(). '/css/single.css');

	// Category
	wp_register_style('category_css', get_template_directory_uri(). '/css/category.css');
	wp_enqueue_style('category_css', get_template_directory_uri(). '/css/category.css');

	// Comments
	wp_register_style('comments_css', get_template_directory_uri(). '/css/comments.css');
	wp_enqueue_style('comments_css', get_template_directory_uri(). '/css/comments.css');
}
add_action('wp_enqueue_scripts', '_s_styles');

//подключаю скрипты

function _s_scripts()
{
	//своя библиотека jquery, не вордпрессовска
	wp_deregister_script('jquery');
	wp_register_script('jquery',  get_template_directory_uri(). '/js/jquery.js');
	wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', '_s_scripts');



//регистрация меню
if ( function_exists( 'register_nav_menus' ) )
{
	register_nav_menus(
		array(
			'top-menu'=>__('Top Menu')
		)
	);
}

function custom_menu(){
	echo '<ul>';
	wp_list_pages('title_li=&');
	echo '</ul>';
}

// Добавляем кнопку добавления миниатюры поста
add_theme_support( 'post-thumbnails' );

// Добавляем страничку настроек темы
require_once("options_page.php");

// --- CUSTOM FUNCTIONS ---
function get_short_content($the_content, $wordsNum){
	$content = $the_content;
    $content = strip_shortcodes($content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);
    $excerpt_length = $wordsNum;
    $words = explode(' ', $content, $excerpt_length + 1);
    if(count($words) > $excerpt_length){
        array_pop($words);
    }
    $content = implode(' ', $words);
    $content .= " ...";
    return $content;
}
?>