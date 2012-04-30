function getXMLHTTP()
{
	var xmlhttp=null;
	try {
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)
		{
			try {
					xmlhttp=new ActiveXobject("Microsoft.XMLHTTP");
				}
				catch(e)
				{
					try {
							xmlhttp=new ActiveXObject("msxml2.XMLHTTP");
						}
						catch(e1)
						{
							xmlhttp=false;
						}
				}
		}
		return xmlhttp;
}
//alert(indusId);
var req=getXMLHTTP();
function getcategory(id,action) {
	//--
var strurl="getCat.php?catID="+id+"&actntype="+action;
//alert(strurl);
var req=getXMLHTTP();
if(req==null)
{
alert("browser error");
}
if(req)
{
	req.onreadystatechange=function() {
	if(req.readyState ==4 || req.readyState=="complete") {
	if(action=='section')
	{
	var test = document.getElementById("category").innerHTML=req.responseText;
	}
	if(action=='subcategory')
	{
	var test = document.getElementById("subcategory").innerHTML=req.responseText;
	}
	if(action=='products')
	{
	var test = document.getElementById("products").innerHTML=req.responseText;
	}
	//alert(test);
	}
	}
	req.open("GET",strurl,true);
	req.send(null);
}
}
