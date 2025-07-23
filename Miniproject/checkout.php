<?php
session_start();

if (!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])) {
    header("Location: home.php");
    exit();
} else {
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "database";

    $con = mysqli_connect($servername, $username_db, $password_db, $dbname);
    if (!$con) {
        echo "Connection failed: " . mysqli_connect_error();
    } else {
        echo "Connected successfully";

        if (isset($_POST['register'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zipcode = $_POST['zipcode'];
			$u_id = $_SESSION['u_id'];
			
            $query = "INSERT INTO bill (u_id, name, email, address, city, state, zipcode) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $query);

            mysqli_stmt_bind_param($stmt, "issssss",$u_id, $name, $email, $address, $city, $state, $zipcode);

            $result = mysqli_stmt_execute($stmt);

            if (!$result) {
                echo "Error: " . mysqli_error($con);
            } else {
				header("Location: checkout_process.php");
				exit();
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Online Payment-Page</title>
	<link rel="stylesheet" href="style2.css">
</head>

<body>
	<div class="container">
		<form method="POST">
			<!-- Your form fields here -->
			<div class="row">

				<div class="col">
					<h3 class="title">
						Billing Address
					</h3>

					<div class="inputBox">
						<label for="name">
							Full Name:
						</label>
						<input type="text" name="name" id="name" placeholder="Enter your full name" pattern="[ A-Z a-z ]+"
							title="Please enter valid Name" required>
					</div>

					<div class="inputBox">
						<label for="email">
							Email:
						</label>
						<input type="email" name="email" id="email" placeholder="Enter email address"
							title="Please enter valid Email" required>
					</div>

					<div class="inputBox">
						<label for="address">
							Address:
						</label>
						<input type="text" name="address" id="address" placeholder="Enter address" required>
					</div>

					<div class="inputBox">
						<label for="city">
							City:
						</label>
						<input type="text" name="city" id="city" placeholder="Enter city" pattern="[ A-Z a-z ]+"
							title="Please enter valid city" required>
					</div>

					<div class="flex">

						<div class="inputBox">
							<label for="state">
								State:
							</label>
							<input type="text" name="state" id="state" placeholder="Enter state" pattern="[ A-Z a-z ]+"
								title="Please enter valid state" required>
						</div>

						<div class="inputBox">
							<label for="zip">
								Zip Code:
							</label>
							<input type="number" name="zipcode" id="zip" placeholder="380001" pattern="[0-9]{6}"
								title="Please enter valid postal code" required>
						</div>

					</div>

				</div>
				<div class="col">
					<h3 class="title">Payment</h3>

					<div class="inputBox">
						<label for="name">
							Cards Accepted:
						</label>
						<img src="cards.png" alt="credit/debit card image">
					</div>

					<div class="inputBox">
						<label for="cardName">
							Name On Card:
						</label>
						<input type="text" id="cardName" placeholder="Enter card name" pattern="[ A-Z a-z ]+"
							title="Please enter valid Name" required>
					</div>

					<div class="inputBox">
						<label for="cardNum">
							Credit Card Number:
						</label>
						<input type="text" id="cardNum" placeholder="1111-2222-3333-4444" pattern="[0-9 ]{19}"
							title="Please enter valid card details" required>
					</div>

					<div class="inputBox">
						<label for="">Exp Month:</label>
						<select name="" id="" required>
							<option value="">Choose month</option>
							<!--<option value="January">January</option> -->
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
					</div>


					<div class="flex">
						<div class="inputBox">
							<label for="">Exp Year:</label>
							<select name="" id="" required>
								<option value="">Choose Year</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
								<option value="2026">2026</option>
								<option value="2027">2027</option>
								<option value="2028">2028</option>
							</select>
						</div>

						<div class="inputBox">
							<label for="cvv">CVV</label>
							<input type="number" id="cvv" placeholder="123" pattern="[0-9]{3}"
								title="Please enter valid cvv" required>
						</div>
					</div>

				</div>

			</div>

			<input type="submit" name="register" value="Proceed to Checkout" class="submit_btn">
		</form>
	</div>
	<script type="text/javascript" src="index.js"></script>
</body>

</html>