<?php
include ('dbcon.php');

function getthelink($table){
    include('dbcon.php');
    $sql = "SELECT * FROM $table";
    $result = $db->query($sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }

}
// Insert product
if(isset($_POST['pro-btn'])){
   
    $imageName = $_FILES['image']['name'];
    $imageData = mysqli_real_escape_string($db, file_get_contents($_FILES['image']['tmp_name']));
    $imageType = $_FILES['image']['type'];
    
    $pname = $_POST['title'];
    $content = $_POST['content'];
    
    if(empty($pname) || empty($content)){
        $location = 'location:../posts.php?er=1';
        header($location);
    }else{
        if(substr($imageType,0,5) == 'image'){
            $sql ="INSERT INTO  blogs(image, imgtype, title,  post) VALUES ('$imageData','$imageType','$pname','$content')";
            
            $result = $db->query($sql);
            if($result){
                $location = 'location:../posts.php?er=3';
                header($location);
            }
        }else{
            $location = 'location:../posts.php?er=2';
            header($location);
        }
    }
    
    

}

//Post Image Output
if(isset($_GET['imid'])){
    $id = $_GET['imid'];
    $sql = "SELECT * FROM blogs WHERE id ='".$id."'";
    $result = $db->query($sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $imageData = $row['image'];
        $imageType= $row['imgtype'];
    }
    header('content-type: image/"'.$imageType.'"');
    echo $imageData;
}


// Post Delete
if(isset($_GET['pdid'])){
    $sql = "DELETE FROM blogs WHERE id = '".$_GET['pdid']."'";
    $result = $db->query($sql);
    if($result){
        $sql =  "DELETE FROM favourite WHERE postid = '".$_GET['pdid']."'";
        $result = $db->query($sql);
        if($result){
            $location = 'location:../postlists.php?er=0';
            header($location);
        }
    }
}
// Post update
if(isset($_POST['pro-edit-button'])){
    $peid = $_POST['peid'];
    $imageName = $_FILES['image']['name'];
    $imageData = mysqli_real_escape_string($db, file_get_contents($_FILES['image']['tmp_name']));
    $imageType = $_FILES['image']['type'];

    $pname = $_POST['title'];
    $content = $_POST['content'];

    if(empty($pname) || empty($content)){
        $location = 'location:../postedit.php?er=1&peid='.$peid;
        header($location);
    }else{
        if(substr($imageType,0,5) == 'image'){
            $sql = "UPDATE blogs SET title='".$pname."', post='".$content."', image='".$imageData."', imgtype='".$imageType."' WHERE id='".$peid."'";
            $result = $db->query($sql);
            if($result){
                $location = 'location:../postedit.php?er=3&peid='.$peid;
                header($location);
            }
        }else{
            $location = 'location:../postedit.php?er=2&peid='.$peid;
            header($location);
        }
    }
}



// Get the All users in users table

function getallusers(){
    include('dbcon.php');
    $sql = "SELECT * FROM users ORDER BY id DESC";
    $result = $db->query($sql);
    $count =1;
    $rows = $result->num_rows;
    if($rows == 0){
        echo 'have No Users';
    }else{
        echo '<thead class="bg-primary">
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            UserName
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Phone
                          </th>
                          <th>
                            UserName
                          </th>
                        </tr>
                      </thead>';
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo '
            <tr>
              <td class="font-weight-medium">
                '.$count++.'
              </td>
              <td>
                '.$row['name'].'
              </td>
              <td>
                '.$row['email'].'
              </td>
              <td>
                '.$row['phone'].'
              </td>
                 <td> '.$row['user_name'].'</td>
            </tr>
        ';
        }
    }
    
}


// Get the all Contact 

function getthecontact(){
    include('dbcon.php');
    $sql = "SELECT comments.id as id, comments.status as status, comments.comment as comment, comments.comment_date as comment_date ,blogs.title as title FROM `comments` left join blogs on comments.blog_id =  blogs.id ORDER BY comments.id DESC";
    $result = $db->query($sql);
    
    $row = $result->num_rows;
    if($row == 0){
        echo 'Have no Message';
    }else{
        $count = 1;
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $check_title = "SELECT * FROM blogs WHERE title = '".$row['title']."'";
            $check_result =  $db->query($check_title);
            $check_row  = $check_result->num_rows;
            $delpost = 1;
            if($check_row == 0){
                $delpost = 0;
            }
            echo '
            <tr>
            <td>'.$count++.'</td>
                <td>
                '?><?php if($delpost ==0){
                    echo "Post Deleted";
                }else{
                   echo $row['title'];
                }?><?php echo '
              </td>
              <td>
                '.$row['comment'].'
              </td>
              <td>
                '.$row['comment_date'].'
              </td>
              <td>';
            if($row['status'] == 0){
                echo '<a href="action/functions.php?paid='.$row['id'].'" class="btn btn-xs btn-primary">Accept</a>';
            }else{
                echo '<a href="action/functions.php?pdeid='.$row['id'].'" class="btn btn-xs btn-danger">Decline</a>';
            }
            '</td>
              </tr>';
        }
    }
}




