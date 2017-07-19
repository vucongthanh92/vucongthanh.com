<?php

$mcatnews = new Models_MLevel;

$data = $mcatnews->listdata();

loadview("level/list_view",$data);

?>