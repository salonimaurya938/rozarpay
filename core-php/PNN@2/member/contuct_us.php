<?php 
$pgtitle = "Contact us page";
include('include-header-nuser.php');
include('mysqli.php');
?>

</head>
<body class="header-fixed">


<?php
include('include-navbar-nuser.php');
?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Contact <span class="shop-green">US</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->
<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">

		<div class="col-md-8 col-md-offset-2">
		<form id="sky-form4" class="log-reg-block sky-form" action="cus.php" method="post">
		<h2>Contact Us</h2>
<div class="row">
<div class="col-sm-12">


</div>
</div>

		<div class="login-input reg-input">


		<div class="row">
		<div class="col-xs-6">
		<section>
		<label class="input">
		<input type="text" name="name" placeholder="Enter Name" required="required" class="form-control">
		</label>
		</section>
		</div>
		<div class="col-xs-6">
		<section>
		<label class="input">

		<input type="text" name="mobile" placeholder="Enter Mobile Number" class="form-control" minlength="10" maxlength="10">
		</label>
		</section>
		</div>

		
		</div>




		<section>
		<label class="input">
		<input type="text" name="email" placeholder="Enter Email"  class="form-control">
		</label>
		</section>
		<section>
		<label class="input">
		<input type="text" name="subject" placeholder="Enter Subject" required="required" class="form-control">
		</label>
		</section>
		<section>
		<label class="input">
		 <textarea type="text" id="message" required="required" placeholder="Enter Message..." name="message" rows="4" class="form-control md-textarea"></textarea>
		</label>
		</section>
		</div>

                            


		<button class="btn-u btn-u-sea-shop btn-block rounded margin-bottom-20" style="font-size: 20px;font-weight: bold;" type="submit">Submit</button>
		</form>

		
		</div>





</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->





<?php 
include('include-footer.php');
?>
</body>
</html>
