
//ADD SONG TO PLAYLIST
var playListAdd = document.getElementsByClassName('playListAdd');
for (var i=0;i<playListAdd.length;i++){
    playListAdd[i].addEventListener('click', funcAdder);
}
function funcAdder(event){
	var target=this;
	var songTitle=target.getAttribute("data-songindb");
	var creator=target.getAttribute("data-creatorindb");
	var user=target.getAttribute("data-user");
	addToPlayList(songTitle,creator,user);
	target.removeEventListener('click',funcAdder);
	target.innerHTML="ADDED TO PLAYLIST";
	
}
function addToPlayList(songTitle,creator,user){
	
	const params = `song=${songTitle}&creator=${creator}&user=${user}`;
		var xhttp  = new XMLHttpRequest();

	xhttp.open("POST", '/apis/playlist-api.php', true);
	xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send(params);
}

//TELL USER TO JOIN
function tellUserTojoin(){
	alert("Only members can have a playlist. Join now!");
}

function onlyUserscanFollow(){
	alert("Only members can follow. Join now!");
}

//MUSIC PLAYER
var thumbnail = document.getElementsByClassName('music-play');
for (var i=0;i<thumbnail.length;i++){
    thumbnail[i].addEventListener('click', playMusic);
}

function playMusic(e){

        var song = this;
        var link = song.getAttribute("data-songfile");
        var audio = document.getElementById("audio");
		var audioPlayer = audio.childNodes[1];
        var src = audioPlayer.firstElementChild.src=link;
        audioPlayer.load();
        audioPlayer.play(); 
		
		var userName = song.getAttribute("data-username");
		var title = song.getAttribute("data-songtitle");
		var lyrics = song.getAttribute("data-lyrics");
		var albumCover = song.getAttribute("data-albumcover");
		
		var lyricsContainer = document.getElementById("lyrics");
		lyricsContainer.innerHTML = lyrics;
		lyricsContainer.style.display="block";
}



var albumQuestioned = document.getElementById('albumQuestioned');
function partOfAlbum(){

    var text = albumQuestioned.options[albumQuestioned.selectedIndex].text;
     var album = document.getElementById('album');
     var albumLabel = document.getElementById('albumLabel');
     if (text=="yes"){
         albumLabel.style.display="block";
         album.type="text";
     }else{
        albumLabel.style.display="none";
         album.type="hidden"; 
     }
 
}

var responseSearch = document.getElementById('responseSearch');
var searcher = document.getElementById('search');
searcher.addEventListener('keyup', soughtOut);
searcher.addEventListener('focusout', clear);
function soughtOut(){
	var searchValue=searcher.value;
	if(searchValue.length==0){
		responseSearch.innerHTML='';
	}else{
		var xhttp  = new XMLHttpRequest();
			xhttp .onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var getIt = this.responseText;
					responseSearch.innerHTML=getIt;	
				}
			};

		xhttp.open("GET", `/apis/search-api.php?search=${searchValue}`, true);
		xhttp.send();
	}
}
function clear(){
	responseSearch.innerHTML='';
}

$('.dashboardAdd').click(
	function(){
		
	}
);
