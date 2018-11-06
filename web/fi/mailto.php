<?php
    require('dbconnection.php');
    session_start();
    $sender = 'kelebra@live.com';
    
    // grab shopping data 
    function get_list() {
        try {
            $db = connect_db();
            $item = htmlspecialchars($_POST['iname']);
            $quantity = htmlspecialchars($_POST['quantity']);

            $stmt = $db->prepare("SELECT shop.item_name, shop.quantity, chef.email FROM shopping INNER JOIN chef on shop.id = chef.id;");
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $ex) {
            echo $ex;
            die();
        }
    }

    function get_email() {

    }
    echo "create message"; 
    // the message
    $msg = "Here's your shopping list! Thanks for using Food Inventory";
    echo "wrap message"; 
    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);
    echo "send message"; 
    // send email
    $status = bool mail("ryd11002@byui.edu","Shopping List ",$msg, "From:" . $sender);
    echo $status; 
?>