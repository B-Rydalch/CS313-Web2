<?php
    //session_start();
    require('dbconnection.php');
    $db = connect_db();

    //variables
    $ritem = htmlspecialchars($_POST['ritem']);
    $rquantity = htmlspecialchars($_POST['ramount']);
    $chefid = 1; 
    //echo "" . $ramount ."<br>";

    // grab what the user is wanting to remove from database and confirm quantity is there. 
    $stmt = $db->prepare("SELECT id, item_name, quantity, category FROM inventory WHERE item_name = :it");
    $stmt->bindValue(':it', $ritem, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //echo $row['quantity'];

    function gather_request($db) {
    }
    
    function delete_row($db, $row) {
        echo "calling";
        $stmt = $db->prepare("DELETE FROM inventory WHERE item_name = :rit AND id = :rid");
        $stmt->bindValue(':rit', $row['item_name'], PDO::PARAM_STR);
        $stmt->bindValue(':rid', $row['id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    function update_inventory($db, $ritem, $rquantity, $row) {
        echo "calling"; 
        // $stmt = $db->prepare("UPDATE inventory SET quantity = :ramt - :urqty 
        //                         WHERE id = :rid AND item_name = rit;");
        // $stmt->bindValue(':ramt', $row['quantity'], PDO::PARAM_INT);
        // $stmt->bindValue(':urqty', $rquantity, PDO::PARAM_INT);
        // $stmt->bindValue(':rid', $row['id'], PDO::PARAM_INT);
        // $stmt->bindValue(':rit', $ritem, PDO::PARAM_STR);
        echo ""

        $stmt = $db->prepare("update inventory set quantity = " . $row['quantity'] . " - " . $rquantity . " where id = " . $row['id'] . ";");
        $stmt->execute();  
        echo "finished update"; 
    }

    function update_shoppinglist($db, $ritem, $rquantity, $chefid){
        $stmt = $db->prepare('INSERT INTO shopping (item_name, quantity, category, chef_id ) 
                                VALUES (:iname, :iqty, :ict, :cook);');
        $stmt = $db->bindValue(':iname', $ritem, PDO::PARAM_STR);
        $stmt = $db->bindValue(':iqty', $rquantity, PDO::PARAM_INT);
        $stmt = $db->bindValue(':ict', $row['category'], PDO::PARAM_STR);
        $stmt = $db->bindValue(':cook', $chefid, PDO::PARAM_INT);
        $stmt->execute();
    }

    // update the inventory and insert into grocery list
    if (($row['quantity'] - $rquantity) == 0) {

        // delete row 
        delete_row($db, $row);

    } else if(($row['quantity'] - $rquantity) > 0) {
        
        echo "row qua";
        echo "" . $row['quantity'] . "-" . $rquantity . "=" . ($row['quantity'] - $rquantity) . "<br>" ;

        // update inventory
        update_inventory($db, $ritem, $rquantity, $row);

        // insert into shopping list
        update_shoppinglist($db, $ritem, $rquantity, $chefid);

    } else{
        // ERROR handler
        
        // return to page
        // $new_page = "index.php";
        // header("Location: $new_page");
    }

    $new_page = "index.php";
    header("Location: $new_page");
    die();


    // if (isset($_POST['chefid'])) {
    //     $db = connect_db();
    //     
    // } else {
    //     header('Location: index.php');
    //     die();
    // }

?>