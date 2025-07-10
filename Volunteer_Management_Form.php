<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">
<head>
       <?php 
        require('style.php');
        require('script.php'); 
       ?>
<script>
  function currentstatus(current_status) {
    // Optional: Debug alert
    // alert(current_status);

    var occDiv = document.getElementById("occupationDiv");

    if (current_status === "Working") {
      occDiv.style.display = "block";
    } else {
      occDiv.style.display = "none";
      document.getElementById("validationCustom01").value = ""; // Clear field if hidden
    }
  }
   function Maritalstatus(value) {
    const show = value === 'Married';

    document.getElementById('husbandNameDiv').style.display = show ? 'block' : 'none';
    document.getElementById('husbandOccupationDiv').style.display = show ? 'block' : 'none';
    document.getElementById('husbandLivingDiv').style.display = show ? 'block' : 'none';

    // Optional: clear values if hidden
    if (!show) {
      document.getElementById('husbandName').value = '';
      document.getElementById('husbandOccupation').value = '';
      document.getElementById('husbandLiving').value = '';
    }
  }
</script>

</script>
    
</head>
<body>
    <?php require('sidebar.php'); ?>
    <?php require('header.php'); ?>
   <div class="card mb-3">
  <div class="card-header">
    <div class="row flex-between-end">
      <div class="col-auto align-self-center">
        <h5 class="mb-0" data-anchor="data-anchor">Volunteer Management Form</h5>
      </div>
      <div class="col-auto ms-auto">
        <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
          <!-- <button class="btn btn-sm active" data-bs-toggle="pill" data-bs-target="#volunteerFormTab" type="button" role="tab" aria-controls="volunteerFormTab" aria-selected="true" id="tab-volunteerFormTab">All Volunteer Form</button> -->
        </div>
      </div>
    </div>
  </div>
  <div class="card-body bg-body-tertiary">
    <div class="tab-content">
      <div class="tab-pane preview-tab-pane active" role="tabpanel" id="volunteerFormTab">
        <form class="row g-3 needs-validation" novalidate>
          <div class="col-md-3">
            <label class="form-label">Volunteer Name</label>
            <input class="form-control" type="text" required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Type</label>
            <select class="form-select" onchange="toggleCountry(this.value)" required>
              <option selected disabled>Select Type</option>
              <option value="Indian">Indian</option>
              <option value="Foreigner">Foreigner</option>
            </select>
          </div>

          <div class="col-md-3" id="countryDiv" style="display:none;">
            <label class="form-label">Country (If Foreigner)</label>
            <input class="form-control" type="text" />
          </div>

          <div class="col-md-6">
            <label class="form-label">Full Address</label>
            <input class="form-control" type="text" required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Passport Number</label>
            <input class="form-control" type="text" />
          </div>

          <div class="col-md-3">
            <label class="form-label">Visa Type</label>
            <input class="form-control" type="text" />
          </div>

          <div class="col-md-3">
            <label class="form-label">Duration of Stay</label>
            <input class="form-control" type="text" placeholder="e.g. 2 months, 1 year" />
          </div>

          <div class="col-md-3">
            <label class="form-label">Date of Home Visit - From</label>
            <input class="form-control datetimepicker" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' />
          </div>

          <div class="col-md-3">
            <label class="form-label">Date of Home Visit - Till</label>
            <input class="form-control datetimepicker" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' />
          </div>

          <div class="col-md-3">
            <label class="form-label">Volunteer Status</label>
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
            <input class="form-control" id="age" type="text" placeholder="Auto Calculated" readonly />
          </div>

          <div class="col-md-6">
            <label class="form-label">Permanent Address</label>
            <input class="form-control" type="text" required />
          </div>

          <div class="col-md-6">
            <label class="form-label">Local Address</label>
            <input class="form-control" type="text" required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Date of Visit</label>
            <input class="form-control datetimepicker" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' required />
          </div>

          <div class="col-md-6">
            <label class="form-label">Reason for Volunteering</label>
            <input class="form-control" type="text" required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Contact Number</label>
            <input class="form-control" type="text" required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Email ID</label>
            <input class="form-control" type="email" required />
          </div>

          <div class="col-md-3">
            <label class="form-label">Marital Status</label>
            <select class="form-select" onchange="toggleMarital(this.value)" required>
              <option selected disabled>Select Status</option>
              <option value="Married">Married</option>
              <option value="Unmarried">Unmarried</option>
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

  function toggleCountry(value) {
    document.getElementById('countryDiv').style.display = (value === 'Foreigner') ? 'block' : 'none';
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