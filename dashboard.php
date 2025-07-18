<?php 
require('config.php');

// Total children
$find_all_childern_rows = "SELECT * FROM `childern_forms`";
$result = mysqli_query($mysqli, $find_all_childern_rows);
$total_childern = ($result) ? mysqli_num_rows($result) : 0;

// Total donors
$find_all_donor_rows = "SELECT * FROM `donor_managment`";
$result_donor = mysqli_query($mysqli, $find_all_donor_rows);
$total_donor = ($result_donor) ? mysqli_num_rows($result_donor) : 0;

// Total foreigners
$find_all_foreigner_rows = "SELECT * FROM `foreigner_managment`";
$result_foreigner = mysqli_query($mysqli, $find_all_foreigner_rows);
$total_foreigner = ($result_foreigner) ? mysqli_num_rows($result_foreigner) : 0;

// Total volunteers
$find_all_volunteer_rows = "SELECT * FROM `volunteer_managment`";
$result_volunteer = mysqli_query($mysqli, $find_all_volunteer_rows);
$total_volunteer = ($result_volunteer) ? mysqli_num_rows($result_volunteer) : 0;

?>

<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-percentage"></i></span>
            <div class="col">
              <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Dashboard &amp; Analytics</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-n1"></span></h5>
              <p class="mb-0">You can easily show your stats content by using these cards.</p>
            </div>
          </div>
          <div class="row g-3 mb-3">
            <div class="col-sm-6 col-md-3">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);"></div><!--/.bg-holder-->
                <div class="card-body position-relative">
                  <h6 class="text-warning">Total Childern Registred</h6>
                  <div class="display-4 fs-5 mb-2 fw-normal font-sans-serif text-warning">
                    <?php echo number_format($total_childern); ?>
                  </div>
                  <a class="fw-semi-bold fs-10 text-nowrap text-warning" href="show_all_childern.php">
                    See all Childern<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-2.png);"></div><!--/.bg-holder-->
                <div class="card-body position-relative">
                  <h6>Total Doner Registred</h6>
                  <div class="display-4 fs-5 mb-2 fw-normal font-sans-serif text-info">
                     <?php echo number_format($total_donor); ?>
                  </div>      
                  <a class="fw-semi-bold fs-10 text-nowrap" href="">Sell All Donor
                    <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-3.png);"></div><!--/.bg-holder-->
                <div class="card-body position-relative">
                  <h6 class="text-primary">Total Volunteer Registred</h6>
                  <div class="display-4 fs-5 mb-2 fw-normal font-sans-serif text-primary"> <?php echo number_format($total_volunteer); ?></div>
                  <a class="fw-semi-bold fs-10 text-nowrap" href="index.html">Sell All Volunteer<span class="fas fa-angle-right ms-1" data-fa-transform="down-1">

                  </span></a>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-3.png);"></div><!--/.bg-holder-->
                <div class="card-body position-relative">
                  <h6 class="text-danger">Total Volunteer Foreigneer</h6>
                  <div class="display-4 fs-5 mb-2 fw-normal font-sans-serif text-danger" > <?php echo number_format($total_foreigner); ?></div>
                  <a class="fw-semi-bold fs-10 text-nowrap text-danger" href="index.html">Sell All Foreigneer<span class="fas fa-angle-right ms-1" data-fa-transform="down-1">

                  </span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="row g-3 mb-3">
            <div class="col-md-6 col-lg-4 col-xl-6 col-xxl-4">
              <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                  <h6 class="mb-0 mt-2 d-flex align-items-center">
                      Total Foreigners Visitor<span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                  <div class="row">
                    <div class="col">
                      <p class="font-sans-serif lh-1 mb-1 fs-5">$47K</p><span class="badge badge-subtle-success rounded-pill fs-11">+3.5%</span>
                    </div>
                    <div class="col-auto ps-0">
                      <div class="echart-bar-weekly-sales h-100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-6 col-xxl-4">
              <div class="card h-md-100">
                <div class="card-header pb-0">
                  <h6 class="mb-0 mt-2">Total Order</h6>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                  <div class="row justify-content-between">
                    <div class="col-auto align-self-end">
                      <div class="fs-5 fw-normal font-sans-serif text-700 lh-1 mb-1">58.4K</div><span class="badge rounded-pill fs-11 bg-200 text-primary"><span class="fas fa-caret-up me-1"></span>13.6%</span>
                    </div>
                    <div class="col-auto ps-0 mt-n4">
                      <div class="echart-default-total-order" data-echarts='{"tooltip":{"trigger":"axis","formatter":"{b0} : {c0}"},"xAxis":{"data":["Week 4","Week 5","Week 6","Week 7"]},"series":[{"type":"line","data":[20,40,100,120],"smooth":true,"lineStyle":{"width":3}}],"grid":{"bottom":"2%","top":"2%","right":"0","left":"10px"}}' data-echart-responsive="true"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-6 col-lg-4 col-xl-6 col-xxl-4">
              <div class="card h-100">
                <div class="card-header pb-0">
                  <h6 class="mb-0 mt-2 d-flex align-items-center">Product Share</h6>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                  <div class="row align-items-end">
                    <div class="col">
                      <p class="font-sans-serif lh-1 mb-1 fs-7">34.6%</p><span class="badge badge-subtle-success rounded-pill"><span class="fas fa-caret-up me-1"></span>3.5%</span>
                    </div>
                    <div class="col-auto ps-0">
                      <div><canvas class="my-n5" id="marketShareDoughnut" width="112" height="112"></canvas></div>
                      <p class="mb-0 text-center fs-11 mt-4 text-500">Target: <span class="text-800">55%</span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
