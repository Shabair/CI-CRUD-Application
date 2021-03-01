<?php

class Page extends FrontEnd_Controller {

	

	function __construct()
		{
			parent::__construct();
			
		}

	//------------------------ Truck List ------------------------//

	function index($slug){
		$this->load->model("admin/pages_model",'model');
		$slug = $this->uri->segment(1);
		$page = $this->model->get($slug)->row_array();

		$this->page_view($page);
	}

	function page_preview(){
		if($this->ion_auth->is_admin()){
			$this->load->model("admin/pages_model",'model');
			$slug = $this->uri->segment(3);
			$page = $this->model->hardGet($slug)->row_array();
			
			
			$this->page_view($page);
		}
	}
/*
	function page_preview_live(){
		if($this->ion_auth->is_admin()){
			$this->load->model("admin/pages_model",'model');
			$slug = $this->uri->segment(3);
			$page = $this->model->hardGet($slug)->row_array();
			

			$page['content'] = parser_words($page['content']);
			$page['css'] = parser_words(base64_decode($page['css']));
			$page['js'] = parser_words(base64_decode($page['js']));
			
			$this->_viewData['view'] = (empty($page['template']))?'public/page_live':'public/_pages/'.$page['template'];
			$this->_viewData['page'] = $page;
			$this->_breadcrumb[$page['title']] = $page['slug'];
			$this->_viewData['breadcrumb'] = $this->_breadcrumb;
			// $this->_render($this->_viewData);
			$this->load->view('public/page_live.php',$this->_viewData);
		}
	}
*/


	function page_view($page){
		if(count($page)){
			// $page['content'] = parser_words($page['content']);
			// $page['css'] = parser_words(base64_decode($page['css']));
			// $page['js'] = parser_words(base64_decode($page['js']));
			
			$this->_viewData['view'] = ($page['template'] == 'no-template')?'public/page':'public/_pages/'.$page['template'];
			$this->_viewData['page'] = $page;
			$this->_breadcrumb[$page['title']] = $page['slug'];
			$this->_viewData['title'] = $page['title'];
			$this->_viewData['breadcrumb'] = $this->_breadcrumb;
			$this->_render($this->_viewData);

		}else{
			return redirect_404();
		}
	}


}
?>