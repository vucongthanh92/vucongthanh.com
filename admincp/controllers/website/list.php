<?php

$db = new Models_Mcontact;

$data['info'] = $db->listdata();

loadview("contact/list_view",$data);


?>