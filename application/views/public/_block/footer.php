
	<?php 
		
		$this->included_files->display_included_files('_footerFiles');

		foreach($CI->_extraFooterFiles as $_footerFile){
			echo $_footerFile;
		}
	?>

		<?php $forActiveLi =	$this->uri->segment(1); ?>
		<?php switch ($forActiveLi) {
			case 'about-us':
				$activeLink = 'about-us';
				break;
			case 'up-comming':
			case 'lecture':
			case 'course':
			case 'event':
				$activeLink = 'up-comming';
				break;
			case 'audio':
				$activeLink = 'audio';
				break;
			case 'video':
				$activeLink = 'video';
				break;
			case 'welfare':
				$activeLink = 'welfare';
				break;
			case 'academic':
				$activeLink = 'academic';
				break;
			case 'admission':
				$activeLink = 'admission';
				break;
			case 'contact-us':
				$activeLink = 'contact-us';
				break;
			default:
				$activeLink = 'home';
				break;
		} ?>
		<script>
			$('.menu-bar .menu-links li#<?=$activeLink?>').addClass('active');
		</script>