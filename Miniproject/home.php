<?php
session_start();
?>
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
              <li class="nav-item active">
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
              <li class="nav-item">
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
  <!-- Register section -->
  <?php
  if (!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])) { ?>
<section class="contact_section layout_padding">
  <div class="container">
    <div class="heading_container text-center"> <!-- Updated class here -->
      <h1>REGISTER</h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="form_container">
          <form method="POST">
            <div>
            <input type="text" name="name" placeholder="Name" pattern="[ A-Z a-z ]+" title="Please enter valid Name" required />
            </div>
            <div>
              <input type="text" name="ph_no" placeholder="Phone Number" pattern="[6789][0-9]{9}" title="Please enter valid phone number" required />
            </div>
            <div>
              <input type="email" name="email" placeholder="Email" title="Please enter valid Email" required />
            </div>
            <div>
              <input type="password" name="pwd" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
            </div>
            <div class="btn_box d-flex justify-content-center">
              <button name="register">Register</button>
            </div>
            <div>
            <?php
            $message = "";
            function isUserExists($ph_no, $pwd)
            {
              global $message; // Use global to access the $message variable from the outer scope
            
              $name = $_POST['name'];
              $email = $_POST['email'];
              $ph_no = $_POST['ph_no'];
              $pwd = $_POST['pwd'];

              $servername = "localhost";
              $username_db = "root";
              $password_db = "";
              $dbname = "database";

              $con = mysqli_connect($servername, $username_db, $password_db, $dbname);

              $query = "SELECT * FROM registered WHERE ph_no='$ph_no'";
              $result = mysqli_query($con, $query);

              if ($result && mysqli_num_rows($result) > 0) {
                $message = "<p style='color: purple; background-color: white;'>User Already Exists!<a href='login.php'> Login Now</a></p>";
              } else {
                $message = "";
                if (isset($_POST['register'])) {
                  $name = $_POST['name'];
                  $email = $_POST['email'];
                  $ph_no = $_POST['ph_no'];
                  $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

                  $query = "INSERT INTO registered VALUES ('NULL','$name','$ph_no','$email','$pwd')";
                  $result = mysqli_query($con, $query);

                  if (!$result) {
                    $message = "<p style='color: purple; background-color: white;'>Could not insert into the database! " . mysqli_error($con) . "</p>";
                  } else {
                    $message = "<p style='color: purple; background-color: white;'>You have successfully registered yourself!</p> <a href='login.php'>Login here</a>";
                  }
                }
              }
              mysqli_close($con);
            }
            if (isset($_POST['register'])) {
              $ph_no = $_POST['ph_no'];
              $pwd = $_POST['pwd'];
              isUserExists($ph_no, $pwd);
            }
            ?>
            <div class="register_text text-center" style="margin-top: 10px;">
              <?php echo $message; ?>
              <p class="register_text text-center" style="margin-top: 10px;">Already have an account? <a href="login.php">Login now</a></p> <!-- Added margin-top style -->
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end Register section -->
  <?php       }?>
<!-- product section -->

<section class="product_section ">
  <div class="container">
    <div class="product_heading">
      <h2>
        Best Sellers
      </h2>
    </div>
    <div class="product_container">
      <div class="box">
        <div class="box-content">
          <div class="img-box">
          <a href="indicator.php">
            <img src="Img/Indcators/indicator10.jpg" alt="">
          </a>
          </div>
          <div class="detail-box">
            <div class="text">
              <h6>
                Thunder Indicator
              </h6>
              <h5>
                <span>₹</span> 900
              </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="box">
        <div class="box-content">
          <div class="img-box">
          <a href="indicator.php">
            <img src="Img/Indcators/indicator7.jpg" alt="">
          </a>
          </div>
          <div class="detail-box">
            <div class="text">
              <h6>
                Body Indicators
              </h6>
              <h5>
                <span>₹</span> 400
              </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="box">
        <div class="box-content">
          <div class="img-box">
          <a href="exhaust.php">
            <img src="Img/Exhaust/exhaust.jpg" alt="">
          </a>
          </div>
          <div class="detail-box">
            <div class="text">
              <h6>
                Akrapovic
              </h6>
              <h5>
                <span>₹</span> 4000
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end product section -->
  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="img_container">
            <div class="img-box b1">
              <img src="images/bike.jpg" alt="">
            </div>
            <div class="img-box b2">
              <img src="images/bike1.jpg" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <h2>
              About GetUrBikeMods,
            </h2>
            <p>
              GetUrBikeMods is your go-to destination for premium and affordable bike modification parts,
              Elevate your ride with our curated selection of accessories, exhaust systems, and custom components.
              Unleash your bike's true potential with easy-to-install upgrades, all under one roof.
              Explore a diverse range of options tailored to enhance performance, style, and functionality.
              Our site is ultimate destination for biking enthusiasts.
              We are offering parts for performance and aesthetics.
              Unleash the full potential of your ride within your budget.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->
  <!-- service section -->

  <section class="service_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/feature-1.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Fast Delivery
              </h5>
              <p>
                Delivery To Your Doorstep Within 72 Hours.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/feature-2.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Free Shiping
              </h5>
              <p>
                Free Shipping On Orders Above 1000
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/feature-3.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Best Quality
              </h5>
              <p>
                Rest Assured..! 100% Authentic and Branded Products.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/feature-4.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                24x7 Customer support
              </h5>
              <p>
                Any Queries? Call Us Any Time
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->

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