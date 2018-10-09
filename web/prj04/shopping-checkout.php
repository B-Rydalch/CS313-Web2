<?php
	session_start();


?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" type="image/png" href="https://cdn1.iconfinder.com/data/icons/outlined-medieval-icons-pack/200/magic_staff-512.png">
	<title>Ozzy's Wizard Shop</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	 crossorigin="anonymous">
	<link href="styles.css" rel="stylesheet">
</head>
<!-- Received help and tutoring of what I was doing wrong with Sam Mcgrath -->
<body class="text-center">
	<div class="container">
		<header class="jumbotron my-4">
			<h1>Enter shipping information: </h1>
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-md-8">
						<h5>Items Purchasing:</h5>
						<hr>
						<?php
							foreach ($_SESSION['cart'] as $name => $props) {
								if ($props['quantity'] >= 1) {
									echo "
										<div class='card-body'>
											<div class='row'>
												<div class='col-12 col-sm-12 col-md-2 text-center'>
													<img src=" . $props['img'] . " alt=" . $name ." width='120' height='80'>
												</div>
												<div class='col-12 text-sm-center col-sm-12 text-md-center col-md-6'>
													<h4 class='product-name'>" . $props['name'] . "</h4>
												</div>
												<div class='col-12 col-sm-12 text-sm-center col-md-4 text-md-center row'>
													<div class='col-3 col-sm-3 col-md-6 text-md-center m-auto'>
														<h6>$" . $props['price'] ."</h6>
													</div>
												</div>
											</div>
										</div>
										<br>
									";
								}
							}
						?>
						<hr>
						<div class="container">
							<div class="row float-right mr-5">
								Total: $<?php echo $_SESSION['total']; ?>
							</div>
						</div>	
					</div>
					<div class="col-12 col-md-4 m-auto">
						<form action="confirmation.php" method="post">
							<div class="control-group form-group">
								<div class="controls">
									<label>Name:</label>
									<input type="text" name="customerName" class="form-control" required>
								</div>
							</div>
							<div class="control-group form-group">
								<div class="controls">
									<label>Street Address:</label>
									<input type="text" name='address' class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label for="city_id" class="control-label">City;</label>
								<input type="text" name="city" class="form-control" required>
							</div>
							<div class="form-inline">
								<label class="control-label">&nbsp;State&nbsp;</label>
								<select name="state" class="form-control" style="width: 30%;">
									<option value="AL">Alabama</option>
									<option value="AK">Alaska</option>
									<option value="AZ">Arizona</option>
									<option value="AR">Arkansas</option>
									<option value="CA">California</option>
									<option value="CO">Colorado</option>
									<option value="CT">Connecticut</option>
									<option value="DE">Delaware</option>
									<option value="DC">District Of Columbia</option>
									<option value="FL">Florida</option>
									<option value="GA">Georgia</option>
									<option value="HI">Hawaii</option>
									<option value="ID">Idaho</option>
									<option value="IL">Illinois</option>
									<option value="IN">Indiana</option>
									<option value="IA">Iowa</option>
									<option value="KS">Kansas</option>
									<option value="KY">Kentucky</option>
									<option value="LA">Louisiana</option>
									<option value="ME">Maine</option>
									<option value="MD">Maryland</option>
									<option value="MA">Massachusetts</option>
									<option value="MI">Michigan</option>
									<option value="MN">Minnesota</option>
									<option value="MS">Mississippi</option>
									<option value="MO">Missouri</option>
									<option value="MT">Montana</option>
									<option value="NE">Nebraska</option>
									<option value="NV">Nevada</option>
									<option value="NH">New Hampshire</option>
									<option value="NJ">New Jersey</option>
									<option value="NM">New Mexico</option>
									<option value="NY">New York</option>
									<option value="NC">North Carolina</option>
									<option value="ND">North Dakota</option>
									<option value="OH">Ohio</option>
									<option value="OK">Oklahoma</option>
									<option value="OR">Oregon</option>
									<option value="PA">Pennsylvania</option>
									<option value="RI">Rhode Island</option>
									<option value="SC">South Carolina</option>
									<option value="SD">South Dakota</option>
									<option value="TN">Tennessee</option>
									<option value="TX">Texas</option>
									<option value="UT">Utah</option>
									<option value="VT">Vermont</option>
									<option value="VA">Virginia</option>
									<option value="WA">Washington</option>
									<option value="WV">West Virginia</option>
									<option value="WI">Wisconsin</option>
									<option value="WY">Wyoming</option>
								</select>
								<label for="zip" class="control-label">&nbsp;&nbsp;Zip&nbsp;&nbsp;</label>
								<input type="number" name="zip" class="form-control" style="width: 40%;" required>
							</div>
							<div class="container">
								<div class="row mt-4">
									<div class="float-left ml-4 mr-4">
											<button class="btn btn-warning mb-5" type="submit" formaction="./index.php"><i class='fas fa-arrow-left'></i>&nbsp;Go back</button>
									</div>
									<form action='shopping-confirmation.php' method="post" >
									<div class="float-right">
										<button class="btn btn-success" type="submit">Purchase&nbsp;<i class='fas fa-shopping-cart'></i></button>
									</div>
								</div>
							</div>
						</div>
						</form>
				</div>
			</div>
	</div>
	</header>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	 crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
	 crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
	 crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script src="scripts.js"></script>
</body>

</html>