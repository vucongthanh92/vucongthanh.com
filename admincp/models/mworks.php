<?php

class Models_MWorks extends Project

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

	

		$this->getdata(TBL_WORKS,$order,"$start,$numrow");

		return $this->fetchall();

	}

	function listdata($where,$start,$numrow){

		if($where != ''){

			$this->where($where);

		}

	

		$this->getdata(TBL_WORKS,"Id DESC","$start,$numrow");

		return $this->fetchall();

	}

	/*

	 * insert id

	 */

	function CheckPro($url){

		$sql = "select Id from ".TBL_WORKS." where linkgoc='".$url."'";

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

		$this->getdata(TBL_WORKS);

		return $this->num_rows();

	}

	

	/*

	 * tic lock mot tin

	 */

	function ticlockactive($data,$id){

		$this->where('Id = '.$id);

		$this->update(TBL_WORKS,$data);	

	}

	

	/*

	 * them mot tin

	 */

	function addProduct($data){
		$this->insert(TBL_WORKS,$data);
		return mysql_insert_id();

	}

	

	/*

	 * lay thong tin mot tin

	 */

	function getOneProduct($id){

		$this->where("Id = $id");

		$this->getdata(TBL_WORKS);

		return $this->fetchone();

	}

	

	/*

	 * edit thong tin

	 */

	function editProduct($data,$id){

		$this->where("Id = $id");

		$this->update(TBL_WORKS,$data);

	}	

	

	/*

	 * delete nhieu dong

	 */

	function del_allcheck($data){

		foreach($data as $item)

		{

			$this->delete(TBL_WORKS,'Id = '.$item);

		}

	}

	

	

	function del_onecheck($id){

		$this->delete(TBL_WORKS,'Id = '.$id);

	}

	

	/*

	 * cap nhat sap xep thu tu (sort)

	 */

	function sortData($data){

		foreach($data as $key => $value){

			$this->where("Id = $key");

			$this->update(TBL_WORKS,"sort = $value");

		}

	}

	

	/*

	 * cap nhat giá

	 */

	function editPrice($data){

		foreach($data as $key => $value){

			$this->where("Id = $key");

			$value = (int)str_replace(".","",$value);

			$this->update(TBL_WORKS,"price = $value");

		}

	}

	/*

	 * cap nhat giá

	 */

	function editPrice2($data){

		foreach($data as $key => $value){

			$this->where("Id = $key");

			$value = (int)str_replace(".","",$value);

			$this->update(TBL_WORKS,"sale_price = $value");

		}

	}

	

	/*

	 * bat la tin moi

	 */

	function hideshow($data,$id){

		$this->where('Id = '.$id);

		$this->update(TBL_WORKS,$data);	

	}

	

	/*tic lock chu de*/

	function delFile($data,$id){

		$this->where('Id = '.$id);

		$this->update(TBL_WORKS,$data);	

	}

	

}

?>