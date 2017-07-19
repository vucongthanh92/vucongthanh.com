<?php
class Models_MProduct extends Project
{
	function __construct(){
		parent::__construct();
	}
	
	/*
	 * liet ke danh sach du lieu
	 */
	function listdata2($where,$start,$numrow,$order){
		if($where != ''){
			$this->where($where);
		}
	
		$this->getdata(TBL_PRODUCT,$order,"$start,$numrow");
		return $this->fetchall();
	}
	function listdata($where,$start,$numrow){
		if($where != ''){
			$this->where($where);
		}
	
		$this->getdata(TBL_PRODUCT,"Id DESC","$start,$numrow");
		return $this->fetchall();
	}
	/*
	 * insert id
	 */
	function CheckPro($url){
		$sql = "select Id from ".TBL_PRODUCT." where linkgoc='".$url."'";
		$kq = mysql_query($sql);
		$row = mysql_num_rows($kq);
		return $row;
	}
	/*
	 * insert id
	 */
	
	function getinsertid(){
		return $this->insertid();
	}
	
	/*
	 * lay tong so dong
	 */
	function countdata($where = ""){
		if($where != "")
			$this->where($where);
		$this->getdata(TBL_PRODUCT);
		return $this->num_rows();
	}
	
	/*
	 * tic lock mot tin
	 */
	function ticlockactive($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_PRODUCT,$data);	
	}
	
	/*
	 * them mot tin
	 */
	function addProduct($data){
		$this->insert(TBL_PRODUCT,$data);
		if($this->result == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	/*
	 * lay thong tin mot tin
	 */
	function getOneProduct($id){
		$this->where("Id = $id");
		$this->getdata(TBL_PRODUCT);
		return $this->fetchone();
	}
	
	/*
	 * edit thong tin
	 */
	function editProduct($data,$id){
		$this->where("Id = $id");
		$this->update(TBL_PRODUCT,$data);
	}	
	
	/*
	 * delete nhieu dong
	 */
	function del_allcheck($data){
		foreach($data as $item)
		{
			$this->delete(TBL_PRODUCT,'Id = '.$item);
		}
	}
	
	
	function del_onecheck($id){
		$this->delete(TBL_PRODUCT,'Id = '.$id);
	}
	
	/*
	 * cap nhat sap xep thu tu (sort)
	 */
	function sortData($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$this->update(TBL_PRODUCT,"sort = $value");
		}
	}
	
	/*
	 * cap nhat giá
	 */
	function editPrice($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$value = (int)str_replace(".","",$value);
			$this->update(TBL_PRODUCT,"price = $value");
		}
	}
	/*
	 * cap nhat giá
	 */
	function editPrice2($data){
		foreach($data as $key => $value){
			$this->where("Id = $key");
			$value = (int)str_replace(".","",$value);
			$this->update(TBL_PRODUCT,"sale_price = $value");
		}
	}
	
	/*
	 * bat la tin moi
	 */
	function hideshow($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_PRODUCT,$data);	
	}
	
	function delFile($data,$id){
		$this->where('Id = '.$id);
		$this->update(TBL_PRODUCT,$data);	
	}
	
}
?>