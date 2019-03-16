<?php require ('../db/config.php'); ?>
<form id="editSongForm" > 
        <div class="form-group">
             <label>Choose song:<sup>*</sup></label>
            <select  type="text"  name="songTitle" required >
				<option></option>
<?php 
$query = 'SELECT songTitle FROM songs WHERE userName="'.$_POST['userName'].'"';
            $stmt = mysqli_query ($dbc,$query);
            while($row=mysqli_fetch_array($stmt)):
			?>
			<option><?php echo $row['songTitle']; ?></option>

<?php			
			endwhile;
?>
            </select>
        </div>

        <div class="form-group">
             <label>Is this song part of an album?<sup>*</sup></label>
            <select type="text" id="albumQuestionedDashBoard" name="albumQuestionedDashBoard"  onchange="partOfAlbumDashBoard()">
                <option></option>
                <option>yes</option>
                <option>no</option>
            </select>
        </div>
        <div class="form-group">
             <label id="albumLabelDashBoard" class="albumLabel">Album Title:<sup>*</sup></label>
             <input id="albumDashBoard" name="album" class="form-group" type="hidden" name="album"  >
        </div>
		<div class="form-group">
             <label>Is this song for free download or purchase?<sup>*</sup></label>
            <select type="text" id="freeDownloadDashBoard" name="freeDownload" >
                <option></option>
                <option>yes, i want it downloaded free</option>
                <option>no, i want to earn royalty from it</option>
            </select>
        </div>
        <div class="form-group">
             <label>Genre:<sup>*</sup></label>
            <select class="form-group" type="text" id="genreDashBoard" name="genre"  >
			<?php require('../genres.php'); ?>
			</select>
        </div>
        <div class="form-group">
             <label>Select album cover for your song:<sup>*</sup></label>
            <input class="form-group" type="file" id="albumCoverDashBoard" name="albumCover"  accept=".png,.jpg">
        </div>
        <div class="form-group">
             <label>Type in the lyrics:<sup>*</sup></label>
            <textarea id="lyricsDashBoard" name="lyrics" rows="4" cols="50" placeholder="Please ensure it contains the necessary song parts like choruses, verses and bridge" ></textarea>
        </div>
        <div class="form-group">
             <label>Is there any other thing you feel your fans should know about this song?<sup>*</sup></label>
            <textarea id="additionalCommentDashBoard" name="additionalComment" rows="4" cols="50" placeholder="..Like your youtube channel or website"></textarea>
        </div>
		<div id="submit_wrapper"> 
            <input type="submit" id="editSongSubmit" name="editSongSubmit" class="btn btn-primary" value="Submit">
            <input type="reset" id="resetEditSongSubmit" class="btn btn-default" value="Reset">
        </div>

    </form>
