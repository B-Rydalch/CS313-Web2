<?php    
    session_start();
    
    if (isset($_POST)) {
        $_SESSION['inventory'][key($_POST)]['quantity'] = 0;
    }
    
    $total = 0;
    foreach ($_SESSION['inventory'] as $name => $props) {
        if ($props['quantity'] == 1) {
            $total += $props['price'];
        }
    }

    $_SESSION['total'] = $total;
    
    function isEmpty($arr) {
        $val = true;
        foreach ($arr as $name => $props) {
            if ($props['quantity'] == 1) {
                $val = false;
            }
        }
    
        return $val;
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
        <link rel='stylesheet' href='/styles.css'>
        <script src='/scripts.js'></script>
    </head> 
    <body class='cart-body'>
        <?php include '/header.php' ?>
        <h1 class='cart-title'>Shopping Cart</h1>
        <div class='container'>
        <div class='wrapper wrapper-content animated fadeInRight'>
            <div class='row'>
                <div class='col-md-9'>
                    <div class='ibox'>
                        <div class='ibox-title'>
                            <span class='pull-right'>(<strong>#</strong>) items</span>
                            <h5>Items in your cart</h5>
                        </div>
                            <div class='ibox-content'>
                                <div class='table-responsive'>
                                    <table class='table shoping-cart-table'>
                                        <tbody>
                                        <?php 
                                                //var_dump($_POST['inventory']);

                                                if (!isEmpty($_SESSION['inventory'])) {
                                                    foreach ($_SESSION['inventory'] as $name => $props) {
                                                        if ($props['quantity'] == 1) {
                                                            echo "
                                                            <tr>
                                                                <td width='90'>
                                                                    <div class='cart-product-imitation'>
                                                                    <img src='" . $props['img'] . "' alt='" . $props['name'] . "' width='120' height='80'>
                                                                    </div>
                                                                </td>
                                                                <td class='desc'>
                                                                    <h3><a href='#' class='text-navy'>'" . $props['name'] . "'</a></h3>
                                                                    <small>'" . $props['desc'] . "'</small>
                                                                    <div class='m-t-sm'>
                                                                        <a href='#' class='text-muted'><i class='fa fa-gift'></i> Add gift package</a>
                                                                        |
                                                                        <a href='#' class='text-muted'><i class='fa fa-trash'></i> Remove item</a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                   
                                                                    <s class='small text-muted'>$230,00</s>
                                                                </td>
                                                                <td width='65'>
                                                                    <input type='text' class='form-control' placeholder='1'>
                                                                </td>
                                                                <td>
                                                                    <h4>
                                                                        $180,00
                                                                    </h4>
                                                                </td>
                                                            </tr>";
                                                        }   else {
                                                                echo '
                                                                    <div class='card-body'>
                                                                        <div class='row'>
                                                                            <h1>No items in cart.</h1>
                                                                        </div>
                                                                    </div>
                                                                <br>';
                                                            }
                                                    }
                                                }
                                            ?>
                                    
                                                <!-- <tr>
                                                //     <td width='90'>
                                                //         <div class='cart-product-imitation'>
                                                //         </div>
                                                //     </td>
                                                //     <td class='desc'>
                                                //         <h3><a href='#' class='text-navy'></a></h3>
                                                  
                                                //         <div class='m-t-sm'>
                                                //             <a href='#' class='text-muted'><i class='fa fa-gift'></i> Add gift package</a>
                                                //             |
                                                //             <a href='#' class='text-muted'><i class='fa fa-trash'></i> Remove item</a>
                                                //         </div>
                                                //     </td>
                                                //     <td>
                                                       
                                                //         <s class='small text-muted'>$230,00</s>
                                                //     </td>
                                                //     <td width='65'>
                                                //         <input type='text' class='form-control' placeholder='1'>
                                                //     </td>
                                                //     <td>
                                                //         <h4>
                                                //             $180,00
                                                //         </h4>
                                                //     </td>
                                                // </tr> // -->
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <div class='ibox-content'>
                            <button class='btn btn-primary pull-right'><i class='fa fa fa-shopping-cart'><a href='/shopping-checkout.php'></i>Checkout</a></button>
                            <button class='btn btn-white'><i class='fa fa-arrow-left'></i><a href='/shopping.php'>Continue shopping</a></button>
                        </div>
                    </div>
                </div>
                <div class='col-md-3'>
                    <div class='ibox'>
                        <div class='ibox-title'>
                            <h5>Cart Summary</h5>
                        </div>
                        <div class='ibox-content'>
                            <span>
                                Total
                            </span>
                            <h2 class='font-bold'>
                                $390,00
                            </h2>
                            <hr>
                            <span class='text-muted small'>
                                *For United States, France and Germany applicable sales tax will be applied
                            </span>
                            <div class='m-t-sm'>
                                <div class='btn-group'>
                                <a href='#' class='btn btn-primary btn-sm'><i class='fa fa-shopping-cart'></i> Checkout</a>
                                <a href='#' class='btn btn-white btn-sm'> Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='ibox'>
                        <div class='ibox-title'>
                            <h5>Support</h5>
                        </div>
                        <div class='ibox-content text-center'>
                            <h3><i class='fa fa-phone'></i> +43 100 783 001</h3>
                            <span class='small'>
                                Please contact with us if you have any questions. We are avalible 24h.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>