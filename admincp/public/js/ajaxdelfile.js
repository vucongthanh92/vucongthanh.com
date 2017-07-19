function delFile(table,colum,id,value,iddiv,base_url)
{
	document.getElementById(iddiv).innerHTML = "<img src = '"+base_url+"public/template/load.gif'>";
	http.open("get",base_url+"delfile.php?table="+table+"&colum="+colum+"&id="+id+"&value="+value,true);
	http.onreadystatechange=function(){
			if(http.readyState == 4 && http.status == 200){
				var kq = http.responseText; 
				if(kq == 0){
					document.getElementById(iddiv).innerHTML = "Error";
				}else{
					document.getElementById(iddiv).innerHTML = kq;
				}
			}
		};
	http.send("null");
}	

function delFlash(table,colum,id,value,iddiv,base_url)
{
	document.getElementById(iddiv).innerHTML = "<img src = '"+base_url+"public/template/load.gif'>";
	http.open("get",base_url+"delflash.php?table="+table+"&colum="+colum+"&id="+id+"&value="+value,true);
	http.onreadystatechange=function(){
			if(http.readyState == 4 && http.status == 200){
				var kq = http.responseText; 
				if(kq == 0){
					document.getElementById(iddiv).innerHTML = "Error";
				}else{
					document.getElementById(iddiv).innerHTML = kq;
				}
			}
		};
	http.send("null");
}	