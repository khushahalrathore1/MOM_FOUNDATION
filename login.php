<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>

  <body>
    <!-- ===============================================--><!--    Main Content--><!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid">
        <div class="row min-vh-100 flex-center g-0">
          <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape" src="assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250"><img class="bg-auth-circle-shape-2" src="assets/img/icons/spot-illustrations/shape-1.png" alt="" width="150">
            <div class="card overflow-hidden z-1">
              <div class="card-body p-0">
                <div class="row g-0 h-100">
                  <div class="col-md-5 text-center bg-card-gradient">
                    <div class="position-relative p-4 pt-md-5 pb-md-7" data-bs-theme="light">
                      <div class="bg-holder bg-auth-card-shape" style="background-image:url(assets/img/icons/spot-illustrations/half-circle.png);"></div><!--/.bg-holder-->
                      <div class="z-1 position-relative"><a class="link-light mb-4 font-sans-serif fs-5 d-inline-block fw-bolder" href="index.html">MoM Foundation</a>
                        <p class="opacity-75 text-white"></p>
                      </div>
                    </div>
                    <div class="mt-3 mb-4 mt-md-4 mb-md-5" data-bs-theme="light">
                      <p class="text-white">Don't have an account?<br><a class="text-decoration-underline link-light" href="register.html">Get started!</a></p>
                      <!-- <p class="mb-0 mt-4 mt-md-5 fs-10 fw-semi-bold text-white opacity-75">Read our <a class="text-decoration-underline text-white" href="#!">terms</a> and <a class="text-decoration-underline text-white" href="#!">conditions </a></p> -->
                    </div>
                  </div>
                  <div class="col-md-7 d-flex flex-center">
                    <div class="p-4 p-md-5 flex-grow-1">
                      <div class="row flex-between-center">
                        <div class="col-auto">
                          <h3>Account Login</h3>
                        </div>
                      </div>
                      <form>
                        <div class="mb-3"><label class="form-label" for="card-email">Email address</label><input class="form-control" id="card-email" type="email" /></div>
                        <div class="mb-3">
                          <div class="d-flex justify-content-between"><label class="form-label" for="card-password">Password</label></div><input class="form-control" id="card-password" type="password" />
                        </div>
                           <div class="mb-3">
                          <div class="d-flex justify-content-between">
                            <label class="form-label" for="card-password">Select Role</label></div>
                            <select class="form-select" id="basic-form-Current_Status" aria-label="Default select example" >
                        <option selected="selected" valuer="0">----Select Role----</option>
                        <option value="Super_Admin">Super Admin</option>
                        <option value="Admin">Admin</option>
                        <option value="Childern">Childern</option>
                        <option value="Donor">Donor</option>
                        <option value="Volunteer">Volunteer</option>
                      </select>
                        </div>
                        
                        <div class="row flex-between-center">
                          
                          <div class="col-auto"><a class="fs-10" href="forgot-password.html">Forgot Password?</a></div>
                        </div>
                        <div class="mb-3"><button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button></div>
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
  </body>
</html>