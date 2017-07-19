<?php

class Models_MSaiGon extends Project
{
	function __construct(){
		parent:: __construct();
	}
	
	function listdata($select = "",$where = "",$orderby = "",$limit = "")
	{
		if($select != "")
			$this->select($select);
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_SAIGON,$orderby,$limit);
		return $this->fetchall();
	}

	function countdata($where = "")
	{
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_SAIGON);
		return $this->num_rows();
	}

	function getalias($id)
	{
		$sql = 'select Id from '.TBL_SAIGON.' where alias = "'.$id.'" order by Id desc limit 1';
		$kq = mysql_query($sql);
		$row = mysql_fetch_assoc($kq);
		return $row['Id'];
	}

	function getOneNews($id,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where("Id = '$id'");
		$this->getdata(TBL_SAIGON);
		return $this->fetchone();
	}

	function getinfoAlias($id)
	{
		$sql = 'select * from '.TBL_SAIGON.' where alias = "'.$id.'" order by Id desc limit 1';
		$kq = mysql_query($sql);
		$row = mysql_fetch_assoc($kq);
		return $row;
	}
	
	function countView($id){
		$this->where("Id = '".$id."'");
		$this->update(TBL_SAIGON, "view = (view+1)");
	}

	function getOneCatelog($id)
	{
		$this->select('*');
		$this->where("Id = $id");
		$this->getdata(TBL_SAIGON);
		return $this->fetchone();
	}

	function getSubId($id)
	{
		$this->where("parentid = $id");
		$this->getdata(TBL_SAIGON);
		$allid = "";
		$rows = $this->fetchall();
		if(!empty($rows)){
			foreach($rows as $item)
			{
				$allid .= $item['Id'].",";
			}
		}
		return $allid;
	}

	function getParent()
	{
		$this->where("parentid = '0'");
		$this->getdata(TBL_SAIGON);
		$allid = "";
		$rows = $this->fetchall();
		if(!empty($rows)){
			foreach($rows as $item)
			{
				$allid .= $item['Id'].",";
			}
		}
		return $allid;
	}
}

?>