
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

  var formSubmit = document.getElementById('addNewSongForm');
  formSubmit.addEventListener('submit',callVogue);
  
  function callVogue(event){
	  event.preventDefault();
	  vogue();
  }	
  
  function upload(){
	  		var formData = new FormData();
				
		var mp3 = document.getElementById('songFileDashBoard');
		var mp3file = mp3.files[0];
		var mp3Ext = mp3file.name.split('.').pop();
		formData.append('mp3', mp3file); 
		
		var cover = document.getElementById('albumCoverDashBoard');
		var coverfile = cover.files[0];
		var coverExt = coverfile.name.split('.').pop();
		formData.append('cover', coverfile); 
		
		var userNameDashBoard=document.getElementById('userNameDashBoard').value;
		var userEmailDashBoard=document.getElementById('userEmailDashBoard').value;
		var songTitleDashBoard = document.getElementById('songTitleDashBoard').value;
		
		formData.append('songTitle', songTitleDashBoard); 
			if (document.getElementById('albumQuestionedDashBoard').value=='no'){album='single'}else{album=document.getElementById('albumDashBoard').value}
		formData.append('album', album); 
			if (document.getElementById('freeDownloadDashBoard').value=='yes, i want it downloaded free'){freeDownload=1}else{freeDownload=0}
		formData.append('freeDownload', freeDownload);
		formData.append('genre', document.getElementById('genreDashBoard').value); 
		formData.append('lyrics', document.getElementById('lyricsDashBoard').value); 
		formData.append('additionalComment', document.getElementById('additionalCommentDashBoard').value); 
		formData.append('songLink', `/${userNameDashBoard}/${songTitleDashBoard}`.replace(/\s+/g, "-"));
		formData.append('songFile', `/songs/${userNameDashBoard}-${songTitleDashBoard}.${mp3Ext}`.replace(/\s+/g, "-"));
		formData.append('albumCover', `/cover/${userNameDashBoard}-${songTitleDashBoard}.${coverExt}`.replace(/\s+/g, "-"));
		formData.append('userName', userNameDashBoard);
		formData.append('userEmail', userEmailDashBoard);		
		formData.append('newSongDashBoard', 'yes');
		
		var xhttp  = new XMLHttpRequest();
         xhttp .onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              alert('Your song has been succesfully uploaded. Kindly contact admin on +2348136776626, music@zijela.com for quality check and approval');
			  var rstBtn=document.getElementById('reset');
			  //rstBtn.click();
			}			
            
        };
		xhttp.open("POST", '/apis/new-song-dashboard-api.php', true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(formData); 
				
  }
  

  
    closedFunction=function() {
        alert('window closed');
    }
//UPLOAD SONG ON SUCCESS
     successFunction=function(transaction_id) {
		
		upload(); 
        alert('Transaction was successful, Ref: '+transaction_id)
    }

     failedFunction=function(transaction_id) {
         alert('Transaction was not successful, Ref: '+transaction_id)
    }

     function vogue() {
         Voguepay.init({
         //  v_merchant_id: '3828-0054426',
		   v_merchant_id: 'demo',
             total: 2000,
             notify_url: '',
             cur: 'NGN',
             merchant_ref: 'ref123',
             memo: 'Payment for promotional song upload',
             recurrent: false,
             frequency: 0,
             developer_code: '',
             store_id: 1,
             loadText:'Please grab a cold drink',
             items: [
                 {
                     name: "Song Upload",
                     description: "",
                     price: 2000
                 }
             ],
             closed:closedFunction,
             success:successFunction,
             failed:failedFunction
         });
     }
