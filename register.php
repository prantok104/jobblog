<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


   <?php
    include 'header.php';
    include 'include/menu.php';

    ?>
  </head>

  <body>   

<?php
 $user_name = '';
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $sql= mysql_query("SELECT * FROM users WHERE user_name = '".$_POST['user_name']."'"); 
  $count = mysql_num_rows($sql);
  if($count!=0){
	  $user_name = "<span style='color:red;'>User Name already exist. Please Try with another name. </span>";
  }	
  else{
	$sql = mysql_query("INSERT INTO  users(name, user_name,  email, phone, password) VALUES ('".$_POST['name']."' , '".$_POST['user_name']."' ,  '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['password']."')");	 

   $user_name = "<span style='color:green;'>Your registration completed. You can login now.</span>";	
  }
	
}

?>


      <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">

            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="container">
	<?php if( $user_name != '' || $user_name != Null){ echo $user_name ;} 
		?>
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form method="post" action="" enctype="multipart/form-data">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" required>
                <p class="help-block text-danger"></p>
              </div>
            </div>
              <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>User Name</label>
                <input type="text" class="form-control" placeholder="User Name" name="user_name" required >
                <p class="help-block text-danger"></p>
              </div>
            </div>
         
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email" required >
                 <p class="help-block text-danger"></p>
              </div>
			 
            </div>

               <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Password </label>
                <input type="password" class="form-control" minlength="8" placeholder="Password" name="password" required >
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Phone Number</label>
                <input type="tel" class="form-control" placeholder="Phone Number." name="phone" >
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <br>
            <div id="success"></div>
            <div class="form-group">
			<button type="submit" class="btn btn-primary">
				Register <i class="icon-ok icon-white"></i>
			</button>
            </div>
            <hr>
            <div class="clearfix">
            <a class="btn btn-primary float-right" href="login.php">LOGIN &rarr;</a>
          </div>
          <hr>
          </form>
        </div>
      </div>
    </div>

    <hr>
    <hr>
<?php include 'footer.php'; ?>	
	<script>
	  $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
	</script>
</body>
</html>
    