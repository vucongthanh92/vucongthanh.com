<?php

$mcatnews = new Models_MCatnews;

$data = $mcatnews->listdata();

loadview("catnews/list_view",$data);

?>