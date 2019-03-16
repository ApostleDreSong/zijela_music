   var addNewSongButton = document.getElementById('addNewSongButton');
   addNewSongButton.addEventListener('click',showNewSongForm);
   function showNewSongForm(){
	   var xhttp  = new XMLHttpRequest();
			xhttp .onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var getIt = this.responseText;
					document.getElementById('monitor').innerHTML=getIt;	
					
					var vu = document.createElement('script');					
					vu.type = "text/javascript";
					vu.src = "/js/vogueUpload.js";
					vu.async = true;
					document.getElementById('monitor').appendChild(vu);
					
					var v = document.createElement('script');					
					v.type = "text/javascript";
					v.src = "//voguepay.com/js/voguepay.js";
					v.async = true;
					document.getElementById('monitor').appendChild(v);
				}
			};

		xhttp.open("GET", 'addNewSong.php', true);
		xhttp.send();
   }
   
   function partOfAlbumDashBoard(){
 var albumQuestionedDashBoard = document.getElementById('albumQuestionedDashBoard');
    var text = albumQuestionedDashBoard.options[albumQuestionedDashBoard.selectedIndex].text;
     var album = document.getElementById('albumDashBoard');
     var albumLabel = document.getElementById('albumLabelDashBoard');
     if (text=="yes"){
         albumLabel.style.display="block";
         album.type="text";
     }else{
        albumLabel.style.display="none";
         album.type="hidden"; 
     }
 
}

$('#editSong').click(
	function(){
		$.post(
		'/apis/edit-song-api.php',
		{
			userName:$('#editSong').attr("data-user"),			
		},
			function(data){
				$('#monitor').html(data);
				$.getScript('js/editSong.js');
			}
		);
	}
);

$('#editBio').click(
	function(){
		$('#monitor').load('/editBio.php');
		$.getScript('js/editBio.js');
	}
);

$('#addToPlaylistDashboard').click(
	function(){
		$.post(
		'/apis/explore-dashboard-api.php',
		{
				
		},
			function(data){
				$('#monitor').html(data);
				$.getScript('js/script.js');
			}
		);
	}
);

