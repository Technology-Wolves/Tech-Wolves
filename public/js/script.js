let showStatus = false;

function showMenu(){
    let line1 = document.querySelector(".line-1");
    let line2 = document.querySelector(".line-2");
    let line3 = document.querySelector(".line-3");
    let menus = document.querySelector(".nav-lists");

    if(showStatus === false){
        line1.style.transform = "translate(0px, 12px) rotateZ(45deg)";
        line2.style.opacity = "0";
        line3.style.transform = "translate(0px, -6px) rotateZ(-45deg)";
        menus.style.top = "0%";
        showStatus = true;
    }else{
        line1.style.transform = "translate(0px, 0px) rotateZ(0deg)";
        line2.style.opacity = "1";
        line3.style.transform = "translate(0px, 0px) rotateZ(0deg)";
        menus.style.top = "-100%";
        showStatus = false;
    }
}
// Subscribe Us Begins
function subscribeValidation(){
    var arrValue = document.getElementsByClassName("email");
    var insertedEmail = arrValue[0].value;
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(insertedEmail))
    {
        alert("Email address format invalid!");
        return false;
    }
}
// Subscribe Us Ends

// Registration Validation Begins
function registrationValidation()
{
    // Name Validation
    var arrName = document.getElementsByClassName("name");
    var number = document.getElementsByClassName("telephone");
    var insertedName = arrName[0].value;
    var insertedTelephone = number[0].value;
    if (!/^[a-z A-Z]*$/g.test(insertedName))
    {
        alert("Only Alphanets Allowed in Name!");
        return (false);
    }
    if (insertedTelephone.length < 10){
        alert("Phone Number should contain 10 digits!");
        return false;
    }
}
// Registration Validation Ends

// Login Validation Begins
function loginValidation()
{
    var email = document.forms["loginValidationForm"]["email"].value;
    var password = document.forms["loginValidationForm"]["password"].value;
    if (email === "")
    {
        alert("Please enter email!!!");
        return false;
    }
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.loginValidationForm.email.value))
    {
        alert("Email address format invalid!");
        return false;
    }
    if(password === ""){
        alert("Please enter password!!!");
        return false;
    }
}
// Login Validation Ends

// Contafct Form Validation begins
function contactValidation(){

    // Name Validation
    var arrName = document.getElementsByClassName("name");
    var insertedName = arrName[0].value;
    if (!/^[a-z A-Z]*$/g.test(insertedName))
    {
        alert("Only Alphanets Allowed in Name!");
        return (false);
    }
}

// Contact validation ends
