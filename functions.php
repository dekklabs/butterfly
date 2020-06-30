<?php

/**

 * Template Base - Desarrollado por Dekk

 *

 * @package WordPress

 * @subpackage Base

 * @since Base 1.0

 */





//define('_HOST_', "https://".$_SERVER['SERVER_NAME']);

define('_HOST_', "http://".$_SERVER['SERVER_NAME']);

//Default Base....

if (!function_exists('default_base')) {
    function default_base() {
        /* Logo */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));

        add_theme_support('post-thumbnails');

        //CLEAR DATA
        remove_action('wp_head', 'wp_resource_hints', 2);
        //remove_action( 'wp_head', 'feed_links', 2 );
        add_filter( 'feed_links_show_comments_feed', '__return_false' );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_generator');
    }
}

add_action('after_setup_theme', 'default_base');

//Fin

//Limitar Caracteres

function limitar_caracters($charlength) {
    $excerpt = get_the_excerpt();

    $charlength++;

    if (mb_strlen($excerpt) > $charlength) {
        $subex = mb_substr($excerpt, 0, $charlength - 5);
        $exwords = explode(' ', $subex);
        $excut = - (mb_strlen($exwords[ count($exwords) - 1 ]));

        if ($excut < 0) {
            echo mb_substr($subex, 0, $excut);
        } else {
            echo $subex;
        }
        echo '[...]';
    } else {
        echo $excerpt;
    }
}

//Fin
//Pagination en Boostrap
function wp_bs_pagination($pages = '', $range = 4) {
    $showitems = ($range * 2) + 1;
    global $paged;

    if (empty($paged)) {
        $paged = 1;
    }

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    $html = '';
    if (1 != $pages) {
        $html .= '<ul class="pagination ">';
        if ($paged > 1) {
            $html .= "<li class='page-item'> <a class='page-link' href='".get_pagenum_link($paged - 1)."' aria-label='Anterior'>Anterior</a></li>";
        }

        for ($i=1; $i <= $pages; $i++) {
            if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)) {
                if ($paged == $i) {
                    $html .= "<li class='page-item active'><span class='page-link'>".$i." <span class=\"sr-only\">(current)</span></span></li>";
                } else {
                    $html .= "<li class='page-item'><a class='page-link' href='".get_pagenum_link($i)."'>".$i."</a></li>";
                }
            }
        }

        if ($paged < $pages) {
            $html .= "<li class='page-item'><a class='page-link' href=\"".get_pagenum_link($paged + 1)."\"  aria-label='Siguiente'>Siguiente</a></li>";
        }

        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) {
            $html .= "<li class='page-item'><a class='page-link' href='".get_pagenum_link($pages)."' aria-label='Ultimo'>Último</a></li>";
        }

        $html .= '</ul>';
    }
    return $html;
}
//Fin

//Crear Widgets
// register_sidebar(array(
//     'name'          => __('Blog', 'base'),
//     'id'            => 'sidebar',
//     'description'   => __('Barra lateral principal que aparece a la izquierda.', 'base'),
//     'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//     'after_widget'  => '</aside>',
//     'before_title'  => '<h3 class="widget-title">',
//     'after_title'   => '</h3><hr>',
// ));

//FIN

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

//contador de articulos

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count=="") {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        $__ip = @get_client_ip();
        $__arr_ip = [
            '191.98.189.130',
            '191.98.189.131',
            '191.98.189.132',
            '191.98.189.133',
            '191.98.189.134',
            '190.117.192.126',
            '190.117.112.99'
        ];
        if (!in_array($__ip, $__arr_ip)) {
            update_post_meta($postID, $count_key, $count);
        }
    }
    return $count;
}



function register_my_menu()

{

    register_nav_menu('header-menu', __('Menu Principal'));

}

add_action('init', 'register_my_menu');



//FIN



function filter_search($query)

{

    //---- Don't run in admin area

    if (!is_admin()) {

        // Limit search to posts

        if ($query->is_main_query() && $query->is_search()) {

            $query->set('post_type', array('post'));

        }



        // Return query

        return $query;

    }

}



add_filter('pre_get_posts', 'filter_search');


if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}







/* Gaaaa */


add_filter( 'manage_edit-product_columns', 'dpw_change_product_columns',10, 1 );

function dpw_change_product_columns( $columns ) {

	unset($columns['product_tag']); // para las etiquetas
	unset($columns['sku']); // referencia o sku
	unset($columns['product_type']); // tipo de producto
  	unset($columns['date']); //para la fecha
  	unset($columns['product_cat']); //para las categorías


	return $columns;

}

// add_action( 'woocommerce_single_product_summary', "dcms_caracteristicas_producto", 8 );

// function dcms_caracteristicas_producto(){
   
//   if (function_exists('get_field')){
//     echo "<p><strong>Fecha:</strong> ". get_field('fecha')."</p>"; 
//     echo "<p><strong>Hora: </strong>". get_field('hora')."</p>"; 
//   }
// }

// /* QWE */
// add_filter( 'woocommerce_structured_data_product', 'dcms_product_microdata', 10, 2 );

// function dcms_product_microdata( $markup, $product ){
// 	if ( function_exists('get_field')){
// 		if ( get_field('fecha')!='' ){
//             $markup['datePublished'] = get_field('fecha');
// 		}
//     }
//     return $markup;
// }

add_action('after_setup_theme', 'personalizar_woocomerce');

function personalizar_woocomerce() {
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
}