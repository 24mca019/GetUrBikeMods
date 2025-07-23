<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
<style>
  /* Style for the file input button */
  input[type="file"] {
    display: none; /* Hide the default file input */
  }

  .btn-upload {
    background-color: #007bff; /* Set button background color */
    color: #fff; /* Set button text color */
    padding: 6px 10px; /* Adjust padding as needed */
    border: none; /* Remove border */
    border-radius: 2px; /* Add border-radius for a rounded appearance */
    cursor: pointer; /* Change cursor on hover */
    display: inline-block; /* Ensure button behaves as an inline element */
  }

  /* Style for the file input label */
  .custom-file-upload {
    display: inline-block;
    font-size: 14px; /* Adjust font size as needed */
    margin-top: 8px; /* Add spacing from the button */
    cursor: pointer; /* Change cursor on hover */
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
  <!-- Profile -->
  <link href="css/profile.css" rel="stylesheet" />

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
<section>
    <div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="form_container">
          <form method="POST" enctype="multipart/form-data">
          <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
<!-- Profile picture card -->
<div class="card mb-4 mb-xl-0">
    <div class="card-header">Profile Picture</div>
    <div class="card-body text-center">
        <?php
            $servername = "localhost";
            $username_db = "root";
            $password_db = "";
            $dbname = "database";
            
            $con = mysqli_connect($servername, $username_db, $password_db, $dbname);
            $res = mysqli_query($con, "SELECT * FROM pfp");
            while ($row = mysqli_fetch_assoc($res)) {
        ?>
        <!-- Profile picture image -->
        <img class="img-account-profile rounded-circle mb-2" src="uploads/<?php echo $row['image']; ?>" alt="">
        <!-- Profile picture help block -->
        <?php
            }
        ?>
        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
        <!-- Profile picture upload button -->
        <form method="POST" enctype="multipart/form-data">
        <label class="custom-file-upload">
    <input type="file" name="image" />
    <span class="btn-upload">Choose File</span>
  </label>
            <button class="btn btn-primary" type="submit" name="upimg">Upload new image</button>
          </div>
        </form>
    </div>
</div>

        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form method="POST">
                        <!-- Form Row-->
<div class="mb-3">
    <!-- Form Group (first name)-->
    <label class="small mb-1" for="inputEmailAddress">Full name</label>
    <input type="text" class="form-control" id="inputEmailAddress" name="name" placeholder="Enter your full name" pattern="[A-Za-z ]+" title="Please enter valid Name" />
</div>
<!-- Form Group (email address)-->
<div class="mb-3">
    <label class="small mb-1" for="inputEmailAddress">Email address</label>
    <input type="email" class="form-control" id="inputEmailAddress" name="email" placeholder="Enter your email address" />
</div>
<!-- Form Row-->
<div class="row gx-3 mb-3">
    <!-- Form Group (phone number)-->
    <div class="col-md-6">
        <label class="small mb-1" for="inputPhone">Phone number</label>
        <input type="tel" class="form-control" id="inputPhone" name="ph_no" placeholder="Enter your phone number" pattern="[6789][0-9]{9}" title="Please enter valid phone number" />
    </div>
    <div class="col-md-6">
        <label class="small mb-1" for="inputPhone">New Password</label>
        <input type="password" class="form-control" id="inputPhone" name="pwd" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain at least one number, one lowercase letter, one uppercase letter, and at least 8 characters" />
    </div>
</div>
<!-- Save changes button-->
<button class="btn btn-primary" type="submit" name="save">Save changes</button>
<br></br>
                    </form>
                    <?php
if (isset($_POST['upimg'])) {
    $uid = $_SESSION['u_id'];

    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "database";

    $con = mysqli_connect($servername, $username_db, $password_db, $dbname);

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        // Get the uploaded file details
        $file_name = basename($_FILES["image"]["name"]);
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'uploads/' . $file_name;
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Check if the file extension is allowed
        $allowed_extensions = array('jpg', 'jpeg', 'png');
        if (!in_array($file_extension, $allowed_extensions)) {
            echo "Only JPG, JPEG, and PNG files are allowed.";
            exit;
        }

        // Check if there's an existing record for the user
        $existingRecordQuery = "SELECT * FROM pfp WHERE u_id = '$uid'";
        $existingRecordResult = mysqli_query($con, $existingRecordQuery);

        if ($existingRecordResult && mysqli_num_rows($existingRecordResult) > 0) {
            // Update the existing record
            $updateQuery = "UPDATE pfp SET image = '$file_name' WHERE u_id = '$uid'";
            $updateResult = mysqli_query($con, $updateQuery);

            if ($updateResult) {
                // Move the uploaded file to the folder
                if (move_uploaded_file($tempname, $folder)) {
                    echo "Successfully updated profile picture";
                } else {
                    echo "Error moving uploaded file.";
                }
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }
        } else {
            // Insert a new record if there's no existing record
            $insertQuery = "INSERT INTO pfp (image, u_id) VALUES ('$file_name', '$uid')";
            $insertResult = mysqli_query($con, $insertQuery);

            if ($insertResult) {
                // Move the uploaded file to the folder
                if (move_uploaded_file($tempname, $folder)) {
                    echo "Successfully uploaded profile picture";
                } else {
                    echo "Error moving uploaded file.";
                }
            } else {
                echo "Error inserting record: " . mysqli_error($con);
            }
        }
    } else {
        // Handle the case where $_FILES["image"] is not set or there's an error
        echo "No image uploaded!";
    }
}
?>
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
                        if (isset($_POST['save'])) {
                          $name = $_POST['name'];
                          $email = $_POST['email'];
                          $ph_no = $_POST['ph_no'];
                          $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        
                          $query = "update registered set name = '$name', email = '$email',ph_no = '$ph_no', pwd = '$pwd' where ph_no = '$ph_no'";
                          $result = mysqli_query($con, $query);
        
                          if (!$result) {
                            $message = "<p style='color: purple; background-color: white;'>Could not insert into the database! " . mysqli_error($con) . "</p>";
                          } else {
                            $message = "<p style='color: purple; background-color: white;'>You have successfully updated your account!</p>";
                          }
                        }
                      } else {
                        $message = "<p style='color: purple; background-color: white;'>User Doesn't Exist!<a href='register.php'> Register Now</a></p>";
                      }
                      mysqli_close($con);
                    }
                    if (isset($_POST['save'])) {
                      if (empty($_POST['save'])){
                        $message = "<p style='color: purple; background-color: white;'>Fill Details First!</p>"; 
                      }
                      else{
                      $ph_no = $_POST['ph_no'];
                      $pwd = $_POST['pwd'];
                      isUserExists($ph_no, $pwd);
                      }
                    }
                    ?>
                    <?php echo $message; ?>
                </div>
            </div>
        </div>
    </div>
</div>
            </form>
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