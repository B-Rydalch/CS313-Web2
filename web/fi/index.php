<?php
    require('dbconnection.php');
    session_start();
    $db = connect_db();
    $stmt = $db->prepare("SELECT id, item_name, quantity, best_by, perishable, category, storage_type FROM inventory;");
    $stmt->execute();
    $val = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST['submit'])){
        header("Location: ../shopping-list.php");
        exit;
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
    <script>
        function hidedisplay() {
            let x = document.getElementById("itemformadd");
            let y = document.getElementById("itemformremove")
            x.style.display = "none"; 
            y.style.display = "none";
        }
        function togglex() {
            let x = document.getElementById("itemformadd");
            let y = document.getElementById("itemformremove");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
                y.style.display = "none";
            }
        }
        function toggley() {
            let x = document.getElementById("itemformadd");
            let y = document.getElementById("itemformremove");
            if (y.style.display === "block") {
                y.style.display = "none";
            } else {
                x.style.display = "none";
                y.style.display = "block";
            }
        }
    </script>
</head>
<body onload=hidedisplay()>
    <div id="fullscreen_bg" class="fullscreen_bg">
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
                                                    '<td>' . ($ele['perishable'] ? 'yes' : 'no'). '</td>' .
                                                    '<td>' . $ele['category'] . '</td>' .
                                                    '<td>' . $ele['storage_type'] . '</td>' .
                                               '</tr>';
                                            }
                                        ?>
                                        <tr id="features">
                                            <td><a class="btn" onclick=togglex()>Add New Item</a></td>
                                            <td><a class="btn" id="rbtn" onclick=toggley()>Remove Item</a></td>
                                            <td><a class="btn" id="shoppinglist" type='submit' action="shopping-list.php" metod="POST">Shopping List</a></td>
                                        </tr>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>   
    <div class="newitem" id="itemformadd">
        <form action="insert-item.php" method="POST">
            <table class="newitemtable">
                <thead class="addheader">
                    <td>Item name</td>
                    <td>Quantity</td>
                    <td>Best by</td>
                    <td>Parishable</td>
                    <td>Category</td>
                    <td>Storage type</td>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="iname"></td>
                        <td><input type="number" name="quantity"  min="0"></td>
                        <td><input type="text" name="bestby"></td>
                        <td><input type="checkbox" name="parishable"></td>
                        <td><input type="text" name="category"></td>
                        <td><input type="text" name="storage"></td>
                    </tr>
                </tbody>
                <tr><td><input class="confirmadd" type="submit" value="Submit"></td></tr>
            </table>
        </form>
    </div>
    <div class="removeitem" id="itemformremove">
        <form action="remove-item.php" method="POST">
            <table class="removeitemtable">
                <tr>
                    <td>Item Name</td>
                    <td><input type="text" name="ritem"></td>
                    <td>Quantity</td><td><input type="number" name="ramount"></td>
                    <td><input class="confirmadd" type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>