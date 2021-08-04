function isvalid()
{
    var flag = true;

    var categoryErr=document.getElementById("categoryErr");
    var toErr=document.getElementById("toErr");
    var amountErr=document.getElementById("amountErr");

    var category=document.forms["home"]["category"].value;
    var to=document.forms["home"]["to"].value;
    var amount=document.forms["home"]["amount"].value;

    categoryErr.innerHTML="";
    toErr.innerHTML="";
    amountErr.innerHTML="";

    if(category ==="")
    {
        categoryErr.innerHTML="* Categeory required.";
        flag=false;
    }
    if(to ==="")
    {
        toErr.innerHTML="* Phone number required.";
        flag=false;
    }
    if(amount ==="")
    {
        amountErr.innerHTML="* Amount required.";
        flag=false;
    }
    return flag;
}

function getHistory(transection)
{
    var xhttp= new XMLHttpRequest();
    xhttp.onload= function()
    {
        document.getElementById("result").innerHTML=this.responseText;
    }
    xhttp.open("GET",transection.action + "?category=" + transection.category.value, true)
    xhttp.send();

}