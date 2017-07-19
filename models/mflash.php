<?php
class Models_MFlash extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	/*liet ke danh sach du lieu*/
	function listdata($select = "",$where = "",$orderby = "",$limit = ""){
		if(isset($select) && $select != ""){
			$this->select($select);
		}else{
			$this->select("*");
		}
		if(isset($where) && $where != ""){
			$this->where($where);
		}
		
		$this->getdata(TBL_FLASH,$orderby,$limit);
		return $this->fetchall();
	}
	
	function countdata($where = ""){
		$this->getdata(TBL_FLASH);
		return $this->num_rows();
	}
	
	
	/*lay thong tin mot chu de*/
	function getOneflash($id){
		$this->where("Id = $id");
		$this->getdata(TBL_FLASH);
		return $this->fetchone();
	}
	
	/*lay thong tin từ vi tri*/
	function getOneflashLocation($id){
		$this->where("location = $id AND ticlock = '0'");
		$this->getdata(TBL_FLASH);
		return $this->fetchone();
	}
}
?>