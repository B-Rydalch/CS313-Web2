<?php
   session_start();
   
   if( isset( $_SESSION['quantity'] ) ) {
      $_SESSION['counter'] += 1;
   }else {
      $_SESSION['counter'] = 1;
   }
?>