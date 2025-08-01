<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">
<head>
  <?php 
    require('style.php');
    require('script.php'); 
if (isset($_GET['success']) && $_GET['uid']) {
  echo "
  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
      icon: 'success',
      title: 'Form submitted successfully!',
      html: '<br>Now Children User ID is For Login<br><br><b style=\"color:blue;\">' + " . json_encode($_GET['uid']) . " + '</b>',
      confirmButtonText: 'OK'
    }).then(() => {
      window.location.href = 'show_all_childern.php';
    });
  });
  </script>";
}


  ?>

  <script>

    function currentstatus(current_status) {
      var occDiv = document.getElementById("occupationDiv");
      if (current_status === "Working") {
        occDiv.style.display = "block";
      } else {
        occDiv.style.display = "none";
        document.getElementById("occupation").value = "";
      }
    }

    function Maritalstatus(value) {
      const show = value === 'Married';
      document.getElementById('SpouseNameDiv').style.display = show ? 'block' : 'none';
      document.getElementById('SpouseOccupationDiv').style.display = show ? 'block' : 'none';
      document.getElementById('husbandLivingDiv').style.display = show ? 'block' : 'none';

      if (!show) {
        document.getElementById('husband_name').value = '';
        document.getElementById('husband_occupation').value = '';
        document.getElementById('husband_living').value = '';
      }
    }


    function calculateAge() 
    {
      const dobInput = document.getElementById("dob").value;
      if (!dobInput) 
      {
        document.getElementById("age").value = "";
        return;
      }
      const dob = new Date(dobInput);
      const today = new Date();
      let age = today.getFullYear() - dob.getFullYear();
      const m = today.getMonth() - dob.getMonth();
      if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) 
      {
        age--;
      }
      document.getElementById("age").value = age;
    }

    function get_unique_id_childern() 
    {
      const dobInput = document.getElementById("dob").value;
      if (!dobInput) 
      {
        document.getElementById("age").value = "";
        return;
      }
      const dob = new Date(dobInput);
      const today = new Date();
      let age = today.getFullYear() - dob.getFullYear();
      const m = today.getMonth() - dob.getMonth();
      if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) 
      {
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
          <h5 class="mb-0">Children Management Form</h5>
        </div>
        <div class="col-auto ms-auto d-flex align-items-center">
          <a href="show_all_childern">
            <button class="btn btn-primary me-2 mb-1" type="button">
              <span class="fas fa-users me-1"></span> Show All Children
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
  <form class="row g-3 needs-validation" method="post" action="mom_foundation_action.php" novalidate>
  <div class="card">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          <h5 class="mb-0 text-primary">Personal Information's</h5>
        </div>
      </div>
    </div>
    <div class="card-body bg-body-tertiary">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-5c05f5ab-f438-468c-8924-e15ebd1a9fa9" id="dom-5c05f5ab-f438-468c-8924-e15ebd1a9fa9">
          <div class="row">
            <div class="col-sm-3">
              <label class="form-label" for="child_first_name">Child First Name</label>
              <input class="form-control" id="child_first_name" name="child_first_name" type="text" required onchange="get_unique_id_childern(this.val)"/>
              <div class="invalid-feedback">Enter child's first name.</div>
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="child_unique_id">Unique ID</label>
              <input class="form-control" id="child_unique_id" name="child_unique_id" type="text" placeholder="Auto Generate" readonly />
              <div class="invalid-feedback">Unique ID missing.</div>
            </div>
            <div class="col-sm-2">
              <label class="form-label">Date of Birth</label>
              <input class="form-control datetimepicker" id="dob" type="text" placeholder="dd/mm/yyyy"  data-options='{"disableMobile":true}' onchange="calculateAge()" required />
              <div class="invalid-feedback">Enter valid date of birth.</div>
            </div>
            <div class="col-sm-1">
              <label class="form-label" for="age">Age</label>
              <input class="form-control" id="age" name="age" type="text" placeholder="Auto" readonly />
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="sex">Sex</label>
              <select class="form-select" id="sex" name="sex" required>
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <div class="invalid-feedback">Please select sex.</div>
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="orphan_category">Orphan Category</label>
                <select class="form-select" id="orphan_category" name="orphan_category" required>
                  <option value="">Select</option>
                  <option value="Semi Orphan">Semi Orphan</option>
                  <option value="Social Orphan">Social Orphan</option>
                  <option value="Others">Others</option>
                </select>
              <div class="invalid-feedback">Please select orphan category.</div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label class="form-label" for="father_name">Father's Name</label>
              <input class="form-control" id="father_name" name="father_name" type="text" required />
              <div class="invalid-feedback">Enter father's name.</div>
            </div>
            <div class="col-sm-3">
              <label class="form-label" for="mother_name">Mother's Name</label>
              <input class="form-control" id="mother_name" name="mother_name" type="text" required />
              <div class="invalid-feedback">Enter mother's name.</div>
            </div>
            <div class="col-sm-3">
              <label class="form-label" for="guardian_name">Guardian Name (if any)</label>
              <input class="form-control" id="guardian_name" name="guardian_name" type="text" />
            </div>
            <div class="col-sm-3">
              <label class="form-label" for="joining_date">Date of Joining Home</label>
              <input class="form-control datetimepicker" placeholder="dd/mm/yyyy"  id="joining_date" name="joining_date"  data-options='{"disableMobile":true}'/>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label class="form-label" for="contact_no">Contact No.</label>
              <input class="form-control" id="contact_no" name="contact_no" type="text" required />
              <div class="invalid-feedback">Enter contact number.</div>
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="alternate_contact">Alternate Contact No.</label>
              <input class="form-control" id="alternate_contact" name="alternate_contact" type="text" />
            </div>
            <div class="col-sm-2">
              <label class="form-label" for="email">Email</label>
              <input class="form-control" id="email" name="email" type="email" required />
              <div class="invalid-feedback">Enter valid email.</div>
            </div>
            <div class="col-sm-3">
              <label class="form-label" for="current_study_name">Current education</label>
              <input class="form-control" id="current_education_status" name="current_education_status" type="text"  placeholder="School/Collage/ N/A" required/>
              <div class="invalid-feedback">Enter Current Status While Joining</div>
            </div>
            <div class="col-sm-3">
              <label class="form-label" for="current_study_name">Name Where Studying</label>
              <input class="form-control" id="name_where_studying" name="name_where_studying" type="text" required/>
              <div class="invalid-feedback">Enter Name Of Where Studying</div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <label class="form-label" for="child_story">Story of the Child</label>
              <textarea class="form-control" id="child_story" name="child_story" rows="1" required></textarea>
              <div class="invalid-feedback">Enter child's Full Story.</div>
            </div>
            <div class="col-sm-4">
              <label class="form-label" for="child_story">Child Status</label>
              <textarea class="form-control" id="child_status" name="child_status" rows="1" required placeholder="Enter Child Status (Residential or Outsider Etc.)"></textarea>
              <div class="invalid-feedback">Enter Child Status (Residential or Outsider Etc.)</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <!-- <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          <h5 class="mb-0 text-primary">Left Home Information's</h5>
        </div>
      </div>
    </div> -->
    <!-- <div class="card-body bg-body-tertiary">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-5c05f5ab-f438-468c-8924-e15ebd1a9fa9" id="dom-5c05f5ab-f438-468c-8924-e15ebd1a9fa9">
          <div class="row">
            <div class="col-sm-3">
              <label class="form-label" for="leaving_date">Date of Leaving</label>
              <input class="form-control datetimepicker" id="leaving_date" placeholder="dd/mm/yyyy"  name="leaving_date" data-options='{"disableMobile":true}' />
            </div>
            <div class="col-md-6">
              <label class="form-label" for="leaving_reason">Reason for Leaving</label>
              <input class="form-control" id="leaving_reason" name="leaving_reason" type="text" />
            </div>
            <div class="col-sm-3">
              <label class="form-label" for="leaving_to">Leaving To</label>
              <input class="form-control" id="leaving_to" name="leaving_to" type="text" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label class="form-label" for="current_status">Current Status</label>
              <select class="form-select" id="current_status" name="current_status" onchange="currentstatus(this.value)">
                <option selected value="">Select</option>
                <option value="Student">Student</option>
                <option value="Working">Working</option>
              </select>
              <div class="invalid-feedback">Select current status.</div>
            </div>

            <div class="col-sm-2" id="occupationDiv" style="display:none;">
              <label class="form-label" for="occupation">Occupation</label>
              <input class="form-control" id="occupation" name="occupation" type="text" />
              <div class="invalid-feedback">Enter occupation.</div>
            </div>

            <div class="col-sm-2">
              <label class="form-label" for="marital_status">Marital Status</label>
              <select class="form-select" id="marital_status" name="marital_status" onchange="Maritalstatus(this.value)">
                <option selected value="">Select</option>
                <option value="Married">Married</option>
                <option value="UnMarried">UnMarried</option>
              </select>
              <div class="invalid-feedback">Select marital status.</div>
            </div>

            <div class="col-sm-2" id="SpouseNameDiv" style="display:none;">
              <label class="form-label" for="spouse_name">Spouse Name</label>
              <input class="form-control" id="spouse_name" name="spouse_name" type="text" />
            </div>

            <div class="col-sm-2" id="SpouseOccupationDiv" style="display:none;">
              <label class="form-label" for="spouse_occupation">Spouse Occupation</label>
              <input class="form-control" id="spouse_occupation" name="spouse_occupation" type="text" />
            </div>

            <div class="col-sm-2" id="husbandLivingDiv" style="display:none;">
              <label class="form-label" for="husband_living">Husband Living In</label>
              <input class="form-control" id="husband_living" name="husband_living" type="text" />
            </div>
          </div>
          </div>
        </div>
      </div>
    </div> -->
    <div class="card">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          <h5 class="mb-0 text-primary">Upload Photo's</h5>
        </div>
      </div>
    </div>
    <div class="card-body bg-body-tertiary">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-5c05f5ab-f438-468c-8924-e15ebd1a9fa9" id="dom-5c05f5ab-f438-468c-8924-e15ebd1a9fa9">
          <div class="row">
            <div class="col-sm-4">
              <label class="form-label" for="child_group_photo">Child Group Photo</label>
              <input class="form-control" id="child_group_photo" name="child_group_photo" type="file" accept="image/*" />
            </div>
            <div class="col-sm-4">
              <label class="form-label" for="child_full_photo">Child Full Size Photo <span class="text-danger">*</span></label>
              <input class="form-control" id="child_full_photo" name="child_full_photo" type="file" accept="image/*" required />
              <div class="invalid-feedback">Please upload a full-size photo.</div>
            </div>
            <div class="col-sm-4">
              <label class="form-label" for="child_small_photo">Child Small Size Photo <span class="text-danger">*</span></label>
              <input class="form-control" id="child_small_photo" name="child_small_photo" type="file" accept="image/*" required />
              <div class="invalid-feedback">Please upload a small-size photo.</div>
            </div>
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

    document.getElementById('alert-container').appendChild(div);
  }
  </script>
  <?php require('footer.php'); ?>
</body>
</html>
