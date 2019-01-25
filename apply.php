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
	$sql = mysql_query("INSERT INTO  applyers(Full_name, Father_name,  Mother_name,Age, Address, Phone,CV,Photo) VALUES ('".$_POST['Full_name']."' , '".$_POST['Father_name']."' ,  '".$_POST['Mother_name']."','".$_POST['Age']."', '".$_POST['Address']."', '".$_POST['Phone']."','".$_POST['CV']."','".$_POST['Photo']."')");	 

   $user_name = "<span style='color:green;'>Your registration completed. You can login now.</span>";	
	
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

		<?php if( $user_name != '' || $user_name != Null){ echo $user_name ;} ?>
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form method="post" action="" enctype="multipart/form-data">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Your Full Name</label>
                <input type="text" class="form-control" placeholder="Your Full Name" name="Full_name" required>
                <p class="help-block text-danger"></p>
              </div>
            </div>
              <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Your Father Name</label>
                <input type="text" class="form-control" placeholder="Your Father Name " name="Father_name" required >
                <p class="help-block text-danger"></p>
              </div>
            </div>
         
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Your Mother Name</label>
                <input type="text" class="form-control" placeholder="Your Mother Name" name="Mother_name" required >
                 <p class="help-block text-danger"></p>
              </div>
			 
            </div>


            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Age</label>
                <input type="text" class="form-control" placeholder="26" name="Age" >
                <p class="help-block text-danger"></p>
              </div>
            </div>

               <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Your Address</label>
                <input type="text" class="form-control" minlength="8" placeholder="Your Address" name="Address" required >
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Phone Number</label>
                <input type="text" class="form-control" placeholder="Phone Number. ex: 01912921811" name="Phone" >
                <p class="help-block text-danger"></p>
              </div>
            </div>


             <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>CV</label>
                <input type="file" class="form-control" placeholder="Upload ur CV" name="CV" >
                <p class="help-block text-danger"></p>
              </div>
            </div>


             <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Photo</label>
                <input type="file" class="form-control" placeholder="Photo" name="Photo" >
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <br>
            <div id="success"></div>
            <div class="form-group">
			<button type="submit" class="btn btn-primary">Register <i class="icon-ok icon-white"></i>
			</button>
            </div>
            <hr>
          </form>
        </div>
      </div>
    </div>

    <hr>
    <hr>
<?php include 'footer.php'; ?>	
	<!--<script>
	  $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
	</script>  -->
</body>
</html>
    