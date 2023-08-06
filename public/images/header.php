 <?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
 <!doctype html>
 <html <?php language_attributes(); ?>>

 <head>
     <meta charset="<?php bloginfo('charset'); ?>">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="profile" href="https://gmpg.org/xfn/11">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	 <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
     <?php wp_head(); ?>
 </head>

 <body <?php body_class(); ?>>
     <div class="<?php if (euthenia_get_option('animation_load') == true) {
         echo 'animsition';
     } ?>">
         <header class="cd-header">
             <div class="header-wrapper">
                 <div class="logo-wrap">
                     <a href="<?php echo esc_url(home_url('/')); ?>" class="hover-target animsition-link"><img src="<?php echo esc_url(euthenia_get_option('logo')); ?>" alt="<?php echo get_bloginfo('name'); ?>"></a>
                 </div>
                 <?php dynamic_sidebar('Header button')?>
                 <div class="nav-but-wrap">
                     <div class="menu-icon hover-target">
                         <span class="menu-icon__line menu-icon__line-left"></span>
                         <span class="menu-icon__line"></span>
                         <span class="menu-icon__line menu-icon__line-right"></span>
                     </div>
                 </div>
             </div>
         </header>

         <div class="nav">
             <div class="nav__content">
                 <?php
                    $menu_items = wp_get_nav_menu_items('main-menu');
$this_item = current(wp_filter_object_list($menu_items, ['object_id' => get_queried_object_id()]));
?>
                 <?php if (euthenia_get_option('current_item_name_shadow') == true) { ?>
                 <div class="curent-page-name-shadow">
                     <?php if (is_single() && get_post_type() == 'post') {
                         echo esc_html_e('post', 'euthenia');
                     } elseif (is_single() && get_post_type() == 'portfolio') {
                         echo esc_html_e('project', 'euthenia');
                     } elseif (is_archive()) {
                         echo esc_html_e('archive', 'euthenia');
                     } elseif (is_search()) {
                         echo esc_html_e('search', 'euthenia');
                     } elseif ($this_item->attr_title != '') {
                         echo esc_attr($this_item->attr_title);
                     } else {
                         echo esc_attr($this_item->title);
                     } ?>
                 </div>
                 <?php } ?> 
                 <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'items_wrap' => '<ul class="nav__list">%3$s</ul>',
                    ]);
?>
                 
                <?php if (euthenia_get_option('socialfooter_switch') == true) { ?>
                    <div class="social-fixed menu-social">
                        <?php $socials = euthenia_get_option('footer_socials', []); ?>
                        <?php foreach ($socials as $social) { ?>
                        <a class="hover-target" href="<?php echo esc_url($social['social_link']); ?>"><?php echo esc_attr($social['social_name']); ?></a>
                        <?php } ?>
                    </div>
                <?php } ?>
                 
             </div>
         </div>
