<?php

class Models_MWorks extends Project

{

	function __construct(){

		parent::__construct();

	}

	function listdata($select = "",$where = "",$orderby = "",$limit = ""){

		if($select != "")

			$this->select($select);

		if($where != "")

			$this->where($where);

		

		$this->getdata(TBL_WORKS,$orderby,$limit);

		return $this->fetchall();

	}

	

	function countView($id){

		$this->where("Id = '".$id."'");

		$this->update(TBL_WORKS, "view = (view+1)");

	}

	function countOrder($id){

		$this->where("Id = '".$id."'");

		$this->update(TBL_WORKS, "oder = (oder+1)");

	}

	

	// lay id

	function getalias($id){

		$sql = 'select Id from '.TBL_WORKS.' where alias = "'.$id.'" limit 1';

		$kq = mysql_query($sql);

		$row = mysql_fetch_assoc($kq);

		return $row['Id'];

	}

	function CheckTitle($title,$iduser){

		$sql = 'select * from mn_product where iduser= "'.$iduser.'" AND title_vn ="'.$title.'"';

		$kq = mysql_query($sql) or die(mysql_error());

		return mysql_num_rows($kq);

	}

	/*

	 * them mot tin

	 */

	function addProduct($data){

		$this->insert(TBL_WORKS,$data);

		if($this->result == 1){

			return 1;

		}else{

			return 0;

		}

	}

	/*

	 * edit thong tin

	 */

	function editProduct($data,$id,$iduser){

		$this->where("Id = $id AND iduser = '$iduser'");

		$this->update(TBL_WORKS,$data);

	}	

	//lay tong so dong

	function countdata($where = ""){

		if($where != "")

			$this->where($where);

		$this->getdata(TBL_WORKS);

		return $this->num_rows();

	}

	

	//lay thong tin mot tin

	function getOneProduct($id){

		$this->where("Id = $id");

		$this->getdata(TBL_WORKS);

		return $this->fetchone();

	}

	//lay thong tin mot tin

	function getOneUserProduct($id,$iduser){

		$this->where("Id = $id AND iduser = '$iduser'");

		$this->getdata(TBL_WORKS);

		return $this->fetchone();

	}

	//liet ke du lieu 2 table

	function listTwoTable($table1, $table2, $select = '', $on, $where = '',$order = '', $limit = ''){

		if($select != ''){

			$this->select($select);

		}

		if($where != ''){

			$this->where($where);

		}

		$this->getLeftJoinData($table1, $table2, $on, $order, $limit);

		return $this->fetchall();

	}

	

	//dem so dong du lieu 2 table

	function numberTwoTable($table1, $table2, $on,$where = ''){

		if($where != ''){

			$this->where($where);

		}

		$this->getLeftJoinData($table1, $table2, $on);

		return $this->num_rows();

	}

	function seach($lang = "vn",$tukhoa='',$tugia = 0,$dengia = 0,$idcat = 0){

		echo $sql = " SELECT * FROM mn_product WHERE ticlock = '0' AND ( idcat = '$idcat' OR '$idcat' ='0') AND (price >= '$tugia' OR '$tugia' = '0') AND (price <= '$dengia' OR '$dengia' = '0') AND title_".$lang." like '%".$tukhoa."%' ";

		$kq = mysql_query($sql) or die(mysql_error());

		return $kq;

	} 

}

?>