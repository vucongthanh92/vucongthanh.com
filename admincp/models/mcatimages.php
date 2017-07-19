<?php

class Models_MCatimages extends Project
{
	function __construct(){
		parent:: __construct();
	}	

	function listdata($where="")
	{
		if($where!="")
		{
			$this->where($where);
		}
		$this->select('*');
		$this->getdata(TBL_CATIMAGES,"sort asc, id desc");
		return $this->fetchall();
	}

	function countdata($where = "")
	{
		$this->getdata(TBL_CATIMAGES);
		return $this->num_rows();
	}

	function hideshow($data,$id)
	{
		$this->where('Id = '.$id);
		$this->update(TBL_CATIMAGES,$data);	
	}

	function ticlockactive($data,$id)
	{
		$this->where('Id = '.$id);
		$this->update(TBL_CATIMAGES,$data);	
	}

	function addCatelog($data)
	{
		$this->insert(TBL_CATIMAGES,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}

	function getOneCatelog($id)
	{
		$this->where("Id = $id");
		$this->getdata(TBL_CATIMAGES);
		return $this->fetchone();
	}

	function editCatelog($data,$id)
	{
		$this->where("Id = $id");
		$this->update(TBL_CATIMAGES,$data);
	}	

	function del_allcheck($data)
	{
		foreach($data as $item)
		{
			$this->delete(TBL_CATIMAGES,'Id = '.$item);
		}
	}

	function del_onecheck($id)
	{
		$this->delete(TBL_CATIMAGES,'Id = '.$id);
	}

	function sortData($data)
	{
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_CATIMAGES,"sort = $value");
		}
	}

	function delFile($data,$id)
	{
		$this->where('Id = '.$id);
		$this->update(TBL_CATIMAGES,$data);	

	}

}

?>