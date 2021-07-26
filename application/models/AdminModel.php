<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model{


	public function getDataJoin($firstTable,$secTable,$matchingString,$cond = array())
	{
		$this->db->where($cond);
		$this->db->from($firstTable);
		$this->db->join($secTable,$matchingString);
		// $this->db->group_by('e_filters.filter_cat_id');
		$query = $this->db->get();

		// echo $this->db->last_query();
		return $query->result_array();
	}
	public function insertReturn($tableName,$data)
	{
		if($this->db->insert($tableName,$data))
			return $this->db->insert_id();
		else
			return false;
	}
public function getRow($tableName,$cond = array())
	{
		if($cond) $this->db->where($cond);
		$query = $this->db->get($tableName);
		return $query->row_array();
	}
	public function getRows($tableName,$cond = array())
	{
		$this->db->where($cond);
		$query = $this->db->get($tableName);
		return $query->result_array();
	}
	public function delRow($tableName,$cond = array())
	{ 
		$this->db->where($cond);
		$this->db->delete($tableName);
	}
	public function updateRow($tableName,$cond = array(),$data = array())
	{
		$this->db->where($cond);
		if($this->db->update($tableName,$data))
			return true;
	}
	public function getField($tableName,$cond = array(),$field)
	{
		$this->db->where($cond);
		$query = $this->db->get($tableName);
		$record = $query->row_array();
		if (!empty($record)) {
			return $record[$field];
		}
		else
			return 'Not found';
		
	}
	public function checkExistFieldValue($tableName,$cond)
	{
		$this->db->where($cond);
		$query = $this->db->get($tableName);
		$record = $query->row_array();
		if (!empty($record)) {
			//if exist 
			return true;
		}
		else
			return false;
	}
	public function insertData($tableName,$data)
	{
		if($this->db->insert($tableName,$data))
		return true;
		// else
		// 	echo $this->db->_error_message();
	}
	public function getTableData($tableName)
	{
		$query = $this->db->get($tableName);
		 return $query->result_array();
	}
	public function getTableDataLimit($tableName,$limit,$start_index)
	{	$this->db->limit($limit,$start_index);
		$query = $this->db->get($tableName);
		 return $query->result_array();
	}
	public function countRows($table,$cond = array())
	{
		 $this->db->where($cond);
		return $this->db->count_all_results($table);
	}
	public function multiCondition($table,$conditions,$result = 'all')
	{
		if($conditions)
		$this->db->where($conditions);
		$query = $this->db->get($table);
		if($result == 'all')
			return $query->result_array();
		else
			return $query->row_array();
	}
	public function fieldIncrement($tableName,$incrementArr = array(),$cond = array())
	{
		foreach ($incrementArr as $key=>$val){
		    $this->db->set($key, $val, FALSE);
		}
		$this->db->where($cond);
		$this->db->update($tableName);
	}
	public function getSumRows($tableName,$colName,$cond= array())
	{
		$this->db->select_sum($colName);
		$this->db->where($cond);
		$query = $this->db->get($tableName);
		//echo $this->db->last_query(); 
		return $query->row()->$colName;

	}
	public function myQuery($query)
	{
		return $this->db->query($query);
	}
	public function field_exists($field,$tableName)
	{
		return $this->db->field_exists($field, $tableName);
	}

	public function getOrderby($tableName,$orderField,$order = 'desc',$cond = array())
	{
		$this->db->order_by($orderField,$order);
		if($cond) 
			$this->db->where($cond);
		$query = $this->db->get($tableName);
			return $query->result_array();
	}
	//ON 7oct18
	public function getWhereIn($tableName,$whereIn,$cond = array())
	{
		if($cond) $this->db->where($cond);
		$this->db->where_in($whereIn[0],$whereIn[1]);
		$query = $this->db->get($tableName);
			return $query->result_array();

	}
	public function getWhereInMultiple($tableName,$whereInCond,$cond = array(),$sortArr = array())
	{
		if($sortArr)
			$this->db->order_by($sortArr[0],$sortArr[1]);

		if($cond) $this->db->where($cond);
		foreach ($whereInCond as $key => $value) {
			$this->db->where_in($key,$value);
		}

		$query = $this->db->get($tableName);
		return $query->result_array();
	}
//////////////////genric funcion area -------- ends///////////////////////////////////
///////////////// cms-related function/////////////////////////////////////////////////
	public function validateLogin($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where(array('password'=>$password,'status'=>'Active'));
		$query = $this->db->get('e_admin');
		return $query->row_array();
	}
	public function validateCandidateLogin($username,$password)
	{	if($username == "" || $password == "") return false;
		$this->db->where('cnic',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('employee');
		return $query->row_array();
	}
	public function getSetting()
	{
		$query = $this->db->get('e_settings');
		return $query->row_array();
	}
	
///////////////// cms-related function area ends///////////////////////////////////////

///////////////// project realted function (----Gilgit Bazar-----)/////////////////////
	
	public function searchAdmin($col,$limit,$keyword)
	{
		$this->db->order_by('date_added','desc');
		$this->db->where('isSeller','0');
		$this->db->like('LOWER('.$col.')',strtolower($keyword));
		$query = $this->db->get('e_products',$limit);
		return $query->result_array();

	}
	// public function getCandidates($limit,$start_index,$order_key = 'reg_date',$order_val='desc',$cond=array())
	public function getCandidates()
	{	
		// $this->db->order_by($order_key,$order_val);
		// $this->db->where($cond);
		// $this->db->limit($limit,$start_index);
		$query = $this->db->get('employee');
		 //echo $this->db->last_query(); 
		 return $query->result_array();
	}
	

}
?>