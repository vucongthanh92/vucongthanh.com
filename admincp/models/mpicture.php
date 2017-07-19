<?php

class Models_MPicture extends Project

{

	function __construct(){

		parent::__construct();

	}

	

	/*

	 * liet ke danh sach du lieu

	 */

	function listdata($where = "",$start,$numrow){

		if($where != "")

			$this->where($where);	

		$this->getdata(TBL_PICTURE,"sort ASc, Id DESc","$start,$numrow");

		$row = $this->num_rows();

		return $this->fetchall();

	}

	

	/*

	 * lay tong so dong

	 */

	function countdata($where = ""){

		if($where != "")

			$this->where($where);

		$this->getdata(TBL_PICTURE);

		return $this->num_rows();

	}

	

	/*

	 * them mot tin

	 */

	function addNew($data){

		$this->insert(TBL_PICTURE,$data);

		if($this->result == 1){

			return 1;

		}else{

			return 0;

		}

	}

	/*tic lock chu de*/

	function delFile($data,$id){

		$this->where('Id = '.$id);

		$this->update(TBL_PICTURE,$data);	

	}

	/*

	 * lay thong tin mot tin

	 */

	function getOneNews($id){

		$this->where("Id = $id");

		$this->getdata(TBL_PICTURE);

		return $this->fetchone();

	}

	

	/*

	 * edit thong tin

	 */

	function editNews($data,$id){

		$this->where("Id = $id");

		$this->update(TBL_PICTURE,$data);

	}	

	

	/*

	 * delete nhieu dong

	 */

	function del_allcheck($data){

		foreach($data as $item)

		{

			$this->delete(TBL_PICTURE,'Id = '.$item);

		}

	}

	function ticlockactive($data,$id){

		$this->where('Id = '.$id);

		$this->update(TBL_PICTURE,$data);	

	}

	/*

	 * delete mot dong

	 */

	function del_onecheck($id){

		$this->delete(TBL_PICTURE,'Id = '.$id);

	}

	

	/*

	 * cap nhat sap xep thu tu (sort)

	 */

	function sortData($data){
		if(!empty($data)){
		foreach($data as $key => $value){

			$this->where("Id = $key");

			$this->update(TBL_PICTURE,"sort = $value");

		}
		}

	}

}

?>