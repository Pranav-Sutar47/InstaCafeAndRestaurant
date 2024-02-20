function valid(){
    var name=document.getElementById('name').value;
    var mobileNo=document.getElementById('mobileNumber').value;
    var email=document.getElementById('email').value;
    var icat=document.getElementById('icat').value;
    var flag=0;
    if(name=="" || isNaN(name))
    {
        alert("Please Enter Name !!!");
        flag=1;
        document.getElementById('name').value="";
        return false;
    }
    if(mobileNo.length>10 || mobileNo.length<10){
        alert("Provide Correct Mobile Number !!!");
        flag=1;
        document.getElementById('mobileNumber').value="";
        return false;
    }
    if(/^[A-Za-z0-9]+@[a-z0-9.-]+$/.test(email)){
        flag=0;
    }
    else{
        flag=1;
        alert("Enter valid Email Address !!!");
        document.getElementById('email').value="";
    }
    if(icat==""){
        flag=1;
        alert("Please Select Category !!!");
        return false;
    }
    if(flag==0)
    {
        return true;
        var form=document.getElementById('f1');
        form.onsubmit();
    }
}