<?php

class Models_MCatworks extends Project

{
	function __construct()
	{
		parent:: __construct();
	}	

	function listdata($select = "",$where = "",$orderby = "",$limit = "")
	{
		if($select != "")
			$this->select($select);
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_CATWORKS,$orderby,$limit);
		return $this->fetchall();
	}

	function countdata($where = "")
	{
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_CATWORKS);
		return $this->num_rows();
	}

	function getalias($id){

		$sql = 'select Id from '.TBL_CATWORKS.' where alias = "'.$id.'" order by Id desc limit 1';

		$kq = mysql_query($sql);

		$row = mysql_fetch_assoc($kq);

		return $row['Id'];

	}

	function getaliasInc($id,$parent){

		$sql = 'select Id from '.TBL_CATWORKS.' WHERE alias = "'.$id.'" AND parentid='.$parent.'  limit 1';

		$kq = mysql_query($sql);

		$row = mysql_fetch_assoc($kq);

		return $row['Id'];

	}

	function getinfoAlias($id)
	{
		$sql = 'select * from '.TBL_CATWORKS.' where alias = "'.$id.'" order by Id desc limit 1';
		$kq = mysql_query($sql);
		$row = mysql_fetch_assoc($kq);
		return $row;
	}

	function getOneCatelog($id)
	{
		$this->select('*');
		$this->where("Id = $id");
		$this->getdata(TBL_CATWORKS);
		return $this->fetchone();
	}

	function getSubId($id)
	{
		$this->where("parentid = $id");
		$this->getdata(TBL_CATWORKS);
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
		$this->getdata(TBL_CATWORKS);
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