
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
	if(!isset($_SESSION['user_name']) && !isset($_SESSION['password'])){
	header("location: index.php");
	}
    ?>
  </head>

  <body>  

     <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Blog</h1>
            </div>
          </div>
        </div>
      </div>
    </header>


        <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
         <!--ls to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
			<?php
            if(isset($_POST['pro-btn'])){
                $db = new mysqli('localhost','root','','blog3');
                if($db->connect_error){
                    die('database are not connected').mysqli_errno();
                }

                $imageName = $_FILES['image']['name'];
                $imageData = mysqli_real_escape_string($db, file_get_contents($_FILES['image']['tmp_name']));
                $imageType = $_FILES['image']['type'];

                $pname = $_POST['title'];
                $content = $_POST['content'];

                if(empty($pname) || empty($content)){
                    echo 'Something missing';
                }else{
                    if(substr($imageType,0,5) == 'image'){
                        $sql ="INSERT INTO  blogs(image, imgtype, title,  post) VALUES ('$imageData','$imageType','$pname','$content')";

                        $result = $db->query($sql);
                        if($result){
                            echo 'Insert Successfull';
                        }
                    }else{
                        echo 'Please Use Image';
                    }
                }



            }
			?>		  
            <form  action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image" id="picture"><img src="images/faces-clipart/pic-2.png" alt=""> <span>Post Image</span></label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="News Heading" style="display:none">
                </div>
                <div class="form-group">
                    <label for="heading">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Post Title">
                </div>
                <div class="form-group">
                    <label for="content">Post Content</label>
                    <textarea name="content" id="content" cols="30" rows="10" placeholder="Post Details" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success mr-2" name="pro-btn">Submit</button>
                <button class="btn btn-light" type="reset">Cancel</button>
                <?php
                ?>
            </form>
        </div>
      </div>
    </div>

    <hr>
<?php include 'footer.php'; ?>

  </body>

</html>	