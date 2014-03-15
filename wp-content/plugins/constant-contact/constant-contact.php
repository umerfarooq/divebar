<?php
/*
Plugin Name: Constant Contact
Plugin URI: http://www.gopiplus.com/work/2010/07/18/constant-contact/
Description: This Constant Contact wordpress plug-in adds a constant contact widget signup form to your website sidebar. Very easy and no need any coding language knowledge to use this plug-in. Once the widget is ready, entered emails are automatically stored into your constant contact account.
Author: Gopi.R
Version: 9.2
Author URI: http://www.gopiplus.com/
Donate link: http://www.gopiplus.com/work/2010/07/18/constant-contact/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

global $wpdb, $wp_version;

function gConstantcontact()
{
	include_once("gCls/gForm.php");
}

function gConstantcontact_activation()
{
	global $wpdb;
	add_option('gConstantcontact_widget_username', "enter username");
	add_option('gConstantcontact_widget_password', "enter password");
	add_option('gConstantcontact_widget_group', "General Interest");
	add_option('gConstantcontact_widget_title', "Newsletter");
	add_option('gConstantcontact_widget_caption', "Monthly Hints & Tips newsletter ");
	add_option('gConstantcontact_widget_button_style', "");
	add_option('gConstantcontact_widget_textbox_style', "");
	add_option('gConstantcontact_widget_with_in_textbox', "Enter email address.");
	add_option('gConstantcontact_widget_button', "Submit");
}

function widget_gConstantcontact($args) 
{
	extract($args);
	echo $before_widget;
	echo $before_title;
	echo get_option('gConstantcontact_widget_title');
	echo $after_title;
	gConstantcontact();
	echo $after_widget;
}

function gConstantcontact_widget_control() 
{
	echo '<p><b>';
	_e('Constant contact', 'constant-contact');
	echo '.</b> ';
	_e('Check official website for more information', 'constant-contact');
	?> <a target="_blank" href="http://www.gopiplus.com/work/2010/07/18/constant-contact/"><?php _e('click here', 'constant-contact'); ?></a></p><?php
}

function gConstantcontact_admin_options()
{
	?>
	<div class="wrap">
	<div class="form-wrap">
		<div id="icon-edit" class="icon32 icon32-posts-post"></div>
		<h2><?php _e('Constant contact', 'constant-contact'); ?></h2>
		<?php
		$gConstantcontact_widget_username = get_option('gConstantcontact_widget_username');
		$gConstantcontact_widget_password = get_option('gConstantcontact_widget_password');
		$gConstantcontact_widget_group = get_option('gConstantcontact_widget_group');
		$gConstantcontact_widget_title = get_option('gConstantcontact_widget_title');
		$gConstantcontact_widget_caption = get_option('gConstantcontact_widget_caption');
		//$gConstantcontact_widget_button_style = get_option('gConstantcontact_widget_button_style');
		//$gConstantcontact_widget_textbox_style = get_option('gConstantcontact_widget_textbox_style');
		$gConstantcontact_widget_with_in_textbox = get_option('gConstantcontact_widget_with_in_textbox');
		$gConstantcontact_widget_button = get_option('gConstantcontact_widget_button');
		
		if (isset($_POST['gConstantcontact_submit'])) 
		{	
			check_admin_referer('gConstantcontact_form_setting');
			$gConstantcontact_widget_username = stripslashes(trim($_POST['gConstantcontact_widget_username']));
			$gConstantcontact_widget_password = stripslashes(trim($_POST['gConstantcontact_widget_password']));
			$gConstantcontact_widget_group = stripslashes(trim($_POST['gConstantcontact_widget_group']));		
			$gConstantcontact_widget_title = stripslashes(trim($_POST['gConstantcontact_widget_title']));
			$gConstantcontact_widget_caption = stripslashes(trim($_POST['gConstantcontact_widget_caption']));
			//$gConstantcontact_widget_button_style = stripslashes(trim($_POST['gConstantcontact_widget_button_style']));
			//$gConstantcontact_widget_textbox_style = stripslashes(trim($_POST['gConstantcontact_widget_textbox_style']));
			$gConstantcontact_widget_with_in_textbox = stripslashes(trim($_POST['gConstantcontact_widget_with_in_textbox']));
			$gConstantcontact_widget_button = stripslashes(trim($_POST['gConstantcontact_widget_button']));
			
			update_option('gConstantcontact_widget_username', $gConstantcontact_widget_username );
			update_option('gConstantcontact_widget_password', $gConstantcontact_widget_password );
			update_option('gConstantcontact_widget_group', $gConstantcontact_widget_group );
			update_option('gConstantcontact_widget_title', $gConstantcontact_widget_title );
			update_option('gConstantcontact_widget_caption', $gConstantcontact_widget_caption );
			//update_option('gConstantcontact_widget_button_style', $gConstantcontact_widget_button_style );
			//update_option('gConstantcontact_widget_textbox_style', $gConstantcontact_widget_textbox_style );
			update_option('gConstantcontact_widget_with_in_textbox', $gConstantcontact_widget_with_in_textbox );
			update_option('gConstantcontact_widget_button', $gConstantcontact_widget_button );
			?>
			<div class="updated fade">
				<p><strong><?php _e('Details successfully updated.', 'constant-contact'); ?></strong></p>
			</div>
			<?php
		}
		?>
		<form name="gConstantcontact_form" method="post" action="">
			<label for="tag-box"><?php _e('Constant contact username', 'constant-contact'); ?></label>
			<input name="gConstantcontact_widget_username" type="text" value="<?php echo $gConstantcontact_widget_username; ?>"  id="gConstantcontact_widget_username" size="40" maxlength="100">
			<p><?php _e('Please enter your constant contact username', 'constant-contact'); ?></p>
			
			<label for="tag-box"><?php _e('Constant contact password', 'constant-contact'); ?></label>
			<input name="gConstantcontact_widget_password" type="text" value="<?php echo $gConstantcontact_widget_password; ?>"  id="gConstantcontact_widget_password" size="40" maxlength="100">
			<p><?php _e('Please enter your constant contact password', 'constant-contact'); ?></p>
			
			<label for="tag-box"><?php _e('Constant contact group', 'constant-contact'); ?></label>
			<input name="gConstantcontact_widget_group" type="text" value="<?php echo $gConstantcontact_widget_group; ?>"  id="gConstantcontact_widget_group" size="40" maxlength="100">
			<p><?php _e('Please enter your constant contact group', 'constant-contact'); ?></p>
			
			<label for="tag-box"><?php _e('Widget title', 'constant-contact'); ?></label>
			<input name="gConstantcontact_widget_title" type="text" value="<?php echo $gConstantcontact_widget_title; ?>"  id="gConstantcontact_widget_title" size="40" maxlength="100">
			<p><?php _e('Please enter your widget title', 'constant-contact'); ?></p>
			
			<label for="tag-box"><?php _e('Word within text box', 'constant-contact'); ?></label>
			<input name="gConstantcontact_widget_with_in_textbox" type="text" value="<?php echo $gConstantcontact_widget_with_in_textbox; ?>"  id="gConstantcontact_widget_with_in_textbox" size="40" maxlength="100">
			<p><?php _e('Please enter text within text box', 'constant-contact'); ?></p>
			
			<label for="tag-box"><?php _e('Button caption', 'constant-contact'); ?></label>
			<input name="gConstantcontact_widget_button" type="text" value="<?php echo $gConstantcontact_widget_button; ?>"  id="gConstantcontact_widget_button" size="40" maxlength="100">
			<p><?php _e('Please enter your button caption', 'constant-contact'); ?></p>
			
			<label for="tag-box"><?php _e('Short description', 'constant-contact'); ?></label>
			<input name="gConstantcontact_widget_caption" type="text" value="<?php echo $gConstantcontact_widget_caption; ?>"  id="gConstantcontact_widget_caption" size="40" maxlength="500">
			<p><?php _e('Please enter your widget short description', 'constant-contact'); ?></p>
			
			<!--<label for="tag-box"><?php //_e('Button style', 'constant-contact'); ?></label>
			<input name="gConstantcontact_widget_button_style" type="text" value="<?php //echo $gConstantcontact_widget_button_style; ?>"  id="gConstantcontact_widget_button_style" size="40" maxlength="500">
			<p><?php //_e('Please enter your button style', 'constant-contact'); ?></p>
			
			<label for="tag-box"><?php //_e('Textbox style', 'constant-contact'); ?></label>
			<input name="gConstantcontact_widget_textbox_style" type="text" value="<?php //echo $gConstantcontact_widget_textbox_style; ?>"  id="gConstantcontact_widget_textbox_style" size="40" maxlength="500">
			<p><?php //_e('Please enter your button style', 'constant-contact'); ?></p>-->
			
			<p style="padding-top:8px;padding-bottom:8px;">
			<input id="gConstantcontact_submit" name="gConstantcontact_submit" lang="publish" class="button-primary" value="<?php _e('Update Setting', 'constant-contact'); ?>" type="Submit" />
			</p>
			<?php wp_nonce_field('gConstantcontact_form_setting'); ?>
		</form>
	</div>
	</div>
	<?php
}

function gConstantcontact_plugins_loaded()
{
	if(function_exists('wp_register_sidebar_widget')) 
	{
		wp_register_sidebar_widget('constant contact', __('Constant contact', 'constant-contact'), 'widget_gConstantcontact');
	}
	
	if(function_exists('wp_register_widget_control')) 
	{
		wp_register_widget_control('constant contact', array( __('Constant contact', 'constant-contact'), 'widgets'), 'gConstantcontact_widget_control');
	} 
}

function gConstantcontact_deactivate() 
{
	delete_option('gConstantcontact_widget_username');
	delete_option('gConstantcontact_widget_password');
	delete_option('gConstantcontact_widget_group');
	delete_option('gConstantcontact_widget_title');
	delete_option('gConstantcontact_widget_caption');
	delete_option('gConstantcontact_widget_button_style');
	delete_option('gConstantcontact_widget_textbox_style');
	delete_option('gConstantcontact_widget_with_in_textbox');
	delete_option('gConstantcontact_widget_button');
}

function gConstantcontact_add_to_menu() 
{
	add_options_page( __('Constant contact', 'constant-contact'), 
			__('Constant contact', 'constant-contact'), 'manage_options', __FILE__, 'gConstantcontact_admin_options' );
}

if (is_admin()) 
{
	add_action('admin_menu', 'gConstantcontact_add_to_menu');
}

function gConstantcontact_add_javascript_files() 
{
	if (!is_admin())
	{
		wp_enqueue_style( 'gConstantcontact', get_option('siteurl').'/wp-content/plugins/constant-contact/style.css');
		wp_enqueue_script( 'gConstantcontact', get_option('siteurl').'/wp-content/plugins/constant-contact/gExtra/gConstantcontact.js');
	}
} 

function gConstantcontact_textdomain() 
{
	load_plugin_textdomain( 'constant-contact', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action('plugins_loaded', 'gConstantcontact_textdomain');
add_action('init', 'gConstantcontact_add_javascript_files');
register_activation_hook(__FILE__, 'gConstantcontact_activation');
add_action("plugins_loaded", "gConstantcontact_plugins_loaded");
register_deactivation_hook( __FILE__, 'gConstantcontact_deactivate' );
?>