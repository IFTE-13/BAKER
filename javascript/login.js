function usernameValidation(){
    var username = document.getElementById("username").value;
    if(username == ""){
        document.getElementById("usernametext").innerHTML="username cannot be empty";
    }
    else{
        document.getElementById("usernametext").innerHTML="";
    }
}

function passwordValidation(){
    var password = document.getElementById("password").value;
    if(password == ""){
        document.getElementById("passwordtext").innerHTML="password cannot be empty";
        return false;
    }
    else if(/^(?!.*\s)(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*().]).{8,}$/.test(document.getElementById('password').value)==false){
        document.getElementById("passwordtext").innerHTML="Please enter a valid password with one upper case one lower case and a special charecter";
        return false;
    }
    else{
        document.getElementById("passwordtext").innerHTML="";
    }
}

function loginValidation(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    
    if(username == ""){
        document.getElementById("usernametext").innerHTML="username cannot be empty";
    }
    else{
        document.getElementById("usernametext").innerHTML="";
    }

    if(password == ""){
        document.getElementById("passwordtext").innerHTML="password cannot be empty";
        return false;
    }
    else if(/^(?!.*\s)(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*().]).{8,}$/.test(document.getElementById('password').value)==false){
        document.getElementById("passwordtext").innerHTML="Please enter a valid password with one upper case one lower case and a special charecter";
        return false;
    }
    else{
        document.getElementById("passwordtext").innerHTML="";
    }
}