<?php

class helpers_validation{

	public $_report;
	public $_mess;

	public function valid()
	{
		if($this->_mess == "")
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function check_empty($text,$error)
	{
		if($text == NULL)
		{
			$this->_mess[] = $error;
		}
	}
	
	public function check_email($text,$error)
	{
		if (!eregi("^[a-zA-Z]{1}[a-zA-Z0-9_.]+\@[a-zA-Z0-9_.\-]{2,}\.[a-zA-Z]{2,}$",$text))
		{
			$this->_mess[]= $error;
		}
	}

}

?>