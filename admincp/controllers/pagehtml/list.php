<?php

$mpagehtml = new Models_MPageHtml;

$data = $mpagehtml->listPagehtml();

loadview("pagehtml/list_view",$data);
?>