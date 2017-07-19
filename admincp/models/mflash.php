<?php
class Models_MFlash extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	//liet ke danh sach du lieu
	function listdata(){
		$this->getdata(TBL_FLASH,"location asc, sort asc, Id desc");
		return $this->fetchall();
	}
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_FLASH,$data);	
	}
	function countdata($where = ""){
		$this->getdata(TBL_FLASH);
		return $this->num_rows();
	}
	
	//tic lock chu de
	function delFile($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_FLASH,$data);	
	}
	
	//them mot chu de
	function addflash($data){
		$this->insert(TBL_FLASH,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	//lay thong tin mot chu de
	function getOneflash($id){
		$this->where("Id = $id");
		$this->getdata(TBL_FLASH);
		return $this->fetchone();
	}
	
	//edit thong tin
	function editflash($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_FLASH,$data);
	}	
	
	//delete nhieu dong
	function del_allcheck($data){
		foreach($data as $item)
		{
			$row = $this->getOneflash($item);
			if(file_exists('../data/Flash/'.$row['file_vn']))
				unlink('../data/Flash/'.$row['file_vn']);
			if(file_exists('../data/Flash/'.$row['file_en']))
				unlink('../data/Flash/'.$row['file_en']);
			$this->delete(TBL_FLASH,'Id = '.$item);
		}
	}
	
	//delete mot dong
	function del_onecheck($id){
		$this->delete(TBL_FLASH,'Id = '.$id);
	}
	
	//cap nhat sap xep thu tu (sort)
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_FLASH,"sort = $value");
		}
	}
}
?>