<?php

defined('BASEPATH') OR exit('No direct script access allowed');
	

	
class Slider extends Admin_Controller
{

	private $_controllerUrl = null;
	private $_class = null;

	function __construct(){
		parent::__construct();
		// to allow subadmin access admins class for editing, viewing, profile
		$this->load->model('admin/slider_model','model');
		$this->_class = strtolower(__CLASS__);
		$this->_controllerUrl = 'admin/'.$this->_class;
	}

	public function index(){

		$cipher = (create_action_token($this->get_user_id(),0,'index',url_generator(15)));
		$this->session->set_userdata('action_token',$cipher);


		$this->_viewData['view']  = 'admin/slider/list';
		$this->_viewData['title']  = 'Slider : Dashboard';
		return $this->load->view('admin/layout',$this->_viewData);

	}

	public function datatable_json()
	{
		
		$Records = $this->model->GetAll();
		// die($this->db->last_query());
        $data = array();
        $count = 1;
        foreach ($Records['data']  as $r)
		{
			if($r['active'] == 1){
				$activeState = '<button class="delete btn btn-xs btn-danger pull-right" onclick="showDetails(this)" style="margin-right:10px;" data-deleted-id="'.$r["id"].'" data-class="'.$this->_class.'" data-toggle="modal" data-target=".bs-example-modal-sm"> <i class="fa fa-trash-o"></i></button>';
			}else{
				$activeState = '<a class="btn btn-xs btn-success pull-right" style="margin-right:5px;" href="'.base_url('admin/'.$this->_class.'/active/'.$r['id']).'"> <i class="fa fa-plus"></i></a>'.'<button class="delete btn btn-xs btn-danger pull-right" onclick="permDelete(this)" style="margin-right:10px;" data-deleted-id="'.$r["id"].'" data-class="'.$this->_class.'" data-toggle="modal" data-target=".bs-example-modal-sm"> <i class="fa fa-warning"></i></button>';
			}
			$data[]= array(
				$count++,
                $r['title'],
                $r['thumbnail'],
                $r['last_update'],
                $r['created'],
				
				'<a class="btn btn-xs btn-info pull-right" style="margin-right:5px;" href="'.base_url('admin/'.$this->_class.'/edit/'.$r['id']).'"> <i class="fa fa-pencil-square-o"></i></a>'.$activeState,
			);
        }

		$Records['data']=$data;
        echo json_encode($Records);
	}

	//------------------------ Inspection List ------------------------//
	public function search()
	{
		$search = array();
		$str = $this->input->post('user_search_type');
		switch ($str) {
			case 'all':
				
				break;
			case 'published':
				$search['published'] =  1;
				break;
			case 'non-published':
				$search['published'] =  0;
				break;
			case 'active':
				$search['active'] =  1;
				break;
			case 'deactive':
				$search['active'] =  0;
				break;
			
			default:
				# code...
				break;
		}
		$this->session->set_userdata('user_search_type',$search);
	}

	public function add(){

		$this->_actionType = $this->uri->segment(3);
		$this->set_item_id(0);
		
		$this->_viewData['title']  = 'Add : Slider';
		$this->add_slider();

	}


