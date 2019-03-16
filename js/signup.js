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

/** THIS 
		IS
			TOTALLY 
					SAME
						THING
							AS PER
									CREATOR
											BUT FOR FANS
	I
		WISH
			I
				KNEW
				
					HOW TO CREATE
						JAVASCRIPT
									CLA S S ES
														**/
														
							
							
							
var disableFanSubmit = true;
var submitNewFan = document.getElementById("submitNewFan");

var userNameFan = document.getElementById('userNameFan');
userNameFan.addEventListener('keyup', checkFanUsername);
function checkFanUsername(){

    var xhttp  = new XMLHttpRequest();
    xhttp .onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var getIt = JSON.parse(this.responseText);

            if (getIt.available===false){
                disableFanSubmit=true;
                document.getElementById("userNameCheckFan").innerHTML='This username has already been chosen by someone else.Please try another. Remember, no special characters like (\' or \;)';               
                enableFanSubmitButton();
            }else{
                disableFanSubmit=false;
                document.getElementById("userNameCheckFan").innerHTML='Your username is good to go!';
                enableFanSubmitButton();
            }
        }
    };
    xhttp.open("GET", `/apis/username-api.php?checkUserName=${userNameFan.value}`, true);
    xhttp.send();
}

var repeatPasswordFan = document.getElementById('repeatPasswordFan');
repeatPasswordFan.addEventListener('keyup', checkFanPassword);
function checkFanPassword(){
    var password = document.getElementById('passwordFan');
    var passwordMatchFan = document.getElementById('passwordCheckFan');
    if (password.value==repeatPasswordFan.value){
        passwordMatchFan.style.backgroundColor="green";
        passwordMatchFan.style.color="white";
        passwordMatchFan.innerHTML = 'Good to go! good to go! good to go!';
        disableFanSubmit=false;
        enableFanSubmitButton();
    }else{
        passwordMatchFan.style.backgroundColor="red";
        passwordMatchFan.style.color="white";
        passwordMatchFan.innerHTML = 'PASSWORDS DO NOT MATCH';
        disableFanSubmit=true;
        enableFanSubmitButton();
    }
}


var emailFan = document.getElementById('emailFan');
emailFan.addEventListener('keyup', checkFanEmail);
function checkFanEmail(){
    var emailFanValue = emailFan.value;
        var xhttp  = new XMLHttpRequest();
        xhttp .onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var getIt = JSON.parse(this.responseText);
                if (getIt.available===false){
                    disableFanSubmit=true;
                    document.getElementById("emailCheckFan").innerHTML='We already have this email in our database. If this is your email, please click here to <a href="/login.php">login';
                    enableFanSubmitButton();
                }else{
                    disableFanSubmit=false;
                    document.getElementById("emailCheckFan").innerHTML='Your email is good to go!';
                    enableFanSubmitButton();
                }
            }
        };
    xhttp.open("GET", `/apis/login-email-api.php?checkEmail=${emailFanValue}`, true);
    xhttp.send();
}

enableFanSubmitButton();

function enableFanSubmitButton(){
    if (disableFanSubmit===false){
        submitNewFan.disabled=false;
    }else{
        submitNewFan.disabled=true;
    }
}