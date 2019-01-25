<?php
include 'header.php';
include 'sidebar.php';
include 'action/functions.php';

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center"> <i class="menu-icon mdi mdi-content-copy"></i> All Products Lists</h4>
                </div>
                <div class="faq-list-table"  style="width:100%">
                    <table class="table table-striped text-center" >
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-center ">#</th>
                                <th class="text-center ">image</th>
                                <th class="text-center ">Heading</th>
                                <th class="text-center ">Content</th>
                                <th class="text-center ">Date</th>
                                <th class="text-center ">Action</th>
                            </tr>
                        </thead>
                        <tbody class="pegenation">
                            <?php 
                                $faqlist = "SELECT * FROM blogs order by id DESC";
                                $result = $db->query($faqlist);
                                $count = 1;
                                while($row = $result->fetch_assoc()){
                                    if($row['status'] == 0){
                                        echo'
                                        <tr>
                                            <td>'.$count++.'</td>
                                            <td><img src="action/functions.php?imid='.$row['id'].'"></td>
                                            <td>'.substr($row['title'],0,10).'</td>
                                            <td>'.substr($row['post'],0,15).'</td>
                                            <td>'.$row['date'].' </td>
                                            <td>
                                                <a href="action/functions.php?poaid='.$row['id'].'&er=0" class="btn btn-xs btn-primary">Active</a>
                                                <a href="postedit.php?peid='.$row['id'].'&er=0" class="btn btn-xs btn-primary">Edit</a>
                                                <a href="action/functions.php?pdid='.$row['id'].'" class="btn btn-xs btn-danger">Delete</a>
                                            </td>
                                            <td>
                                        </tr>'; 
                                    }else{
                                        echo'
                                    <tr>
                                        <td>'.$count++.'</td>
                                        <td><img src="action/functions.php?imid='.$row['id'].'"></td>
                                        <td>'.substr($row['title'],0,10).'</td>
                                        <td>'.substr($row['post'],0,15).'</td>
                                        <td>'.$row['date'].' </td>
                                        <td>
                                            <a href="action/functions.php?podeid='.$row['id'].'&er=0" class="btn btn-xs btn-danger">Deactive</a>
                                            <a href="postedit.php?peid='.$row['id'].'&er=0" class="btn btn-xs btn-primary">Edit</a>
                                            <a href="action/functions.php?pdid='.$row['id'].'" class="btn btn-xs btn-danger">Delete</a>
                                        </td>
                                        <td>
                                    </tr>'; 
                                    }   
                                } 
                            ?>
                        </tbody>
                    </table>
                    <div id="tab"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>