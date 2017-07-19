<?php


$db = new Models_MCatimages;



$data['info'] = $db->listdata();



loadview("catimages/list_view",$data);





?>