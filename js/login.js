
$('.resetWrapper').hide();

$('#submitLogIn').hide();
var emailLogIn = document.getElementById('emailLogIn');
emailLogIn.addEventListener('change', checkLogInEmail);
function checkLogInEmail(){
        var xhttp  = new XMLHttpRequest();
        xhttp .onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var getIt = JSON.parse(this.responseText);
                if (getIt.available===false){
                    document.getElementById("emailCheckLogIn").innerHTML='We don\'t have this email in our database. <a href="/signup.php">Sign up</a> instead?';					 
					
					$("#passwordDiv").hide();
					$("#submitLogIn").hide();
                }else{
					document.getElementById("emailCheckLogIn").innerHTML="";
					if (!incorrectPW){
						$("#submitLogIn").show();
					}
					$("#passwordDiv").show();

                }
            }
        };
    xhttp.open("GET", `/apis/login-email-api.php?checkEmail=${emailLogIn.value}`, true);
    xhttp.send();
}

var incorrectPW;
var passwordLogin = document.getElementById('passwordLogIn');
passwordLogin.addEventListener('keyup', checkPasswordEmail);
function checkPasswordEmail(){
    var passwordLoginValue = passwordLogin.value;
	var params = `LoginPassword=${passwordLoginValue}&LoginEmail=${emailLogIn.value}`;
        var xhttp  = new XMLHttpRequest();
        xhttp .onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var getIt = JSON.parse(this.responseText);
                if (getIt.correct===false){
                    document.getElementById("passwordCheckLogIn").innerHTML='Incorrect password.Have you forgotten your password? Please click on forgot password button now?';
					$("#forgotPassword").show();
					$("#submitLogIn").hide();
					var incorrectPW=true;
                }else{
					document.getElementById("passwordCheckLogIn").innerHTML="";
					$("#forgotPassword").hide();
					$("#submitLogIn").show();
                }
            }
        };
    xhttp.open("POST", '/apis/login-password-api.php', true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
}
