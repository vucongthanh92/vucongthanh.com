<?php
function __autoload($name)
{
	$name=strtolower(str_replace("_","/",$name));
	require("$name.php");
}

function redirect($url)
{
	ob_end_clean();
	header("location:$url");
	exit();
}

function loadview($name,$data="")
{	
	global $config_lang;
	require("views/$name.php");
}	

?>