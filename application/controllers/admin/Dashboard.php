<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	


	
class Dashboard extends Admin_Controller
{


	
	function __construct(){

		parent::__construct();


	}
	

	public function index(){

		// $cipher = (create_action_token($this->get_user_id(),0,'index',url_generator(15)));
		// $this->session->set_userdata('action_token',$cipher);


		$this->_viewData['view']  = 'admin/dashboard/dashboard';
		$this->_viewData['title']  = 'Admin : Dashboard';
		return $this->load->view('admin/layout',$this->_viewData);

	}


}