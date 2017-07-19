function getcontent(name,idname) {
	//document.getElementById('login_response').style.display = "block";
	document.getElementById(idname).innerHTML = "<img src = 'public/template/loading.gif' />"
	nocache = Math.random();
	http.open("get","../getContent.php?nocache="+nocache+"&name="+name,true);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded;charset=UTF-8;");
	http.onreadystatechange = function(){
		if(http.readyState == 4 && http.status == 200)
		{
			var kq = http.responseText;
			document.getElementById(idname).innerHTML = kq;
		}
	}
	http.send('null');
}
