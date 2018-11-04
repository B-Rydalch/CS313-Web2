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
    //$chefid = htmlspecialchars($_GET['chef_id']);
    $chefid = 1;   

    // convert checkbox value to boolean
    if ($peri != 'on') {
        $peri = false;
    }else {
        $peri = true;
    }

    // connect db
    require('dbconnection.php');
    $db = connect_db();

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
    
    $stmt->execute();
    $new_page = "index.php";
    header("Location: $new_page");
    die();

?>