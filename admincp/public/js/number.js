

//kiem tra nhap so
function FormatNumber(str){
    var strTemp = GetNumber(str);
    if(strTemp.length <= 3)
        return strTemp;
    strResult = "";
    for(var i =0; i< strTemp.length; i++)
        strTemp = strTemp.replace(".", "");
        strTemp = strTemp.replace(",", "");

    for(var i = strTemp.length; i>=0; i--)
    {
        if(strResult.length >0 && (strTemp.length - i -1) % 3 == 0)
            strResult = "." + strResult;
        strResult = strTemp.substring(i, i + 1) + strResult;
    }	
    return strResult;
}
function GetNumber(str)
{
    for(var i = 0; i < str.length; i++)
    {	
        var temp = str.substring(i, i + 1);		
        if(!(temp == "," || temp == "." || (temp >= 0 && temp <=9)))
        {
            alert("Giá chỉ được nhập vào là số từ 0-9");
            return str.substring(0, i);
        }
        if(temp == " ")
            return str.substring(0, i);
    }
    return str;
}

 function IsNumberInt(str)
{
    for(var i = 0; i < str.length; i++)
    {	
        var temp = str.substring(i, i + 1);		
        if(!(temp == "," || temp == "." || (temp >= 0 && temp <=9)))
        {
            alert("Giá chỉ được nhập vào là số từ 0-9");
            return str.substring(0, i);
        }
        if(temp == " " || temp == ",")
            return str.substring(0, i);
    }
    return str;
}

function Format_Price(strTemp)
{             
	strTemp        = strTemp.replace(/,/g, "");
	var priceTy    = parseInt(strTemp/1000000000,0)
	var priceTrieu = parseInt((strTemp % 1000000000)/1000000,0)
	var priceNgan  = parseInt(((strTemp % 1000000000))%1000000/1000,0)
	var priceDong  = parseInt(((strTemp % 1000000000))%1000000%1000,0)
	var strTextPrice = ""

	if(priceTy > 0 && parseInt(strTemp,0) > 900000000)
		strTextPrice = strTextPrice  + "<b>" + priceTy + "</b> Tỷ "
    if(priceTrieu > 0)
    	strTextPrice = strTextPrice  + "<b>" + priceTrieu + "</b> Triệu "
    if(priceNgan > 0)
    	strTextPrice = strTextPrice  + "</b>" + priceNgan + "</b> Ngàn "
    if(priceDong > 0)
    	strTextPrice = strTextPrice  + "<b>" + priceDong + "</b> Đồng "

    if(document.getElementById("currency").value == "VNĐ")
    {
        if(priceTy > 0 || priceTrieu > 0 || priceNgan > 0 || priceDong > 0)
            strTextPrice = strTextPrice  + "<b> VNĐ</b>"
    }


	if(document.getElementById("unit").value == "tổng diện tích")
	{
        strTextPrice = strTextPrice + "<b> / Tổng diện tích</b>";
	}
	if(document.getElementById("unit").value == "m2")
	{
        strTextPrice = strTextPrice + "<b> / m2</b>";
	}
    if(document.getElementById("unit").value == "tháng")
    {
        strTextPrice = strTextPrice + "<b> / Tháng</b>";
    }             
    document.getElementById("priceText").innerHTML = strTextPrice

	return strTextPrice;
}

