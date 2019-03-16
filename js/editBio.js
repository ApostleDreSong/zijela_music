$('form#editBioForm').submit(
	function(e){
		e.preventDefault();
		var formFields = new FormData(this);
		$.ajax({
			url: 'apis/edit-bio-update-api.php',
			type: 'POST',
			data: formFields,
			success: function (data) {
				alert('Bio successfully updated');
				$('#resetEditBioSubmit').click();
			},
			cache: false,
			contentType: false,
			processData: false
		});
		
	}  
  );