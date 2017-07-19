<?php

$db = new Models_Mflash();

$data['info'] = $db->listdata();

loadview("flash/list_view",$data);


?>