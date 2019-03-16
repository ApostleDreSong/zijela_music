$('#forgotPassword').click(function(){
		$('#showTokenBtn').show();
	}
);


$("#showTokenBtn").click(function(){
	$.post("../apis/token-api.php",
	{
		userEmail: $("#emailLogIn").val(),
	},
	function(data, status){
		$("#tokenDiv").show();
		$("#passwordDiv").hide();
		$("#forgotPassword").hide();
		
		$('#emailDiv').hide();
	});
});

$("#token").keyup(function(){
	$.post("../apis/confirmtoken-api.php",
		{
		token: $("#token").val(),
		},
		function(data, status){
			if (data=='correct'){
			   $("#showTokenBtn").hide();
			   $("#forgotPassword").hide();
			   $("#tokenDiv").hide();

			   $("#newPassword").show();
			   $("#repeatNewPassword").show();
			   $('#submitNewLogIn').show();
			   
			   $('#emailDiv').hide();
			}
	
		}	
	);
});

$('#repeatNewPasswordLogIn').keyup(function(){
		confirmPassword();
	}
);
$('#newPasswordLogIn').keyup(function(){
		confirmPassword();
	}
);

function confirmPassword(){
		if ($('#repeatNewPasswordLogIn').val()==$('#newPasswordLogIn').val()){
			$('#repeatNewPasswordCheckLogIn').html('Good to go! good to go! good to go!');
			$('#submitNewPassword').show();
		}else{
			$('#repeatNewPasswordCheckLogIn').html('Both password and repeat password must be the same');
			$('#submitNewPassword').hide();
		}	
	}

$("#submitNewPassword").click(function(){
	event.preventDefault();
	$.post("../apis/update-password-api.php",
		{
		newPassword: $("#newPasswordLogIn").val(),
		emailLogIn: $("#emailLogIn").val(),
		},
		function(data, status){
			if (data=='updated'){
				window.location.href='../dashboard.php';
			}
	
		}	
	);
});


