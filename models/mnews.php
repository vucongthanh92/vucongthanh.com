<?php
class Models_MNews extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata($select = "",$where = "",$orderby = "",$limit = ""){
		if(isset($select) && $select != ""){
			$this->select($select);
		}else{
			$this->select("*");
		}
		if(isset($where) && $where != ""){
			$this->where($where);
		}
		
		$this->getdata(TBL_NEWS,$orderby,$limit);
		return $this->fetchall();
	}
	// lay id
	function getAlias($id){
		$sql = 'select Id from '.TBL_NEWS.' where alias = "'.$id.'" limit 1';
		$kq = mysql_query($sql);
		$row = mysql_fetch_assoc($kq);
		return $row['Id'];
	}
	/*
	 * lay thong tin mot tin
	 */
	function getOneNewsToCat($where,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where($where);
		$this->getdata(TBL_NEWS,"Id desc");
		return $this->fetchone();
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneNews($id,$select = ""){
		if($select != "")
			$this->select($select);
		$this->where("Id = '$id'");
		$this->getdata(TBL_NEWS);
		return $this->fetchone();
	}
	/*
	 * lay tong so dong
	 */
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_NEWS);
		return $this->num_rows();
	}

	function countView($id){
		$this->where("Id = '".$id."'");
		$this->update(TBL_NEWS, "view = (view+1)");
	}
}
?>