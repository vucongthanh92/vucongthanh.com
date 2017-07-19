<?php
$pg = new Paging;
$db = new Models_MThanhvien;
$numrow = 50;
$div = 30;
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
if(isset($_POST['tukhoa'])){
	$tukhoa = $_POST['tukhoa'];
	$where = "email like '%".$tukhoa."%'";
}
$total = $db->countdata($where);
$start = $p * $numrow;

$data['info'] = $db->listdata($where,$start,$numrow);

$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."thanhvien/list");
$data['total'] = $total;

$data['info'] = $db->listdata($where,$start,$numrow);


loadview("thanhvien/list_view",$data);


?>