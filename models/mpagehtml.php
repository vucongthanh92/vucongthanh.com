<?php

class Models_MPageHtml extends Project{	function __construct(){		parent:: __construct();	}		
//lay thong tin du lieu tu id	
function getpagehtmlid($id){		$this->where('Id = '.$id);		$this->getdata(TBL_PAGEHTML);		return $this->fetchone();	}	}?>