<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>GetUrBikeMods</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="home.php">
            <span>
              GetUrBikeMods
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="feedback.php">Feedback</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="profile.php">Profile</a>
              </li>
            </ul>
            <div class="user_optio_box">
              <a href="profile.php">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
              <a href="cart.php">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>



<!-- Login section -->
<section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container text-center">
        <h1>LOGIN</h1>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="form_container">
            <form method="POST">
              <div>
                <input type="text" name="ph_no" placeholder="Phone Number" pattern="[6789][0-9]{9}" title="Please enter valid phone number" required />
              </div>
              <div>
                <input type="password" name="pwd" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
              </div>
              <div class="btn_box d-flex justify-content-center">
                <button name="login">LOGIN</button>
              </div>
              <div>
              <?php
              session_start();

              $message = "";

              function isUserExists($ph_no, $enteredPwd)
              {
                global $message;

                $servername = "localhost";
                $username_db = "root";
                $password_db = "";
                $dbname = "database";

                $con = mysqli_connect($servername, $username_db, $password_db, $dbname);

                if (!$con) {
                  die("Connection failed: " . mysqli_connect_error());
                }

                $ph_no = mysqli_real_escape_string($con, $ph_no);
                $query = "SELECT * FROM registered WHERE ph_no='$ph_no'";
                $result = mysqli_query($con, $query);

                if ($result) {
                  if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $storedPassword = $row['pwd'];

                    if (password_verify($enteredPwd, $storedPassword)) {
                      // Login successful, create session and set cookies
                      $_SESSION['u_id'] = $row['id'];
                      $_SESSION['user_name'] = $row['name'];
                      $_SESSION['user_ph_no'] = $row['ph_no'];
                      $_SESSION['user_email'] = $row['email'];

                      setcookie("u_id", $row['id'], time() + (86400 * 30), "/");
                      setcookie("user_name", $row['name'], time() + (86400 * 30), "/");
                      setcookie("user_ph_no", $row['ph_no'], time() + (86400 * 30), "/");
                      setcookie("user_email", $row['email'], time() + (86400 * 30), "/");


                      // Redirect to profile.php
                      header("Location: profile.php");
                      exit();
                    } else {
                      // Incorrect password
                      $message = "<p class='register_text text-center' style='color: red; background-color: white; margin-top: 10px;'>Incorrect password. Please try again.</p>";
                    }
                  } else {
                    // Account doesn't exist
                    $message = "<p class='register_text text-center' style='color: purple; background-color: white; margin-top: 10px;'>Account Doesn't Exist! <a href='register.php'> Register Now</a></p>";
                  }
                } else {
                  // Database error
                  $message = "Error: " . mysqli_error($con);
                }

                mysqli_close($con);
              }

              if (isset($_POST['login'])) {
                $ph_no = $_POST['ph_no'];
                $enteredPwd = $_POST['pwd'];
                isUserExists($ph_no, $enteredPwd);
              }
              ?>
              </div>    
            </form>
            <?php echo $message; ?>
            <p class="register_text text-center" style="margin-top: 10px;">Don't have an account? <a href="register.php">Register now</a></p> <!-- Added margin-top style -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end Login section -->

  




  <!-- info section -->
<section class="info_section layout_padding2">
    <div class="container">
      <div class="info_logo">
        <h2>
          GetUrBikeMods
        </h2>
      </div>
      <div class="row justify-content-center">
  
        <div class="col-md-3">
          <div class="info_contact text-center">
            <h5>
              About Us
            </h5>
            <div>
              <div class="img-box">
                <img src="images/location-white.png" width="18px" alt="">
              </div>
              <p>
                GLS Campus, Mardia Plaza.
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/telephone-white.png" width="12px" alt="">
              </div>
              <p>
                +91 2525252525
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/envelope-white.png" width="18px" alt="">
              </div>
              <p>
                geturbikemods@gmail.com
              </p>
            </div>
          </div>
        </div>
  
        <div class="col-md-3">
          <div class="info_info text-center">
            <h5>
              Informations
            </h5>
            <p>
              GetUrBikeMods is your go-to destination for premium and affordable bike modification parts.
            </p>
          </div>
        </div>
  
        <div class="col-md-3">
          <div class="info_form text-center">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="https://www.facebook.com/">
                <img src="images/fb.png" alt="">
              </a>
              <a href="https://twitter.com/?lang=en">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="https://in.linkedin.com/">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="https://www.youtube.com/">
                <img src="images/youtube.png" alt="">
              </a>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </section>
  <!-- end info_section -->
  

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>

</body>

</html>