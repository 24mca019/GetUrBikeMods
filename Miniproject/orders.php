<?php
session_start();
$m = "";

if (isset($_POST['s'])) {
    $f = $_POST['f'];
    $ui_id = $_SESSION['u_id'];

    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "database";

    $con = mysqli_connect($servername, $username_db, $password_db, $dbname);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the order ID from the 'bill' table based on the user ID
    $orderQuery = "SELECT id FROM bill WHERE u_id = '$ui_id'";
    $orderResult = mysqli_query($con, $orderQuery);

    if (!$orderResult) {
        $m = "<p style='color: purple; background-color: white;'>Error retrieving order ID: " . mysqli_error($con) . "</p>";
    } else {
        $row = mysqli_fetch_assoc($orderResult);
        $oid = $row['id'];

        // Check if the user has already submitted a review for the specific order
        $checkQuery = "SELECT COUNT(*) FROM feedback WHERE uid = '$ui_id' AND oid = '$oid'";
        $checkResult = mysqli_query($con, $checkQuery);

        if (!$checkResult) {
            $m = "<p style='color: purple; background-color: white;'>Error checking for existing review: " . mysqli_error($con) . "</p>";
        } else {
            $count = mysqli_fetch_array($checkResult)[0];

            if ($count > 0) {
                $m = "<p style='color: purple; background-color: white;'>You have already submitted a review. </p>";
            } else {
                // Insert the new review for the specific order
                $insertQuery = "INSERT INTO feedback (feed, uid, oid) VALUES ('$f', '$ui_id', '$oid')";
                $result = mysqli_query($con, $insertQuery);

                if (!$result) {
                    $m = "<p style='color: purple; background-color: white;'>Could not insert into the database! " . mysqli_error($con) . "</p>";
                } else {
                    $m = "<p style='color: purple; background-color: white;'>Your review has been submitted!</p>";
                }
            }
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
  <style>
.feedback-form {
    max-width: 400px;
    margin: auto;
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: left;
}

.feedback-form label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.feedback-form .form-group {
    margin-bottom: 15px;
}

.feedback-form .form-control {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ced4da;
    border-radius: 5px;
}

.feedback-form .btn-primary {
    background-color: #007bff !important;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.feedback-form .btn-primary:hover {
    background-color: #0056b3 !important;
}

  </style>
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
  <div class="row justify-content-center">
  <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header text-center">Order Details</div>
                <div class="card-body">
                <?php

                if (!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])) {
                  // If not logged in, display a message and provide a login link
                  echo '<p class="register_text text-center" style="margin-top: 10px;">You need to login first <a href="login.php">Login now</a></p>';
                  }
                else{
			          $u_id = $_SESSION['u_id'];
                $message = "";
                
                $servername = "localhost";
                $username_db = "root";
                $password_db = "";
                $dbname = "database";

                $con = mysqli_connect($servername, $username_db, $password_db, $dbname);

                if (!$con) {
                  die("Connection failed: " . mysqli_connect_error());
                }

                $query = "SELECT * FROM bill WHERE u_id='$u_id'";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) <= 0) {
                  echo '<p class="register_text text-center" style="margin-top: 10px;">You Do Not Have Any Orders</p>';
                }
                else{
                  while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <p><strong>Order ID:</strong> <?php echo $row['id']; ?></p>
                    <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                    <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
                    <p><strong>City:</strong> <?php echo $row['city']; ?></p>
                    <p><strong>State:</strong> <?php echo $row['state']; ?></p>
                    <p><strong>Zip Code:</strong> <?php echo $row['zipcode']; ?></p>
                    <p><strong><br></br></strong></p>
                   <?php 
                  }
                  ?>
                  <form method="post" action="" class="feedback-form">
   <div class="form-group">
      <label for="feedback" class="label">Share Your Valuable Feedback With Us:</label>
      <input type="text" name="f" id="feedback" class="form-control" required>
   </div>
   <div class="form-group">
      <button type="submit" name="s" class="btn btn-primary">Submit Feedback</button>
   </div>
</form>
<p><strong><?php echo $m; ?></strong></p>
                    <?php
                    /* echo '
                      <tr>
                          <td>' . $row['id'] . '</td>
                          <td>' . $row['name'] . '</td>
                          <td>' . $row['email'] . '</td>
                          <td>' . $row['address'] . '</td>
                          <td>' . $row['city'] . '</td>
                          <td>' . $row['state'] . '</td>
                          <td>' . $row['zipcode'] . '</td>
                      </tr>
                      </table>
                      '; */
                mysqli_close($con);
                }
                }
              ?>
                </div>
            </div>
        </div>
    </div>
</div>
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