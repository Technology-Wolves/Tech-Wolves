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
    if (!/^[a-z A-Z]*$/g.test(document.registrationForm.fullName.value)) {
        alert("Only Alphabets Allowed in first name!");
        return false;
    }
    if (document.registrationForm.fullName.value === "") {
        alert("Enter Full Name!");
        return false;
    }
    if (document.registrationForm.email.value === "") {
        alert("Enter Email!");
        return false;
    }
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.registrationForm.email.value))
    {
        alert("Email address format invalid!");
        return false;
    }
    if (document.registrationForm.telephone.value === "") {
        alert("Enter telephone number!");
        return false;
    }

    if (!/^[0-9]*$/g.test(document.registrationForm.telephone.value)) {
        alert("Only numbers allowed in telephone!");
        return false;
    }
    if (document.registrationForm.telephone.value.length < 10 || document.registrationForm.telephone.value.length > 10){
        alert("Phone Number should contain 10 digits only!");
        return false;
    }
    if (document.registrationForm.address.value === "") {
        alert("Enter Address!");
        return false;
    }
    if (document.registrationForm.gender.value === ""){
        alert("Select Gender");
        return false;
    }
    if (document.registrationForm.password.value === "") {
        alert("Enter Password");
        return false;
    }
    if (document.registrationForm.confirm_password.value === "") {
        alert("Enter Confirm Password!");
        return false;
    }
    if(document.registrationForm.password.value !== document.registrationForm.confirm_password.value){
        alert("Confirm-Password Doesnot match!");
        return false;
    }
    if (document.registrationForm.registrationType.value === ""){
        alert("Select Registration Type");
        return false;
    }
    if (document.registrationForm.profileImage.value === ""){
        alert("Select Profile Image");
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
    if (insertedName == "")
    {
        alert("Enter Your Name!");
        return (false);
    }
    if (!/^[a-z A-Z]*$/g.test(insertedName))
    {
        alert("Only Alphanets Allowed in Name!");
        return (false);
    }

    // Email
    var arrEmail = document.getElementsByClassName("email");
    var insertedEmail = arrEmail[0].value;
    if (insertedEmail == "")
    {
        alert("Enter Your Email!");
        return (false);
    }
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(insertedEmail))
    {
        alert("Email address format invalid!");
        return (false);
    }

    // Subject
    var arrSubject = document.getElementsByClassName("subject");
    var insertedSubject = arrSubject[0].value;
    if (insertedSubject == "")
    {
        alert("Enter your subject!");
        return (false);
    }
    if (!/^[a-z A-Z]*$/g.test(insertedSubject))
    {
        alert("Subject should only contain alphabets!");
        return (false);
    }

    // Message
    var arrMessage = document.getElementsByClassName("message");
    var insertedMessage = arrMessage[0].value;
    if (insertedMessage == "")
    {
        alert("Enter your Message!");
        return (false);
    }
}

// Contact validation ends
