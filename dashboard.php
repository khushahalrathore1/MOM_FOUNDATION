<?php 
require('config.php');

// Totals
$total_childern = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `childern_forms`"));
$total_donor = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `donor_managment`"));
$total_foreigner = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `foreigner_managment`"));
$total_volunteer = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM `volunteer_managment`"));
?>

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

<div class="col-xxl-12">
  <div class="card h-100">
    <div class="card-header d-flex justify-content-between align-items-center bg-body-tertiary">
      <h6 class="mb-0">Total Children Registration Analytics</h6>
      <select id="monthSelector" class="form-select form-select-sm" style="width:auto;"></select>
    </div>
    <div class="card-body">
      <canvas id="childrenChart" height="100"></canvas>
    </div>
  </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const monthSelector = document.getElementById('monthSelector');
  const now = new Date();

  // Fill last 6 months dropdown
  for (let i = 0; i < 6; i++) {
    const d = new Date(now.getFullYear(), now.getMonth() - i, 1);
    const value = d.getFullYear() + '-' + String(d.getMonth() + 1).padStart(2, '0'); // YYYY-MM
    const text = d.toLocaleString('default', { month: 'long', year: 'numeric' });
    const option = new Option(text, value);
    if (i === 0) option.selected = true;
    monthSelector.add(option);
  }

  loadChart(monthSelector.value);

  monthSelector.addEventListener('change', () => {
    loadChart(monthSelector.value);
  });
});

let chartInstance = null;

function loadChart(selectedMonth) {
  fetch('children_stats.php?month=' + selectedMonth)
  .then(response => response.json())
  .then(data => {
    const today = new Date();
    const currentMonth = today.getFullYear() + '-' + String(today.getMonth() + 1).padStart(2, '0');
    const daysInMonth = (selectedMonth === currentMonth)
      ? today.getDate()
      : new Date(selectedMonth.split('-')[0], selectedMonth.split('-')[1], 0).getDate();

    const labels = [];
    const totals = [];
    const colors = [];

    for (let i = 1; i <= daysInMonth; i++) {
      const day = String(i).padStart(2, '0');
      const monthPart = selectedMonth.slice(5,7); // e.g., "07"
      labels.push(day + '-' + monthPart);

      const found = data.find(d => d.day.startsWith(day));
      const total = found ? parseInt(found.total) : 0;
      totals.push(total);
      colors.push(total > 0 ? 'rgba(54, 162, 235, 1)' : 'red');
    }

    const ctx = document.getElementById('childrenChart').getContext('2d');
    if (chartInstance) chartInstance.destroy();

    chartInstance = new Chart(ctx, {
  type: 'line',
  data: {
    labels: labels,
    datasets: [{
      label: 'Children Added',
      data: totals,
      fill: true,
      borderColor: 'rgba(54, 162, 235, 1)',
      backgroundColor: 'rgba(54, 162, 235, 0.2)',
      tension: 0.3,
      pointBackgroundColor: colors,
      pointRadius: 8,
      pointHoverRadius: 10,
      pointBorderWidth: 2,
      pointBorderColor: 'white'
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: { beginAtZero: true, ticks: { precision: 0 } }
    },
    plugins: {
      tooltip: {
        callbacks: {
          label: ctx => 'Total New Added: ' + ctx.parsed.y
        }
      }
    }
  }
});

  })
  .catch(error => console.error('Error fetching stats:', error));
}
</script>
