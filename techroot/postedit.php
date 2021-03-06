<?php
include 'action/functions.php';
include 'header.php';
include 'sidebar.php';


//Get the value from faq table by using feid
$sql = "SELECT * FROM blogs WHERE id='".$_GET['peid']."'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center"> <i class="menu-icon mdi mdi-content-copy"></i> Post Update</h4>
                    <p class="card-description text-center">
                        Post Edit Form
                    </p>
                    <form action="action/functions.php" method="POST" class="forms-sample" enctype="multipart/form-data">
                       <div class="form-group">
                           <label for="photo"><img src="action/functions.php?imid=<?php echo $_GET['peid'];?>" alt=""> <span>Post Image</span></label>
                           <input type="file" name="image" id="photo" style="display:none;" >
                       </div>
                       
                        <div class="form-group">
                            <label for="title">Blog Title</label>
                            <input type="text" class="form-control" id="title"  value="<?php echo $row['title'];?>" name="title">
                        </div>
                        
                        <div class="form-group">
                            <label for="content">Blog Content</label>
                            <textarea name="content" id="content" cols="30" rows="10"  class="form-control"><?php echo htmlspecialchars($row['post']);?></textarea>
                        </div>
                        <input type="hidden" name="peid" value="<?php echo $_GET['peid'];?>">
                        <button type="submit" class="btn btn-success mr-2" name="pro-edit-button">Submit</button>
                        <button class="btn btn-light" type="reset">Reset</button>
                        <?php
                        if($_GET['er']==0){

                        }
                        elseif($_GET['er']==1){
                            echo '<b class="alert alert-danger"> :):) Something is missing !</b>';
                        }
                        elseif($_GET['er']==2){
                            echo '<b class="alert alert-danger"> :):) Only use as Image</b>';
                        }
                        elseif($_GET['er']==3){
                            echo '<b class="alert alert-success">Update Successfully Completed</b>';
                        }



                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>