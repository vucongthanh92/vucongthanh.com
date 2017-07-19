function CheckAll(chk)
{
	for (i = 0; i < chk.length; i++)
	chk[i].checked = true ;
	document.rowsForm.Check_ctr.checked =true;
}

function UnCheckAll(chk)
{
	for (i = 0; i < chk.length; i++)
	chk[i].checked = false ;
	document.rowsForm.Check_ctr.checked =false;
}

function Check(chk)
{
	if(document.rowsForm.Check_ctr.checked==true){
	for (i = 0; i < chk.length; i++)
	chk[i].checked = true ;
	}else{

	for (i = 0; i < chk.length; i++)
	chk[i].checked = false ;
	}
}