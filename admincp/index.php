<?php
include ('header.php');
include ("../webroot.php");
$mod = varGetPost('mod');
$db = new Models_MWebsite;
$row = $db->getOneWebsite(1);
define("DONGDAU",$row['stamp']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Welcome to admin</title>
<link rel="shortcut icon" href="<?php echo ADMIN_PATH_IMG; ?>favication.png" type="image/x-icon" />
<meta http-equiv = "Content-Type" content = "text/html;charset=utf-8" />
<link rel = 'stylesheet' type = 'text/css' href = '<?php echo ADMIN_PATH_CSS; ?>style.css'/>
<link rel = 'stylesheet' type = 'text/css' href = '<?php echo ADMIN_PATH_CSS; ?>main.css'/>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>ajax.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>checkdata.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>warning.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>ajaxcontent.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>ajax_ticlock.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>hideshow.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>ajaxdelfile.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>number.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>nicEdit-latest.js'></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>datepicker/WdatePicker.js'></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>public/ck/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>public/ck/ckfinder/ckfinder.js"></script>
<script language = 'javascript' src = '<?php echo ADMIN_PATH_JS; ?>jquery-1.4.2.min.js'></script>
<script language="javascript" type="text/javascript">
function thongbao(info)
{
	cf=confirm(info);
	if (cf)
		return true;
	return false;
}
</script>
   
</head>
<body>
<div class="header">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td align="left" width="50%"> </td>
    <td align="right" width="50%" valign="middle">
    <div class="personal"> Chào bạn,
    <a href="<?=BASE_URL_ADMIN ?>user/list"><?=$_SESSION['user_log'] ?></a> | <a href="<?=BASE_URL_ADMIN ?>logout.php"> Thoát</a>
    </div> 
    </td>
</tr>
</table>
</div>
<div class="container">
<div class="wrapper_adminmenu">
     <div class="menuitem-home">
     <a href="<?=BASE_URL_ADMIN ?>" title="Trang chủ">
    	<img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-home.png">
     </a>
     </div>
     
     <a href="<?=BASE_URL_ADMIN ?>website/edit/1">
        <div class="menuitem">Hệ thống</div>
     </a>

     <a href="<?=BASE_URL_ADMIN ?>product/list">
        <div class="menuitem">Chuyên Mục Website</div>
     </a>
     
     <a href="<?=BASE_URL_ADMIN ?>works/list">
        <div class="menuitem">Chuyên Mục Seo</div>
     </a>
     
  	 <a href="<?=BASE_URL_ADMIN;?>news/list">
        <div class="menuitem">Chuyên Mục Nhiếp Ảnh</div>
     </a>
     
     <a href="<?=BASE_URL_ADMIN;?>comment/list">
        <div class="menuitem">Chuyên Mục Bài Viết</div>
     </a>
     
</div>
<?php include("main.php"); ?>
</div><!-------------------end container------------->
</body>
</html>

<?php ob_end_flush();?>