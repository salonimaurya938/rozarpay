<?php  include 'header.php'; ?>
<br><br><br><br><br><br><br><br><br>


<section class="login-form" style="background-image: url('signin.jpeg');">
    <div class="container">
      <div class="row">
      <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="aa-signin-area">
            <div class="aa-signin-form bg-dark" style="box-sizing:border-box; border:0px solid grey; padding:30px; margin:10px;border-radius:20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; background-color:#fff;">
              <div class="aa-signin-form-title">
                <!-- <a class="aa-property-home" href="">Property Home</a> -->
                <h4 style="text-align:center;font-size:32px;font-weight:600;padding:20px;margin:8px;color:#59abe3;font-family:Gill Sans, sans-serif;margin-top:-20px;">Sign in to your account</h4>
              </div>
              <form class="contactform">                                                 
                <div class="aa-single-field">
                  <label for="email" style=" font-size:18px;">Email <span class="required">*</span></label>
                  <input type="email" class="form-control" required="required" aria-required="true" value="" name="email">
                </div>
                <div class="aa-single-field">
                  <label for="password" style=" font-size:16px;">Password <span class="required">*</span></label>
                  <input type="password" class="form-control" name="password"> 
                </div>
                <div class="aa-single-field">
                <label>
                  <input type="checkbox" style=" font-size:15px;"> Remember me
                </label>                                                          
                </div> 
                <div class="aa-single-submit">
                  <input type="submit" class="form-control btn button" style="color:white;"  value="Send Message">  
                </div>
                <p style="font-size:15px; color:black;">Don't Have A Account Yet? <a href="register.php">CREATE NOW!</a></p>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
  </section>





    
  <?php  include 'footer.php'; ?>