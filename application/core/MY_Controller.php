<?php

/**
*
*/
class MY_Controller extends CI_Controller
{
	public 		$data 				=	NULL;
	public 		$_actionType 		= 	NULL;
	public 		$_item_id 			=   0;
	public 		$_assetsPath 		=   null;
	public 		$_layout 			= 'public/_layout/layout';
	public 		$_header 			= 'public/_block/header';
	public 		$_footer 			= 'public/_block/footer';
	public 		$_sidebar 			= 'public/_block/sidebar';
	public 		$_template 			= 'public/_template/default_template';
	public 		$_viewData 			= 	array();
	public 		$_action_id 		= 	NULL;
	public 		$_CI 				= 	NULL;
	public 		$_currentTime 		=  	NULL;
	public 		$_uploadPath 		=  	'uploads/';
	public 		$_limitPerPage 		=  	10;
	public 		$_breadcrumb		=	array();
	public 		$_extraHeaderFiles		=	array();
	public 		$_extraFooterFiles		=	array();

	function __construct()
	{

		parent::__construct();
		$this->CI =&get_instance();
		$this->_baseUrl = base_url();
		$this->load->vars($this->CI);
		$this->_uriSegment = $this->uri->segment(1);
		$this->_assetsPath = $this->_baseUrl.'assets/';
		$this->_uriTarget = $this->_baseUrl.$this->_uriSegment;
		$this->load->library('Included_files');
		$this->_currentTime = date('Y-m-d');
		//$this->WholeDateCount();
		$this->sidebar_data();
		// $this->_breadcrumb['Home'] = base_url();

		if($this->ion_auth->logged_in()){
			$_user_id 	 = 	(!empty($this->session->userdata['user_id']))? $this->session->userdata['user_id']:NULL;
			$this->set_user_id($_user_id);
			$name = get_from('users','first_name,last_name',['id'=>$_user_id]);
			$this->set_user_name(ucfirst(implode(' ', $name)));
		}
		// var_dump($this->session->userdata());
		// var_dump($this->input->post());
	 // 	var_dump($this->session->flashdata());
		// die();
	}

	public function WholeDateCount(){
		$this->_currentTime = date('Y-m-d');

		/*All Event Count*/
		$this->db->select('id');
		$this->db->from('event');
		$this->db->where('end_date >=' , $this->_currentTime);
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->_viewData['eventCount'] = $this->db->count_all_results();
		/*All Old Event Count*/
		$this->db->select('id');
		$this->db->from('old_event');
		// $this->db->where('end_date >=' , $this->_currentTime);
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->_viewData['old_eventCount'] = $this->db->count_all_results();
		/*All Course Count*/
		$this->db->select('id');
		$this->db->from('course');
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->_viewData['courseCount'] = $this->db->count_all_results();
		/*Active Items*/
		$this->db->select('id');
		$this->db->from('lecture');
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->_viewData['lectureCount'] = $this->db->count_all_results();
		/*Active Items*/
		$this->db->select('id');
		$this->db->from('welfare');
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->_viewData['welfareCount'] = $this->db->count_all_results();
		/*Active Items*/
		$this->db->select('id');
		$this->db->from('academic');
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->_viewData['academicCount'] = $this->db->count_all_results();
		/*Active Items*/
		$this->db->select('id');
		$this->db->from('video');
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->_viewData['videoCount'] = $this->db->count_all_results();
		/*Active Items*/
		$this->db->select('id');
		$this->db->from('audio');
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->_viewData['audioCount'] = $this->db->count_all_results();
		/*Active Items*/
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('active','1');
		$this->_viewData['UsersCount'] = $this->db->count_all_results();
		/*Deactive Items*/
		/*Active Items*/
		$this->db->select('id');
		$this->db->from('user_enrolled_course');
		$this->db->where('is_viewed','0');
		$this->db->where('active','1');
		$this->_viewData['course_reqts'] = $this->db->count_all_results();
		/*Deactive Items*/
		// $this->db->where('company_id', $this->get_company_id());
		// $this->db->where('deactive', 1);
		// $this->db->from($table);
		// $Data['deactive']=$this->db->count_all_results();
		/*End of Counts*/
		// return $Data;
	}

