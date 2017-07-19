<?php
$act = $_GET['act'];

switch($act)
{
	case 'create_folder':		include('controllers/folder/createfolder.php');break;
	case 'upload':		include('controllers/folder/uploadimage.php');break;
	case 'delete_folder':		include('controllers/folder/deletefolder.php');break;
	case 'delete_image':		include('controllers/folder/deleteimage.php');break;
	case 'rename_folder':		include('controllers/folder/renamefolder.php');break;
	case 'rename_file':		include('controllers/folder/renamefile.php');break;
	default:		include('controllers/folder/list.php');break;
}
?>