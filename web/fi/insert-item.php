<?php

    // if (!isset($_GET['chef_id']))
    // {
    // 	die("Error, chef id not specified...");
    // }

    // connect db
    require('dbconnection.php');
    

    function additem($db) {
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
        
        try {

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

            // index.php?id=$pId
            $new_page = "index.php";
            echo $page;
            header("Location: $new_page");
            
            die();

        } catch(PDOException $ex) {
            die();
        }

    }

    function checkexisting() {
        $db = connect_db();
        $table = "inventory";
        $tim = $_POST['iname'];  

        try {

            if ($table == "inventory") {  
                $stmt = $db->prepare("select exists (select 1  from inventory where item_name = :it LIMIT 1);");
            } else {
                $stmt = $db->prepare('select exists (select 1  from shopping where item_name = :it LIMIT 1);');
            }
            
            $stmt->bindvalue(':it', $tim, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            echo $results; 
            
            // if ($results){
            //     updateitem($db);

            // } else {
            //     additem($db);
            // }
    

            // index.php?id=$pId
            $new_page = "index.php";
            echo $page;
            header("Location: $new_page");
            
            die();

        } catch(PDOException $ex) {
            echo $ex;
            die();
        }
    }

    // need to change to current page.
    checkexisting(); 
    $new_page = "index.php";
    header("Location: $new_page");
    die();

    // if (isset($_POST['chefid'])) {
    //     $db = connect_db();
    //     additem($db);
    // } else {
    //     header('Location: index.php');
    //     die();
    // }

?>