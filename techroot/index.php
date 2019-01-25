<?php
session_start();
if(!isset($_SESSION["user_id"])){
    header('location:../login.php');
}
include 'header.php';
include 'sidebar.php';
include 'action/functions.php';



$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
$yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="sc")';
$yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
//Make call with cURL
$session = curl_init($yql_query_url);
curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
$json = curl_exec($session);
// Convert JSON to PHP object
$phpObj =  json_decode($json);

?>


            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Active Users</p>
                      <div class="fluid-container">
                          <h3 class="font-weight-medium text-right mb-0"><?php activeUser();?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Total Active Users
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Users</p>
                      <div class="fluid-container">
                          <h3 class="font-weight-medium text-right mb-0"><?php totalUser();?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i>  All of Users
                  </p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Our Users</h4>
                    <div class="table-responsive tbl-height" >
                    <table class="table table-bordered">
                        <?php getallusers();?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
           
<?php
   include 'footer.php';        
?>

