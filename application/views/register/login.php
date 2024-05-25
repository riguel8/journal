
<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Red_Theme">

<head>
  <!-- Required meta tags -->
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Favicon icon-->
<link
  rel="shortcut icon"
  type="image/png"
  href="./assets/images/aw.png"
/>

<!-- Core Css -->
<link rel="stylesheet" href="./assets/css/styles.css" />

   <title>Login</title>
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="./assets/images/aw.png" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div id="main-wrapper">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
      <div class="position-relative z-3">
        <div class="row">
          <div class="col-xl-7 col-xxl-8">
            <a href="home" class="text-nowrap logo-img d-block px-4 py-9 w-100">
              <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="./assets/images/aw.png" alt="homepage" class="dark-logo" />
                <!-- Light Logo icon -->
                <img src="./assets/images/aw.png" alt="homepage" class="light-logo" />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text">
                <!-- dark Logo text -->
                <img src="./assets/images/text.png" alt="homepage" class="dark-logo ps-2" />
                <!-- Light Logo text -->
                <img src="./assets/images/text2.png" class="light-logo ps-2" alt="homepage" />
              </span>
            </a>
            <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 88px);">
              <img src="./assets/images/background/loginbg.png" alt="" class="img-fluid" width="500">
            </div>
          </div>
          <div class="col-xl-5 col-xxl-4">
            <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
              <div class="auth-max-width col-sm-8 col-md-6 col-xl-9">
                <h2 class="mb-3 fs-7 fw-bolder">Welcome to Journal</h2>
                <!-- <p class=" mb-4">Your Admin Dashboard</p> -->
                <div class="row">
                  <div class="col-6 mb-2 mb-sm-0">
                    <a class="btn btn-link border border-muted  d-flex align-items-center justify-content-center rounded-2 py-8 text-decoration-none" href="javascript:void(0)" role="button">
                      <img src="./assets/images/svg/google-icon.svg" alt="" class="img-fluid me-2" width="18" height="18">
                      Google
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-link border border-muted  d-flex align-items-center justify-content-center rounded-2 py-8 text-decoration-none" href="javascript:void(0)" role="button">
                      <img src="./assets/images/svg/facebook-icon.svg" alt="" class="img-fluid me-2" width="18" height="18">
                      Facebook
                    </a>
                  </div>
                </div>
                <div class="position-relative text-center my-4">
                  <p class="mb-0 fs-4 px-3 d-inline-block bg-body text-dark z-3 position-relative">or sign
                    in
                    with</p>
                  <span class="border-top border-dark-subtle opacity-25 w-100 position-absolute top-50 start-50 translate-middle"></span>
                </div>
                <?php echo form_open('users'); ?>
                <form action="" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" Required>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" Required>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-medium" href="../main/authentication-forgot-password.html">Forgot
                      Password ?</a>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-medium">New to Ample?</p>
                    <a class="text-primary fw-medium ms-2" href="registration">Create an
                      account</a>
                  </div>
                </form>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <!-- Import Js Files -->

<script src="./assets/js/app.dark.init.js"></script>
<script src="./assets/libs/js/jquery.min.js"></script>
<script src="./assets/js/app.min.js"></script>
<script src="./assets/js/app.dark.init.js"></script>
<!-- <script src="./assets/js/app.init.js"></script> -->
<script src="./assets/css/bootstrap.bundle.min.js"></script>
<script src="./assets/libs/js/simplebar.min.js"></script>
<script src="./assets/libs/js/iconify-icon.min.js"></script>
<script src="./assets/js/sidebarmenu.js"></script>
<script src="./assets/js/theme.js"></script>
<script src="./assets/js/feather.min.js"></script>

<!-- <script src="./assets/libs/js/jquery.min.js"></script>
<script src="./assets/js/app.min.js"></script>
<script src="./assets/js/app.dark.init.js"></script>
<script src="./assets/libs/js/bootstrap.bundle.min.js"></script>
<script src="./assets/libs/js/simplebar.min.js"></script>
<script src="./assets/libs/iconify-icon.min.js"></script>
<script src="./assets/js/sidebarmenu.js"></script>
<script src="./assets/js/theme.js"></script>
<script src="./assets/js/feather.min.js"></script> -->

</body>

</html>