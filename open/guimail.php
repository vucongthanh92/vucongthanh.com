<?php
require("../phpmailer/class.phpmailer.php");
include ("../libraries/class_db.php");
include ("../config/config.php");
include ("../config/config_site.php");
include ("../config/title_page.php");
include ("../libraries/functions.php");
include ("../libraries/controls.php");
$name = varPost('name');
$email = varPost('email');
$custom_Phone = varPost('custom_Phone');
if($name ==""){
	echo "<script>alert('Nhập họ tên');</script>";
	die;
}
if($email ==""){
	echo "<script>alert('Nhập email');</script>";
	die;
}
if(isValidEmail($email) ==false){
	echo "<script>alert('Email không đúng định dạng');</script>";
	die;
}
if($custom_Phone==""){
	echo "<script>alert('Nhập số điện thoại');</script>";
	die;
}
$noidung .= "<p>Đăng ký nhận quà tặng AZDECOR </p>";
$noidung .= "Họ tên: ".$name." <br />";
$noidung .= "Email: ".$email." <br />";
$noidung .= "Số điện thoại: ".$custom_Phone." <br />";
$tieude = "Đăng ký nhận quà tặng";
$to=$title['emaillienhe_vn'];
smtpmailer($email,$to,$name,$tieude,$noidung);
echo '<script>alert("Đăng ký quà tặng thành công !")</script>';
die;
?>