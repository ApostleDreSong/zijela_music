<form id="editBioForm">
        <div class="form-group">
            <label>First name:<sup>*</sup></label>
            <input type="text" name="firstName" class="form-control" >
        </div>
        <div class="form-group">
            <label>Last Name:<sup>*</sup></label>
            <input type="text" name="lastName" class="form-control" >
        </div>
        <div class="form-group">
            <label>Date of Birth:<sup>*</sup></label>
            <input type="date" name="dob" class="form-control" >
        </div>
        <div class="form-group">
            <label>Upload a profile pix:<sup>*</sup></label>
            <input type="file" name="profilePix" class="form-control"  accept=".png,.jpg">
        </div>
        <div class="form-group">
            <label>Sex:<sup>*</sup></label>
            <select name="sex" class="form-control" >
				<option></option>
                <option name="male" class="form-control">male</option>
                <option name="female" class="form-control">female</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tell us about yourself:<sup>*</sup></label>';
            <textarea name="bio" rows="4" cols="50" placeholder="Type it this way starting with your name.
                Damilare Ademeso is a minister of the gospel devoted to seeing the flames of worship across the nations e.t.c " ></textarea>
        </div>
        <div class="form-group">
            <label>Phone number:<sup>*</sup></label>
            <input type="tel" name="phone" class="form-control" >
        </div>
        <div class="form-group">
            <label>Email Address:<sup>*</sup></label>
            <input type="email" id="emailCreator" name="email" class="form-control" >
            <p id="emailCheckCreator" class="match"></p>
        </div>
        <div class="form-group">
            <label>Facebook Name:<sup>*</sup></label>
            <input type="text" name="fbName" class="form-control" placeholder="e.g web.facebook.com/your-username/">
        </div>
        <div class="form-group">
            <label>Twitter Handle:<sup>*</sup></label>
            <input type="text" name="twitterName" class="form-control" placeholder="e.g twitter.com/your-username">
        </div>
        <div class="form-group">
            <label>Instagram Handle:<sup>*</sup></label>
            <input type="text" name="igName" class="form-control" placeholder="e.g instagram.com/your-username">
        </div>
        <div id="submit_wrapper"> 
            <input type="submit" id="submitEditBio" name="submitEditBio" class="btn btn-primary" value="Submit">
            <input type="reset" id="resetEditBioSubmit" class="btn btn-default" value="Reset">
        </div>
    </form>