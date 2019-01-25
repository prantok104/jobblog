<?php
include('connection.php');
if(isset($_POST['value'])){
    $output='';
    $title = $_POST['value'];
    $sql = mysql_query("SELECT blogs.id as bid,blogs.image as photo, blogs.title as btitle, blogs.post as bpost FROM blogs WHERE blogs.title LIKE '%".$title."%' order by date desc");
    while($row = mysql_fetch_array($sql)) {
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
                          <span style='color: #212529;'>Admin</span>
                        </div>";

        }

    } 
}

if(isset($_POST['bid']) && isset($_POST['uid'])){
    $sql = mysql_fetch_array(mysql_query("SELECT * FROM blogs WHERE id = '".$_POST['bid']."'"));
    $check = mysql_num_rows(mysql_query("SELECT * FROM favourite WHERE postid = '".$_POST['bid']."' AND userid = '".$_POST['uid']."'"));
    if($check>=1){
        $del = mysql_query("DELETE FROM favourite WHERE postid = '".$_POST['bid']."' AND userid = '".$_POST['uid']."'");
    }else{
        $fe = mysql_query("INSERT INTO `favourite`(`postid`, `userid`) VALUES ('".$_POST['bid']."','".$_POST['uid']."')");
        echo 1;
    }
}
