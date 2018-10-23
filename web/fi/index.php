<?php

// require('dbConnect.php');
    session_start();
//   $db = get_db();
//   if (isset($_POST['sortTerm'])) {
//     $sortBy = strtolower($_POST['sortTerm']);
//     $stmt = $db->prepare("SELECT id, title, body from blog_post
//                             WHERE lower(title) LIKE '%$sortBy%'
//                             ORDER BY title DESC;");
//   } else {
//     $stmt = $db->prepare('SELECT id, title, body FROM blog_post;');
//   }
//   $stmt->execute();
//   $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <script src='../fullcalendar.js'></script>
</head>

<body>
    <?php include "../header.php" ?>
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
                                        </tr>
                                    </thead>
                                    <tbody>

                                        
                                        <tr>
                                            <td>Cherios</td>
                                            <td>5</td>
                                            <td>11/19/19</td>
                                            <td>No</td>
                                        </tr>
                                        <tr>
                                            <td>milk</td>
                                            <td>3</td>
                                            <td>today's date</td>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>eggs</td>
                                            <td>24</td>
                                            <td>next week</td>
                                        </tr>
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