<?php
    require('dbconnection.php');
    session_start();
    $db = get_db();
    $stmt = $db->prepare("SELECT id, item_name, quantity, best_by, parishable, category, storage_type FROM inventory;");
    $stmt->execute();
    $val = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <div class="row">
                <div class="col-md-5 col-md-offset-3"> 
                    <div class="panel-default">
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
                                                    '<td>' . $ele['parishable'] . '</td>' .
                                                    '<td>' . $ele['category'] . '</td>' .
                                                    '<td>' . $ele['storage_tpe'] . '</td>' .
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
    <a href="http://www.jquery2dotnet.com" class="btn btn-sm btn-primary btn-block" role="button">Add new item</a>
</body>
</html>