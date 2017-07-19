<?php
class Paging
{
	function divPage($total = 0,$currentPage = 0,$div = 5,$rows = 10,$goto){
		if(!$total || !$rows || !$div || $total<=$rows) return false;
		
		$nPage = floor($total/$rows) + (($total%$rows)?1:0);
		$nDiv  = floor($nPage/$div) + (($nPage%$div)?1:0);
		$currentDiv = floor($currentPage/$div) ;
		$sPage = '';
		
		if($currentDiv) {
			$sPage .= '<a href="'.$goto.'/p0" class = \'apaging\'><<</a> ';
			$sPage .= '<a href="'.$goto.'/p'.($currentDiv*$div - 1).'"><</a> ';
		}
		
		$count =($nPage<=($currentDiv+1)*$div)?($nPage-$currentDiv*$div):$div;
		
		for($i=0;$i<$count;$i++){
			$page = ($currentDiv*$div + $i);
			$sPage .= '<a href="'.$goto.'/p'.($currentDiv*$div + $i ).'" '.(($page==$currentPage)?'class="current"':'').'>'.($page+1).'</a> ';
		}
		
		if($currentDiv < $nDiv - 1){			
			$sPage .= '<a href="'.$goto.'/p'.(($currentDiv+1)*$div + 1 ).'">></a> ';
			$sPage .= '<a href="'.$goto.'/p'.(($nDiv-1)*$div + 1 ).'">>></a>';
		}
		return $sPage;
	}
	function divPageViet($total = 0,$currentPage = 0,$div = 5,$rows = 10,$goto){
		if(!$total || !$rows || !$div || $total<=$rows) return false;
		
		$nPage = floor($total/$rows) + (($total%$rows)?1:0);
		$nDiv  = floor($nPage/$div) + (($nPage%$div)?1:0);
		$currentDiv = floor($currentPage/$div) ;
		$sPage = '';
		
		if($currentDiv) {
			$sPage .= '<a href="'.$goto.'" class = \'apaging\'><<</a> ';
			$sPage .= '<a href="'.$goto.'/trang-'.($currentDiv*$div - 1).'"><</a> ';
		}
		
		$count =($nPage<=($currentDiv+1)*$div)?($nPage-$currentDiv*$div):$div;
		
		for($i=0;$i<$count;$i++){
			$page = ($currentDiv*$div + $i);
			if($i==0){
				$sPage .= '<a href="'.$goto.'" '.(($page==$currentPage)?'class="current"':'').'>'.($page + 1).'</a> ';
			}else{
				$sPage .= '<a href="'.$goto.'/trang-'.($currentDiv*$div + $i ).'" '.(($page==$currentPage)?'class="current"':'').'>'.($page + 1).'</a> ';
			}
		}
		
		if($currentDiv < $nDiv - 1){			
			$sPage .= '<a href="'.$goto.'/trang-'.(($currentDiv+1)*$div + 1 ).'">></a> ';
			$sPage .= '<a href="'.$goto.'/trang-'.(($nDiv-1)*$div + 1 ).'">>></a>';
		}
		return $sPage;
	}
}
?>