<?php

class AjaxRequests extends FrontEnd_Controller {

	

	function __construct()
	{
		parent::__construct();
	}

	//------------------------ Truck List ------------------------//
	//------------------------ Truck List ------------------------//

	//--------------------------------------------------


	//--------------------------------------------------


	public function index()
	{
		$this->_viewData['view'] = 'public/home';
		/*$this->_viewData['title'] = 'Azzuhaa';*/
		
		$this->_viewData['video'] = $this->get_video();
		$this->_viewData['slider'] = $this->get_slider();
		// var_dump($this->_viewData['slider']);
		// die();
		$this->_render($this->_viewData);
	}


	public function videoPlaylist(){

		$id = (int) $this->uri->segment('3');

		$sql = "SELECT * FROM `video` where `category` = '".$id."'";

		// echo $this->db->query($sql)->result_array();
		// return $this->db->get('video')->result_array();
		echo json_encode($this->db->query($sql)->result_array());
		
	}

	public function get_slider(){

		$this->db->select('*');
		$this->db->where('active','1');

		return $this->db->get('slider')->result_array();
		// return $this->db->get('video')->result_array();
	}

	public function search_suggest(){
		$requestFrom = $_SERVER['HTTP_REFERER'];
		
		$rr = [];///^http\:\/\/localhost\/regexp.php\/?(\w+)/
		$pattern = '/^'.preg_quote($this->_baseUrl,'/').'{1,}(\w+)/';
		preg_match($pattern,$_SERVER['HTTP_REFERER'],$rr);
		$requestFrom = $rr[1];

		$string =  $this->input->get('search');
		$this->db->select('title');
		$this->db->like('title', $string, 'both');
		$this->db->where('active','1');
		$this->db->where('published','1');
		$suggests = $this->db->get($requestFrom)->result_array();
		// var_dump($suggests);
		echo json_encode($suggests);
	}
}
?>