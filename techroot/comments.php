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
                    <h4 class="card-title text-center"> <i class="menu-icon mdi mdi-content-copy"></i> All  message Lists</h4>
                </div>
                <div class="faq-list-table"  style="width:100%">
                    <table class="table table-striped text-center"  style="width:100%;">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-center ">#</th>
                                <th class="text-center ">Post Title</th>
                                <th class="text-center ">Comments</th>
                                <th class="text-center ">Date Time</th>
                                <th class="text-center ">Action</th>
                            </tr>
                        </thead >
                        <tbody class="contents pegenation">
                            <?php 
                                getthecontact();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>