<?php

class Single extends FrontEnd_Controller {

	

	function __construct()
	{
		parent::__construct();
		$this->_extraHeaderFiles[] = '<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />';
		$this->_extraFooterFiles[] = '<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>';
		$this->_extraFooterFiles[] = '<script>
        $("#share-buttons").jsSocials({
        	showLabel: false,
        	shareIn: "popup",
            shares: [{
        renderer: function() {
					            var $result = $("<li><strong>Share:</strong></li>");
					            return $result;
					        }
    					},
    					{ share: "facebook",logo:"fa fa-facebook" },
    					{ share: "twitter",logo:"fa fa-twitter" }]
        });
    </script>';
		
	}

	
	function event(){
		$this->load_single(__FUNCTION__);
	}	

	function old_event(){
		$this->load_single(__FUNCTION__);
	}

	function video(){
		$this->load_single_with_cat(__FUNCTION__);
	}

	function audio(){
		$this->load_single_with_cat(__FUNCTION__);
	}

	function course(){
		$this->load_single(__FUNCTION__);
	}

	function lecture(){
		$this->load_single(__FUNCTION__);
	}

	function academic(){
		$this->load_single(__FUNCTION__);
	}

	function welfare(){
		$this->load_single(__FUNCTION__);
	}


	
	function load_single($SType = 'function'){

		$this->load->model('admin/'.$SType.'_model','model');
		$slug = $this->uri->segment(2);
		$this->_viewData['single'] = ($this->model->get($slug)->row_array());
		if($this->_viewData['single']){
			if(file_exists(APPPATH.'./views/public/single/'.$SType.'.php')){
				$this->_viewData['view']   = 'public/single/'.$SType;
			}else{
				$this->_viewData['view']   = 'public/single/single';
			}

			$this->_viewData['title']  = ($this->_viewData['single']['title']);
			$this->_viewData['content'] = array_remove($this->_viewData['single'],'content');
			$this->_viewData['seo_keywords'] = array_remove($this->_viewData['single'],'seo_keywords');
			$this->_viewData['seo_description'] = array_remove($this->_viewData['single'],'seo_description');
			// $this->_viewData['breadcrumb'] = true;
			$this->_viewData['referItems'] = nextAndPrevious($SType,$slug);
			$this->_viewData['referItems']['targetUrl'] = $SType;
			$this->_render($this->_viewData);
		}else{
			return redirect_404();
		}

	}
	
	function load_single_with_cat($SType = 'function'){

		$this->load->model('admin/'.$SType.'_model','model');
		$slug = $this->uri->segment(2);
		$this->_viewData['single'] = ($this->model->get($slug)->row_array());
		// var_dump($this->_viewData['single']);
		// die();
		if($this->_viewData['single']){
			if(file_exists(APPPATH.'./views/public/single/'.$SType.'.php')){
				$this->_viewData['view']   = 'public/single/'.$SType;
			}else{
				$this->_viewData['view']   = 'public/single/single';
			}

			$this->_viewData['title']  = ($this->_viewData['single']['title']);
			$this->_viewData['content'] = array_remove($this->_viewData['single'],'content');
			$this->_viewData['seo_keywords'] = array_remove($this->_viewData['single'],'seo_keywords');
			$this->_viewData['seo_description'] = array_remove($this->_viewData['single'],'seo_description');

			$this->_viewData['referItems'] = nextAndPrevious($SType,$slug,'AND category = "'.$this->_viewData['single']['category'].'"');
			$this->_viewData['referItems']['targetUrl'] = $SType;
			$this->_render($this->_viewData);
		}else{
			return redirect_404();
		}

	}




}
?>