<?php
class Models_MNews extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata($where = "",$start,$numrow){
		if($where != "")
			$this->where($where);	
		$this->getdata(TBL_NEWS,"sort ASC,Id DESC","$start,$numrow");
		$row = $this->num_rows();
		return $this->fetchall();
	}
	
	/*
	 * lay tong so dong
	 */
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_NEWS);
		return $this->num_rows();
	}
	
	/*
	 * tic lock mot tin
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_NEWS,$data);	
	}
	
	/*
	 * tic lock mot tin
	 */
	function hideshow($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_NEWS,$data);	
	}
	
	/*
	 * them mot tin
	 */
	function addNews($data){
		$this->insert(TBL_NEWS,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneNews($id){
		$this->where("Id = $id");
		$this->getdata(TBL_NEWS);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editNews($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_NEWS,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_NEWS,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_NEWS,'Id = '.$id);
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_NEWS,"sort = $value");
		}
	}
}
?>