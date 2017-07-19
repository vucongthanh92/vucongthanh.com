<?php

$db = new Models_MManufacturer;

$data = $db->listdata();

loadview("manufacturer/list_view",$data);

?>