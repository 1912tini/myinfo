<?php
// Message Vars
$msg = '';
$msgClass = '';

//check for submit
if (filter_has_var(INPUT_POST, 'submit')) {
	//Get Form Data
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$number = htmlspecialchars($_POST['number']);
	$message = htmlspecialchars($_POST['message']);

	// Check required Fields
	if (!empty($email) && !empty($name) && !empty($number) && !empty($message)) {
		// Check Email
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$msg = 'Valid email required';
	    	$msgClass = 'alert-danger';
		} else {
      $toEmail = 'topgreens@mail.com';
      $subject = 'Contact Request Form ' .$name;
      $body = '<h2>Contact Request</h2>
            <h4>Name</h4><p> '.$name.' </p>
            <h4>Email</h4><p> '.$email.' </p>
            <h4>Phone Number</h4><p> '.$number.' </p>
            <h4>Message</h4><p> '.$message.' </p>
      ';

      // Email Headers
      $headers = "MIME-Version: 1.0" ."\r\n";
      $headers .="Content-Type:text/html;charset=UTF-8" ." \r\n";
      
      //Additional header
      $headers .= "From: " .$name. "<".$email.">". "\r\n";

      if (email($toEmail, $subject, $body, $headers)) {
        $msg = 'Your email has been sent';
        $msgClass = 'alert-success';
      } else {
        $msg = 'Your email was not sent';
        $msgClass = 'alert-danger';
      }
		}
	} else {
		$msg = 'Please fill in all fields';
		$msgClass = 'alert-danger';
	}
 }
?>



<?php include 'head.php';?>


 <!--====== CONTACT PART START ======-->
 <br><br><br> 
 <section id="contact">
  <div class="container">
  <?php if($msg != ''): ?>
		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
	<?php endif; ?>	
    <div class="well well-sm">
      <h3><strong>Get In Touch</strong></h3>
    </div>
	
	<div class="row">
	  <div class="col-md-7">
        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3736489.7218514383!2d90.21589792292741!3d23.857125486636733!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1506502314230" width="100%" height="315" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>

      <div class="col-md-5">
          <h4><strong>Get in Touch</strong></h4>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="form-group">
            <input type="text" class="form-control" name="name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>" placeholder="Name">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" placeholder="E-mail">
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" name="number" value="<?php echo isset($_POST['number']) ? $number : ''; ?>" placeholder="Phone">
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="3" placeholder="Message">value="<?php echo isset($_POST['message']) ? $message : ''; ?>"</textarea>
          </div>
          <button class="btn btn-default" type="submit" name="button">
              <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit
          </button>
        </form>
      </div>
    </div>
  </div>
</section>
    <br><br><br>
    <!--====== CONTACT PART ENDS ======-->
<?php include 'footer.html';?>	