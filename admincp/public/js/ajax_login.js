function login() {
	//document.getElementById('login_response').style.display = "block";
	document.getElementById('login_response').innerHTML = "<img src = '../template/loading.gif' />"
	var email = encodeURI(document.getElementById('email').value);
	var pass = encodeURI(document.getElementById('pass').value);
	var user = encodeURI(document.getElementById('user').value);
	nocache = Math.random();
	http.open('post', 'checklogin.php?nocache='+nocache,true);
	http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded;charset=UTF-8;');
	http.onreadystatechange = loginReply;
	http.send('email='+email+'&pass='+pass+'&user='+user);
}
function loginReply() {
	if(http.readyState == 4 && http.status == 200){
		var response = http.responseText;
		if(response == 0){
			document.getElementById('login_response').style.display = "block";
			document.getElementById('login_response').innerHTML = 'Login failed! Verify user and password';
		} else {
			//document.getElementById('login_response').style.display = "block";
			//document.getElementById('login_response').innerHTML = 'Welcome'+response;
			document.location="index.php";
		}
	}
}