<?php include 'header.php'; ?>

<br><br><br><br><br>
<div class="container-fluid" id="aa-contactus">
  <div class="row">
    <div class="col-lg-12 col-sm-12">
      <img src="con1.jpeg" style="width:100%; height:550px" />
    </div>
    <div class="aa-title">
          <h2 style="margin-top:20px;">Contact Us</h2>
    </div> 
  </div>
</div>

<section id="aa-contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-contact-area">
          <div class="aa-contact-top">
            <div class="aa-contact-top">
              <div class="aa-contact ">
                <!-- <iframe width="100%" height="450px" frameborder="0" allowfullscreen="100%" style="border:0" src=""></iframe> -->
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d112200.1938683839!2d77.23949665650356!3d28.501942865479997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e2!4m3!3m2!1d28.4250826!2d77.3111595!4m5!1s0x390ce55e105021dd%3A0x4e2b04c909b9007f!2sronisha%20informatics!3m2!1d28.5785666!2d77.31231439999999!5e0!3m2!1sen!2sin!4v1692189811526!5m2!1sen!2sin"
                  width="100%" height="350" style="border:0;" allowfullscreen
                  loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              <br>
              <div class="aa-contact-top-right"
                style="width:100%; height:300px; background-color:#59abe3;">
                <h2 style="text-align:center; font-size:30px;">Contact Us</h2>
                <!-- <p style=" font-size:20px;">Let's us have a Talk...</p> -->
                <ul class="contact-info-list">
                  <li> <i class="fa fa-phone"></i>093155 54701</li>
                  <li> <i class="fa fa-envelope-o"></i>https://www.ronishainformatics.com</li>
                  <li> <i class="fa fa-map-marker"></i>Seven Wonders Tower,
                    A-61, Ghaziabad, A Block, Sector 16, Noida, Uttar Pradesh
                    201301</li>
                </ul>
              </div>
            </div>

            <div>
              <br><br>
              <h3
                style="color:#59abe3;font-size:32px;text-align:center; font-weight:600;">Send
                Your Messages</h3>
              <div class="container">
                <form action="/action_page.php">
                  <label for="fname">First Name</label>
                  <input type="text" id="fname" name="firstname"
                    placeholder="Your name..">

                  <label for="lname">Last Name</label>
                  <input type="text" id="lname" name="lastname"
                    placeholder="Your last name..">

                  <label for="lname">Email ID</label>
                  <input type="text" id="lname" name="email"
                    placeholder="Your Email id..">

                  <label for="subject">Subject</label>
                  <textarea id="subject" name="subject"
                    placeholder="Write something.." style="height:200px"></textarea>

                  <input type="submit"
                    style="background-color:#59abe3; float:center;"
                    value="Submit">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br><br>
  <style>
  body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  /* background-color: #f2f2f2; */
  padding: 20px;
}

</style>

  <?php include 'footer.php'; ?>