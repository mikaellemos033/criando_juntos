<?php
/**
 * Plugin Name: Criando Juntos, Manager Files
 * Plugin URI: http://decriancaparacrianca.com.br
 * Description: Geranciador dos arquivos enviados pelas crianças que utilizam o site
 * Author: Mikael Lemos
 * Version: 1.0
 * Author URI: http://mikaellemos.com.br
*/

require(plugin_dir_path(__FILE__) . '/includes/database.php');

function return_view(){

    if( !empty($_GET['see_content']) && is_numeric($_GET['see_content']) ){
        return include(plugin_dir_path(__FILE__) . 'views/single.php');
    }
    return include(plugin_dir_path(__FILE__) . 'views/index.php');
}

/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        'Criando Juntos',
        'Criando Juntos',
        'manage_options',
        'criando_juntos',
        'return_view',
        plugins_url( 'criando_juntos/img/icon.jpg' ),
        6
    );
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );