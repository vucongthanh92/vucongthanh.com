<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
include('../libraries/session.php');
$session_user = new session();

include ('../libraries/class_db.php');
//include ('../config/config.php');
include ('../config/config_site.php');
include ('../libraries/project.php');
include ('../libraries/controls.php');
include ('models/muser.php');
unset($message);
if(isset($_POST['user'])){
	$data = array(
		'Username ='	=> $_POST['user'],
		'Password ='	=> md5(md5($_POST['pass'])),
		'Email ='		=> $_POST['email'],
	);
	
	$muser = new Models_Muser;
	$check = $muser->checklogin($data);
	if($check != 0)
	{
		$session_user->set_var('user_log',$check['user']);
		$session_user->set_var('level',$check['level']);
		redirect(BASE_URL_ADMIN);
	}
	else {
		$message = "Tài khoản hoặc mật khẩu không chính xác";
	}
	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link  href="<?php echo ADMIN_PATH_IMG."icon-web.png"; ?>" rel="shortcut icon" type="images/png" />
<title>Administrator</title>
</head>

<body>
<style>
body{
	/*background-color:#002255;*/
	background-image:url(public/template/bg_image.png);
	background-repeat:repeat;
	
}
.container{
	width:420px;
	min-height:200px;
	border:3px solid #006699;
	background-color:#006699;
	margin:0 auto;
	margin-top:50px;
	font-family: 'Lucida Grande',verdana,arial,helvetica,sans-serif;
	font-size:12px;
	color:#333;
	
	-moz-border-radius: 8px; 
	-webkit-border-radius: 8px;
	border-radius:8px;
	
	overflow:hidden;
}
.title{
	font-family: 'Lucida Grande',verdana,arial,helvetica,sans-serif;
	font-size:16px;
	font-weight:bold;
	color:#fff;
	height:25px;
	text-align:center;
	padding-top: 3px;
	padding-bottom:0px;
}
.table{
	width:99%;
	height:180px;
	background-color:#efefef;
	border:1px solid #004c72;
	padding-top:10px;
	
	-moz-border-radius: 5px; 
	-webkit-border-radius: 5px;
	border-radius:5px;
	margin:0 auto;

}
.message{
	width:100%;
	height:20px;
	padding-top:3px;
	background-color:#FFE8E8;
	border-top:1px solid #f00;
	border-bottom:1px solid #f00;
	font-family: 'Lucida Grande',verdana,arial,helvetica,sans-serif;
	font-size:12px;
	font-weight:bold;
	color:#e00;
}
select{
	font-family: 'Lucida Grande',verdana,arial,helvetica,sans-serif;
	background-color:#f8f8f8;
	border:1px solid #bbb;
	border-collapse:collapse;
	padding:3px;
}

</style>

<div class="container">
    <div class="title">
        Login Screen
    </div>
    <div class="table">
		<form action = '' method = 'post'>
        <table width="98%" border="0" cellspacing="0" cellpadding="3" style="margin:0 auto;">
        
          <?php 
            //$message = "mesage";
			 echo "<tr><td colspan='3' align='center' height='25'> &nbsp;";
            if ( isset($message))
            {

                echo "<div class='message'>". $message . "</div>";
               
            }
            echo "<td></tr>";
          ?>
          <tr>
            <td rowspan="4" align="center">
                <img src="<?php echo ADMIN_PATH_IMG.'icon-login.png';?>" /> 
            </td>
      
            <td align="right">Username</td>
            <td><input type = 'text' name = 'user' id = 'user' style="width:99%" ></td>
          </tr>
          
          <tr>
            <td align="right">Email</td>
            <td><input type = 'text' name = 'email' id = 'email' style="width:99%"></td>
          </tr>
           <tr>
            <td align="right" >Password</td>
            <td><input type = 'password' name = 'pass' id = 'pass' style="width:99%"></td>
          </tr>
          <tr>
            <td>&nbsp;  </td>
            <td><input type="submit" name="submit" value="Sign in" id="submit" class="button" /></td>
          </tr>
        </table>
        </form>
    </div>
</div>

</body>
</html>