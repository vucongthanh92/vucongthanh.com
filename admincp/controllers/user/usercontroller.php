<?php

$act = $_GET['act'];switch($act){	
case "add": 		include ("controllers/user/add.php"); break;	
case "del":		include ("controllers/user/del.php"); break;	
case "edit":		include ("controllers/user/edit.php"); break;	
default:		include ("controllers/user/list.php"); break;}?>