
function checkDelete(waring) {
    if (confirm(waring)) rowsForm.submit();
}

function confirmSave(waring,link) {
    if (confirm(waring));
	document.getElementById("rowsForm").action = link;
	document.getElementById("rowsForm").submit();
}

function confirmDelete(mess,chk)
{
	var dem=0;
	for(var i =0; i < chk.length; i++)
	{
		if(chk[i].checked==true)
		{
			dem++;
		}
	}
	if(dem ==  0)
	{
		alert("Bạn chưa chọn dữ liệu");
	}
	else
	{
		cf = confirm(mess);
		if(cf)
		{
			document.rowsForm.submit();
			return true;
		}
	}
}

