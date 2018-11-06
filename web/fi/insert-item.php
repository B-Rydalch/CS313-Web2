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

    function updateitem($db) {
        echo "hit";
        $item = htmlspecialchars($_POST['iname']);
        $quantity = htmlspecialchars($_POST['quantity']);

        $stmt = $db->prepare("SELECT id, item_name, quantity, category FROM inventory WHERE item_name = :it");
        $stmt->bindValue(':it', $ritem, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $updatedValue = $row['quantity'] + intval($rquantity);

        echo 'dbquantity ' . $row['quantity'];
        echo 'quantity '. intval($rquantity);

        $stmt = $db->prepare("UPDATE inventory SET quantity = :rtotal
                                WHERE id = :rid;");
        $stmt->bindValue(':rtotal', $updatedValue, PDO::PARAM_INT);
        $stmt->bindValue(':rid', $row['id'], PDO::PARAM_INT);
        $stmt->execute();
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
            
            if ($results){
                updateitem($db);
            } else {
                additem($db);
            }
    

            // index.php?id=$pId
            // $new_page = "index.php";
            // echo $page;
            // header("Location: $new_page");
            
            // die();

        } catch(PDOException $ex) {
            echo $ex;
            die();
        }
    }

    // need to change to current page.
    checkexisting(); 
    // $new_page = "index.php";
    // header("Location: $new_page");
    // die();

    // if (isset($_POST['chefid'])) {
    //     $db = connect_db();
    //     additem($db);
    // } else {
    //     header('Location: index.php');
    //     die();
    // }

?>