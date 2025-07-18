<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">
<head>
  <?php 
    require('style.php');
    require('script.php'); 
  ?>
  <script>
    function toggleOccupation(value) {
      document.getElementById('occupationDiv').style.display = (value === 'Working') ? 'block' : 'none';
    }

    function toggleMarital(value) {
      const show = value === 'Married';
      document.getElementById('spouse_nameDiv').style.display = show ? 'block' : 'none';
      document.getElementById('marriageDateDiv').style.display = show ? 'block' : 'none';
      document.getElementById('spouse_occupationDiv').style.display = show ? 'block' : 'none';
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
</head>

<body>
<?php require('sidebar.php'); ?>
<?php require('header.php'); ?>

<div class="card mb-3">
  <div class="card-header">
    <div class="row flex-between-end">
      <div class="col-auto align-self-center">
        <h5 class="mb-0">Donor Management Form</h5>
      </div>
      <div class="col-auto ms-auto d-flex align-items-center">
        <a href="show_all_donors.php">
          <button class="btn btn-primary me-2 mb-1" type="button">
            <span class="fas fa-users me-1"></span> Show All Donors
          </button>
        </a>
      </div>
    </div>
  </div>
</div>

<form class="row g-3 needs-validation" method="post" action="donor_managment_form_action.php" enctype="multipart/form-data" novalidate>

  <!-- Personal Information -->
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0 text-primary">Personal Information</h5>
    </div>
    <div class="card-body bg-body-tertiary">
      <div class="row">
        <div class="col-sm-3">
          <label class="form-label">Donor Full Name</label>
          <input class="form-control" name="donor_name" type="text" required onchange="get_unique_id_childern(this.value)" />
          <div class="invalid-feedback">Enter donor's name.</div>
        </div>
        <div class="col-sm-2">
          <label class="form-label">Donor Status</label>
          <select class="form-select" name="donor_status" onchange="toggleOccupation(this.value)" required>
            <option value="">Select Status</option>
            <option value="Student">Student</option>
            <option value="Working">Working</option>
          </select>
          <div class="invalid-feedback">Select status.</div>
        </div>
        <div class="col-sm-2" id="occupationDiv" style="display:none;">
          <label class="form-label">Occupation</label>
          <input class="form-control" name="occupation" type="text" />
        </div>
        <div class="col-sm-2">
          <label class="form-label">Date of Birth</label>
          <input class="form-control datetimepicker" id="dob" name="dob" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' onchange="calculateAge()" required />
          <div class="invalid-feedback">Enter date of birth.</div>
        </div>
        <div class="col-sm-1">
          <label class="form-label">Age</label>
          <input class="form-control" id="age" name="age" type="text" readonly placeholder="Auto" />
        </div>
        <div class="col-sm-2">
          <label class="form-label">Contact No.</label>
          <input class="form-control" name="contact_no" type="text" required />
          <div class="invalid-feedback">Enter contact number.</div>
        </div>
        <div class="col-sm-2">
          <label class="form-label">Email</label>
          <input class="form-control" name="email" type="email" required />
          <div class="invalid-feedback">Enter valid email.</div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <label class="form-label">Permanent Address</label>
          <textarea class="form-control" name="address" rows="1" required></textarea>
          <div class="invalid-feedback">Enter address.</div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2">
          <label class="form-label">Date of Visit</label>
          <input class="form-control datetimepicker" name="visit_date"  data-options='{"disableMobile":true}' type="text" placeholder="dd/mm/yyyy" required />
          <div class="invalid-feedback">Select date of visit.</div>
        </div>
        <div class="col-md-5">
          <label class="form-label">Donated (Brief Description)</label>
          <textarea class="form-control" name="donated_description" rows="1" required></textarea>
          <div class="invalid-feedback">Enter donated description.</div>
        </div>
        <div class="col-md-5">
          <label class="form-label">Reason for Donating</label>
          <textarea class="form-control" name="reason_for_donating" rows="1" required></textarea>
          <div class="invalid-feedback">Enter reason for donating.</div>
        </div>
      </div>
    </div>
  </div>

  <!-- On Behalf Of -->
  <div class="card mt-3">
    <div class="card-header">
      <h5 class="mb-0 text-primary">On Behalf Of</h5>
    </div>
    <div class="card-body bg-body-tertiary">
      <div class="row">
        <div class="col-sm-3">
          <label class="form-label">Name of the Person</label>
          <input class="form-control" name="memory_name" type="text" />
        </div>
        <div class="col-sm-2">
          <label class="form-label">Date of Birth</label>
          <input class="form-control datetimepicker" name="memory_dob"  data-options='{"disableMobile":true}' type="text" placeholder="dd/mm/yyyy" />
        </div>
        <div class="col-sm-2">
          <label class="form-label">Date of Death</label>
          <input class="form-control datetimepicker" name="memory_dod"  data-options='{"disableMobile":true}' type="text" placeholder="dd/mm/yyyy" />
        </div>
        <div class="col-sm-2">
          <label class="form-label">Marital Status</label>
          <select class="form-select" name="marital_status" onchange="toggleMarital(this.value)" required>
            <option value="">Select</option>
            <option value="Married">Married</option>
            <option value="Unmarried">Unmarried</option>
          </select>
          <div class="invalid-feedback">Select marital status.</div>
        </div>
        <div class="col-sm-3" id="spouse_nameDiv" style="display:none;">
          <label class="form-label">Spouse Name</label>
          <input class="form-control" name="spouse_name" type="text" />
        </div>
        <div class="col-sm-2" id="marriageDateDiv" style="display:none;">
          <label class="form-label">Marriage Date</label>
          <input class="form-control datetimepicker" name="marriage_date" type="text" placeholder="dd/mm/yyyy" />
        </div>
        <div class="col-sm-3" id="spouse_occupationDiv" style="display:none;">
          <label class="form-label">Spouse Occupation</label>
          <input class="form-control" name="spouse_occupation" type="text" />
        </div>
        <div class="col-sm-2" id="livingLocationDiv" style="display:none;">
          <label class="form-label"> Spouse Living in (Location)</label>
          <input class="form-control" name="spouse_living_location" type="text" />
        </div>
      </div>
    </div>
  </div>


      <div class="card">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          <h5 class="mb-0 text-primary"> Photo's</h5>
        </div>
      </div>
    </div>
    <div class="card-body bg-body-tertiary">
      <div class="row">
  <div class="col-md-4 ">
    <label class="form-label">Event Photo 1 <span class="text-danger">*</span></label>
    <input class="form-control" name="event_photo_first" type="file" accept="image/*" required>
    <div class="invalid-feedback">Please upload the full-size event photo.</div>
  </div>
  <div class="col-md-4">
    <label class="form-label">Event Photo 2</label>
    <input class="form-control" name="event_photo_second" type="file" accept="image/*">
    <div class="invalid-feedback">Optional: upload a second event photo.</div>
  </div>
  <div class="col-md-4">
    <label class="form-label">Event Photo 3</label>
    <input class="form-control" name="event_photo_third" type="file" accept="image/*">
    <div class="invalid-feedback">Optional: upload a third event photo.</div>
  </div>

      <br>
          <div class="row">
             <div class="col-12 text-center mt-3">
          <button class="btn btn-primary" type="submit">Submit form</button>
          </div></div>
          </div>
        </div>
      </div>
    </div>
</form>
  </div>
<script>
(() => {
  'use strict';
  const form = document.querySelector('.needs-validation');
  form.addEventListener('submit', function (event) {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
      showTopAlert("Please fill all required fields correctly.");
    }
    form.classList.add('was-validated');
  }, false);
})();
function showTopAlert(message) {
  let existing = document.getElementById('top-alert');
  if (existing) existing.remove();
  const div = document.createElement('div');
  div.id = 'top-alert';
  div.className = 'alert alert-danger alert-dismissible fade show mx-auto w-75';
  div.role = 'alert';
  div.style.zIndex = '9999';
  div.innerHTML = `
    <strong>Validation Error:</strong> ${message}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  `;
  document.body.prepend(div);
}
</script>

<?php require('footer.php'); ?>
</body>
</html>
