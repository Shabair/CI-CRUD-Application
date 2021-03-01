<?php

class Home extends FrontEnd_Controller {

	

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
		$this->_viewData['course'] = $this->get_course();
		$this->_viewData['news'] = $this->get_news();
		$this->_viewData['welfare'] = $this->get_welfare();
		$this->_viewData['academic'] = $this->get_academic();
		$this->_viewData['event'] = $this->get_event();
		$this->_viewData['old_event'] = $this->get_old_event();
		// var_dump($this->_viewData['old_event']);
		// die();
		$this->_render($this->_viewData);
	}

	function get_academic(){
		$this->db->select('slug,title');
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->db->order_by('id','desc');
		$this->db->limit(3);
		return $this->db->get('academic')->result_array();
	}

	function get_event(){
		$this->db->select('slug,title');
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->db->order_by('id','desc');
		$this->db->limit(3);
		return $this->db->get('event')->result_array();
	}

	function get_old_event(){
		$this->db->select('slug,title,thumbnail');
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->db->order_by('id','desc');
		$this->db->limit(2);
		return $this->db->get('old_event')->result_array();
	}

	public function get_video(){

		$sql = "SELECT v.`id` vid,v.`url` vurl,v.`slug`  vslug,v.`title` vtitle,v.`thumbnail` vthumbnail,v.`created` vcreated,v.`last_update` vlastupdate,p.`slug` pslug,p.`title` ptitle FROM `video` as `v`  left join `category` as `p` on v.`category` = p.`id` WHERE v.`active` = '1' AND v.`published` = '1'  ORDER BY v.`id` DESC limit 6";

		return $this->db->query($sql)->result_array();
		// return $this->db->get('video')->result_array();
	}

	public function get_slider(){

		$this->db->select('*');
		$this->db->where('active','1');

		$this->db->order_by('id','desc');
		return $this->db->get('slider')->result_array();
		// return $this->db->get('video')->result_array();
	}

	public function get_course(){

		$this->db->select('*');
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->db->order_by('id','desc');
		$this->db->limit(3);

		return $this->db->get('course')->result_array();
	}

	public function get_news(){

		$this->db->select('*');
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->db->order_by('id','desc');
		$this->db->limit(3);

		return $this->db->get('news')->result_array();
	}

	public function get_welfare(){

		$this->db->select('*');
		$this->db->where('active','1');
		$this->db->where('published','1');
		$this->db->order_by('id','desc');
		$this->db->limit(6);

		return $this->db->get('welfare')->result_array();
	}

	public function video_playlist(){

		$slug = $this->uri->segment('3');

		$sql = "SELECT id FROM `category` where `slug` = '".$slug."' OR `id` = '".$slug."' AND `category` = 'video'";
		$this->db->select('id');
		$this->db->from('category');
		$this->db->where('category',"video");
		$this->db->where('slug',$slug);
		$result = $this->db->or_where('id',$slug)->get()->row();
		if($result){
			$id = $result->id;
		

			$sql = "SELECT * FROM `video` where `category` = '".$id."'";

			$videos = $this->db->query($sql)->result_array();

			$this->load->model("admin/pages_model",'page');
			$page = $this->page->get('video')->row_array();

			if(count($page)){
				
				$this->_viewData['view'] = ($page['template'] == 'no-template')?'public/page':'public/_pages/'.$page['template'];
				$this->_viewData['page'] = $page;
				$this->_viewData['playlist_videos'] = $videos;
				$this->_breadcrumb[$page['title']] = $page['slug'];
				$this->_viewData['title'] = $page['title'];
				$this->_viewData['breadcrumb'] = $this->_breadcrumb;
				$this->_render($this->_viewData);

			}

		}else{
			redirect_404();
		}
	}

	public function audio_playlist(){

		$slug = $this->input->get('playlist');

		$this->db->select('id');
		$this->db->from('category');
		$this->db->where('category',"audio");
		$this->db->where('slug',$slug);
		$result = $this->db->or_where('id',$slug)->get()->row();
		if($result){
			$id = $result->id;
		

			$sql = "SELECT * FROM `audio` where `category` = '".$id."'";

			$videos = $this->db->query($sql)->result_array();

			$this->load->model("admin/pages_model",'page');
			$page = $this->page->get('audio')->row_array();

			if(count($page)){
				
				$this->_viewData['view'] = ($page['template'] == 'no-template')?'public/page':'public/_pages/'.$page['template'];
				$this->_viewData['page'] = $page;
				$this->_viewData['playlist_videos'] = $videos;
				$this->_breadcrumb[$page['title']] = $page['slug'];
				$this->_viewData['title'] = $page['title'];
				$this->_viewData['breadcrumb'] = $this->_breadcrumb;
				$this->_render($this->_viewData);

			}

		}else{
			redirect_404();
		}
	}
}
?>