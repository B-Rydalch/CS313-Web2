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

    function update_inventory($db, $rquantity, $row) {
        $updatedValue = $row['quantity'] - intval($rquantity);

        $stmt = $db->prepare("UPDATE inventory SET quantity = :rtotal
                                WHERE id = :rid;");
        $stmt->bindValue(':rtotal', $updatedValue, PDO::PARAM_INT);
        $stmt->bindValue(':rid', $row['id'], PDO::PARAM_INT);
        $stmt->execute(); 
        echo "update inventory complete <br>";
    }

    function update_shoppinglist($db, $ritem, $rquantity, $row, $chefid){
        echo "calling shopping<br>"; 
        echo $ritem; 
        echo "<br>";
        echo $rquantity;
        echo "<br>";
        echo $row['category'];
        echo "<br>end";
        $stmt = $db->prepare('INSERT INTO shopping (item_name, quantity, category, chef _id ) 
                                VALUES (:iname, :iqty, :ict, :cook);');
        $stmt = $db->bindValue(':iname', $ritem, PDO::PARAM_STR);
        $stmt = $db->bindValue(':iqty', $rquantity, PDO::PARAM_STR);
        $stmt = $db->bindValue(':ict', $row['category'], PDO::PARAM_STR);
        $stmt = $db->bindValue(':cook', $chefid, PDO::PARAM_STR);
        $stmt->execute(); 
        echo "update shopping compelte"; 

    }

    // update the inventory and insert into grocery list
    if (($row['quantity'] - $rquantity) <= 0) {

        // delete row 
        delete_row($db, $row);

    } else if(($row['quantity'] - $rquantity) > 0) {

        // update inventory
        update_inventory($db, $rquantity, $row);

        // insert into shopping list
        update_shoppinglist($db, $ritem, $rquantity, $row, $chefid);

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