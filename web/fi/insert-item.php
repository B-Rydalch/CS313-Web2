<?php
    // variables 
    $item = htmlspecialchars($_POST['iname']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $freshness = htmlspecialchars($_POST['bestby']);
    $ = htmlspecialchars($_POST['perishable']);
    $department = htmlspecialchars($_POST['category']);
    $wrap = htmlspecialchars($_POST['storage']);


    // connect db
    require('dbConnect.php');
    $db = get_db();

    $stmt = $db->prepare('INSERT INTO inventory(item_name, quantity, best_by, perishable, category, storage_type, chef_id ) 
                        VALUES (:purchase, :amount, :eatby, :parish, :brand, :wrapping);');
    
    // binding area 
    $stmt->bindValue(':purchase', $item, PDO::PARAM_INT);
    $stmt->bindValue(':amount', $quantity, PDO::PARAM_INT);
    $stmt->bindValue(':eatby', $freshness, PDO::PARAM_STR);
    $stmt->bindValue(':parish', $content, PDO::PARAM_BOOL);
    $stmt->bindValue(':brand', $department, PDO::PARAM_STR);
    $stmt->bindValue(':wrapping', $wrap, PDO::PARAM_STR);
    
    $stmt->execute();
    $new_page = "index.php";
    header("Location: $new_page");
    die();

?>


<!--<tr><td>Item name:</td><td><input type="text" name="iname"></td></tr>
<tr><td>Quantity:</td><td> <input type="number" name="quantity"></td></tr>
<tr><td>Best by:</td><td> <input type="text" name="bestby"></td></tr>
<tr><td>Parishable:</td><td> <input type="checkbox" name="parishable"></td></tr>
<tr><td>Category:</td><td><input type="text" name="category"></td></tr>
<tr><td>Storage type:</td><td> <input type="text" name="storage"></td></tr>
<tr><td><input class="confirmadd" type="submit" value="Submit"></td></tr>-->