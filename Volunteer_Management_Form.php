<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">
<head>
<?php 
  require('style.php');
  require('script.php'); 
?>
<script>
function toggleOccupation(value) {
  document.getElementById('VolunteeroccupationDiv').style.display = (value === 'Working') ? 'block' : 'none';
}
function toggleCountry(value) {
  document.getElementById('countryDiv').style.display = (value === 'Foreigner') ? 'block' : 'none';
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
  if (!dobInput) { document.getElementById("age").value = ""; return; }
  const dob = new Date(dobInput);
  const today = new Date();
  let age = today.getFullYear() - dob.getFullYear();
  if (today.getMonth() < dob.getMonth() || 
     (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
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
        <h5 class="mb-0">Volunteer Management Form</h5>
      </div>
      <div class="col-auto ms-auto d-flex align-items-center">
        <a href="show_all_volunteer.php">
          <button class="btn btn-primary me-2 mb-1" type="button">
            <span class="fas fa-users me-1"></span> Show All Volunteer
          </button>
        </a>
      </div>
    </div>
  </div>
</div>
<form class="row g-3 needs-validation" method="post" enctype="multipart/form-data" action="volunteer_managment_form_action.php" novalidate>

  <!-- Personal Information -->
   <div class="card">
    <div class="card-header">
      <h5 class="mb-0 text-primary">Personal Information</h5>
    </div>
    <div class="card-body bg-body-tertiary">
        <div class="row">
          <div class="col-sm-3">
            <label class="form-label">Volunteer Name</label>
            <input class="form-control" type="text" name="volunteer_name" id="volunteer_name" required />
          </div>
          <div class="col-sm-2">
            <label class="form-label">Type</label>
            <select class="form-select" name="volunteer_type" id="volunteer_type" onchange="toggleCountry(this.value)" required>
              <option selected disabled>Select Type</option>
              <option value="Indian">Indian</option>
              <option value="Foreigner">Foreigner</option>
            </select>
          </div>
          <div class="col-sm-2" id="countryDiv" style="display:none;">
            <label class="form-label">Country (If Foreigner)</label>
            <input class="form-control" type="text" name="volunteer_country" id="volunteer_country" />
          </div>
          <div class="col-sm-2">
            <label class="form-label">Passport Number</label>
            <input class="form-control" type="text" name="passport_number" id="passport_number" />
          </div>

          <div class="col-sm-2">
            <label class="form-label">Visa Type</label>
            <input class="form-control" type="text" name="visa_type" id="visa_type" />
          </div>
          <div class="col-sm-3">
            <label class="form-label">Duration of Stay Or Hours</label>
            <input class="form-control" type="text" name="duration_of_stay" id="duration_of_stay" placeholder="e.g. 2 months" />
          </div>
        </div>
        <div class="row">
        <div class="col-sm-2">
          <label class="form-label">Date of Home Visit - From</label>
          <input class="form-control datetimepicker" type="text" name="home_visit_from" id="home_visit_from" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' />
        </div>
        <div class="col-sm-2">
          <label class="form-label">Date of Home Visit - Till</label>
          <input class="form-control datetimepicker" type="text" name="home_visit_till" id="home_visit_till" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' />
        </div>

        <div class="col-sm-2">
          <label class="form-label">Volunteer Status</label>
          <select class="form-select" name="volunteer_status" id="volunteer_status" onchange="toggleOccupation(this.value)" required>
            <option selected disabled>Select Status</option>
            <option value="Student">Student</option>
            <option value="Working">Working</option>
          </select>
        </div>
        <div class="col-sm-2" id="VolunteeroccupationDiv" style="display:none;">
          <label class="form-label">Volunteer Occupation</label>
          <input class="form-control" type="text" name="volunteer_occupation" id="volunteer_occupation" />
        </div>

        <div class="col-sm-2">
          <label class="form-label">Date of Birth</label>
          <input class="form-control datetimepicker" id="dob" name="dob" type="text" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' onchange="calculateAge()" required />
        </div>
        <div class="col-sm-2">
          <label class="form-label">Age</label>
          <input class="form-control" id="age" name="age" type="text" placeholder="Auto" readonly />
        </div>
</div>
<div class="row">
        <div class="col-sm-4">
          <label class="form-label">Date of Visit</label>
          <input class="form-control datetimepicker" type="text" name="visit_date" id="visit_date" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' required />
        </div>
        <div class="col-sm-4">
          <label class="form-label">Contact Number</label>
          <input class="form-control" type="text" name="contact_number" id="contact_number" required />
        </div>
        <div class="col-sm-4">
          <label class="form-label">Email ID</label>
          <input class="form-control" type="email" name="email" id="email" required />
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <label class="form-label">Full Address</label>
          <textarea class="form-control" name="address" id="address" rows="1" required></textarea>
          <div class="invalid-feedback">Enter Full Address</div>
        </div>
        <div class="col-md-6">
          <label class="form-label">Reason for Volunteering</label>
          <textarea class="form-control" name="volunteering_reason" id="volunteering_reason" rows="1" required></textarea>
          <div class="invalid-feedback">Enter Volunteering Reason</div>
        </div>
        </div>
<div class="row">
        <div class="col-sm-2">
          <label class="form-label">Marital Status</label>
          <select class="form-select" name="marital_status" id="marital_status" onchange="toggleMarital(this.value)" required>
            <option selected disabled>Select Status</option>
            <option value="Married">Married</option>
            <option value="Unmarried">Unmarried</option>
          </select>
        </div>
        <div class="col-sm-3" id="spouse_nameDiv" style="display:none;">
          <label class="form-label">Spouse Name</label>
          <input class="form-control" name="spouse_name" id="spouse_name" type="text" />
        </div>
        <div class="col-sm-2" id="marriageDateDiv" style="display:none;">
          <label class="form-label">Marriage Date</label>
          <input class="form-control datetimepicker" name="marriage_date" id="marriage_date" type="text" data-options='{"disableMobile":true}' placeholder="dd/mm/yyyy" />
        </div>
        <div class="col-sm-3" id="spouse_occupationDiv" style="display:none;">
          <label class="form-label">Spouse Occupation</label>
          <input class="form-control" name="spouse_occupation" id="spouse_occupation" type="text" />
        </div>
        <div class="col-sm-2" id="livingLocationDiv" style="display:none;">
          <label class="form-label">Spouse Living in (Location)</label>
          <input class="form-control" name="spouse_living_location" id="spouse_living_location" type="text" />
        </div>
      </div>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header">
    <h5 class="mb-0 text-primary">Volunteer Photo's</h5>
  </div>
  <div class="card-body bg-body-tertiary">
    <div class="row">
      <div class="col-md-4">
        <label class="form-label">Volunteer Photo First  <span class="text-danger">*</span></label>
        <input class="form-control" name="volunteer_photo_first" id="volunteer_photo_first" type="file" accept="image/*" required/>
        <div class="invalid-feedback">Upload full-size photo.</div>
      </div>
      <div class="col-md-4">
        <label class="form-label">Volunteer Photo Second</label>
        <input class="form-control" name="volunteer_photo_second" id="volunteer_photo_second" type="file" accept="image/*" />
      </div>
      <div class="col-md-4">
        <label class="form-label">Volunteer Photo Third</label>
        <input class="form-control" name="volunteer_photo_third" id="volunteer_photo_third" type="file" accept="image/*" />
      </div>
    </div>

    <div class="col-12 text-center mt-4">
      <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
  </div>
</div>
</form>
<?php require('footer.php'); ?>
</body>
</html>
