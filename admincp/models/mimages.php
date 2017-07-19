<?php

class Models_MImages extends Project
{
	function __construct(){
		parent::__construct();
	}

	/*
	 * liet ke danh sach du lieu
	 */

	function listdata($where = "",$start,$numrow)
	{
		if($where != "")
			$this->where($where);	
		$this->getdata(TBL_IMAGES,"idcat desc, sort asc, Id desc","$start,$numrow");
		$row = $this->num_rows();
		return $this->fetchall();
	}


	/*
	 * lay tong so dong
	 */

	function countdata($where = "")
	{
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_IMAGES);
		return $this->num_rows();
	}


	/*
	 * them mot tin
	 */

	function addNew($data)
	{
		$this->insert(TBL_IMAGES,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}

	/*tic lock chu de*/

	function delFile($data,$id)
	{
		$this->where('Id = '.$id);
		$this->update(TBL_IMAGES,$data);	
	}

	/*
	 * lay thong tin mot tin
	 */

	function getOneNews($id)
	{
		$this->where("Id = $id");
		$this->getdata(TBL_IMAGES);
		return $this->fetchone();
	}

	
	/*
	 * edit thong tin
	 */

	function editNews($data,$id)
	{
		$this->where("Id = $id");
		$this->update(TBL_IMAGES,$data);
	}	

	/*
	 * delete nhieu dong
	 */

	function del_allcheck($data)
	{
		foreach($data as $item)
		{
			$this->delete(TBL_IMAGES,'Id = '.$item);
		}
	}

	function ticlockactive($data,$id)
	{
		$this->where('Id = '.$id);
		$this->update(TBL_IMAGES,$data);	
	}

	/*
	 * delete mot dong
	 */

	function del_onecheck($id)
	{
		$this->delete(TBL_IMAGES,'Id = '.$id);
	}

	

	/*

	 * cap nhat sap xep thu tu (sort)

	 */

	function sortData($data){
		if(!empty($data)){
		foreach($data as $key => $value){

			$this->where("Id = $key");

			$this->update(TBL_IMAGES,"sort = $value");

		}
		}

	}

}

?>