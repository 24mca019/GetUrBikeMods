<!DOCTYPE html>
<html>

<head>
<style>
.button {
  background-color: #04AA6D; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #04AA6D;
}

.button1:hover {
  background-color: #04AA6D;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}

.button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button5:hover {
  background-color: #555555;
  color: white;
}
</style>
<script>
            function redirectToEditcheckout() {
    console.log('Redirecting to checkout.php');
    // Redirect to profile_edit.php
    window.location.href = 'checkout.php';
}    
function redirectToEditcheckout2() {
    console.log('Redirecting to checkout2.php');
    // Redirect to profile_edit.php
    window.location.href = 'checkout2.php';
}
</script>
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
              <li class="nav-item active">
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
  <div class="heading_container text-center">
        <h1>PAY ON DELIVERY</h1>
        <h1><button type="submit" class="button button5" onclick="redirectToEditcheckout2()">pay on delivery</button></h1>
        <h2 style="border: 2px solid black;">OR</h2>
        <h1>PAY WITH CARD</h1>
        <h1><button type="submit" class="button button5" onclick="redirectToEditcheckout()">pay with card</button></h1>
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