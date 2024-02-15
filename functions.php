<?php
// phpinfo();
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION


add_filter('wp_nav_menu_items','add_admin_link', 10, 2);

function add_admin_link( $items, $args ) 
{

    if ( is_user_logged_in()) 
    {

        // Lien vers la page d'administration
        $admin_link = '<li id="menu-item-admin" class="menu-item menu-item-type-post_type menu-item-object-page parent hfe-creative-menu elementor-button-wrapper"><a id="admin-text" href="' . admin_url() . '">Admin</a></li>';

        // Trouver la première occurrence de la balise '</li>'
        $position = strpos( $items, '</li>' );


        // Insérer le lien "Admin" après la première occurrence trouvée
        if ( $position !== false ) 
        {
            $items = substr_replace( $items, $admin_link, $position, 0);
        }
    }

    return $items;

}


//Différent test effectué dans le projet ci dessous :

// add_action('init', 'afficher_locations_theme');

// function afficher_locations_theme() 
// {
//     $locations = get_nav_menu_locations();
//     echo '<pre>';
//     print_r($locations);
//     echo '</pre>';
// }

// //Ajout du hook "admin"
// add_filter('wp_nav_menu_items', 'ajouter_bouton_admin_to_menu', 10, 2);

// function ajouter_bouton_admin_to_menu($items, $args) 
// {
//     // Vérifie si l'utilisateur est connecté et que le menu est le "main-menu"
//     if (is_user_logged_in() && $args->theme_location == 'main-menu') 
//     {
//         // Ajoute le bouton admin avec le lien souhaité
//         $bouton_admin_to_menu = "<h1 id='banane'>Admin</h1>";
//         // Ajoute le bouton admin aux éléments du menu
//         $items .= $bouton_admin_to_menu;
//     }
//     return $items;
// }

// add_filter('wp_nav_menu_items','add_admin_link', 10, 2);

// function add_admin_link( $items, $args ) {

//     if (is_user_logged_in()) 
//     {
//         $items = '<li id="menu-item-36" class="menu-item menu-item-type-post_type menu-item-object-page parent hfe-creative-menu"><a class="hfe-menu-item" href="'. get_admin_url() .'">banane</a></li>'.$items;
//     }
//     return $items;

// }