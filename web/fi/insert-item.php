<?php

    // if (!isset($_GET['chef_id']))
    // {
    // 	die("Error, chef id not specified...");
    // }

    // variables 
    $item = htmlspecialchars($_POST['iname']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $freshness = htmlspecialchars($_POST['bestby']);
    $peri = htmlspecialchars($_POST['perishable']);
    $department = htmlspecialchars($_POST['category']);
    $wrap = htmlspecialchars($_POST['storage']);
    $chefid = htmlspecialchars($_GET['chef_id']);
    $chefid = 1;   


    // connect db
    require('dbConnect.php');
    $db = get_db();

    $stmt = $db->prepare('INSERT INTO inventory(item_name, quantity, best_by, perishable, category, storage_type, chef_id ) 
                        VALUES (:purchase, :amount, :eatby, :parish, :brand, :wrapping, :cook);');
    
    // binding area 
    $stmt->bindValue(':purchase', $item, PDO::PARAM_STR);
    $stmt->bindValue(':amount', $quantity, PDO::PARAM_INT);
    $stmt->bindValue(':eatby', $freshness, PDO::PARAM_STR);
    $stmt->bindValue(':parish', $peri, PDO::PARAM_BOOL);
    $stmt->bindValue(':brand', $department, PDO::PARAM_STR);
    $stmt->bindValue(':wrapping', $wrap, PDO::PARAM_STR);
    $stmt->bindValue(':cook', $chefid, PDO::PARAM_INT);


    // stmt should be 
    // insert into inventory (item_name, quantity, best_by, perishable, category, storage_type, chef_id) 
    // values('milk',2,'2018-11-2', True, 'dairy', 'plastic gallon', 1);

    echo $stmt;
    
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