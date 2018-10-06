<?php
  session_start();
  
  // // array structure = (item,image,desc,quantity,price)
  // $inventory = array(
  //   'pokemon'  => array('name'=>'pokemon', 'img'=>'shopping-items/pokemon1.jpg', 'desc'=>'Become a professional Pokemon trainer with this special trainers kit!','quantity'=> 0, 'price'=> 24.99);
  //   'avengers' => array('name'=>'avengers', 'img'=>'shopping-items/avengers.jpg','desc'=>'Join the avengers in epic battles against Loki!','quantity'=> 0,'price'=> 45.99);
  //   'ferdinand'=> array('name'=>'ferdinand', 'img'=>'shopping-items/ferdinand.jpg', 'desc'=>'Have fun with Ferdinand and his friends.', 'quantity'=>0, 'price'=>29.99);
  // );
  
  // $selectedinventory = array();

  // if (!isset($_SESSION['activeSession'])) {
  //   $_SESSION['activeSession'] = true;
  //   $_SESSION['inventory'] = $inventory;
  // } 
  
  // if (isset($_POST)) {
  //   $_SESSION['inventory'][key($_POST)]['quantity']++;
  // }
?>


!DOCTYPE html>
<html lang='en'>   
   <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <title>CS313</title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
        crossorigin='anonymous'>
        <link rel='stylesheet' href='styles.css'>
        <script src='scripts.js'></script>
   </head> 
   <body>
        <?php require 'header.php' ?>
        <h2 class='shopping-title'><u>Which one of my kids are you shopping for?</u></h2>
        <div class='card-deck'>
        <form action='' method='post'>
          <div class='card'>
            <img class='card-img-top' src='shopping-items/pokemon1.jpg' alt='Pokemon kit'>
            <div class='card-body'>
              <h5 class='card-title'>Pokemon Trainer Kit</h5>
              <p class='card-text'>Become a professional Pokemon trainer with this special trainers kit!</p>
              <!-- <?php 
                  if ($_SESSION['inventory']['pokemon']['quantity'] == 1) {
                    echo '<p class='card-text' name=price[] value='24.99'><small class='text-muted'>$24.99</small><button class='btn'>Add Another?</button></p>';
                  } else {
                    echo '<p class='card-text' name=price[] value='24.99'><small class='text-muted'>$24.99</small><button class='btn'>Add to cart</button></p>';
                  }
              ?> -->
            </div>
          </div>
          <div class='card'>
            <img class='card-img-top' src='shopping-items/avengers.jpg' alt='Avengers Team'>
            <div class='card-body'>
              <h5 class='card-title' name='shoppingitem[]' value='Avengers'>Avengers Action Figures</h5>
              <p class='card-text' name='description'>Join the avengers in epic battles against Loki!</p>
              <p class='card-text' name='price'><small class='text-muted'>$45.99</small><button class='btn'>Add to cart</button></p>
            </div>
          </div>
          <div class='card'>
            <img class='card-img-top' src='shopping-items/ferdinand.jpg' alt='Disney Ferdiand'>
            <div class='card-body'>
              <h5 class='card-title' name='shoppingitem[]' value='Ferdinand'>Ferdinand Beanny Baby</h5>
              <p class='card-text'>Have fun with Ferdinand and his friends. </p>
              <p class='card-text'><small class='text-muted'>$29.99</small><button class='btn'>Add to cart</button></p>
            </div>
          </div>
        </form>
        <div class='cart-btn'>
          <button><a href='shopping-cart.php'>View Shopping Cart</a></button>
        </div>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy'
        crossorigin='anonymous'></script>
   </body>
</html>