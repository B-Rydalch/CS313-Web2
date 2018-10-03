<?php
   session_start();
   
   $itemAmount = $_REQUEST["quantity"];
   settype($itemAmount, "integer");
   if(!isset($_SESSION["cart"])) {
       $_SESSION["cart"] = array();
   }
   if(!isset($_SESSION["cart"][$_REQUEST["item"] - 1])) {
       $_SESSION["cart"][$_REQUEST["item"] - 1] = array($_REQUEST["item"]);
   }
   if(!isset($_SESSION["cart"][$_REQUEST["item"] - 1]["quantity"])) {
       $_SESSION["cart"][$_REQUEST["item"] - 1]["quantity"] = $itemAmount;
   } else {
       $_SESSION["cart"][$_REQUEST["item"] - 1]["quantity"] += $itemAmount;
   }
?>