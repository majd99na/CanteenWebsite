function tokens_price(){
    if(isNaN(parseInt(document.getElementById("inputToken3").value))){
        document.getElementById("price").innerHTML="每两代币等于一元";
        
    }
    else{
    document.getElementById("price").innerHTML = parseInt(document.getElementById("inputToken3").value)/2 + "元";
    }

}
function showField() {
    if (document.getElementById('gridRadios2').checked) {
        document.getElementById('ShopNameInput').style.visibility = 'visible';
        document.getElementById('inputShop3').setAttribute("required","");
    }
    else{ 
    document.getElementById('ShopNameInput').style.visibility = 'hidden';
    document.getElementById('inputShop3').removeAttribute("required");
    }

}
function tokensShow(){
document.getElementById("tokensShow").style.visibility = "visible";
document.getElementById("editpwd").style.visibility = "hidden";
document.getElementById("edituser").style.visibility = "hidden";
}
function editpwdShow(){
document.getElementById("tokensShow").style.visibility = "hidden";
document.getElementById("edituser").style.visibility = "hidden";
document.getElementById("editpwd").style.visibility = "visible";
}
function editname(){
document.getElementById("tokensShow").style.visibility = "hidden";
document.getElementById("editpwd").style.visibility = "hidden";
document.getElementById("edituser").style.visibility = "visible";
}
