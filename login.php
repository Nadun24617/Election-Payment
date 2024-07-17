<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
    <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
      <link rel="stylesheet" href="CSS/style1.css">
    </head>
    <body>
      <header>

        <?php include_once('components/header.php'); ?>

      </header>
        <div class="section">
          <div class="container">
            <div class="row full-height justify-content-center">
              <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-5 pt-sm-2 text-center">
                  <h6 class="mb-0 pb-3"><span>Log In</span><span>Sign Up</span></h6>
                  <input type="checkbox" class="checkbox" id="reg-log" name="reg-log">
                  <label for="reg-log"></label>
                  <div class="card-wrap mx-auto">
                    <div class="card-wrapper">
                      <div class="card-front">
                        <div class="center-wrap">
                          <div class="section text-center">
                            <h4 class="mb-4 pb-3">Log In</h4>
                            <div class="form-group">
                              <input type="email" class="form-style" placeholder="Your Email" autocomplete="off">
                              <i class="input-icon uil uil-envelope"></i>
                            </div>
                            <div class="form-group mt-2">
                              <input type="password" class="form-style" placeholder="Your Password" >
                              <i class="input-icon uil uil-key-skeleton"></i>
                            </div>
                            <a href="#" class="btn mt-4">Login</a>
                            <p class="mb-0 mt-4 text-center"><a href="#" class="link">Forgot Password?</a></p>
                          </div>
                        </div>
                      </div>
                      <div class="card-back">
                        <div class="center-wrap">
                          <div class="section text-center">
                            <h4 class="mb-4 pb-3">Sign UP</h4>
                            <div class="form-group">
                              <input type="text" class="form-style" placeholder="Your Full Name" autocomplete="off">
                              <i class="input-icon uil uil-user"></i>
                            </div>
                            <div class="form-group mt-2">
                              <input type="email" class="form-style" placeholder="Your Email" autocomplete="off">
                              <i class="input-icon uil uil-envelope"></i>
                            </div>
                            <div class="form-group mt-2">
                              <input type="password" class="form-style" placeholder="Your Password" >
                              <i class="input-icon uil uil-key-skeleton"></i>
                            </div>
                            <a href="#" class="btn mt-4">SignUp</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php include_once('components/footer.php'); ?>
    </body>