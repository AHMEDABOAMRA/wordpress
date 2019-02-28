<?php
/**
 * Theme Functions
 *
 * @package DTtheme
 * @author DesignThemes
 * @link http://wedesignthemes.com
 */

define( 'FINANCE_THEME_DIR', get_template_directory() );
define( 'FINANCE_THEME_URI', get_template_directory_uri() );
define( 'FINANCE_CORE_PLUGIN', WP_PLUGIN_DIR.'/designthemes-core-features' );
define( 'FINANCE_SETTINGS', 'finance-opts' );

if (function_exists ('wp_get_theme')) :
	$themeData = wp_get_theme();
	define( 'THEME_NAME', $themeData->get('Name'));
	define( 'THEME_VERSION', $themeData->get('Version'));
endif;

define( 'FINANCE_LANG_DIR', FINANCE_THEME_DIR. '/languages' );

/* ---------------------------------------------------------------------------
 * Loads Theme Textdomain
 * --------------------------------------------------------------------------- */
load_theme_textdomain( 'finance', FINANCE_LANG_DIR );

/* ---------------------------------------------------------------------------
 * Loads the Admin Panel Scripts
 * --------------------------------------------------------------------------- */
function finance_admin_scripts() {

	wp_enqueue_style('finance-admin', FINANCE_THEME_URI .'/framework/theme-options/style.css');
	wp_enqueue_style('finance-chosen', FINANCE_THEME_URI .'/framework/theme-options/css/chosen.css');
	wp_enqueue_style('wp-color-picker');

	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-slider');
	wp_enqueue_script('wp-color-picker');
	
	wp_enqueue_script('finance-tooltip', FINANCE_THEME_URI . '/framework/theme-options/js/jquery.tools.min.js');
	wp_enqueue_script('finance-chosen', FINANCE_THEME_URI . '/framework/theme-options/js/chosen.jquery.min.js');
	wp_enqueue_script('finance-custom', FINANCE_THEME_URI . '/framework/theme-options/js/dttheme.admin.js');
	wp_enqueue_media();

	wp_localize_script('finance-custom', 'objectL10n', array(
		'saveall' => esc_html__('Save All', 'finance'),
		'saving' => esc_html__('Saving ...', 'finance'),
		'noResult' => esc_html__('No Results Found!', 'finance'),
		'resetConfirm' => esc_html__('This will restore all of your options to default. Are you sure?', 'finance'),
		'importConfirm' => esc_html__('You are going to import the dummy data provided with the theme, kindly confirm?', 'finance'),
		'backupMsg' => esc_html__('Click OK to backup your current saved options.', 'finance'),
		'backupSuccess' => esc_html__('Your options are backuped successfully', 'finance'),
		'backupFailure' => esc_html__('Backup Process not working', 'finance'),
		'disableImportMsg' => esc_html__('Importing is disabled.. :), Please select atleast import type','finance'),
		'restoreMsg' => esc_html__('Warning: All of your current options will be replaced with the data from your last backup! Proceed?', 'finance'),
		'restoreSuccess' => esc_html__('Your options are restored from previous backup successfully', 'finance'),
		'restoreFailure' => esc_html__('Restore Process not working', 'finance'),
		'importMsg' => esc_html__('Click ok import options from the above textarea', 'finance'),
		'importSuccess' => esc_html__('Your options are imported successfully', 'finance'),
		'importFailure' => esc_html__('Import Process not working', 'finance')));
}
add_action( 'admin_enqueue_scripts', 'finance_admin_scripts' );

/* ---------------------------------------------------------------------------
 * Loads the Options Panel
 * --------------------------------------------------------------------------- */
require_once( FINANCE_THEME_DIR .'/framework/utils.php' );
require_once( FINANCE_THEME_DIR .'/framework/fonts.php' );
require_once( FINANCE_THEME_DIR .'/framework/theme-options/init.php' );

/* ---------------------------------------------------------------------------
 * Loads Theme Functions
 * --------------------------------------------------------------------------- */

// Functions --------------------------------------------------------------------
require_once( FINANCE_THEME_DIR .'/functions/register-functions.php' );

// Header -----------------------------------------------------------------------
require_once( FINANCE_THEME_DIR .'/functions/register-head.php' );

// Meta box ---------------------------------------------------------------------
require_once( FINANCE_THEME_DIR .'/framework/theme-metaboxes/post-metabox.php' );
require_once( FINANCE_THEME_DIR .'/framework/theme-metaboxes/page-metabox.php' );

// Tribe Events -----------------------------------------------------------------
if ( class_exists( 'Tribe__Events__Main' ) )
	require_once( FINANCE_THEME_DIR .'/framework/theme-metaboxes/event-metabox.php' );

// Menu -------------------------------------------------------------------------
require_once( FINANCE_THEME_DIR .'/functions/register-menu.php' );
require_once( FINANCE_THEME_DIR .'/functions/register-mega-menu.php' );

// Hooks ------------------------------------------------------------------------
require_once( FINANCE_THEME_DIR .'/functions/register-hooks.php' );

// Likes ------------------------------------------------------------------------
require_once( FINANCE_THEME_DIR .'/functions/register-likes.php' );

// Widgets ----------------------------------------------------------------------
add_action( 'widgets_init', 'finance_widgets_init' );
function finance_widgets_init() {
	require_once( FINANCE_THEME_DIR .'/functions/register-widgets.php' );

	if(class_exists('DTCorePlugin')) {
		register_widget('Finance_Twitter');
	}
	
	register_widget('Finance_Flickr');
	register_widget('Finance_Recent_Posts');
	register_widget('Finance_Portfolio_Widget');
}
if(class_exists('DTCorePlugin')) {
	require_once( FINANCE_THEME_DIR .'/functions/widgets/widget-twitter.php' );
}
require_once( FINANCE_THEME_DIR .'/functions/widgets/widget-flickr.php' );
require_once( FINANCE_THEME_DIR .'/functions/widgets/widget-recent-posts.php' );
require_once( FINANCE_THEME_DIR .'/functions/widgets/widget-recent-portfolios.php' );

// Plugins ---------------------------------------------------------------------- 
require_once( FINANCE_THEME_DIR .'/functions/register-plugins.php' );

// WooCommerce ------------------------------------------------------------------
if( function_exists( 'is_woocommerce' ) ){
	require_once( FINANCE_THEME_DIR .'/functions/register-woocommerce.php' );
}

// Privacy & Cookies ------------------------------------------------------------
require_once( FINANCE_THEME_DIR .'/functions/register-privacy.php' );

// Gutenberg ---------------------------------------------------------------------- 
require_once( FINANCE_THEME_DIR .'/gutenberg/gutenberg.php' ); ?>