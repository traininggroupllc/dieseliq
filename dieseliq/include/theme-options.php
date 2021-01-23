<?php
/**
 * Customm Theme Development || Diesel IQ 2.0
 *
 * @package WordPress
 * @subpackage dieseliq
 * @since Diesel IQ 2.0
 */
?>
<?php

//custom theme customize options
function custom_theme_customize_options($wp_customize){

	//customize options for Header and Footer	
	$wp_customize->add_section("dieseliq_theme_options", array("title"=> "Diesel IQ Theme Options"));

	//Diesel IQ Logo ------------------------------------------------------
	$wp_customize->add_setting('dieseliq_header_logo_setting', array( 'default' => ''));
	$wp_customize->add_control( new WP_Customize_image_control (
		$wp_customize,
		"dieseliq_header_control",
			array(
				'label'    => 'Upload Header Logo',
				'section'  => 'dieseliq_theme_options',
				'settings' => 'dieseliq_header_logo_setting',

			)
	));

	//Diesel IQ Phone Number --------------------------------------------------
	$wp_customize->add_setting("dieseliq_phone_number_setting", array("default"=> ""));
	$wp_customize->add_control("dieseliq_phone_number_control", array(
		"label"    => "Enter Phone Number",
		"section"  => "dieseliq_theme_options",
		"settings" => "dieseliq_phone_number_setting"
	));

	//Diesel IQ Email Address --------------------------------------------------
	$wp_customize->add_setting("dieseliq_email_address_setting", array("default"=> ""));
	$wp_customize->add_control("dieseliq_email_address_control", array(
		"label"    => "Enter Email Address",
		"section"  => "dieseliq_theme_options",
		"settings" => "dieseliq_email_address_setting"
	));

	//Diesel IQ Twitter --------------------------------------------------
	$wp_customize->add_setting("dieseliq_twitter_setting", array("default"=> ""));
	$wp_customize->add_control("dieseliq_twitter_control", array(
		"label"    => "Enter Twitter Account",
		"section"  => "dieseliq_theme_options",
		"settings" => "dieseliq_twitter_setting",
		'type'     => 'url'
	));

	//Diesel IQ Copyright ------------------------------------------------------
	$wp_customize->add_setting('dieseliq_copyright_setting', array( 'default' => ''));
	$wp_customize->add_control('dieseliq_copyright_control', array(
		'label'    => 'Enter Copyright Text',
		'section'  => 'dieseliq_theme_options',
		'settings' => 'dieseliq_copyright_setting',
		'type'     => 'textarea'

	));
}

add_action('customize_register', 'custom_theme_customize_options');