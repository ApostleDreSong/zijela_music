$('#songFileDashBoard').on('change', function() {
    var file = this.files[0],
        val = $(this).val().trim().toLowerCase();
    if (!file || $(this).val() === "") { return; }
    
    var fileSize = file.size / 1024 / 1024,
        regex = new RegExp("(.*?)\.(mp3|MP3)$"),
        errors = [];
    
    if (fileSize > 10) {
      errors.push("Please check the size of your song. It must not be greater than 10 MB");
    }
    if (!(regex.test(val))) {
      errors.push('Only mp3 files are supported. Please check the format of your file and try again.');
    }
    if (errors.length > 0) {  
      $(this).val('');
      alert(errors.join('\r\n'));
    }
  });
  
   $('#albumCoverDashBoard').on('change', function() {
    var file = this.files[0],
        val = $(this).val().trim().toLowerCase();
    if (!file || $(this).val() === "") { return; }
    
    var fileSize = file.size / 1024 / 1024,
        regex = new RegExp("(.*?)\.(jpg|png|JPG|PNG)$"),
        errors = [];
    
    if (fileSize > 0.5) {
      errors.push("Please check the size of your album cover. It must not be greater than 500 kB");
    }
    if (!(regex.test(val))) {
      errors.push('Only jpg or png files are supported. Please check the format of your file and try again.');
    }
    if (errors.length > 0) {  
      $(this).val('');
      alert(errors.join('\r\n'));

    }
  });

  $('form#editSongForm').submit(
	function(e){
		e.preventDefault();
		var formFields = new FormData(this);
		$.ajax({
			url: 'apis/edit-song-update-api.php',
			type: 'POST',
			data: formFields,
			success: function (data) {
				alert('Song successfully updated');
				$('#resetEditSongSubmit').click();
			},
			cache: false,
			contentType: false,
			processData: false
		});
		
	}  
  );
 