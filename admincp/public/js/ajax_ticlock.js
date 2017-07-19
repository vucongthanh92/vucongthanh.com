function ticlockactive(table,colum,id,value,base_url)
{
	document.getElementById(id).innerHTML = "<img src = '"+base_url+"public/template/load.gif'>";
	http.open("get",base_url+"lock.php?table="+table+"&colum="+colum+"&id="+id+"&value="+value,true);
	http.onreadystatechange=function(){
			if(http.readyState == 4 && http.status == 200){
				var kq = http.responseText;
				if(kq == 0){
					document.getElementById(id).innerHTML = "Error";
				}else{
					document.getElementById(id).innerHTML = kq;
				}
			}
		};
	http.send("null");
}	