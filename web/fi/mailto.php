<?php
    require('dbconnection.php');
    session_start();

    
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

    $to = 'kelebra@live.com';

    $subject = 'Website Change Request';
    
    $headers = "From: ryd11002@byui.edu \r\n";
    //$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
    $headers .= "CC: \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message = '<html><body>';
    $message .= '<h1>Hello, World!</h1>';
    $message .= '</body></html>';

    mail($to, $subject, $message, $headers);
?>