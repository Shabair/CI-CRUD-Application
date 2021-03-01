<?php
class Block_model extends MY_Model
{
	private $_table = 'block';
	public function __construct()
	{
		parent::__construct();
	}
	
	//-----------------------------------------------------
	function login($data)
	{
		$result = $this->db->select('id, first_name, last_name, email, password')->where('email', $data['email'])->where('password', $data['password'])->get('admin');
		
		if ($result->num_rows() == 1) {
			return $result->row_array();
		} else {
			return false;
		}
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
	
    // public function getSinglePage($id){
    // 	$this->db->where('id',$id);
    // 	$this->db->or_where('id',$id);

    // 	return $this->db->get($this->_table);
    // }

    public function insert($data){
    	$this->db->insert($this->_table, $data);
		
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }

    public function hardGet($id){
    	$this->db->where('id',$id);
    	$this->db->or_where('id',$id);

    	return $this->db->get($this->_table);
    }

    public function get($id){
    	$this->db->where('id',$id);
    	$this->db->where('active','1');
    	$this->db->or_where('id',$id);

    	return $this->db->get($this->_table);
    }

	public function update($data, $id){
		
		$this->db->where('id', $id);
		$this->db->update($this->_table, $data);
		
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		
	}

	public function active($id){
		$sql = "UPDATE `".$this->_table."` SET `active` = (if(".$this->_table.".`active` = '1','0','1')) WHERE id = '".$id."' OR id = '".$id."' ";
		$this->db->query($sql);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->or_where('id' , $id);

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