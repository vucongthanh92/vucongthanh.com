<?php
$db = new Models_Muser;$data = $db->list_user();loadview("user/list_view",$data);
?>