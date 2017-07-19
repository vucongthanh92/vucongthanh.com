<?php
class Models_Mwebsite extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	//liet ke danh sach du lieu
	function listdata(){
		$this->getdata(TBL_WEBSITE,"Id desc");
		return $this->fetchall();
	}
	
	function countdata($where = ""){
		$this->getdata(TBL_WEBSITE);
		return $this->num_rows();
	}
	
	//tic lock chu de
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_WEBSITE,$data);	
	}
	
	//them mot chu de
	function addwebsite($data){
		$this->insert(TBL_WEBSITE,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	//lay thong tin mot chu de
	function getOnewebsite($id){
		$this->where("Id = $id");
		$this->getdata(TBL_WEBSITE);
		return $this->fetchone();
	}
	
	//edit thong tin
	function editwebsite($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_WEBSITE,$data);
	}	
	
	//delete nhieu dong
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_WEBSITE,'Id = '.$item);
		}
	}
	
	//delete mot dong
	function del_onecheck($id){
		$this->delete(TBL_WEBSITE,'Id = '.$id);
	}
	
	//cap nhat sap xep thu tu (sort)
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_WEBSITE,"sort = $value");
		}
	}
}
?>