z<?php

$mpayment = new Models_MPayment;
$pg = new Paging;
if(isset($_POST['id']) || isset($_GET['id']))
{
	$idcat = varGetPost("id");
	$where = "status = '$idcat' AND ";
	$link = "/$idcat";
}else{
	$where = '';
	$link = '';
}
$td = strtotime(date("Y-m-d"));
$where = $where." create_time >= '$td'";
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 50;
$div = 15;
$total = $mpayment->countdata($where);
$start = $p * $numrow;

$data['info'] =  $mpayment->listCustomer($where,$start,$numrow);

$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."payment/today$link");
$data['total'] = $total; 

loadview("payment/list_today",$data);
?>