	function sidebar_data(){
		$segment = $this->_uriSegment;
		if ($this->db->table_exists($segment)){

			$this->db->select('id,slug,title,IF(last_update IS NULL OR last_update = "0000-00-00 00:00:00",created,last_update) as created');
			if($this->db->field_exists('thumbnail',$segment)){
				$this->db->select('thumbnail');
			}
			$this->db->where('active','1');
			$this->db->where('published','1');
			// $this->db->limit(3);
			$this->db->order_by('id','DESC');
			$data = $this->db->get($segment,3)->result_array();
			$this->_viewData['sidebar']['recent_post'] = $data;
		}
	}

	public function _render($data = array()){

		if(isset($this->_viewData['page']))
		$this->_viewData = array_merge($this->_viewData,$this->_viewData['page']);

		$this->_viewData = array_merge($this->_viewData,$data);

		// $page = (!empty($data['page']))?($data['page']):'';
		$this->_viewData['content'] = (!empty($this->_viewData['content']))?parser_words($this->_viewData['content']):'';
		$this->_viewData['css'] = (!empty($this->_viewData['css']))?parser_words(base64_decode($this->_viewData['css'])):'';
		$this->_viewData['js'] = (!empty($this->_viewData['js']))?parser_words(base64_decode($this->_viewData['js'])):'';
		$this->_viewData['seo_keywords'] = (!empty($this->_viewData['seo_keywords']))?parser_words($this->_viewData['seo_keywords']):'';
		$this->_viewData['seo_description'] = (!empty($this->_viewData['seo_description']))?parser_words($this->_viewData['seo_description']):'';

		// die($data['js']);
		$this->load->view($this->_layout,$this->_viewData);
	}



	public function file_download($filename,$unitno){
		$SetFileName = explode('_', $filename);
		$SetFileName = $SetFileName[count($SetFileName)-1];

		$SetFileName = explode('.', $SetFileName);
		$SetFileName = $SetFileName[count($SetFileName)-2];
		$FileNames = [
						// "OS"=>"Owner_Ship",
						// "AS"=>"Annual_Safety",
						// "OL"=>"Own_Leased",
						// "OP"=>"Orgen_Permit",
						// "MP"=>"Maxico_Permit",
						// "NY"=>"New_York",
						// "TRANS"=>"Transponder",
						// "CNT"=>"Contract",
						"socialsecpdf"			=>	'social_sec',
						"emplicensepdf"			=>	'emp_license',
						"passportnumberpdf"		=>	'passport_number',
						"cvordatepdf"			=>	'cvor_date',
						"policereportdatepdf"	=>	'police_report_date',
						"fastdriverpdf"			=>	'fast_driver',
						"warningletterfile"		=>	'warning_letter',
						"statementfile"			=>	'statement',
						"repairbillfile"		=>	'repair_bill',
						"trainingfile"			=>	'training_file',
						"transponderpdf"		=>	'transponder_file',
						"newyorkpdf"			=>	'newyork_file',
						"ownershippdf"			=>	'owner_ship_file',
						"annualsafetypdf"		=>	'annual_safety_file',
						"contractpdf"			=>	'contract_file',
						"ownerleasedpdf"		=>	'owner_leased_file',
						"orgenpermitpdf"		=>	'orgen_permit_file',
						"maxicopermitpdf"		=>	'maxico_permit_file',


		];

		if(!empty($filename)){
		    // Specify file path.
		    $path = './uploads/'; // '/uplods/'
		    $download_file =  $path.$filename;
		    // Check file is exists on given path.
		    if(file_exists($download_file))
		    {
		      // Getting file extension.
		      $extension = explode('.',$filename);
		      $extension = $extension[count($extension)-1];
		      // For Gecko browsers
		      header('Content-Transfer-Encoding: binary');
		      header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');
		      // Supports for download resume
		      header('Accept-Ranges: bytes');
		      // Calculate File size
		      header('Content-Length: ' . filesize($download_file));
		      header('Content-Encoding: none');
		      // Change the mime type if the file is not PDF
		      //header('Content-Type: application/'.$extension);
		      // Make the browser display the Save As dialog
		      if($FileNames[$SetFileName] != ''){
		      	header("Content-Disposition: attachment; filename=\"" .$unitno.'_'.$FileNames[$SetFileName].'.'.$extension . "\";");
		      }else{
		      	header("Content-Disposition: attachment; filename=\"" .$unitno.'.'.$extension . "\";");
		      }
		      readfile($download_file);
		      //exit;
		    }
		    else
		    {
		      echo 'File does not exists on given path';
		    }
		}
	}

