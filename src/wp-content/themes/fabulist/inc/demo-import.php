<?php
/**
 * demo import
 *
 * @package fabulist
 */

/**
 * Imports predefine demos.
 * @return [type] [description]
 */
function fabulist_ocdi_import_files() {
    return array(
        array(
            'import_file_name'           => esc_html__( 'Fabulist Demo', 'fabulist' ),
            'import_file_url'            => get_template_directory_uri() . '/assets/demo/fabulist-all-content.xml',
            'import_widget_file_url'     => get_template_directory_uri() . '/assets/demo/fabulist-widgets.wie',
            'import_customizer_file_url' => get_template_directory_uri() . '/assets/demo/fabulist-customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() .'/screenshot.png',
            'import_notice'                => esc_html__( 'Please wait for a few minutes, do not close the window or refresh the page until the data is imported.', 'fabulist' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'fabulist_ocdi_import_files' );

/**
 * 
 * Automatically assign "Front page", "Posts page" and menu locations after the importer is done
 * 
 */
function fabulist_ocdi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
        )
    );

}
add_action( 'pt-ocdi/after_import', 'fabulist_ocdi_after_import_setup' );

// Disable the ProteusThemes branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
