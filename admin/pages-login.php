<?php
  include_once './shared/head.php';
  include_once './vendor/configDB.php';
  include_once './vendor/functions.php';
  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashPassword = sha1($password);
    $select = "SELECT * FROM `admins` WHERE `email` = '$email' and `password` = '$hashPassword'";
    $selectRun = mysqli_query($connect, $select);
    $numRows = mysqli_num_rows($selectRun);

    $rowAllData = mysqli_fetch_assoc($selectRun);
    if($numRows == 1){
      $_SESSION['admin'] =[
          "email" => $email,
          "id" => $rowAllData['id'],
          "name" => $rowAllData['name'],
          "image" => $rowAllData['image'],
          "theme" => $rowAllData['theme'],
          "rule" => $rowAllData['rule']
        ];
      header('location: /estateagency/admin/index.php');
    }else{
      getMessageAdmin(true, "You Don't Have Access");
      echo $hashPassword;
    }
  }

  if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    redirectForOutApp('pages-login.php');
  }
  clearSession_Done();
?>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Estate Agency</span>
                </a>
              </div><!-- End Logo -->
              <div class="card mb-3">
              <?php if (isset($_SESSION['done'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                  <?php echo $_SESSION['done']; ?>
                  <form action="" method="POST">
                    <button type="submit" name="clearSession" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </form>
                </div>
              <?php endif; ?>
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your Email & password to login</p>
                  </div>
                  <form class="row g-3 needs-validation" novalidate method="POST">
                    <div class="col-12">
                      <label for="" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="copyright">
                  &copy; Copyright <strong><span>Mohamed Adel</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                  Designed by <i class="bi bi-github"></i> <a href="https://github.com/MohamedASAK">Mohamed Adel</a>
                </div>

            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->

<?php
  include_once './shared/script.php';
?>