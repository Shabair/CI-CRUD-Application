<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Included_files {

	public  		$_headerFiles = NULL;
	public  		$_footerFiles = NULL;
	public  		$_baseUrl = NULL;
	public  		$_assestsPath = NULL;
	protected  		$CI = NULL;

	function __construct(){
		$this->CI =& get_instance();
		$this->_assestsPath = $this->CI->_baseUrl.'assets/';
		// if($this->CI->get_panel() == 'site_admin'){
		// 	$this->set_admin_header_footer_main_files();
		// }else{
			$this->set_header_footer_main_files();
		// }
		
	}

	public function set_header_footer_main_files(){
		$this->_headerFiles = [
			'<meta charset="utf-8">' => ['Inall'],
			'<meta http-equiv="X-UA-Compatible" content="IE=edge">' => ['Inall'],

			
			'<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />' => ['Inall'],
			
			('<title>'.config_item('site-title').'</title>') => ['Inall'],
			
			'<script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>' => ['Inall'],
			
			'<link rel="shortcut icon" href="'.$this->_assestsPath.'/frontend/images/favicon.ico" />' => ['Inall'],
			
			'<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">' => ['Inall'],
			
			'<link rel="stylesheet" type="text/css" href="'.$this->_assestsPath.'css/plugins-css.css" />' => ['Inall'],
			
			'<link rel="stylesheet" type="text/css" href="'.$this->_assestsPath.'revolution/css/settings.css" />' => ['Inall'],
			
			'<link rel="stylesheet" type="text/css" href="'.$this->_assestsPath.'css/typography.css" />' => ['Inall'],
			
			'<link rel="stylesheet" type="text/css" href="'.$this->_assestsPath.'css/shortcodes/shortcodes.css" />' => ['Inall'],
			
			'<link rel="stylesheet" type="text/css" href="'.$this->_assestsPath.'css/style.css" />' => ['Inall'],
			
			'<link rel="stylesheet" type="text/css" href="'.$this->_assestsPath.'demo-categories/marketing/css/marketing.css" />' => ['home'],
			
			'<link rel="stylesheet" type="text/css" href="'.$this->_assestsPath.'css/responsive.css" />' => ['Inall'],
			
			'<link rel="stylesheet" type="text/css" href="'.$this->_assestsPath.'css/custom/custom.css" />' => ['Inall'],



			'<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">' => ['page_preview_live/:any$'],

			'<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> ' => ['page_preview_live/:any$'],

			'<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> ' => ['page_preview_live/:any$'],

			'<script> jquery321 =  jQuery.noConflict();</script>' => ['page_preview_live/:any$'],



			'<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">' => ['page_preview_live/:any$'],

			'<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>' => ['page_preview_live/:any$'],
			
			'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" />' => ['auth/admission','admission'],
			
			'<script src="https://www.google.com/recaptcha/api.js"></script>' => ['auth/admission','admission'],
			
		];



		$this->_footerFiles = [
			'<script type="text/javascript" src="'.$this->_assestsPath.'js/jquery-3.3.1.min.js"></script>' => ['Inall'],
			'<script type="text/javascript" src="'.$this->_assestsPath.'js/plugins-jquery.js"></script>' => ['Inall'],
			'<script type="text/javascript">var base_url = "'.$this->CI->_baseUrl.'";</script>' => ['Inall'],
			'<script type="text/javascript">var plugin_path = "'.$this->_assestsPath.'js/";</script>' => ['Inall'],
			'<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>' => ['Inall'],
			/*revolution slider for home*/
			'<script type="text/javascript" src="'.$this->_assestsPath.'revolution/js/jquery.themepunch.tools.min.js"></script>' => ['home'],
			'<script type="text/javascript" src="'.$this->_assestsPath.'revolution/js/jquery.themepunch.revolution.min.js"></script>' => ['home'],
			'<script type="text/javascript" src="'.$this->_assestsPath.'revolution/js/extensions/revolution.extension.actions.min.js"></script>' => ['home'],
			'<script type="text/javascript" src="'.$this->_assestsPath.'revolution/js/extensions/revolution.extension.carousel.min.js"></script>' => ['home'],
			'<script type="text/javascript" src="'.$this->_assestsPath.'revolution/js/extensions/revolution.extension.kenburn.min.js"></script>' => ['home'],
			'<script type="text/javascript" src="'.$this->_assestsPath.'revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>' => ['home'],
			'<script type="text/javascript" src="'.$this->_assestsPath.'revolution/js/extensions/revolution.extension.migration.min.js"></script>' => ['home'],
			'<script type="text/javascript" src="'.$this->_assestsPath.'revolution/js/extensions/revolution.extension.navigation.min.js"></script>' => ['home'],
			'<script type="text/javascript" src="'.$this->_assestsPath.'revolution/js/extensions/revolution.extension.parallax.min.js"></script>' => ['home'],
			'<script type="text/javascript" src="'.$this->_assestsPath.'revolution/js/extensions/revolution.extension.slideanims.min.js"></script>' => ['home'],
			'<script type="text/javascript" src="'.$this->_assestsPath.'revolution/js/extensions/revolution.extension.video.min.js"></script>' => ['home'],
			'<script type="text/javascript" src="'.$this->_assestsPath.'revolution/js/revolution-custom.js"></script>' => ['home'],
			/*revolution slider for home*/
			/*Admission page*/
			'<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>' => ['auth/admission','admission'],
			'<script src="'.$this->CI->_baseUrl.'public/js/jquery.mask.js"></script>' => ['auth/admission','admission'],
			'<script type="text/javascript">$(document).on("focus", ".default-date-picker", function() {
		        $(this).datepicker({
		          format:"dd/M/yyyy",
		          autoclose:true,
		          startDate: "01/01/1900",  
		        });
		      });
		      $("#nic").mask("00000-0000000-0"); $("#phone").mask("0000-0000000");
		      $("#dob").mask("00/00/0000", {placeholder: "__/__/____"});
		      </script>' => ['auth/admission','admission'],

		      '<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>' => ['auth/admission','admission'],
		      '<script>$.validate({lang: "en"});</script>'=>['auth/admission','admission'],

			/*Admission page*/

			'<script type="text/javascript" src="'.$this->_assestsPath.'js/custom.js"></script>' => ['Inall'],
			'<script type="text/javascript" src="'.$this->_assestsPath.'js/my_custom.js"></script>' => ['Inall'],
		];
	}

	public function set_admin_header_footer_main_files(){
				$this->_headerFiles = [
			'<meta charset="utf-8">' => ['Inall'],
			'<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">' => ['Inall'],
			'<meta name="viewport" content="width=device-width, initial-scale=1.0">' => ['Inall'],
			'<meta http-equiv="cache-control" content="no-cache">' => ['Inall'],
			'<meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">' => ['Inall'],
			'<link rel="shortcut icon" href="images/icons/favicon.ico">' => ['Inall'],

			('<title>'.config_item('site-title').'</title>') => ['Inall'],

			'<link rel="apple-touch-icon" href="'.$this->CI->_baseUrl.'includes/admin/images/icons/favicon.png" />' => ['Inall'],

			'<link rel="apple-touch-icon" sizes="72x72" href="'.$this->CI->_baseUrl.'includes/admin/images/icons/favicon-72x72.png">' => ['Inall'],

			'<link rel="apple-touch-icon" sizes="114x114" href="'.$this->CI->_baseUrl.'includes/admin/images/icons/favicon-114x114.png">' => ['Inall'],





						/*Loading bootstrap css*/
			'<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">' => ['Inall'],

			'<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">' => ['Inall'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">' => ['Inall'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/font-awesome/css/font-awesome.min.css">' => ['Inall'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/bootstrap/css/bootstrap.min.css">' => ['Inall'],





						/*LOADING STYLESHEET FOR PAGE*/

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/intro.js/introjs.css">' => ['home'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/calendar/zabuto_calendar.min.css">' => ['home'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/sco.message/sco.message.css">' => ['home'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/intro.js/introjs.css">' => ['home'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/jquery-bootstrap-wizard/custom.css">' => ['admin/post/add'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/jquery-steps/css/jquery.steps.css">' => ['admin/post/add'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/summernote/summernote.css">' => ['admin/post/add'],
                                    
			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/select2/select2-madmin.css">' => ['admin/post/add'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/jplist/html/css/jplist-custom.css">' => ['admin/post'],




						/*Loading style vendors*/
			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/animate.css/animate.css">' => ['Inall'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/jquery-pace/pace.css">' => ['Inall'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/iCheck/skins/all.css">' => ['Inall'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/jquery-notific8/jquery.notific8.min.css">' => ['Inall'],

//			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/vendors/bootstrap-daterangepicker/daterangepicker-bs3.css">' => ['Inall'],



						/*Loading style*/
			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/css/themes/style1/orange-blue.css" class="default-style">' => ['Inall'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/css/themes/style1/orange-blue.css" id="theme-change" class="style-change color-change">' => ['Inall'],

			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/css/style-responsive.css">' => ['Inall'],
			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/css/bootstrap-select.min.css">' => ['Inall'],








			'<link type="text/css" rel="stylesheet" href="'.$this->CI->_baseUrl.'includes/admin/css/style.css">' => ['Inall'],
		];


		$this->_footerFiles = [

			'<script type="text/javascript">var _baseUrl = "'.$this->CI->_baseUrl.'";</script>' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/js/jquery-1.10.2.min.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/js/jquery-migrate-1.2.1.min.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/js/jquery-ui.js"></script>  ' => ['Inall'],
						/*loading bootstrap js*/
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/bootstrap/js/bootstrap.min.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/js/html5shiv.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/js/respond.min.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/metisMenu/jquery.metisMenu.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/slimScroll/jquery.slimscroll.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/jquery-cookie/jquery.cookie.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/iCheck/icheck.min.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/iCheck/custom.min.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/jquery-notific8/jquery.notific8.min.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/jquery-highcharts/highcharts.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/js/jquery.menu.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/jquery-pace/pace.min.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/holder/holder.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/responsive-tabs/responsive-tabs.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/jquery-news-ticker/jquery.newsTicker.min.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/moment/moment.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>  ' => ['Inall'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>  ' => ['Inall'],
//			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>  ' => ['Inall'],
						/*CORE JAVASCRIPT*/
			'<script src="'.$this->CI->_baseUrl.'includes/admin/js/main.js"></script>  ' => ['Inall'],
						/*LOADING SCRIPTS FOR PAGE*/
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/intro.js/intro.js"></script>  ' => ['home'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/flot-chart/jquery.flot.js"></script>  ' => ['home'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/flot-chart/jquery.flot.categories.js"></script>  ' => ['home'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/flot-chart/jquery.flot.pie.js"></script>  ' => ['home'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/flot-chart/jquery.flot.tooltip.js"></script>  ' => ['home'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/flot-chart/jquery.flot.resize.js"></script>  ' => ['home'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/flot-chart/jquery.flot.fillbetween.js"></script>  ' => ['home'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/flot-chart/jquery.flot.stack.js"></script>  ' => ['home'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/flot-chart/jquery.flot.spline.js"></script>  ' => ['home'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/calendar/zabuto_calendar.min.js"></script>  ' => ['home'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/sco.message/sco.message.js"></script>  ' => ['home'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/intro.js/intro.js"></script>  ' => ['home'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/js/index.js"></script>' => ['home'],

			/*Post Add*/
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/jquery-validate/jquery.validate.min.js"></script>' => ['admin/post/add','admin/post/edit/:any$'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/jquery-steps/js/jquery.steps.min.js"></script>' => ['admin/post/add','admin/post/edit/:any$'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/jquery-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>' => ['admin/post/add','admin/post/edit/:any$'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/js/form-wizard.js"></script>' => ['admin/post/add','admin/post/edit/:any$'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/summernote/summernote.js"></script>' => ['admin/post/add','admin/post/edit/:any$'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/js/ui-editors.js"></script>' => ['admin/post/add','admin/post/edit/:any$'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/select2/select2.min.js"></script>' => ['admin/post/add','admin/post/edit/:any$'],


			'<script src="'.$this->CI->_baseUrl.'includes/admin/js/bootstrap-select.min.js"></script>' => ['admin/post/add','admin/post/edit/:any$'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/pages_js/post_add.js"></script>' => ['admin/post/add','admin/post/edit/:any$'],
			/*Post Add End*/

			/*Post List*/
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/jplist/html/js/vendor/modernizr.min.js"></script>' => ['admin/post'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/vendors/jplist/html/js/jplist.min.js"></script>' => ['admin/post'],
			'<script src="'.$this->CI->_baseUrl.'includes/admin/js/jplist.js"></script>' => ['admin/post'],
			/*Post List End*/



			'	<script type="text/javascript">
					(function (i, s, o, g, r, a, m) {
					    i["GoogleAnalyticsObject"] = r;
					    i[r] = i[r] || function () {
					        (i[r].q = i[r].q || []).push(arguments)
					    }, i[r].l = 1 * new Date();
					    a = s.createElement(o),
					            m = s.getElementsByTagName(o)[0];
					    a.async = 1;
					    a.src = g;
					    m.parentNode.insertBefore(a, m)
					})(window, document, "script", "//www.google-analytics.com/analytics.js", "ga");
					ga("create", "UA-145464-14", "auto");
					ga("send", "pageview");
				</script>  ' => ['Inall'],
		];
		
	}

	public function display_included_files($method){
		foreach ($this->$method as $file => $uriStrings) {
			foreach ($uriStrings as $saveurl) {
				//echo $url;
				$urlString = $this->CI->uri->uri_string();
				

				if($urlString == ''){
					$urlString = 'home';
				}

				if  ($saveurl == 'Inall'){
				    echo $file;
				}else if($urlString == $saveurl){ //strpos($urlString, $saveurl) !== false
					echo $file;
				}else if(strpos($urlString,str_replace("/:any$","",$saveurl)) && strpos($saveurl,'/:any$') ){///:any$
					echo $file;
				}
			}
		}
	}

	public function get_included_files($method){
		return $this->$method;
	}
}
