<?php
class Models_MEmail extends Project{
	function __construct(){
		parent::__construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata($select = '', $where = '', $order = '', $limit = ''){
		if($where != "")
			$this->where($where);	
		if($select != ''){
			$this->select($select);	
		}
		$this->getdata(TBL_EMAIL,$order,$limit);
		return $this->fetchall();
	}
	
	/*
	 * lay tong so dong
	 */
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_EMAIL);
		return $this->num_rows();
	}
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_EMAIL,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_EMAIL,"Id = $id");
	}
}
?>