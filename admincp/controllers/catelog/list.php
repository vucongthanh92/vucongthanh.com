<?php

$db = new Models_MCatelog;

$data['info'] = $db->listdata();

loadview("catelog/list_view",$data);


?>