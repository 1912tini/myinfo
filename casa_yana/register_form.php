<?php
// Session
   section_start();
   $fullName = $_SESSION['fullName'];
   $email = $_SESSION['email'];

// Message Vars
$msg = '';
$msgClass = '';

//check for submit
if (filter_has_var(INPUT_POST, 'submit')) {
	//Get Form Data
	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	$dateborn = $_POST['dateborn'];
	$number = $_POST['number'];
	$city = $_POST['city'];
	$country = $_POST['country'];

	// Check required Fields
	if (!empty($email) && !empty($fullName) && !empty($dateborn) && !empty($number) && !empty($city) && !empty($country)) {
		// Check Email
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$msg = 'Valid email required';
	    	$msgClass = 'alert-danger';
		} else {
			echo 'Sucessful';
		}
	} else {
		$msg = 'Please fill in all fields';
		$msgClass = 'alert-danger';
	}
  }
?>



<?php include 'head.php';?>

<!-- Form registration section begins -->
<div class="container">
	<?php if($msg != ''): ?>
		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
	<?php endif; ?>	
<br>  <p class="text-center">YANA <a href="#"> You're not alone!</a></p>
<hr>

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Genial! comencemos.. Get started with your free account</p>
	<p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
        <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
        <a href="" class="btn btn-block btn-google"> <i class="fab fa-google-plus-g"></i>   Login via google+</a>
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
	<form name="sentRegister" id="registerForm" novalidate="novalidate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="fullName" class="form-control" placeholder="Full name" type="text" value="<?php echo isset($_POST['fullName']) ? $fullName : ''; ?>">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fas fa-baby"></i> </span>
		 </div>
        <input name="dateborn"  class="form-control" type="date" placeholder="Date born" value="<?php echo isset($_POST['dateborn']) ? $dateborn : ''; ?>">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select class="custom-select" style="max-width: 120px;">
		    <option selected="">+34</option>
		    <option value="1">+33</option>
		    <option value="2">+32</option>
		    <option value="3">+49</option>
		</select>
    	<input name="number" class="form-control" placeholder="Phone number" type="number" value="<?php echo isset($_POST['number']) ? $number : ''; ?>">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fas fa-building"></i> </span>
		</div>
		<select class="form-control">
			<option selected="" value="34">ESPAÑA</option>
			<option value="33">FRANCIA</option>
			<option value="49">ALEMAGNE</option>
		</select>
	</div> <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
          <select class="form-control" name="city" placeholder="City" value="<?php echo isset($_POST['city']) ? $city : ''; ?>">
          <option value="28">MADRID</option>
          <option value="01">ALAVA</option>
          <option value="02">ALBACETE</option>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"><i class="fas fa-building"></i></span>
		</div>
        <input type="text" name="country" id="country" class="form-control" placeholder="Enter Country Name" onKeyUp="showCities(this.value)"/>
        <div id="countryList"></div>
    </div> <!-- form-group// -->     <br>                                 
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Register </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
<script>
        //window.onload = function() {
            function showCities(query){
                console.log(query);
                //var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url: "search.php",
                        method: "POST",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#countryList').fadeIn();
                            $('#countryList').html(data);
                        }
                    });
                }
            }
        
 document.addEventListener('click',function(e){
    if(e.target.tagName== 'LI'){
        console.log(e);
        $('#country').val(e.target.innerText);
        $('#countryList').fadeOut();
          //do something
     }
 });
        

    </script>
<!-- Form registration section ends -->
<?php include 'footer.html';?>	