	public function add_slider()
	{	
		//this will work only for when we editing the driver
		
		$this->form_validation->set_rules($this->driverFormVali($this->input->post()));

		//------------------------Extra Form Validation Rules ------------------------//
		if($this->form_validation->run() == FALSE){

			$this->errors[] = validation_errors();

		}
		else{
			// var_dump($_POST['css']);
			// var_dump($_POST['js']);
		// var_dump(($_POST['content']));
			// var_dump($this->input->post('js'));
		// die();
			// $this->load->library('encrypt');
			$data= array(

				'title' 				=> 	$this->input->post('title'),
				'content' 				=> 	$this->input->post('content'),
				'content2' 				=> 	$this->input->post('content2'),
				'button' 				=> 	$this->input->post('button'),
				'thumbnail' 			=> 	$this->input->post('thumbnail'),

			);
			
			//------------------------------ Set admin r company and created date------------------------------//

		}//validation end




		if(!isset($this->errors)){
			if($this->_actionType == 'add'){
				$result = $this->model->insert($data);

				if($result)
				{
					// $historydata = [
					// 	'company_id'	=>	$this->get_company_id(),
					// 	'user_id'		=>	$this->get_user_id(),
					// 	'action_id'		=>	$this->db->insert_id(),
					// 	'action'		=>	'Add',
					// 	'action_on'		=>	$data['unit_no'],
					// 	'action_place'	=>	'Trailer',
					// ];
					// history($historydata);
					$this->session->set_flashdata('success', 'Slider Inserted Successfully');
				}
				else
				{
					$this->session->set_flashdata('error','Error Into Insert Slider');
				}
				

			}else if($this->_actionType == 'edit'){
				$data['last_update'] = date('Y-m-d H:i:s');
				$result =  $this->model->update($data, $this->get_item_id());

				if($result){

					// $historydata = [
					// 	'company_id'	=>	$this->get_company_id(),
					// 	'user_id'		=>	$this->get_user_id(),
					// 	'action_id'		=>	$this->get_item_id(),
					// 	'action'		=>	'Update',
					// 	'action_on'		=>	$data['unit_no'],
					// 	'action_place'	=>	'Trailer',
					// ];
					// history($historydata);
					$this->session->set_flashdata('success', 'Slider Updated Successfully');
				}

			}else{
				$this->session->set_flashdata('errors', 'Slider Not Added successfully.');
			}

			return redirect($this->_controllerUrl);
		}else{


			$cipher = (create_action_token($this->get_user_id(),$this->get_item_id(),$this->_actionType,url_generator(15)));
			$this->_viewData['action_token'] = $cipher;

			$this->_viewData['templates']  = $this->slider_templates();
			$this->_viewData['view']  = 'admin/slider/add';
			$this->_viewData['category'] = $this->model->getCategory('slider');

			$this->load->view('admin/layout', $this->_viewData);

		}
	}

	public function single_slider(){

		$this->set_item_id($this->uri->segment(4));
	}

	//------------------------ Truck Edit Function ------------------------//
	public function edit()
	{
		$this->_actionType = $this->uri->segment(3);
		$this->set_item_id($this->uri->segment(4));
		// valid_company('trailer','company_id',$id);

		$this->_viewData['item_detail'] =  $this->model->hardGet($this->get_item_id())->row_array();
		// var_dump($this->_viewData['item_detail']);
		// die();
		$this->_viewData['title'] = 'Edit Slider';
		$this->add_slider();
	}



	public function active(){

		$cipher = $this->session->userdata('action_token');
		$actionByUser = check_action_token($cipher);

    	//this will work only for when we editing the driver
    	if(empty($actionByUser)){
    		$this->errors[] = 'Invalid Slider Identification.';
    	}

    	if(!isset($this->errors)){

			$this->_actionType = $this->uri->segment(3);
			$this->set_item_id($this->uri->segment(4));

			if($this->model->active($this->get_item_id())){
				// $historydata = [
				// 	'company_id'	=>	$this->get_company_id(),
				// 	'user_id'		=>	$this->get_user_id(),
				// 	'action_id'		=>	$this->get_item_id(),
				// 	'action'		=>	'Activate',
				// 	'action_on'		=>	get_from('trailer','unit_no',['id'=>$id]),
				// 	'action_place'	=>	'Trailer',
				// ];
				// history($historydata);
				$this->session->set_flashdata('success', 'Slider Activate/Deactivate Successfully');
			}else{
				$this->session->set_flashdata('error', 'Slider Not Activate/Deactivate Successfully');
			}

		}else{
			$this->session->set_flashdata('error', 'Slider Not Activate/Deactivate Successfully');
		}

		return redirect($this->_controllerUrl);
	}


	public function driverFormVali($trailerData){
		$rulesArr = array(

                            array(
                                    'field' => 'action_token',
                                    'label' => 'Invalid Form',
                                    'rules' => 'required|callback_action_token_check',
                                    'errors' => array(
									                        'required' => 'Invalid Form.',
									                )
                                 ),
                            array(
                                    'field' => 'title',
                                    'label' => 'Slider Title',
                                    'rules' => 'required|trim'
                                 ),
                            array(
                                    'field' => 'content',
                                    'label' => 'Content',
                                    'rules' => 'trim'
                                 ),
                   );

			return $rulesArr;
	}

	public function delete(){
		$this->_actionType = $this->uri->segment(3);
		$this->set_item_id($this->uri->segment(4));
		// valid_company('trailer','company_id',$id);

		$result =  $this->model->delete($this->get_item_id());
		// var_dump($this->_viewData['item_detail']);
		// die();
		if($result){
			$this->session->set_flashdata('success', 'Slider Deleted Successfully');
		}else{
			$this->session->set_flashdata('error','Error in Deleting Slider');
		}
		return redirect($this->_controllerUrl);
	}

}//end of class