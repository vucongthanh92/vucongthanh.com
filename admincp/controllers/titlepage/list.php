<?php

if(isset($_POST['save'])){
	$facebook = trim($_POST['facebook']);
	$gplus = trim($_POST['gplus']);
	$twitter = trim($_POST['twitter']);
	$youtube = trim($_POST['youtube']);
	$linkedin = trim($_POST['linkedin']);
	$blogger = trim($_POST['blogger']);
	$hotline = trim($_POST['hotline']);
	$email_send	= trim($_POST['email_send']);
	$pass_send	= trim($_POST['pass_send']);
	$emaillienhevn= trim($_POST['emaillienhevn']);
	
$text = "<?php	
\$title['facebook']='".$facebook."';	
\$title['gplus']='".$gplus."';	
\$title['twitter']='".$twitter."';	
\$title['youtube']='".$youtube."';
\$title['linkedin']='".$linkedin."';
\$title['blogger']='".$blogger."';
\$title['hotline']='".$hotline."';
\$title['email_send']='".$email_send."';	
\$title['pass_send']='".$pass_send."';		
\$title['emaillienhe_vn']='".$emaillienhevn."';?>";	
 
$file = "../config/title_page.php";
if(file_exists($file))
{
   $fp = fopen($file, 'w');		
   fwrite($fp, $text);
   fclose($fp);	
}
}if(file_exists('../config/title_page.php')){	include '../config/title_page.php';}

loadview('titlepage/list',$title);
?>