<?php

class Models_MImages extends Project
{
	function __construct(){
		parent::__construct();
	}

	function listdata($select = "",$where = "",$orderby = "",$limit = "")
	{
		if($select != "")
			$this->select($select);
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_IMAGES,$orderby,$limit);
		return $this->fetchall();
	}

	function countView($id)
	{
		$this->where("Id = '".$id."'");
		$this->update(TBL_IMAGES, "view = (view+1)");
	}

	function countOrder($id)
	{
		$this->where("Id = '".$id."'");
		$this->update(TBL_IMAGES, "oder = (oder+1)");
	}

	function getalias($id)
	{
		$sql = 'select Id from '.TBL_IMAGES.' where alias = "'.$id.'" limit 1';
		$kq = mysql_query($sql);
		$row = mysql_fetch_assoc($kq);
		return $row['Id'];
	}

	function CheckTitle($title,$iduser)
	{
		$sql = 'select * from mn_product where iduser= "'.$iduser.'" AND title_vn ="'.$title.'"';
		$kq = mysql_query($sql) or die(mysql_error());
		return mysql_num_rows($kq);
	}
}

?>