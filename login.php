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
		$count = 0;
		$userCheck = '';
		if (isset($_POST['user_login'])){

		$sql= mysql_query("SELECT * FROM users WHERE user_name = '".$_POST['user_name']."' AND password = '".$_POST['password']."'");
        $count = mysql_num_rows($sql);	
		if($count <= 0){

          $userCheck = "<span style='color:red;'>Wrong User Name Or Password.</span>";		  
		}
		else {
			while($row = mysql_fetch_array($sql)) {
				$_SESSION["user_id"] = $row['id'];
                $action = "UPDATE users SET action = 1 WHERE id='".$row['id']."'";
                $actionresult = mysql_query($action);

                if($row['status'] == '1'){
                    $_SESSION["user_id"] = $row['id'];
                    header('location:techroot');
                }else{
                    $row['status'];
                    $_SESSION["user_name"] = $_POST['user_name'];
                    $_SESSION["password"] = $_POST['password'];
                    header("location: profile.php");
                }
			}
		  }		
		}
 
		
		?>
      <header class="masthead" style="background-image: url('img/login-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Login</h1>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="container">
	<?php if( $userCheck != '' || $userCheck != Null){ echo $userCheck ;} 
		?>	
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
         <form method="post" action="" enctype="multipart/form-data">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>User-Name</label>
                <input type="text" class="form-control" placeholder="User Name" name="user_name" required >
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Password </label>
                <input type="password" class="form-control" placeholder="Password" name="password" required >
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" name='user_login' class="btn btn-primary">Login</button>
            </div>
            <hr>
             <div class="clearfix">
            <a class="btn btn-primary float-right" href="register.php">Register &rarr;</a>
          </div>
          <hr>
          </form>
        </div>
      </div>
    </div>

    <hr>
    <hr>
<?php include 'footer.php'; ?>	

</body>
</html>
    