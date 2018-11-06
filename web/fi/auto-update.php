<?php
    //session_start();
    require('dbconnection.php');
    $db = connect_db();

    //variables
    $ritem = htmlspecialchars($_POST['ritem']);
    $rquantity = htmlspecialchars($_POST['ramount']);
    $chefid = $_GET['id'];

    // grab what the user is wanting to remove from database and confirm quantity is there. 
    $stmt = $db->prepare("SELECT id, item_name, quantity, category FROM inventory WHERE item_name = :it");
    $stmt->bindValue(':it', $ritem, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    function gather_request($db) {
    }
    
    function delete_row($db, $row) {
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
    }

    function update_shoppinglist($db, $ritem, $rquantity, $row, $chefid){
        try {
            $stmt = $db->prepare('INSERT INTO shopping (item_name, quantity, category, chef_id ) 
                                VALUES (:iname, :iqty, :ict, :cook);');
    
            $stmt->bindValue(':iname', $ritem, PDO::PARAM_STR);
            $stmt->bindValue(':iqty', $rquantity, PDO::PARAM_STR);
            $stmt->bindValue(':ict', $row['category'], PDO::PARAM_STR);
            $stmt->bindValue(':cook', $chefid, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $err) {
            echo $err;
            die();
        }
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

    } 

    $new_page = "index.php";
    header("Location: $new_page");
    die();


    if (isset($_POST['chefid'])) {
        $db = connect_db();
        
    } else {
        header('Location: index.php');
        die();
    }

?>