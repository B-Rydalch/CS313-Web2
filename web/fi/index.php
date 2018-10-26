<?php
    require('dbconnection.php');
    session_start();
    $db = connect_db();
    $stmt = $db->prepare("SELECT id, item_name, quantity, best_by, parishable, category, storage_type FROM inventory;");
    $stmt->execute();
    $val = $stmt->fetchAll(PDO::FETCH_ASSOC);

    function additem($db) {
        $itemname = $_Post('iname');
        $itemname = $_Post('quantity');
        $itemname = $_Post('bestby');
        $itemname = $_Post('parishable');
        $itemname = $_Post('category');
        $itemname = $_Post('storage');
        $itemname = $_Post('user');



        
        try {
            $stmt = $db->prepare(" INSERT INTO inventory(item_name, quantity, best_by, parishable, category, storage_type, chef_id) 
            VALUES (:item, :amount, :eatby, :par, :cat, :store, :cook)");

    
            $stmt->bindValue(':item', $user, PDO::PARAM_STR);
            $stmt->bindValue(':amount', $user, PDO::PARAM_STR);
            $stmt->bindValue(':eatby', $user, PDO::PARAM_STR);
            $stmt->bindValue(':par', $user, PDO::PARAM_STR);
            $stmt->bindValue(':cat', $user, PDO::PARAM_STR);
            $stmt->bindValue(':store', $user, PDO::PARAM_STR);
            $stmt->bindValue(':cook', $user, PDO::PARAM_STR);



            $stmt->execute();
            $dbUser = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dbUser['username'] == $user && $dbUser['password'] == $pass) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['name'] = $user;

                $header = header('Location:index.php');
                die();

            } else {
                // change alert to have container shake. 
                alert('Login credentials not found!');
            }
        } catch (PDOException $ex) {
            echo $ex;
            die();
        }
    }
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>CS313</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO'
        crossorigin='anonymous'>
    <link rel='stylesheet' href='./css/fi-styles.css'>
    <script src='../scripts.js'></script>
    <!--<script src='../fullcalendar.js'></script>-->
</head>
<body>
    <div id="fullscreen_bg" class="fullscreen_bg" />
    <form class="form-signin">
        <div class="container">
            <div>
                <div> 
                    <div>
                        <div class="panel-primary">
                            <h3 class="text-center">Inventory</h3>
                            <div class="panel-body">
                                <table class="table table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Quantity</th>
                                            <th>Best By</th>
                                            <th>Parishable</th>
                                            <th>Category</th>
                                            <th>Storage Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($val as $ele) {
                                                echo 
                                                '<tr>' . 
                                                    '<td>' . $ele['item_name'] . '</td>' .
                                                    '<td>' . $ele['quantity'] . '</td>' .
                                                    '<td>' . $ele['best_by'] . '</td>' .
                                                    '<td>' . ($ele['parishable'] ? 'yes' : 'no'). '</td>' .
                                                    '<td>' . $ele['category'] . '</td>' .
                                                    '<td>' . $ele['storage_type'] . '</td>' .
                                               '</tr>';
                                            }
                                        ?> 
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    </table>
    <button class="btn btn-sm btn-primary btn-block" onclick=additem()>Add new item</button>
    <br><br>
    <div class="newitem">
        <form action="" method="POST">
            <table>
                <tr><td>Item name:</td><td><input type="text" name="iname"></td></tr>
                <tr><td>Quantity:</td><td> <input type="number" name="quantity"></td></tr>
                <tr><td>Best by:</td><td> <input type="text" name="bestby"></td></tr>
                <tr><td>Parishable:</td><td> <input type="checkbox" name="parishable"></td></tr>
                <tr><td>Category:</td><td><input type="text" name="category"></td></tr>
                <tr><td>Storage type:</td><td> <input type="text" name="storage"></td></tr>
                <tr><td><input class="confirmadd" type="submit" value="Submit"></td></tr>
            </table>
        </form>
    </div>
</body>
</html>