<?php
    session_start();

    // $quantitiy = $_REQUEST["quantity"]

    // $arrtitle = array("Pokemon Trainer Kit", "Avengers Action Figures", "Ferdinand Beanny Babies");
    $arrdescription = array("Become a professional Pokemon trainer with this special trainers kit!",
                             "Join the avengers in epic battles against Loki!",
                              "Have fun with Ferdinand and his friends.");
    
    // foreach ($arrtitle as $shoppingitem) {
    //     echo "$shoppingitem";
    // }

    // foreach($arrdescription as $description) {
    //     echo "$description";
    // }
?>
   
//    $itemAmount = $_REQUEST["quantity"];
//    settype($itemAmount, "integer");
//    if(!isset($_SESSION["cart"])) {
//        $_SESSION["cart"] = array();
//    }
//    if(!isset($_SESSION["cart"][$_REQUEST["item"] - 1])) {
//        $_SESSION["cart"][$_REQUEST["item"] - 1] = array($_REQUEST["item"]);
//    }
//    if(!isset($_SESSION["cart"][$_REQUEST["item"] - 1]["quantity"])) {
//        $_SESSION["cart"][$_REQUEST["item"] - 1]["quantity"] = $itemAmount;
//    } else {
//        $_SESSION["cart"][$_REQUEST["item"] - 1]["quantity"] += $itemAmount;
//    }
?>