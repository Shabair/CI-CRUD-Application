<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo (!empty($title))?($title.' '.get_block('title-separator')." "):'' ,get_block('site-title'); ?></title>
		<meta name="description" content="<?php echo $seo_description ?>">
		<meta name="keywords" content="<?php echo $seo_keywords; ?>">
		<meta name="author" content="<?php echo get_block('site-title'); ?>">
		<?php $CI->load->view($CI->_header); ?>
		<?php if(isset($css)){
			echo $css;
		} ?>
		
	</head>
	<body>

		<?php $CI->load->view($CI->_template); ?>


		<?php $CI->load->view($CI->_footer); ?>

		<?php if(isset($js)){
			echo $js;
		} ?>
	</body>
</html>