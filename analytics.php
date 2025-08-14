<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">
<head>
       <?php 
       require('config.php');
        require('style.php');
        require('script.php'); 
       ?>
    
  </head>
  <body>
  
       
        <?php require('sidebar.php'); ?>
            <?php require('header.php'); ?>
   
<div class="d-flex mb-4 mt-3">
  <span class="fa-stack me-2 ms-n1">
    <i class="fas fa-circle fa-stack-2x text-300"></i>
    <i class="fa-inverse fa-stack-1x text-primary fas fa-percentage"></i>
  </span>
  <div class="col">
    <h5 class="mb-0 text-primary position-relative">
      <span class="bg-200 dark__bg-1100 pe-3">Analytics</span>
      <span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-n1"></span>
    </h5>
    <p class="mb-0">You can easily see your stats content by using these cards.</p>
  </div>
</div>
        <div class="row g-3">
            <div class="col-lg-6 col-xxl-6">
              <div class="card h-100">
                <div class="card-header">
                  <h5 class="text-900 fs-9 mb-2">Total Childern Registration</h5>
                <h6 class="mb-0 fs-11 text-500">
                <?php
                    date_default_timezone_set('Asia/Kolkata');
                    echo date('01-m-Y') . " to " . date('d-m-Y');
                    ?>
                </h6>
                </div>
                    <div class="card-body">
                    <canvas id="childrenChart" data-echart-responsive="true"></canvas>
                </div>
                <div class="card-footer bg-body-tertiary py-2">
                  <div class="row flex-between-center g-0">
                    <div class="col-auto">
                        <select id="childrenYearSelector" class="form-select form-select-sm" style="width:auto;"></select>
                    </div>
                    <div class="col-auto">
                        <select id="childrenMonthSelector" class="form-select form-select-sm" style="width:auto;"></select>
                    </div>

                    <div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="#!">View full report<span class="fas fa-chevron-right ms-1 fs-11"></span></a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-xxl-6">
              <div class="card h-100">
                <div class="card-header">
                  <h5 class="text-900 fs-9 mb-2">Total Doner Registration</h5>
                <h6 class="mb-0 fs-11 text-500">
                <?php
                    date_default_timezone_set('Asia/Kolkata');
                    echo date('01-m-Y') . " to " . date('d-m-Y');
                    ?>
                </h6>
                </div>
                    <div class="card-body">
                    <canvas id="donerChart" data-echart-responsive="true"></canvas>
                </div>
                <div class="card-footer bg-body-tertiary py-2">
                  <div class="row flex-between-center g-0">
                    <div class="col-auto">
                        <select id="donerYearSelector" class="form-select form-select-sm" style="width:auto;"></select>
                    </div>
                    <div class="col-auto">
                        <select id="donerMonthSelector" class="form-select form-select-sm" style="width:auto;"></select>
                    </div>
                    <div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="#!">View full report<span class="fas fa-chevron-right ms-1 fs-11"></span></a></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <br>
        <div class="row g-3">
            <div class="col-lg-6 col-xxl-6">
              <div class="card h-100">
                <div class="card-header">
                  <h5 class="text-900 fs-9 mb-2">Total Volunteer Registration</h5>
                <h6 class="mb-0 fs-11 text-500">
                <?php
                    date_default_timezone_set('Asia/Kolkata');
                    echo date('01-m-Y') . " to " . date('d-m-Y');
                    ?>
                </h6>
                </div>
                    <div class="card-body">
                    <canvas id="volunteerChart" data-echart-responsive="true"></canvas>
                </div>
                <div class="card-footer bg-body-tertiary py-2">
                  <div class="row flex-between-center g-0">
                    <div class="col-auto">
                        <select id="volunteerYearSelector" class="form-select form-select-sm" style="width:auto;"></select>
                    </div>
                    <div class="col-auto">
                        <select id="volunteerMonthSelector" class="form-select form-select-sm" style="width:auto;"></select>
                    </div>

                    <div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="#!">View full report<span class="fas fa-chevron-right ms-1 fs-11"></span></a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-xxl-6">
              <div class="card h-100">
                <div class="card-header">
                  <h5 class="text-900 fs-9 mb-2">Total Foreigners  Registration</h5>
                <h6 class="mb-0 fs-11 text-500">
                <?php
                    date_default_timezone_set('Asia/Kolkata');
                    echo date('01-m-Y') . " to " . date('d-m-Y');
                    ?>
                </h6>
                </div>
                    <div class="card-body">
                    <canvas id="foreignerChart" data-echart-responsive="true"></canvas>
                </div>
                <div class="card-footer bg-body-tertiary py-2">
                  <div class="row flex-between-center g-0">
                    <div class="col-auto">
                        <select id="foreignerYearSelector" class="form-select form-select-sm" style="width:auto;"></select>
                    </div>
                    <div class="col-auto">
                        <select id="foreignerMonthSelector" class="form-select form-select-sm" style="width:auto;"></select>
                    </div>
                    <div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="#!">View full report<span class="fas fa-chevron-right ms-1 fs-11"></span></a></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    initChart('children', 'childrenYearSelector', 'childrenMonthSelector', 'childrenChart', 'children_stats.php');
    initChart('doner', 'donerYearSelector', 'donerMonthSelector', 'donerChart', 'doner_stats.php');
    initChart('volunteerChart', 'volunteerYearSelector', 'volunteerMonthSelector', 'volunteerChart', 'volunteer_stats.php');
    initChart('foreigner', 'foreignerYearSelector', 'foreignerMonthSelector', 'foreignerChart', 'foreigner_stats.php');
});

