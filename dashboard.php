<?php 
require('config.php');

// Totals
$total_childern = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `childern_forms`"));
$total_donor = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `donor_managment`"));
$total_foreigner = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `foreigner_managment`"));
$total_volunteer = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `volunteer_managment`"));


$today = date('m-d');
$next7Days = date('m-d', strtotime('+7 days'));

// If date range does not cross over to next year
if ($today <= $next7Days) {
    $sql = "
        SELECT *, DATE_FORMAT(dob, '%d-%m') AS dob_formatted
        FROM volunteer_managment
        WHERE DATE_FORMAT(dob, '%m-%d') BETWEEN '$today' AND '$next7Days'
        ORDER BY MONTH(dob), DAY(dob)
    ";
} else {
    // If date range crosses over to next year
    $sql = "
        SELECT *, DATE_FORMAT(dob, '%d-%m') AS dob_formatted
        FROM volunteer_managment
        WHERE DATE_FORMAT(dob, '%m-%d') >= '$today'
           OR DATE_FORMAT(dob, '%m-%d') <= '$next7Days'
        ORDER BY MONTH(dob), DAY(dob)
    ";
}

$result = mysqli_query($mysqli, $sql);
?>
 <style>
        table { border-collapse: collapse; width: 50%; margin: 20px auto; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .today { background-color: #ffeb3b; font-weight: bold; }
    </style>

<div class="d-flex mb-4 mt-3">
  <span class="fa-stack me-2 ms-n1">
    <i class="fas fa-circle fa-stack-2x text-300"></i>
    <i class="fa-inverse fa-stack-1x text-primary fas fa-percentage"></i>
  </span>
  <div class="col">
    <h5 class="mb-0 text-primary position-relative">
      <span class="bg-200 dark__bg-1100 pe-3">Dashboard & Analytics</span>
      <span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-n1"></span>
    </h5>
    <p class="mb-0">You can easily show your stats content by using these cards.</p>
  </div>
</div>

<div class="row g-3 mb-3">
  <div class="col-sm-6 col-md-3">
    <div class="card overflow-hidden">
      <div class="card-body">
        <h6 class="text-warning">Total Children Registered</h6>
        <div class="display-4 fs-5 mb-2 fw-normal font-sans-serif text-warning">
          <?php echo number_format($total_childern); ?>
        </div>
        <a class="fw-semi-bold fs-10 text-nowrap text-warning" href="show_all_childern.php">
          See all Children <span class="fas fa-angle-right ms-1"></span>
        </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card overflow-hidden">
      <div class="card-body">
        <h6>Total Donor Registered</h6>
        <div class="display-4 fs-5 mb-2 fw-normal font-sans-serif text-info">
          <?php echo number_format($total_donor); ?>
        </div>
        <a class="fw-semi-bold fs-10 text-nowrap" href="#">
          See all Donors <span class="fas fa-angle-right ms-1"></span>
        </a>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card overflow-hidden">
      <div class="card-body">
        <h6 class="text-primary">Total Volunteer Registered</h6>
        <div class="display-4 fs-5 mb-2 fw-normal font-sans-serif text-primary">
          <?php echo number_format($total_volunteer); ?>
        </div>
        <a class="fw-semi-bold fs-10 text-nowrap" href="#">
          See all Volunteers <span class="fas fa-angle-right ms-1"></span>
        </a>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card overflow-hidden">
      <div class="card-body">
        <h6 class="text-danger">Total Foreign Volunteers</h6>
        <div class="display-4 fs-5 mb-2 fw-normal font-sans-serif text-danger">
          <?php echo number_format($total_foreigner); ?>
        </div>
        <a class="fw-semi-bold fs-10 text-nowrap text-danger" href="#">
          See all Foreigners <span class="fas fa-angle-right ms-1"></span>
        </a>
      </div>
    </div>
  </div>
</div>
<div class="row g-3 mb-3">
  <div class="col-sm-12 col-md-12">
    <div class="card overflow-hidden">
      <div class="card-body">
        <h6 class="text-warning">Volunteer Birthday Notification</h6>
          <h2 style="text-align:center;">🎂 Upcoming Birthdays (Next 7 Days)</h2>
<table>
    <tr>
        <th>Name</th>
        <th>DOB</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $dob = $row['dob'];
        $age = date_diff(date_create($dob), date_create('today'))->y;
        $dobMonthDay = date('m-d', strtotime($dob));
        $isToday = ($dobMonthDay == $today) ? 'today' : '';
        
        echo "<tr class='$isToday'>";
        echo "<td>" . htmlspecialchars($row['volunteer_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['dob_formatted']) . "</td>";
        echo "<td>" . $age . " Years</td>";
echo "<td>
    <button class='btn btn-success' onclick=\"sendSMS('" . addslashes($row['volunteer_name']) . "', '" . $row['dob_formatted'] . "')\">
        <span class='fas fa-sms me-1'></span>
    </button>
</td>";

        echo "</tr>";
    }
    ?>
</table>

<script>
function sendSMS(name, dob) {
    alert("SMS sent to " + name + " for birthday on " + dob);
    // Here you can make an AJAX call to your SMS API
}
</script>
        <a class="fw-semi-bold fs-10 text-nowrap text-warning" href="show_all_childern.php">
          See all upcoming Birthday Information <span class="fas fa-angle-right ms-1"></span>
        </a>
      </div>
    </div>
</div>


<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
