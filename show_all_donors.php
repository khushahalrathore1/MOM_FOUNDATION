<?php
require('config.php');
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">
<head>
  <?php 
    require('style.php');
    require('script.php'); 
  ?>
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

  <style>
    .btn-gradient-regular {
      background: linear-gradient(-45deg, rgba(0, 160, 255, 0.86), #0048a2) !important;
      color: #fff !important;
      border: none !important;
      margin-right: 5px;
      border-radius: 6px;
    }
    .btn-gradient-regular:hover { filter: brightness(1.1); }

    .dataTables_wrapper .dataTables_paginate { text-align: center !important; float: none !important; margin-top: 20px; }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      display: inline-flex; align-items: center; justify-content: center;
      width: 42px; height: 42px; margin: 0 4px;
      border-radius: 12px; border: 1px solid #ddd; background: #fff; color: #333 !important;
      font-size: 16px; font-weight: 500; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: all 0.3s ease;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background: #f5f5f5 !important; color: #222 !important; border-color: #ccc !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      color: #1976d2 !important; font-weight: bold; border-color: #1976d2 !important;
    }
    .dataTables_info { display: none; }

    table.dataTable tbody tr:nth-child(odd) { background: linear-gradient(90deg, #e8f0fe, #f5faff); }
    table.dataTable tbody tr:nth-child(even) { background: linear-gradient(90deg, #fff, #e0f7fa); }
    table.dataTable tbody tr:hover { background-color: #d1eaff !important; transition: background-color 0.3s ease-in-out; }
  </style>
</head>
<body>
<?php require('sidebar.php'); ?>
<?php require('header.php'); ?>

<div class="card mb-3">
  <div class="card-header">
    <div class="row flex-between-end">
      <div class="col-auto align-self-center">
        <h5 class="mb-0">All Donors Information</h5>
      </div>
      <div class="col-auto ms-auto d-flex align-items-center">
        <a href="donor_management_form.php">
          <button class="btn btn-gradient-regular me-2 mb-1" type="button">
            <span class="fas fa-user-plus me-1"></span> Add Donor
          </button>
        </a>
      </div>
    </div>
  <div class="table-responsive">
    <table id="donorsTable" class="display nowrap table table-bordered table-striped dt-responsive" style="width:100%">
      <thead>
        <tr>
          <th>Sr.No</th>
          <th>Name</th>
          <th>Status</th>
          <th>Occupation</th>
          <th>Contact</th>
          <th>Email</th>
          <th>Age/DOB</th>
          <th>Visit Date</th>
          <th>Donated Description</th>
          <th>Reason</th>
          <th>In Memory Of</th>
          <th>Marital Status</th>
          <th>Photos</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM donor_managment ORDER BY donor_managment_id DESC";
        $result = mysqli_query($mysqli, $query);
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>".$i++."</td>";
          echo "<td>".htmlspecialchars($row['donor_name'])."</td>";
          echo "<td>".htmlspecialchars($row['donor_status'])."</td>";
          echo "<td>".htmlspecialchars($row['occupation'])."</td>";
          echo "<td>".htmlspecialchars($row['contact_no'])."</td>";
          echo "<td>".htmlspecialchars($row['email'])."</td>";
          echo "<td>".htmlspecialchars($row['age'])."<br>".htmlspecialchars($row['dob'])."</td>";
          echo "<td>".htmlspecialchars($row['visit_date'])."</td>";
          echo "<td>".htmlspecialchars($row['donated_description'])."</td>";
          echo "<td>".htmlspecialchars($row['reason_for_donating'])."</td>";
          echo "<td>".htmlspecialchars($row['memory_name'])."</td>";
          echo "<td>".htmlspecialchars($row['marital_status'])."</td>";
          echo "<td>";
          if ($row['event_photo_first']) {
            echo "<img src='donor_uploads/".htmlspecialchars($row['event_photo_first'])."' width='50' height='50' style='border-radius:4px;margin-right:3px;'>";
          }
          if ($row['event_photo_second']) {
            echo "<img src='donor_uploads/".htmlspecialchars($row['event_photo_second'])."' width='50' height='50' style='border-radius:4px;margin-right:3px;'>";
          }
          if ($row['event_photo_third']) {
            echo "<img src='donor_uploads/".htmlspecialchars($row['event_photo_third'])."' width='50' height='50' style='border-radius:4px;'>";
          }
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
      </div>
<?php require('footer.php'); ?>
<!-- jQuery + Bootstrap + DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
  $(document).ready(function () {
    $('#donorsTable').DataTable({
      responsive: true,
      dom: "<'justify-content-center mb-4'B>frtip",
      buttons: [
        { extend: 'copy', className: 'btn btn-gradient-regular' },
        { extend: 'csv', className: 'btn btn-gradient-regular' },
        { extend: 'excel', className: 'btn btn-gradient-regular' },
        { extend: 'pdf', className: 'btn btn-gradient-regular' },
        { extend: 'print', className: 'btn btn-gradient-regular' }
      ],
      pagingType: 'simple_numbers',
      pageLength: 10,
      language: {
        paginate: {
          previous: '<',
          next: '>'
        }
      }
    });
  });
</script>


</body>
</html>
