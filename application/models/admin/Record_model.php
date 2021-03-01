<?php
class Record_Model extends MY_Model
{
	private $_table = 'record';
	public function __construct()
	{
		parent::__construct();
	}


	//-----------------------------------------------------
	function GetAll()
    {
		$wh =array();
		$extra_search =	$this->session->userdata('user_search_type');
		if(is_array($extra_search)){
			foreach ($extra_search as $key => $value) {
				$wh[]=" `".$key."` = '".$value."'";
			}
		}

		$SQL ='SELECT * FROM '.$this->_table;

		/*if($id_login != '')
		{
			$WHERE = implode(' and ',$wh);
			return $this->datatable->LoadJson($SQL,$WHERE);
		}
		else*/ if(count($wh)>0)
		{
			$WHERE = implode(' and ',$wh);
			return $this->datatable->LoadJson($SQL,$WHERE);
		}
		else
		{
			return $this->datatable->LoadJson($SQL);
		}
    }


    public function insert($data){
    	$this->db->insert($this->_table, $data);


		if($this->db->affected_rows() > 0){
			return $this->db->insert_id();
		}else{
			return false;
		}
    }

    public function hardGet($slug){
    	$this->db->select($this->_table.'.*,seo_data.seo_keywords,seo_data.seo_description');
    	$this->db->from($this->_table);
    	$this->db->join('seo_data', 'seo_data.item_id = '.$this->_table.'.id AND seo_data.table = "'.$this->_table.'"','left');
    	$this->db->where($this->_table.'.slug',$slug);
    	$this->db->or_where($this->_table.'.id',$slug);

    	return $this->db->get();
    }

    public function get($slug){

    	$this->db->select($this->_table.'.*,seo_data.seo_keywords,seo_data.seo_description');
    	$this->db->from($this->_table);
    	$this->db->join('seo_data', 'seo_data.item_id = '.$this->_table.'.id AND seo_data.table = "'.$this->_table.'"','left');
    	$this->db->where($this->_table.'.active','1');
    	$this->db->where($this->_table.'.published','1');
    	$this->db->where($this->_table.'.slug',$slug);
    	$this->db->or_where($this->_table.'.id',$slug);

    	return $this->db->get();
    }

	public function update($data, $id){

		$this->db->where('id', $id);
		$this->db->or_where('slug',$id);

		$this->db->update($this->_table, $data);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}

	}

	public function active($slug){
		$sql = "UPDATE `".$this->_table."` SET `active` = (if(".$this->_table.".`active` = '1','0','1')) WHERE id = '".$slug."' OR slug = '".$slug."' ";
		$this->db->query($sql);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	public function delete($slug){
		$this->db->where('id', $slug);
		$this->db->or_where('slug' , $slug);

		$this->db->delete($this->_table);

		if($this->db->affected_rows() > 0){

			return true;
		}else{
			return false;
		}
	}


	public function is_unique($id,$column,$str){
		$sql = "SELECT id from ".$this->_table." where  `".$column."` = '".$str."' AND id != '".$id."' ";

    	$result =  $this->db->query($sql);

    	if( $result->num_rows() > 0 ){

        	return false;
    	}else{
    		return true;
    	}
	}

}
?>