	public function __call($method,$value){
		if(count($value) == 0){
			if(strstr($method,'get_')){
				$var = substr($method,4);
				return $this->$var;
			}
		}else if(count($value) == 1){
			if(strstr($method,'set_')){
				$var = substr($method,4);
				$this->$var = $value[0];
			}
		}

	}


	public function action_token_check($str)
    {

    	$actionByUser = check_action_token($str);
    	if(empty($actionByUser)){
    		$this->form_validation->set_message('action_token_check', 'Invalid Form Identification.');
    		return FALSE;
    	}
		/*

		else if(empty($actionByUser->action_on) || $this->get_item_id() != $actionByUser->action_on ){
	    		$this->form_validation->set_message('action_token_check', 'Invalid Form Identificationssss.');
	    		return FALSE;
	    	}


		*/
    	return TRUE;
    }


    function contact_us_mail(){

    	$this->load->library('email');

$config['protocol']    = 'smtp';

$config['smtp_host']    = 'mail.shabair.com';

$config['smtp_port']    = '587';

$config['smtp_timeout'] = '7';

$config['smtp_user']    = 'inff@shabair.com';

$config['smtp_pass']    = 'M5Upm^S6_7cX';

$config['charset']    = 'utf-8';

$config['newline']    = "\r\n";

$config['mailtype'] = 'text'; // or html

$config['validation'] = TRUE; // bool whether to validate email or not

$this->email->initialize($config);




		$this->email->from($this->input->post('email'), $this->input->post('name'));
		$this->email->to(get_block('contact-us-email'));

		$this->email->subject('Contact Form');
		$message = 'Phone : '.$this->input->post('phone').'<br />';
		$message .= 'Message : '.$this->input->post('message');

		$this->email->message($message);
//M5Upm^S6_7cX
		if($this->email->send()){
		   //Success email Sent
		   echo $this->email->print_debugger();
		}else{
		   //Email Failed To Send
		   echo $this->email->print_debugger();
		}

    }


	function editor($path = '../../public/assets/ckfinder/') {
	    //Loading Library For Ckeditor

		$this->load->library('CKEditor','ckeditor');
		// $this->load->library('CKFinder','ckfinder');

	    // $this->load->helper('url');

		$this->ckeditor->basePath = base_url().'public/assets/ckeditor/';
		/*$this->ckeditor->config['toolbar'] = array(
		                array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
		                                                    );*/

		$this->ckeditor->config['toolbar'] = 'Full';
		$this->ckeditor->config['language'] = 'eng';
		// $this->ckeditor->config['width'] = '730px';
		$this->ckeditor->config['allowedContent'] = true;
		// $this->ckeditor->config['stylesSet'] = 'my_styles';
		//this is define in the layout of admin
		// $this->ckeditor->config['format_tags'] = 'p;h1;h2;pre;div';
		// this is only allow mentioned featured in the format button
		$this->ckeditor->config['format_pre'] = array('element'=> 'pre', "attributes"=> array( 'class'=> 'editorCode' ));
		$this->ckeditor->config['height'] = '400px';
		$total = count($this->uri->segment_array()) - 1;

		$this->ckeditor->config['filebrowserBrowseUrl'] = str_repeat('../',$total).'filemanager/dialog.php?type=2&editor=ckeditor&fldr=';
		$this->ckeditor->config['filebrowserImageBrowseUrl'] = str_repeat('../',$total).'filemanager/dialog.php?type=2&editor=ckeditor&fldr=';
		$this->ckeditor->config['filebrowserUploadUrl'] = str_repeat('../',$total).'filemanager/dialog.php?type=1&editor=ckeditor&fldr=';

		//Add Ckfinder to Ckeditor
		// $this->ckfinder->SetupCKEditor($this->ckeditor,$path);

		// var_dump($this->ckeditor);
		// var_dump($total);
		// die($total);




	}


}//class end




?>