function initChart(type, yearSelectorId, monthSelectorId, canvasId, dataUrl) {
  const yearSelector = document.getElementById(yearSelectorId);
  const monthSelector = document.getElementById(monthSelectorId);
  const now = new Date();

  // Fill years (last 5 to next 2 years)
  for (let y = now.getFullYear() - 5; y <= now.getFullYear() + 2; y++) {
    const option = new Option(y, y);
    if (y === now.getFullYear()) option.selected = true;
    yearSelector.add(option);
  }

  // Fill months
  for (let m = 1; m <= 12; m++) {
    const value = String(m).padStart(2, '0');
    const text = new Date(0, m - 1).toLocaleString('default', { month: 'long' });
    const option = new Option(text, value);
    if (m === now.getMonth() + 1) option.selected = true;
    monthSelector.add(option);
  }

  let chartInstance = null;

  function loadChart() {
    const selectedYear = yearSelector.value;
    const selectedMonth = monthSelector.value;
    const monthValue = `${selectedYear}-${selectedMonth.padStart(2, '0')}`;

    fetch(`${dataUrl}?month=${monthValue}`)
      .then(response => response.json())
      .then(data => {
        const today = new Date();
        const isCurrentMonth = (parseInt(selectedYear) === today.getFullYear() &&
                                parseInt(selectedMonth) === today.getMonth() + 1);
        const daysInMonth = isCurrentMonth
          ? today.getDate()
          : new Date(selectedYear, selectedMonth, 0).getDate();

        const labels = [];
        const totals = [];
        const colors = [];

        for (let i = 1; i <= daysInMonth; i++) {
          const day = String(i).padStart(2, '0');
          labels.push(`${day}-${selectedMonth}`);
          const found = data.find(d => d.day.startsWith(day));
          const total = found ? parseInt(found.total) : 0;
          totals.push(total);
          colors.push(total > 0 ? 'rgba(54, 162, 235, 1)' : 'red');
        }

        const ctx = document.getElementById(canvasId).getContext('2d');
        if (chartInstance) chartInstance.destroy();

        chartInstance = new Chart(ctx, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: type === 'children' ? 'Children Added' : 'Donors Added',
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
      .catch(error => console.error(`Error fetching ${type} stats:`, error));
  }

  loadChart();
  yearSelector.addEventListener('change', loadChart);
  monthSelector.addEventListener('change', loadChart);
}
</script>


          <?php require('footer.php'); ?>


  </body>


</html>