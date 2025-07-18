<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">
<head>
<?php 
  require('style.php');
  require('script.php'); 
?>
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
      <div class="col-auto ms-auto d-flex align-items-center">
        <a href="show_all_foreigner">
          <button class="btn btn-primary me-2 mb-1" type="button">
            <span class="fas fa-users me-1"></span> Show All Foreigners
          </button>
        </a>
      </div>
    </div>
  </div>
</div>

<form class="row g-3 needs-validation" method="post" action="foreigner_managment_form_action.php" enctype="multipart/form-data" novalidate>
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0 text-primary">Personal Information's</h5>
    </div>
    <div class="card-body bg-body-tertiary">
      <div class="row">
        <div class="col-sm-3">
          <label class="form-label">Foreigner Name</label>
          <input class="form-control" type="text" name="foreigner_name" id="foreigner_name" required />
        </div>
        <div class="col-sm-3">
          <label class="form-label">Passport Number</label>
          <input class="form-control" type="text" name="passport_number" id="passport_number" required />
        </div>
        <div class="col-sm-3">
          <label class="form-label">Visa Type</label>
          <input class="form-control" type="text" name="visa_type" id="visa_type" required />
        </div>
        <div class="col-sm-3">
          <label class="form-label">Duration of Stay</label>
          <input class="form-control" type="text" name="duration_of_stay" id="duration_of_stay" placeholder="e.g. 3 months" required />
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2">
          <label class="form-label">Date of Home Visit - From</label>
          <input class="form-control datetimepicker" type="text" name="home_visit_from" id="home_visit_from" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' required />
        </div>
        <div class="col-sm-2">
          <label class="form-label">Date of Home Visit - Till</label>
          <input class="form-control datetimepicker" type="text" name="home_visit_till" id="home_visit_till" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' required />
        </div>
        <div class="col-sm-2">
          <label class="form-label">Foreigner Status</label>
          <select class="form-select" name="foreigner_status" id="foreigner_status" onchange="toggleOccupation(this.value)" required>
            <option selected disabled>Select Status</option>
            <option value="Student">Student</option>
            <option value="Working">Working</option>
          </select>
          <div class="invalid-feedback">Please select foreigner status.</div>
        </div>
        <div class="col-sm-2" id="ForeigneroccupationDiv" style="display:none;">
          <label class="form-label">Foreigner Occupation</label>
          <input class="form-control" type="text" name="foreigner_occupation" id="foreigner_occupation" />
        </div>
        <div class="col-sm-2">
          <label class="form-label">Date of Birth</label>
          <input class="form-control datetimepicker" type="text" name="dob" id="dob" placeholder="dd/mm/yyyy" data-options='{"disableMobile":true}' onchange="calculateAge()" required />
        </div>
        <div class="col-sm-2">
          <label class="form-label">Age</label>
          <input class="form-control" type="text" name="age" id="age" readonly />
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <label class="form-label">Address</label>
          <textarea class="form-control" rows="2" name="address" id="address" placeholder="Enter Full Address" required></textarea>
          <div class="invalid-feedback">Please enter full address.</div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <label class="form-label">Any Donation?</label>
          <textarea class="form-control" rows="2" name="any_donation" id="any_donation" placeholder="Enter donation details" required></textarea>
          <div class="invalid-feedback">Please mention if any donation.</div>
        </div>
        <div class="col-md-6">
          <label class="form-label">Reason for Donating</label>
          <textarea class="form-control" rows="2" name="donation_reason" id="donation_reason" placeholder="Enter reason" required></textarea>
          <div class="invalid-feedback">Please enter reason for donating.</div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-3">
          <label class="form-label">Contact Number</label>
          <input class="form-control" type="text" name="contact_number" id="contact_number" required />
        </div>
        <div class="col-sm-3">
          <label class="form-label">Email ID</label>
          <input class="form-control" type="email" name="email" id="email" required />
        </div>
        <div class="col-md-3">
          <label class="form-label">Purpose of Visit</label>
          <input class="form-control" type="text" name="purpose_of_visit" id="purpose_of_visit" required />
        </div>
        <div class="col-sm-3">
          <label class="form-label">Marital Status</label>
          <select class="form-select" name="marital_status" id="marital_status" onchange="toggleMarital(this.value)" required>
            <option selected disabled>Select Status</option>
            <option value="Married">Married</option>
            <option value="Unmarried">Unmarried</option>
          </select>
          <div class="invalid-feedback">Please select marital status.</div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-3" id="spouse_nameDiv" style="display:none;">
          <label class="form-label">Spouse Name</label>
          <input class="form-control" type="text" name="spouse_name" id="spouse_name" />
        </div>
        <div class="col-sm-3" id="marriageDateDiv" style="display:none;">
          <label class="form-label">Marriage Date</label>
          <input class="form-control datetimepicker" type="text" name="marriage_date" id="marriage_date" placeholder="dd/mm/yyyy" />
        </div>
        <div class="col-sm-3" id="spouse_occupationDiv" style="display:none;">
          <label class="form-label">Spouse Occupation</label>
          <input class="form-control" type="text" name="spouse_occupation" id="spouse_occupation" />
        </div>
        <div class="col-sm-3" id="livingLocationDiv" style="display:none;">
          <label class="form-label">Spouse Living in (Location)</label>
          <input class="form-control" type="text" name="spouse_living_location" id="spouse_living_location" />
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h5 class="mb-0 text-primary">Photo's</h5>
    </div>
    <div class="card-body bg-body-tertiary">
      <div class="row">
        <div class="col-md-4">
          <label class="form-label">Foreigner Photo 1 <span class="text-danger">*</span></label>
          <input class="form-control" type="file" name="foreigner_photo_first" id="foreigner_photo_first" accept="image/*" required>
          <div class="invalid-feedback">Please upload the photo.</div>
        </div>
        <div class="col-md-4">
          <label class="form-label">Foreigner Photo 2</label>
          <input class="form-control" type="file" name="foreigner_photo_second" id="foreigner_photo_second" accept="image/*">
        </div>
        <div class="col-md-4">
          <label class="form-label">Foreigner Photo 3</label>
          <input class="form-control" type="file" name="foreigner_photo_third" id="foreigner_photo_third" accept="image/*">
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center mt-3">
          <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
function toggleOccupation(value) {
  document.getElementById('ForeigneroccupationDiv').style.display = (value === 'Working') ? 'block' : 'none';
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
  if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
    age--;
  }
  document.getElementById("age").value = age;
}
</script>

<?php require('footer.php'); ?>
</body>
</html>
