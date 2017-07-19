<?php

$db = new Models_MProduct;
$pg = new Paging;
//cat
$mcat = new Models_MCatelog;
$data['cat'] = $mcat->listdata();
$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);

if(isset($_GET['id']) && isset($_GET['tukhoa'])  )
{
	$idcat = varGetPost("id");
	$tukhoa = varGetPost("tukhoa");
	$type = varGetPost("type");
	$iduser = varGetPost("iduser");
	$ticlock = varGetPost("ticlock");
	$admin = varGetPost("admin");
	if($tukhoa=='') 
	{
		$where = "(idcat = ".$idcat." OR 0 = '$idcat')  ";
		$link = BASE_URL_ADMIN."index.php?mod=product&act=list&id=".$idcat."&ticlock=".$ticlock."&type=".$type."&iduser=".$iduser."&tukhoa=&p=";
		$data['idcat'] = $idcat;
		$p = str_replace('/p','',isset($_GET['p'])?varGetPost('p'):0);
	} 
	else 
	{
		$where = "(idcat = '".$idcat."' OR 0 = '$idcat') AND title_vn like '%".$tukhoa."%'";
		$link = BASE_URL_ADMIN."index.php?mod=product&act=list&admin=".$admin."&id=".$idcat."&type=".$type."&ticlock=".$ticlock."&iduser=".$iduser."&tukhoa=".$tukhoa."&ticlock=".$ticlock."&p=";
		$data['idcat'] = $idcat;
		$p = str_replace('/p','',isset($_GET['p'])?varGetPost('p'):0);
		$data['tukhoa'] = $tukhoa;
	}
}elseif($_GET['id']>0){
	$idcat = varGetPost("id");
	$where = "(idcat in (".$idcat.") OR 0 = '$idcat')"; 
	$data['idcat'] = $idcat;
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$link = BASE_URL_ADMIN."product/list/".$idcat;
	
}else{
	$where = 'ticlock = "0"';
	$link = BASE_URL_ADMIN."product/list";
	$data['idcat'] = 0;
}
//paging
if(isset($_POST['sort'])){
	if($_POST['sort']=='desc'){
		$_SESSION['sort'] = $_POST['sort'];
		$order = "Id desc";
	}elseif($_POST['sort']=='asc'){
		$_SESSION['sort'] = $_POST['sort'];
		$order = "Id asc";
	}elseif($_POST['sort']=='view'){
		$_SESSION['sort'] = $_POST['sort'];
		$order = "view desc,Id desc";
	}
}elseif($_SESSION['sort']!=""){
	if($_SESSION['sort']=='desc'){
		$_SESSION['sort'] = $_SESSION['sort'];
		$order = "Id desc";
	}elseif($_SESSION['sort']=='asc'){
		$_SESSION['sort'] = $_SESSION['sort'];
		$order = "Id asc";
	}elseif($_SESSION['sort']=='view'){
		$_SESSION['sort'] = $_SESSION['sort'];
		$order = "view desc,Id desc";
	}
}else{
	$order = 'sort ASC, Id desc';
}
$numrow = 50;
$div = 30;
$total = $db->countdata($where);
$start = $p * $numrow;

$data['info'] = $db->listdata2($where,$start,$numrow,$order);

$data['page']=$pg->divPage($total,$p,$div,$numrow,$link);
$data['total'] = $total;

loadview("product/list_view",$data);

?>