<?php
  session_start();

  $inventory = array(
    'pokemon'  => array('name'=>'pokemon-kit', 'img'=>'shopping-items/pokemon1.jpg', 'desc'=>'Become a professional Pokemon trainer with this special trainers kit!','quantity'=> 0, 'price'=> 24.99),
    'avengers' => array('name'=>'avengers-kit', 'img'=>'shopping-items/avengers.jpg','desc'=>'Join the avengers in epic battles against Loki!','quantity'=> 0,'price'=> 45.99),
    'ferdinand'=> array('name'=>'ferdinand-kit', 'img'=>'shopping-items/ferdinand.jpg', 'desc'=>'Have fun with Ferdinand and his friends.', 'quantity'=>0, 'price'=>29.99)
  );
  
  if (!isset($_SESSION['activeSession'])) {
    $_SESSION['activeSession'] = true;
    $_SESSION['inventory'] = $inventory;
  } 
  
  if (isset($_POST)) {
    $_SESSION['inventory'][key($_POST)]['quantity']++;
  }     

?>


<!DOCTYPE html>
<html lang='en'>   
   <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <title>CS313</title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
        crossorigin='anonymous'>
        <link rel='stylesheet' href='/styles.css'>
        <script src='/scripts.js'></script>
   </head> 
   <body>
      <?php include '/header.php' ?>
      <h2 class='shopping-title'><u>Which one of my kids are you shopping for?</u></h2>
      <div class='card-deck'>
        <form action='' method='post'>  
            <!--pokemon section --> 
            <div class='card'>
              <img class='card-img-top' src='/shopping-items/pokemon1.jpg' alt='Pokemon kit'>
              <div class='card-body' id='pokemon'>
                <h5 class='card-title'>Pokemon Trainer Kit</h5>
                <p class='card-text'>Become a professional Pokemon trainer with this special trainers kit!</p>
                <p class='card-text'>
                  <small class='text-muted'>$<?php echo $_SESSION['inventory']['pokemon']['price'];?></small>
                  <button class='btn'>Add to cart</button>
                </p>
              </div>
            </div>

            <!-- avengers section -->
            <div class='card'>
              <img class='card-img-top' src='/shopping-items/avengers.jpg' alt='Avengers Team'>
              <div class='card-body' id='avengers'>
                <h5 class='card-title'>Avengers Action Figures</h5>
                <p class='card-text'>Join the avengers in epic battles against Loki!</p>
                <p class='card-text'>
                  <small class='text-muted'>$<?php echo $_SESSION['inventory']['avengers']['price'];?></small>
                  <button class='btn'>Add to cart</button>
                </p>
              </div>
            </div>

            <!-- ferdinand section --> 
            <div class='card'>
              <img class='card-img-top' src='/shopping-items/ferdinand.jpg' alt='Disney Ferdiand'>
              <div class='card-body' id='ferdinand'>
                <h5 class='card-title'>Ferdinand Beanny Baby</h5>
                <p class='card-text'>Have fun with Ferdinand and his friends. </p>
                <p class='card-text'><small class='text-muted'>$<?php echo $_SESSION['inventory']['ferdinand']['price'];?></small>
                  <button class='btn'>Add to cart</button>
                </p>
              </div>
            </div>
        </form>

          <!--Checkout to next page-->
        <form action='shopping-cart.php' method="post" >  
          <div class='cart-btn'>
            <!-- <button><a href='shopping-cart.php'>View Shopping Cart</a></button> -->
            <input type="submit" class="btn btn-primary float-right m-3" value="Checkout">View Shopping Cart</input>
          </div>
        </form>
      </div>
      <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy'
        crossorigin='anonymous'></script>
   </body>
</html>