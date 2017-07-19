<?php
class Helpers_Validation{

	public $_report;
	public $_mess;
	
	public function check_empty($text,$loi){
	
		if($text == NULL)
		{
			$this->_mess[] = $loi;
		}
	}

	public function check_alpha($text,$loi)
	{
		if(!eregi("^[a-z]{1}[a-z0-9]{3,}$",$text))
		{
			$this->_mess[] = $loi;
		}
	}

	public function check_matches($text1,$text2,$loi){
		if($text1 != $text2)
		{
			$this->_mess[] = $loi;
		}
	}
	
	public function check_email($text)
	{
		if($text == "")
		{
			$this->_mess[] = ERROR_EMAIL_EMPTY;
		}
		elseif(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$",$text))
		{
			$this->_mess[] = ERROR_EMAIL_NOT_TRUE;
		}
	}
	
	public function check_pass($pass,$repass)
	{
		if($pass == "")
		{
			$this->_mess[] = ERROR_PASS_EMPTY;
		}
		elseif($pass != $repass)
		{
			$this->_mess[] = ERROR_PASS_NOT_MATCHES;
		}
	}

	public function valid(){
		if($this->_mess != "")
		{
			$this->_report=1;
		}
		else
		{
			$this->_report=0;
		}
		return $this->_report;
	}
	
	//kiem tra duoi file
	public function Extend($file){
		$ext = strtolower(substr(strrchr($img, '.'), 1));// lay duoi anh
		if($ext == "swf"){
			$this->_report = 1;
		}else if(is_array("gif","png","jpg")){
			$this->_report = 2;
		}else{
			$this->_report = 0;
		}
		return $this->_report;
	}
}

?>