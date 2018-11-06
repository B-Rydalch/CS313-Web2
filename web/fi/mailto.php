<?php
    require('dbconnection.php');
    session_start();
    $db = connect_db();
    $stmt = $db->prepare("SELECT id, item_name, quantity FROM shopping;");
    $stmt->execute();
    $val = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
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
    echo "TO: " . $to . "<br>";
    
    $subject = 'Website Change Request';
    echo "subject: " . $subject . "<br>";


    $headers = "From: ryd11002@byui.edu \r\n";
    //$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
    // $headers .= "CC: \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    echo "headers: " . $headers . "<br>";


    $message = '<html><body>';
    $message .= '<h1>Thanks for using FI!</h1>';
    $message .= "<table>
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>" ;
                            foreach ($val as $ele) {
                                $message .=  
                                '<tr>' . 
                                    '<td>' . $ele['item_name'] . '</td>' .
                                    '<td>' . $ele['quantity'] . '</td>' .
                            '</tr>';
                            }
                    $message .= "</tbody>";
                $message .= "</table>";
    $message .= '</body></html>';
    
    echo "message: " . $message . "<br>";


    mail($to, $subject, $message, $headers);
    echo "msg sent"; 
    // $new_page = "index.php";
    // header("Location: $new_page");
?>