<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <script type="text/javascript" src="script.js"></script>
    <title>ArtShow - Login</title>
</head>
<style>
  body {
    background-color: #110F12;
  }
</style>
<body>
    <div class="navigation">
      <div class="row align-items-center">
        <div class="col-auto">
          <div class="nav-left-side">
            <ul class="navbar-nav">
              <li><a href="#">Login</a></li>
              <li><a href="#">Sign Up</a></li>
            </ul>
          </div>
        </div>
        <div class="col d-flex justify-content-end">
          <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="index.php">Events</a></li>
                  <li><a href="index.php">About Us</a></li>
                  <li><a href="index.php">Contact</a></li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
    
    <div class="login" id="login">
      <div class="content-wrap">
        <div class="container">
            <div class="row">
            <div class="col-xl-5">
                <h1>Login to your account</h1>
                <div class="rect">
                    <form method="POST">
                        <input type="text" id="login-email" name="login-email" placeholder="Email"><br>
                        <input type="password" id="login-password" name="login-password" placeholder="Password">
                        <input type="submit" name="login-submit" value="Login" class="align-self-end">
                        <a href="#">Forgot your password?</a>
                    </form>
                    <div class="row justify-content-evenly align-items-center">
                      <?php
                        include('koneksi.php');
                        session_start();

                        if (isset($_SESSION['name'])) {
                          header('location: event.php');
                        }
                        
                        if (isset($_POST['login-submit'])) {
                          $email = $_POST["login-email"];
                          $pass = $_POST["login-password"];
                          
                          $query = "SELECT * FROM PENGGUNA WHERE EMAIL_PENGGUNA = '$email' AND SANDI_PENGGUNA = '$pass'";
                          $result = mysqli_query($conn, $query);

                          if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['name'] = $row['NAMA_PENGGUNA'];
                            header("location: event.php");
                          }
                          else {
                            echo "Wrong email or password";
                            echo "<script>alert('Could not login')</script>";
                          }
                        }
                      ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
      </div>
    </div>
</body>
</html>