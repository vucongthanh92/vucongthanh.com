<?php
class Models_MManufacturer extends Project
{
	function __construct(){
		parent:: __construct();
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
		
		$this->getdata(TBL_MANUFACTURER,$orderby,$limit);
		return $this->fetchall();
	}
	/*
	 * lay tong so dong
	 */
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_MANUFACTURER);
		return $this->num_rows();
	}

	function getOneRows($id){
		$this->where = "Id = '$id'";
		$this->getdata(TBL_MANUFACTURER);
		return $this->fetchone();
	}
	// lay id
	function getAlias($id){
		$sql = 'select Id from '.TBL_MANUFACTURER.' where alias = "'.$id.'" limit 1';
		$kq = mysql_query($sql);
		$row = mysql_fetch_assoc($kq);
		return $row['Id'];
	}
	//lay tat ca cac id cua idgoc
	function getSubId($id)
	{
		$this->where("parentid = $id");
		$this->getdata(TBL_MANUFACTURER);
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