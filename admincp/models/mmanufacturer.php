<?php
class Models_MManufacturer extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata(){
		$this->getdata(TBL_MANUFACTURER,"Id asc");
		return $this->fetchall();
	}
	
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_MANUFACTURER);
		return $this->num_rows();
	}
	
	/*
	 * tic lock chu de
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_MANUFACTURER,$data);	
	}
	
	/*
	 * them mot chu de
	 */
	function addManufacturer($data){
		$this->insert(TBL_MANUFACTURER,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot chu de
	 */
	function getOneManufacturer($id){
		$this->where("Id = $id");
		$this->getdata(TBL_MANUFACTURER);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editManufacturer($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_MANUFACTURER,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_MANUFACTURER,'Id = '.$item);
		}
	}
	
	/*
	 * delete mot dong
	 */
	function del_onecheck($id){
		$this->delete(TBL_MANUFACTURER,'Id = '.$id);
	}
	
	function hideshow($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_MANUFACTURER,$data);	
	}
	
	function delFile($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_MANUFACTURER,$data);	
	}
}
?>