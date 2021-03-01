<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontEnd_Controller extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->CI =& get_instance();

		$this->set_panel('basic_user');


		$this->load->library('Included_files');
	}

	public function _header(){
		
	}

	public function _footer(){

	}

	public function big_filter(){
		if($search = $this->input->get('big_search'))
		$this->db->like($this->_uriSegment.'.title',$search);
	}
}