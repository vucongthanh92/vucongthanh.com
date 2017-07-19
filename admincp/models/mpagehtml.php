<?php

class Models_MPageHtml extends Project{	function __construct(){		parent:: __construct();	}		
/*	 * liet ke danh sach du lieu	 */	
 function listPagehtml(){		
 $this->select('Id,title_vn,ticlock');		
 $this->getdata(TBL_PAGEHTML,"Id ASC");		return $this->fetchall();	}	
 /*	 * them du lieu	 */	
  function addPagehtml($data){		
  $this->insert(TBL_PAGEHTML,$data);		if($this->result == 1){			return 1;		}else{			return 0;		}	}		/*	 * kich hoat or khoa tin	 */	function ticlockactive($data,$id){		$this->where('Id = '.$id);		$this->update(TBL_PAGEHTML,$data);			}		/*	 * lay thong tin du lieu tu id	 */	function getnewsid($id){		$this->where('Id = '.$id);		$this->getdata(TBL_PAGEHTML);		return $this->fetchone();	}			/*	 * cap nhat thong tin	 */	function editPagehtml($data,$id){		$this->where('Id = '.$id);		$this->update(TBL_PAGEHTML,$data);	}		/*	 * delete nhieu dong	 */	function del_allcheck($data){		foreach($data as $item)		{			$this->delete(TBL_PAGEHTML,'Id = '.$item);		}	}		/*	 * delete mot dong	 */	function del_onecheck($id){		$this->delete(TBL_PAGEHTML,'Id = '.$id);	}}?>