<?php  include 'header.php'; ?>
<br><br><br><br><br>
<section class="register-form"  style="background-image: url('3.jpg');">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="container">
          <!-- <img style="width:180px; margin-left: 20%; margin-bottom:-50px" src="register1.jpeg" alt=""><br> -->
          <!-- <span style="color:#59abe3;font-size:34px; margin-left: 20%;">Register Here...</span> -->
        </div>
        <div class="aa-signin-area">
          <div class="aa-signin-form bg-dark"
            style="box-sizing:border-box; border:0px solid; padding:30px; margin:10px;border-radius:20px; box-shadow: rgba(100, 55, 55, 0.1) 0px 7px 29px 0px; background-color:#fff;">
            <div class="aa-signin-form-title">
              <!-- <a class="aa-property-home" href="index.php">Property Home</a> -->
              <h
                style="color:black; font-size:25px;text-align:center;font-weight:600;margin:40px;padding:40px;color:#59abe3;">
                Create your account and Stay with us!...</h4>
            </div>
            <form class="contactform">
              <div class="aa-single-field">
                <label for="name" style="font-family:Georgia, serif;padding:2px; margin:4px;">Name <span
                    class="required" style="color:red;">*</span></label>
                <input type="text" class="form-control" required="required" aria-required="true" value="" name="name">
              </div>
              <div class="aa-single-field">
                <label for="email" style="font-family:Georgia, serif;padding:2px; margin:4px;">Email <span
                    class="required" style="color:red;">*</span></label>
                <input type="email" class="form-control" required="required" aria-required="true" value="" name="email">
              </div>
              <div class="aa-single-field">
                <label for="password" style="font-family:Georgia, serif;padding:2px; margin:4px;">Password <span
                    class="required" style="color:red;">*</span></label>
                <input type="password" class="form-control" name="password">
              </div>
              <div class="aa-single-field">
                <label for="confirm-password" style="font-family:Georgia, serif;padding:2px; margin:4px;">Confirm
                  Password <span class="required" style="color:red;">*</span></label>
                <input type="password" class="form-control" name="confirm-password">
              </div>

              <div class="aa-single-submit">
                <input type="submit" class="form-control button"
                  style=" width: 100px; color: white;
  background: #59abe3;
  font-family: arial;
  box-sizing:border-box;
  border-radius:5px;margin-left:260px; padding:10px; margin-top:30px; margin:30px; display:inline; width:20%; float:center;" value="Create Account"
                  name="Create Account">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</section>
<?php  include 'footer.php'; ?>