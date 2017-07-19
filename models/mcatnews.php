<?php
class Models_MCatnews extends Project
{
	function __construct(){
		parent:: __construct();
	}	
	
	//liet ke danh sach du lieu
	function listdata($select = "",$where = "",$orderby = "",$limit = ""){
		if(isset($select) && $select != ""){
			$this->select($select);
		}else{
			$this->select("*");
		}
		if($where != "")
			$this->where = ($where);
		$orderby = ($orderby != "")?$orderby:"Id desc";
	
		$this->getdata(TBL_CATNEWS,$orderby,$limit);
		return $this->fetchall();
	}
	// lay id
	function getAlias($id){
		$sql = 'select Id from '.TBL_CATNEWS.' where alias = "'.$id.'" limit 1';
		$kq = mysql_query($sql);
		$row = mysql_fetch_assoc($kq);
		return $row['Id'];
	}
	//lay thong tin mot chu de
	function getOneCatnews($id){
		$this->where("Id = $id");
		$this->getdata(TBL_CATNEWS);
		return $this->fetchone();
	}
	
	//lay tat ca cac id cung mot id goc tao thanh chuoi
	function getallcatidstr($id)
	{
		$allid = "";
		$sql =  mysql_query("select Id from ".TBL_CATNEWS." where ".parentid." = '$id'");
		while($rows = mysql_fetch_assoc($sql))
		{
			$allid .= ",".$rows['ID'];
		}
		
		$strid = substr($allid ,strstr($allid ,",")+1);
		if($strid == ""){
			$strid = $id;
		}
		return $strid;
	}
	
}
?>