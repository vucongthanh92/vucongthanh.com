<?php

$mpayment = new Models_MPayment;
$pg = new Paging;

$idcat = varGetPost("id");
$where = "status = '3'";
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
$numrow = 50;
$div = 15;

$total = $mpayment->countdata($where);
$start = $p * $numrow;

$data['info'] =  $mpayment->listCustomer($where,$start,$numrow);

$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."payment/xacnhan$link");
$data['total'] = $total;

loadview("payment/view_chuaxacnhan",$data);
?>