<?php
include 'action/functions.php';
include 'header.php';
include 'sidebar.php';

?>



<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">BLOG POST</h4>
                    <p class="card-description text-center">
                        Post Form
                    </p>
                    <form  action="action/functions.php" method="POST" class="forms-sample" enctype="multipart/form-data">
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
                            if($_GET['er']==0){

                            }
                            elseif($_GET['er']==1){
                                echo '<b class="alert alert-danger"> :):) Something is missing !</b>';
                            }
                            elseif($_GET['er']==2){
                                echo '<b class="alert alert-danger"> :):) Please Use Only Image File !</b>';
                            }
                            elseif($_GET['er']==3){
                                echo '<b class="alert alert-success">Insert Successfully Completed</b>';
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
<script>
$(document).ready(function(){
    $('#status').change(function(){
        var value = $(this).val();
        if(value!=''){
           $.ajax({
                url:'action/functions.php',
                method:'POST',
                data:{value : value},
                success:function(data){
                    $('#output').html(data);
                }
           });
        }
    });
});
</script>

