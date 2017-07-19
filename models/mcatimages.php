<?php

class Models_MCatimages extends Project

{

	function __construct(){

		parent:: __construct();

	}	

	

	//liet ke danh sach du lieu

	function listdata($select = "",$where = "",$orderby = "",$limit = "")

	{

		if($select != "")

			$this->select($select);

		if($where != "")

			$this->where($where);

			

		$this->getdata(TBL_CATIMAGES,$orderby,$limit);

		return $this->fetchall();

	}

	/*

	 * lay tong so dong

	 */

	function countdata($where = ""){

		if($where != "")

			$this->where($where);

		$this->getdata(TBL_CATIMAGES);

		return $this->num_rows();

	}

	// lay id

	function getalias($id){

		$sql = 'select Id from '.TBL_CATIMAGES.' where alias = "'.$id.'" order by Id desc limit 1';

		$kq = mysql_query($sql);

		$row = mysql_fetch_assoc($kq);

		return $row['Id'];

	}

	function getaliasInc($id,$parent){

		$sql = 'select Id from '.TBL_CATIMAGES.' WHERE alias = "'.$id.'" AND parentid='.$parent.'  limit 1';

		$kq = mysql_query($sql);

		$row = mysql_fetch_assoc($kq);

		return $row['Id'];

	}

	function getinfoAlias($id){

		$sql = 'select * from '.TBL_CATIMAGES.' where alias = "'.$id.'" order by Id desc limit 1';

		$kq = mysql_query($sql);

		$row = mysql_fetch_assoc($kq);

		return $row;

	}

	

	//lay thong tin mot chu de

	function getOneCatelog($id)

	{

		$this->select('*');

		$this->where("Id = $id");

		$this->getdata(TBL_CATIMAGES);

		return $this->fetchone();

	}

	

	//lay tat ca cac id cua idgoc

	function getSubId($id)

	{

		$this->where("parentid = $id");

		$this->getdata(TBL_CATIMAGES);

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

		$this->getdata(TBL_CATIMAGES);

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