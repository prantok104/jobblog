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

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
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

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
		<?php	
        $blog_id = $_GET['blogid'];		
		$result=mysql_query("SELECT * FROM blogs  WHERE blogs.id='".$blog_id."'");
		$count = mysql_num_rows($result);


		 if($count>0) {
		   while($row = mysql_fetch_array($result)) {
               if($row['image'] == ''){
                   echo "          
                       <div class='post-preview'>
                          <h2 class='post-title'>
                            ".$row['title']."
                          </h2>
                          <hr>
                          <p>
                            ".$row['post']."
                          </p>
                        <p class='post-meta'>Posted by
                          <span style='color: #212529;'>Admin</span></P>
                          <p class='post-meta'>Click On <a href='apply.php'>APPLY</a> To Register For The JOB</p>
                      </div>";
               }else{
                   echo "          
                       <div class='post-preview'>
                          <h2 class='post-title'>
                            ".$row['title']."
                          </h2>
                          <hr>
                          <p>
                            ".$row['post']."
                          </p>
                          <img src='techroot/action/functions.php?imid=".$row['id']." alt='' style='width:100%;height:450px;padding:10px;background:#eee;margin-bottom:20px'>
                        <p class='post-meta'>Posted by
                          <span style='color: #212529;'>Admin</span></P>
                      </div>";
               }
		   } 
		 }
			else{echo 'No Blog Found.';}		 
		   ?>
        </div>
		<div class="col-lg-8 col-md-10 mx-auto">
		<?php if(isset($_SESSION['user_name']) && isset($_SESSION['password'])){
					if (isset($_POST['blogComment'])){
						$sql = mysql_query("INSERT INTO  comments(user_id, blog_id,  comment) VALUES ('".$_SESSION["user_id"]."' , '".$blog_id."' ,  '".$_POST['blog_comment']."')");	
					}
			
			?>
          <form method="post" action="" enctype="multipart/form-data">         
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <textarea rows="3" class="form-control" placeholder="Write Your Comment" name="blog_comment" required ></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="blogComment">Submit</button>
            </div>
          </form>
		<?php } ?>
        	<h2> Comments </h2>
		<?php
		$result=mysql_query("SELECT * FROM comments INNER JOIN users  ON users.id = comments.user_id WHERE comments.blog_id='".$blog_id."' AND status=1");
		$count = mysql_num_rows($result);


		 if($count>0) {
		   while($row = mysql_fetch_array($result)) {	
		   echo "<div class='post-preview'>
              <p>
                ".$row['comment']."
              </p>

            <p class='post-meta'>Comment by
              <span style='color: #212529;'>".$row['user_name']."</span>
          </div>";		   
		   }
		 }
		   ?>		   
        </div>		
      </div>			
    </div>

    <hr>


<?php include 'footer.php'; ?>

  </body>

</html>
