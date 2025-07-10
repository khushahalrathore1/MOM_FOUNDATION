<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">
<head>
       <?php 
        require('style.php');
        require('script.php'); 
       ?>


</script>
    
</head>
<body>
    <?php require('sidebar.php'); ?>
    <?php require('header.php'); ?>
   <div class="card mb-3">
  <div class="card-header">
    <div class="row flex-between-end">
      <div class="col-auto align-self-center">
        <h5 class="mb-0">Foreigners Visit Management</h5>
      </div>
      <div class="col-auto ms-auto">
        <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
          <!-- <button class="btn btn-sm active" data-bs-toggle="pill" data-bs-target="#foreignerFormTab" type="button" role="tab" aria-controls="foreignerFormTab" aria-selected="true">All Foreign Visitors</button> -->
        </div>
      </div>
    </div>
  </div>
  <div class="card-body bg-body-tertiary">
    <div class="tab-content">
      <div class="tab-pane preview-tab-pane active" id="foreignerFormTab">
        <form class="row g-3 needs-validation" novalidate>
          <div class="col-md-4">
            <label class="form-label">Foreigner Name</label>
            <input class="form-control" type="text" required />
          </div>

          <div class="col-md-8">
            <label class="form-label">Full Address</label>
            <input class="form-control" type="text" required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Passport Number</label>
            <input class="form-control" type="text" required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Visa Type</label>
            <input class="form-control" type="text" required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Duration of Stay</label>
            <input class="form-control" type="text" placeholder="e.g. 3 months" required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Date of Home Visit - From</label>
            <input class="form-control datetimepicker" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Date of Home Visit - Till</label>
            <input class="form-control datetimepicker" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Foreigner Status</label>
            <select class="form-select" onchange="toggleOccupation(this.value)" required>
              <option selected disabled>Select Status</option>
              <option value="Student">Student</option>
              <option value="Working">Working</option>
            </select>
          </div>

          <div class="col-md-3" id="occupationDiv" style="display:none;">
            <label class="form-label">Occupation</label>
            <input class="form-control" type="text" />
          </div>

          <div class="col-md-3">
            <label class="form-label">Date of Birth</label>
            <input class="form-control datetimepicker" id="dob" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' onchange="calculateAge()" required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Age</label>
            <input class="form-control" id="age" type="text" readonly />
          </div>

          <div class="col-md-6">
            <label class="form-label">Address</label>
            <input class="form-control" type="text" required />
          </div>

          <div class="mb-2">
            <label class="form-label">Any Donation?</label>
            <textarea class="form-control" rows="2" placeholder="Describe briefly"></textarea>
          </div>

          <div class="col-md-6">
            <label class="form-label">Reason for Donating</label>
            <input class="form-control" type="text" />
          </div>

          <div class="col-md-3">
            <label class="form-label">Contact Number</label>
            <input class="form-control" type="text" required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Email ID</label>
            <input class="form-control" type="email" required />
          </div>

          <div class="col-md-6">
            <label class="form-label">Purpose of Visit</label>
            <input class="form-control" type="text" required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Marital Status</label>
            <select class="form-select" onchange="toggleMarital(this.value)" required>
              <option selected disabled>Select Status</option>
              <option value="Single">Single</option>
              <option value="Married">Married</option>
              <option value="Divorced">Divorced</option>
            </select>
          </div>

          <div class="col-md-3" id="husbandNameDiv" style="display:none;">
            <label class="form-label">Husband’s Name</label>
            <input class="form-control" type="text" />
          </div>

          <div class="col-md-3" id="marriageDateDiv" style="display:none;">
            <label class="form-label">Marriage Date</label>
            <input class="form-control datetimepicker" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' />
          </div>

          <div class="col-md-3" id="husbandOccDiv" style="display:none;">
            <label class="form-label">Husband’s Occupation</label>
            <input class="form-control" type="text" />
          </div>

          <div class="col-md-3" id="livingLocationDiv" style="display:none;">
            <label class="form-label">Living in (Location)</label>
            <input class="form-control" type="text" />
          </div>

          <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function toggleOccupation(value) {
    document.getElementById('occupationDiv').style.display = (value === 'Working') ? 'block' : 'none';
  }

  function toggleMarital(value) {
    const show = value === 'Married';
    document.getElementById('husbandNameDiv').style.display = show ? 'block' : 'none';
    document.getElementById('marriageDateDiv').style.display = show ? 'block' : 'none';
    document.getElementById('husbandOccDiv').style.display = show ? 'block' : 'none';
    document.getElementById('livingLocationDiv').style.display = show ? 'block' : 'none';
  }


function calculateAge() {
    const dobInput = document.getElementById("dob").value;
    if (!dobInput) {
        document.getElementById("age").value = "";
        return;
    }

    const dob = new Date(dobInput);
    const today = new Date();

    let age = today.getFullYear() - dob.getFullYear();
    const m = today.getMonth() - dob.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
        age--;
    }

    document.getElementById("age").value = age;
}
</script>

    <?php require('footer.php'); ?>
</body>
</html>