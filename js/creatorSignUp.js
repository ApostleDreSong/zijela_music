var disableSubmit = true;
var submitNewMember = document.getElementById("submitNewMember");

var userName = document.getElementById('userNameCreator');
userName.addEventListener('keyup', checkUsername);
function checkUsername(){

    var xhttp  = new XMLHttpRequest();
    xhttp .onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var getIt = JSON.parse(this.responseText);

            if (getIt.available==false){
                disableSubmit=true;
                document.getElementById("userNameCheckCreator").innerHTML='This username has already been chosen by someone else.Please try another. Remember, no special characters like (\' or \;)';               
				enableSubmitButton();
            }else{
                disableSubmit=false;
                document.getElementById("userNameCheckCreator").innerHTML='Your username is good to go!';
                enableSubmitButton();
            }
        }
    };
    xhttp.open("GET", `/apis/username-api.php?checkUserName=${userName.value}`, true);
    xhttp.send();
}

var repeatPassword = document.getElementById('repeatPasswordCreator');
repeatPassword.addEventListener('keyup', checkPassword);
function checkPassword(){
    var password = document.getElementById('passwordCreator');
    var passwordMatch = document.getElementById('passwordCheckCreator');
    if (password.value==repeatPassword.value){
        passwordMatch.style.backgroundColor="green";
        passwordMatch.style.color="white";
        passwordMatch.innerHTML = 'Good to go! good to go! good to go!';
        disableSubmit=false;
        enableSubmitButton();
    }else{
        passwordMatch.style.backgroundColor="red";
        passwordMatch.style.color="white";
        passwordMatch.innerHTML = 'PASSWORDS DO NOT MATCH';
        disableSubmit=true;
        enableSubmitButton();
    }
}


var email = document.getElementById('emailCreator');
email.addEventListener('keyup', checkEmail);
function checkEmail(){
    var emailValue = email.value;
		var xhttp  = new XMLHttpRequest();
        xhttp .onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var getIt = JSON.parse(this.responseText);
				if (getIt.available===false){
					disableSubmit=true;
					document.getElementById("emailCheckCreator").innerHTML='We already have this email in our database. If this is your email, please click here to <a href="/login.php">login';
					enableSubmitButton();
				}else{
					disableSubmit=false;
					document.getElementById("emailCheckCreator").innerHTML='Your email is good to go!';
					enableSubmitButton();
				}
            }
        };
	xhttp.open("GET", `/apis/login-email-api.php?checkEmail=${emailValue}`, true);
    xhttp.send();
}

enableSubmitButton();

function enableSubmitButton(){
    if (disableSubmit===false){
        submitNewMember.disabled=false;
    }else{
        submitNewMember.disabled=true;
    }
}