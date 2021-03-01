<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	public $CI = null;
	function __construct(){
		parent::__construct();
		$this->CI =& get_instance();
		// $this->set_panel('site_admin');
		// admin_main_template

		// if($this->get_user_type() !== 'site_admin'){
		// 	Myredirect();
		// }
		$this->load->helper('admin');
		// $this->_template = 'templates/admin_main_template';


		// $this->load->library('Included_files');user_id
		if(!$this->ion_auth->is_admin()){
			return redirect('/','refresh');
		}

	}
}
