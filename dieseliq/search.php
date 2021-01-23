<?php
/**
 * Customm Theme Development || Diesel IQ 2.0
 * Template Name: Search Results
 * @package WordPress
 * @subpackage dieseliq
 * @since Diesel IQ 2.0
 */
 
$search_refer = $_GET["post_type"];
if ($search_refer == 'stroke-parts') { load_template(TEMPLATEPATH . '/part-search.php'); }
elseif ($search_refer == 'blog') { load_template(TEMPLATEPATH . '/blog-search.php'); };
 
?>