<form id="addNewSongForm" enctype="multipart/form-data" method="POST"> 
<h3>Song upload costs #2,000 naira only</h3>
        <div class="form-group">
             <label>Type in the song title:<sup>*</sup></label>
            <input class="form-group" type="text" id="songTitleDashBoard" name="songTitleDashBoard" required >
        </div>
        <div class="form-group">
             <label>Is this song part of an album?<sup>*</sup></label>
            <select type="text" id="albumQuestionedDashBoard" name="albumQuestionedDashBoard" required onchange="partOfAlbumDashBoard()">
                <option></option>
                <option>yes</option>
                <option>no</option>
            </select>
        </div>
        <div class="form-group">
             <label id="albumLabelDashBoard" class="albumLabel">Album Title:<sup>*</sup></label>
             <input id="albumDashBoard" class="form-group" type="hidden" name="albumDashBoard" required >
        </div>
		<div class="form-group">
             <label>Is this song for free download or purchase?<sup>*</sup></label>
            <select type="text" id="freeDownloadDashBoard" name="freeDownloadDashBoard" required>
                <option></option>
                <option>yes, i want it downloaded free</option>
                <option>no, i want to earn royalty from it</option>
            </select>
        </div>
        <div class="form-group">
             <label>Genre:<sup>*</sup></label>
            <select class="form-group" type="text" id="genreDashBoard" name="genreDashBoard" required >
			<?php require('genres.php'); ?>
        </div>
        <div class="form-group">
             <label>Select mp3 to upload:<sup>*</sup></label>
            <input class="form-group" type="file" id="songFileDashBoard" name="songFileDashBoard" required accept=".mp3">
        </div>
        <div class="form-group">
             <label>Select album cover for your song:<sup>*</sup></label>
            <input class="form-group" type="file" id="albumCoverDashBoard" name="albumCoverDashBoard" required accept=".png,.jpg">
        </div>
        <div class="form-group">
             <label>Type in the lyrics:<sup>*</sup></label>
            <textarea id="lyricsDashBoard" rows="4" cols="50" placeholder="Please ensure it contains the necessary song parts like choruses, verses and bridge" required></textarea>
        </div>
        <div class="form-group">
             <label>Is there any other thing you feel your fans should know about this song?<sup>*</sup></label>
            <textarea id="additionalCommentDashBoard" rows="4" cols="50" placeholder="..Like your youtube channel or website"></textarea>
        </div>
		<div id="submit_wrapper"> 
            <input type="submit" id="submitNewSong" name="submitNewSong" class="btn btn-primary" value="Submit">
            <input type="reset" id="reset" class="btn btn-default" value="Reset">
        </div>

    </form>
