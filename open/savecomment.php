<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include ("../libraries/class_db.php");
include ("../config/config.php");
include ("../config/config_site.php");
include ("../config/title_page.php");
include ("../libraries/functions.php");
include ("../libraries/controls.php");
include ("../models/mcomment.php");
$mcomment =  new Models_MComment;
if(isset($_POST['content_admin'])){

	$content_admin = varPost('content_admin');
	if($content_admin==""){
		echo '<script>alert("Nhập nội dung bình luận ")</script>")';
		die;
	}
	$parentid = varPost('parentid');
	$datac = array(
	'content' =>$content_admin,
	'parentid' =>$parentid,
	'ticlock' =>0,
	'date' =>time(),
);
$mcomment ->addNew($datac);
echo '<script>alert("Trả lời thành công");top.location.reload();</script>';
}
if(isset($_POST['idsp'])){
	$content = varPost('noidung');
	///$tel = varPost('email');
	$email = varPost('email');
	$name = varPost('title');
	$idpro = varPost('idsp');
	$error = 0;
	if($name==""){
		$error = 1;
		echo '<script>alert("Vui lòng nhập tiêu đề")</script>")';
		die;
	}
	
	if($email=="" || isValidEmail($email)==false){
		$error = 1;
		echo '<script>alert("Email không hợp lệ ")</script>")';
		die;
	}
	if($content==""){
		$error = 1;
		echo '<script>alert("Nhập nội dung bình luận ")</script>")';
		die;
	}
	if($error==0){
		$datac = array(
			'content' =>$content, 
			'idpro' =>$idpro,
			'name' =>$name,
			'email' =>$email,
			//'tel' =>$tel,
			'ticlock' =>1,
			'date' =>time(),
		);
		$mcomment =  new Models_MComment;
		$mcomment ->addNew($datac);
		echo '<script>alert("Bạn đã gửi thành công. Chúng tôi sẽ hồi âm thời gian sớm nhất !"); top.location.reload();</script>';
	}

}
?>
