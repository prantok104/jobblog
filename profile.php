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
    <?php 
    if(!isset($_SESSION['user_name']) && !isset($_SESSION['password'])){
        header("location: index.php");
    } 
    ?>
    <body>  

        <header class="masthead" style="background-image: url('img/profile-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="page-heading">
                            <h1>Profile</h1>
                            <h3>Hi, <?php echo $_SESSION['user_name'];?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 mx-auto">
                    <!--ls to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                    <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                    <div class="clearfix">
                                    <a class="btn btn-primary float-right" href="blogform.php">Write Blog &rarr;</a>
                    </div>
                    <div class="pagenation" id="output">  
                        <input type="hidden" id="uid" value="<?php echo $_SESSION['user_id'];?>">
                        <?php		  
                        $result=mysql_query("SELECT blogs.id as bid, blogs.image as photo, blogs.title as btitle, blogs.post as bpost, favourite.userid as uid FROM blogs right join favourite on blogs.id = favourite.postid  where favourite.userid='".$_SESSION['user_id']."' order by blogs.id desc ");
                        $count = mysql_num_rows($result);


                        if($count>0) {
                            while($row = mysql_fetch_array($result)) {
                                if($row['photo'] == ''){
                                    echo "          
                        <div class='post-preview'>
                          <h2 class='post-title' id='fe-title'>
                            ".$row['btitle']."
                          </h2>
                          <p>
                            " . substr($row['bpost'], 0, 80) .'.......'.'<a style="text-decoration: none; padding: 3px;" class="btn btn-primary" href="blogview.php?blogid='.$row['bid'].'" id="fe-post-id"> Read More </a>'."
                          </p>

                            <p class='post-meta'>Posted by
                          <span style='color: #212529;'>Admin</span>
                    </div>";
                                }else{
                                    echo "          
                       <div class='post-preview'>
                          <img src='techroot/action/functions.php?imid=".$row['bid']." alt='' style='width:100%;height:250px;padding:10px;background:#eee;margin-bottom:20px'>
                          <h2 class='post-title' id='fe-title'>
                            ".$row['btitle']."
                          </h2>
                          <p>
                            " . substr($row['bpost'], 0, 80) .'.......'.'<a style="text-decoration: none; padding: 3px;" class="btn btn-primary" href="blogview.php?blogid='.$row['bid'].'" id="fe-post-id"> Read More </a>'."
                          </p>

                            <p class='post-meta'>Posted by
                          <span style='color: #212529;'>Admin</span>"?><?php  if(isset($_SESSION['user_id'])){
                              $mark = mysql_num_rows(mysql_query("SELECT * FROM favourite WHERE postid = '".$row['bid']."' AND userid = '".$_SESSION['user_id']."'"));           
                              if($mark > 0){
                        ?>
                        <button class=" fe-btn clicked" id="<?php echo $row['bid'];?>">&hearts;</button><?php }
                              else{?>
                        <button class=" fe-btn" id="<?php echo $row['bid'];?>">&hearts;</button><?php

                                  }} echo
                              "</div>";

                                }
                            } 
                        }
                        else{echo 'No Blog Found.';}		 
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <?php include 'footer.php'; ?>
        <script>
            //call paginate
            $('.pagenation').paginate({
                perPage:7
            });
        </script>
        <script>
            $(document).ready(function(){
                // Favourite list create btn
                $('.fe-btn').click(function(){
                    $(this).toggleClass('clicked');
                    var bid = $(this).attr('id');
                    var uid = $('#uid').val();
                    if(bid !=''){
                        $.ajax({
                            url:'functions.php',
                            method:'POST',
                            data:{bid:bid, uid:uid},
                            success:function(data){
                                $('#fcheck').html(data);
                            }
                        });
                    }
                });
            });
        </script>
    </body>

</html>	
