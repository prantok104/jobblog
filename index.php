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

        <header class="masthead" style="background-image: url('img/home-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            <h1>BLOG</h1>
                            <h2><?php if(isset($_SESSION['user_name'])){echo 'Hi, '.$_SESSION['user_name'];}?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="search-form">
                        <form action="" method="POST">
                            <label for="s">Search Here</label>
                            <input type="text" name="s" id="s" placeholder="Post Title" class="form-control">
                        </form>
                    </div>
                    <div class="pagenation" id="output">
                        <input type="hidden" id="uid" value="<?php echo $_SESSION['user_id'];?>">
                        <?php		 
                        $result=mysql_query("SELECT blogs.id as bid, blogs.image as photo, blogs.title as btitle, blogs.post as bpost FROM blogs where status = 1  order by date desc ");
                        $count = mysql_num_rows($result);
                        if($count>0) {

                            while($row = mysql_fetch_array($result)) {
                                if($row['photo'] == ''){
                                    echo "          
                        <div class='post-preview'>
                          <h2 class='post-title' id='fe-title'>
                            ".$row['btitle']."
                          </h2>
                          <hr>
                          <p>
                            " . substr($row['bpost'], 0, 80) .'.......'.'<a style="text-decoration: none; padding: 3px;" class="btn btn-primary" href="blogview.php?blogid='.$row['bid'].'" > Read More </a>'."
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
                                } else{
                                    echo "          
                       <div class='post-preview'>
                          
                          <h2 class='post-title' id='fe-title'>
                            ".$row['btitle']."
                          </h2>
                          <hr>
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

                        else {'No Blog Found.';} 
                        ?>
                    </div>		   
                    <hr>

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
                // Get the search result
                $('#s').keyup(function(){
                    var value = $('#s').val();
                    if(value!=''){
                        $.ajax({
                            url:'functions.php',
                            method:'POST',
                            data:{value:value},
                            success:function(data){
                                $('#output').html('');
                                $('#output').html(data);
                            }
                        });
                    }
                });
            });
        </script>
    </body>

</html>