// Total Users

function totalUser(){
    include('dbcon.php');
    $sql = "SELECT * FROM users";
    $result = $db->query($sql);
    $row = $result->num_rows;
    if($row == 0){
        echo 'Have No User';
    }
    echo $row;
}
// Total Users

function activeUser(){
    include('dbcon.php');
    $sql = "SELECT * FROM users WHERE action =1";
    $result = $db->query($sql);
    $row = $result->num_rows;
    if($row == 0){
        echo 'Have No User';
    }else{
        echo $row;
    }
    
}



// Comments  active
if(isset($_GET['paid'])){
    $faid = $_GET['paid'];
    $update = "UPDATE comments SET status='1' WHERE id='".$faid."'";
    $result = $db->query($update);
    if($result){
        $location = 'location:../comments.php?er=0';
        header($location);
    }
}



// Comments  Deactive

if(isset($_GET['pdeid'])){
    $fdeid = $_GET['pdeid'];
    $update = "UPDATE comments SET status='0' WHERE id='".$fdeid."'";
    $result = $db->query($update);
    if($result){
        $location = 'location:../comments.php?er=0';
        header($location);
    }
}


// Post  active
if(isset($_GET['poaid'])){
    $faid = $_GET['poaid'];
    $update = "UPDATE blogs SET status='1' WHERE id='".$faid."'";
    $result = $db->query($update);
    if($result){
        $location = 'location:../postlists.php?er=0';
        header($location);
    }
}



// Post  Deactive

if(isset($_GET['podeid'])){
    $fdeid = $_GET['podeid'];
    $update = "UPDATE blogs SET status='0' WHERE id='".$fdeid."'";
    $result = $db->query($update);
    if($result){
        $location = 'location:../postlists.php?er=0';
        header($location);
    }
}






































































































//// FAQ insert in faq Table
//if(isset($_POST['faq-button'])){
//    $heading = $_POST['heading'];
//    $content = $_POST['content'];
//    
//    if(empty($heading) || empty($content)){
//        $location = 'location:../faq.php?er=1';
//        header($location);
//    }else{
//        $check = "SELECT * FROM faq WHERE heading='".$heading."'";
//        $result = $db->query($check);
//        $row = $result->num_rows;
//        if($row>=1){
//            $location = 'location:../faq.php?er=2';
//            header($location);
//        }else{
//            $faqsql = "INSERT INTO `faq`(`heading`, `content`) VALUES ('".$heading."','".$content."')";
//            $result = $db->query($faqsql);
//            if($result){
//                $location = 'location:../faq.php?er=3';
//                header($location);
//            }
//        }
//    }
//}

//// FAQ Edit 
//if(isset($_POST['faq-edit-button'])){
//    $feid = $_POST['fid'];
//    $heading = $_POST['heading'];
//    $content = $_POST['content'];
//    
//    if(empty($heading) || empty($content)){
//        $location = 'location:../faqedit.php?feid='.$feid.'&er=1';
//        header($location);
//    }else{
//        $check = "SELECT * FROM faq WHERE heading='".$heading."'";
//        $result = $db->query($check);
//        $row = $result->num_rows;
//        if($row>1){
//            $location = 'location:../faqedit.php?feid='.$feid.'&er=2';
//            header($location);
//        }else{
//            $update = "UPDATE faq SET heading='".$heading."' , content = '".$content."' WHERE id='".$feid."'";
//            $result = $db->query($update);
//            if($result){
//                $location = 'location:../faqedit.php?feid='.$feid.'&er=3';
//                header($location);
//            }
//        }
//    }
//}
//// FAQ Delete
//if(isset($_GET['fdid'])){
//    $fdid = $_GET['fdid'];
//    $sql = "DELETE FROM faq WHERE id = '".$fdid."'";
//    $result = $db->query($sql);
//    if($result){
//        $location = 'location:../faqlist.php?er=0';
//        header($location);
//    }
//}
//
//// FAQ active
//if(isset($_GET['faid'])){
//    $faid = $_GET['faid'];
//    $update = "UPDATE faq SET status='1' WHERE id='".$faid."'";
//    $result = $db->query($update);
//    if($result){
//        $location = 'location:../faqlist.php?er=0';
//        header($location);
//    }
//}
//
//
//
//// FAQ Deactive
//
//if(isset($_GET['fdeid'])){
//    $fdeid = $_GET['fdeid'];
//    $update = "UPDATE faq SET status='0' WHERE id='".$fdeid."'";
//    $result = $db->query($update);
//    if($result){
//        $location = 'location:../faqlist.php?er=0';
//        header($location);
//    }
//}




