<?php
session_start();

if(isset($_POST['submit'])) {
    if($_POST['security_code'] == $_SESSION['code']) {
        $accept = "oh yeah, you typed it correctly. Good Job!";
    } else {
        $error = 'Please make sure you type it right, dumb ass.';
    }
}

?>

<?php if(!empty($error)) echo '<div>'.$error.'</div>';   ?>
<?php if(!empty($accept)) echo '<div>'.$accept. '</div>'; ?> 

<form action="" method="post">
    <input type="text" name="security_code" /> <br /> <br />
    <img src="captcha.php" alt="captcha" /><br /> <br />
    <input type="submit" name="submit" value="submit" />
</form>