<?php
class Models_MWeblink extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	function listdata($select = "",$where = "",$orderby = "",$limit = ""){
		if(isset($select) && $select != ""){
			$this->select($select);
		}else{
			$this->select("*");
		}
		if(isset($where) && $where != ""){
			$this->where($where);
		}
		
		$this->getdata(TBL_WEBLINK,$orderby,$limit);
		return $this->fetchall();
	}
	
	function countdata($where = "")
	{
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_WEBLINK);
		return $this->num_rows();
	}
	
	function getalias($id)
	{
		$sql = 'select Id from '.TBL_WEBLINK.' where alias = "'.$id.'" order by Id desc limit 1';
		$kq = mysql_query($sql);
		$row = mysql_fetch_assoc($kq);
		return $row['Id'];
	}
	
	function countView($id){
		$this->where("Id = '".$id."'");
		$this->update(TBL_WEBLINK, "view = (view+1)");
	}
	
	function getOneNews($id,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where("Id = '$id'");
		$this->getdata(TBL_WEBLINK);
		return $this->fetchone();
	}
}
?>