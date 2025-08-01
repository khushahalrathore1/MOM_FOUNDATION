<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MOM Foundation</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
  <link href="vendors/simplebar/simplebar.min.css" rel="stylesheet">
  <link href="assets/css/theme.min.css" rel="stylesheet" id="style-default">
  <link href="assets/css/user.min.css" rel="stylesheet" id="user-style-default">
  <script>
    var isRTL = JSON.parse(localStorage.getItem('isRTL'));
    if (isRTL) {
      document.getElementById('style-default').setAttribute('disabled', true);
      document.getElementById('user-style-default').setAttribute('disabled', true);
      document.querySelector('html').setAttribute('dir', 'rtl');
    }
  </script>
</head>

<body>
  <main class="main" id="top">
    <div class="container-fluid">
      <div class="row min-vh-100 flex-center g-0">
        <div class="col-lg-8 col-xxl-5 py-3 position-relative">
          <img class="bg-auth-circle-shape" src="assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250">
          <img class="bg-auth-circle-shape-2" src="assets/img/icons/spot-illustrations/shape-1.png" alt="" width="150">
          <div class="card overflow-hidden z-1">
            <div class="card-body p-0">
              <div class="row g-0 h-100">
                <div class="col-md-5 text-center bg-card-gradient">
                  <div class="position-relative p-4 pt-md-5 pb-md-7">
                    <div class="bg-holder bg-auth-card-shape" style="background-image:url(assets/img/icons/spot-illustrations/half-circle.png);"></div>
                    <div class="z-1 position-relative">
                      <a class="link-light mb-4 font-sans-serif fs-5 d-inline-block fw-bolder" href="index.html">MoM Foundation</a>
                    </div>
                  </div>
                  <div class="mt-3 mb-4 mt-md-4 mb-md-5">
                    <p class="text-white">Don't have an account?<br><a class="text-decoration-underline link-light" href="register.html">Get started!</a></p>
                  </div>
                </div>
                <div class="col-md-7 d-flex flex-center">
                  <div class="p-4 p-md-5 flex-grow-1">
                    <h3>Account Login</h3>
                    <form method="post" action="login_action.php" id="loginForm" novalidate>
                      <div class="mb-3">
                        <label class="form-label" for="card-child_unique_id">Unique ID</label>
                        <input class="form-control" id="card-child_unique_id" name="child_unique_id" type="text" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="card-password">Password</label>
                        <input class="form-control" id="card-password" name="password" type="password" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-form-Current_Status">Select Role</label>
                        <select class="form-select" id="basic-form-Current_Status" name="role" required>
                          <option value="" selected disabled>----Select Role----</option>
                          <option value="Super_Admin">Super Admin</option>
                          <option value="Admin">Admin</option>
                          <option value="Childern">Childern</option>
                          <option value="Donor">Donor</option>
                          <option value="Volunteer">Volunteer</option>
                          <option value="Forgineer">Foreigner</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <!-- <a class="fs-10" href="forgot-password.html">Forgot Password?</a> -->
                      </div>
                      <button class="btn btn-primary d-block w-100 mt-3" type="submit">Log in</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div> 
    </div>
  </main>

  <!-- Required JS -->
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/simplebar/simplebar.min.js"></script>
  <script src="assets/js/theme.js"></script>

  <!-- Validation script -->
  <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      var email = document.getElementById('card-child_unique_id').value.trim();
      var password = document.getElementById('card-password').value.trim();
      var role = document.getElementById('basic-form-Current_Status').value;

      if (!email || !password || !role) {
        alert('All fields are mandatory. Please fill in Email, Password, and select Role.');
        e.preventDefault(); // stop form submission
      }
    });
  </script>
</body>
</html>
