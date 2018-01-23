function validateForm(){
var rege=/^[a-zA-Z\s]+$/;
var sum=document.form1.name.value;
if(sum==""){
alert("pls enter your name!");
document.form1.name.focus();
return false;
}
if(!rege.test(sum)){
alert("please enter valid name!");
document.form1.name.focus();
return false;
}
return true;
}