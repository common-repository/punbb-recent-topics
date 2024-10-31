<?php 
/*
Plugin Name: punbb_recent_topics
Plugin URI: http://varios2.wordpress.com/
Description: This plugin grabs your recent punBB topics for you to display in wordpress is based based on the plugin phpbb_recent_topics made by Nick [LINICKX] Bettison (http://www.linickx.com)
Version: 0.1
Author: IG based on the plugin  made by Nick [LINICKX] Bettison
Author URI: http://varios2.wordpress.com/
*/

 // The path to the plugin 

define('PRTPLUGINPATH', (DIRECTORY_SEPARATOR != '/') ? str_replace(DIRECTORY_SEPARATOR, '/', dirname(__FILE__)) : dirname(__FILE__));
 /* * The base class */
 	class punbbRecentTopics { 
	/* * The boostrap function */
 		function bootstrap() { 
			// Add the installation and uninstallation hooks 
			$file = PRTPLUGINPATH . '/' . basename(__FILE__);
 			register_activation_hook($file, array('punbbRecentTopics', 'install'));
 			register_deactivation_hook($file, array('punbbRecentTopics', 'uninstall'));
 			// Add the actions 
			add_action('wp_head', array('punbbRecentTopics', 'DisplayPRTHeader'));
			add_action('admin_head', array('punbbRecentTopics','PRT_add_admin_options'));
 			} 
			/* * The installation function */
 			function install() { } 
			/* * The uninstallation function */
 			function uninstall() { } 
			/* * The function to check for the presence of a contact form and link to it's CSS if required */
 			function DisplayPRTHeader() { 
				global $post;
 				
					// Add the content filter 
					add_filter('the_content', array('punbbRecentTopics', 'DisplayPRTMagicFilter'));
			} 
			/* * The function to display the contact form */
	 		function DisplayPRTMagicFilter($content) { 
				return str_replace('{punbb_recent_topics}', punbbRecentTopics::DisplayPRT(), $content);
 			} 
			/* * The function to get the contact form's markup */
 			function DisplayPRT() { 
				
			// Start the cache 
				ob_start();
 			// Add the contact form 
				require(PRTPLUGINPATH . '/display/display.php');
 			// Get the markup 
				$PRT_html = ob_get_contents();
 			// Cleanup 
				ob_end_clean();
 				return $PRT_html;
 			} 

			function PRT_add_admin_options() {
    			
			add_options_page('punBB Recent Topics Options', 'punBB Recent Topics', 'manage_options', 'punbb_recent_topics/display/admin-options.php');


			}



} 

 
punbbRecentTopics::bootstrap();


// legacy sidebar function
function punbb_topics() {
	require(PRTPLUGINPATH . '/display/display.php');
}
 
?>