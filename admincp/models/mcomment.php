<?php
class Models_MComment extends Project
{
	function __construct()
	{
		parent:: __construct();
	}
	
	function listdata($where = "",$start,$numrow){
		if($where != "")
			$this->where($where);	
		$this->getdata(TBL_COMMENT,"Id desc","$start,$numrow");
		$row = $this->num_rows();
		return $this->fetchall();
	}
	
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_COMMENT,$data);	
	}
	
	function hideshow($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_COMMENT,$data);	
	}
	
	function getOneNew($id,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where("Id = '$id'");
		$this->getdata(TBL_COMMENT);
		return $this->fetchone();
	}

	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_COMMENT);
		return $this->num_rows();
	}
	
	function addNew($data){
		$this->insert(TBL_COMMENT,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	function editNew($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_COMMENT,$data);
	}
	
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_COMMENT,'Id = '.$item);
		}
	}
	
	function del_onecheck($id){
		$this->delete(TBL_COMMENT,'Id = '.$id);
	}
}
?>