<!DOCTYPE html>
<html lang="en">   
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>CS313</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
        <link rel="stylesheet" href="/styles.css">
        <script src="/scripts.js"></script>
    </head> 
    <body class="cart-body">
        <?php include '/header.php' ?>
        <?php include '/shopping-script.php' ?>
        <h1 class="cart-title"><u>Checkout</u></h1>
        <?php
							if (!isEmpty($_SESSION['cart'])) {
								foreach ($_SESSION['cart'] as $name => $props) {
									if ($props['quantity'] == 1) {
										echo "
											<div class='card-body'>
												<div class='row'>
													<div class='col-12 col-sm-12 col-md-2 text-center'>
														<img src=" . $props['img'] . " alt=" . $name ." width='120' height='80'>
													</div>
													<div class='col-12 text-sm-center col-sm-12 text-md-left col-md-6'>
														<h4 class='product-name'>" . $props['name'] . "</h4>
													</div>
													<div class='col-12 col-sm-12 text-sm-center col-md-4 text-md-right row'>
														<div class='col-3 col-sm-3 col-md-6 text-md-right m-auto'>
															<h6>$" . $props['price'] ."</h6>
														</div>
														<div class='col-2 col-sm-2 col-md-2 text-right m-auto'>
															<form method='post'>
																<button type='submit' name='" . $name . "' class='btn btn-outline-danger btn-xs'>
																	<i class='fas fa-trash'></i>
																</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<br>
										";
									}
								}
							} else {
								echo "
									<div class='card-body'>
										<div class='row'>
											<h1>No items in cart.</h1>
										</div>
									</div>
									<br>
								";
							}
						?>
  </body>
</html>