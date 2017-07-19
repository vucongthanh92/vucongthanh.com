<?php



$db = new Models_MCatworks;



$data['info'] = $db->listdata();



loadview("catworks/list_view",$data);





?>