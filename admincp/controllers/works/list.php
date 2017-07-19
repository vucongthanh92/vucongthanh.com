<?php
$db = new Models_MWorks;

$pg = new Paging;
//cat
$mcat = new Models_MCatworks;

$data['cat'] = $mcat->listdata();

$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);



if(isset($_GET['id']) && isset($_GET['tukhoa'])  )

{

	$idcat = varGetPost("id");

	$tukhoa = varGetPost("tukhoa");
	if($tukhoa=='') {

	

		$where = "(idcat = ".$idcat." OR 0 = '$idcat')  ";

		$link = BASE_URL_ADMIN."index.php?mod=works&act=list&id=".$idcat."&tukhoa=&p=";

		$data['idcat'] = $idcat;

		$p = str_replace('/p','',isset($_GET['p'])?varGetPost('p'):0);

	} else {
		$where = "(idcat = '".$idcat."' OR 0 = '$idcat') AND title_vn like '%".$tukhoa."%'";
		$link = BASE_URL_ADMIN."index.php?mod=works&act=list&id=".$idcat."&tukhoa=".$tukhoa."&p=";

		$data['idcat'] = $idcat;

		$p = str_replace('/p','',isset($_GET['p'])?varGetPost('p'):0);

		$data['tukhoa'] = $tukhoa;

	}

}elseif($_GET['id']>0){

	$idcat = varGetPost("id");

	$where = "(idcat in (".$idcat.") OR 0 = '$idcat')"; 

	$data['idcat'] = $idcat;

	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);

	$link = BASE_URL_ADMIN."works/list/".$idcat;

	

}else{

	$where = 'ticlock = "0"';

	$link = BASE_URL_ADMIN."works/list";

	$data['idcat'] = 0;

}

//paging


$order = 'sort ASC, Id desc';



$numrow = 50;

$div = 30;

$total = $db->countdata($where);

$start = $p * $numrow;



$data['info'] = $db->listdata2($where,$start,$numrow,$order);



$data['page']=$pg->divPage($total,$p,$div,$numrow,$link);

$data['total'] = $total;



loadview("works/list_view",$data);



?>