
	<?php 
		
		$this->included_files->display_included_files('_headerFiles');
	?>

	<?php foreach($CI->_extraHeaderFiles as $_headerFile){
		echo $_headerFile;
	} ?>