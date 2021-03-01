<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function fancy_file(){
	echo '
		<link href="'.base_url('assets/js/fancybox-master/dist') .'/jquery.fancybox.min.css" rel="stylesheet">
		<script src="'.base_url('assets/js/fancybox-master/dist') .'/jquery.fancybox.min.js"></script>
	'
	;
}

function editor_source(){
	fancy_file();
	echo '
		<script type="text/javascript" src="'.base_url('public/assets/') .'/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="'.base_url('public/assets/') .'/ckfinder/ckfinder.js"></script>
		'
	;
}


function editor($name = "content",$path = "../../filemanager/dialog.php?type=1&field_id=content&relative_url=1&fldr=",$jsCssFiles=true){
	if($jsCssFiles){
		editor_source();
	}
	$CI = &get_instance();

	$CI->editor($path);
    $content = get_data($name,true);
    $CI->ckeditor->textareaAttributes = array(
        "rows" => 8, "cols" => 60,'id'=>$name

    );
    echo $CI->ckeditor->editor($name,$content);

}
