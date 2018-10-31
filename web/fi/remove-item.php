<?php
    // variables 
    $item = htmlspecialchars($_POST['iname']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $freshness = htmlspecialchars($_POST['bestby']);
    $peri = htmlspecialchars($_POST['perishable']);  
    $department = htmlspecialchars($_POST['category']);
    $wrap = htmlspecialchars($_POST['storage']);
    //$chefid = htmlspecialchars($_GET['chef_id']);
    $chefid = 1; 

    // db execution
    require('dbconnection.php');
    $db = connect_db();

    $stmt = $db->prepare('INSERT INTO inventory(item_name, quantity, best_by, perishable, category, storage_type, chef_id ) 
                        VALUES (:purchase, :amount, :eatby, :parish, :brand, :wrapping, :cook);');

?>