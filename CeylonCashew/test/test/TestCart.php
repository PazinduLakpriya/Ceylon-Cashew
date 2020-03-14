<?php
session_start();
$database_name = "product_details";
$con = mysqli_connect("localhost", "root", "", $database_name);

if (isset($_POST["add"])) {
    if (isset($_SESSION["cart"])) {
        $item_array_id = array_column($_SESSION["cart"], "product_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="TestCart.php"</script>';
        } else {
            echo '<script>alert("Product is already Added to Cart")</script>';
            echo '<script>window.location="TestCart.php"</script>';
        }
    } else {
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["cart"] as $keys => $value) {
            if ($value["product_id"] == $_GET["id"]) {
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been Removed...!")</script>';
                echo '<script>window.location="TestCart.php"</script>';
            }
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style1.css">


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



</head>

<body>
    <div class="main">
        <!-- <div class="main" style="border:solid; border-color:violet"> -->

        <h1>Ceylon Cashew</h1>
        <div class="container">
            <!-- <div class="container" style="border:solid; border-color:blue"> -->

            <?php
            $query = "SELECT * FROM product
            WHERE id = 2";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>

                    <!-- <div class="cards" style="border:solid; border-color:yellow"> -->


                    <div class="cards_item">
                        <!-- <div class="cards_item" style="border:solid; border-color:seagreen"> -->

                        <form method="post" action="TestCart.php?action=add&id=<?php echo $row["id"]; ?>">
                            <div class="card">
                                <!-- <div class="card" style="border:solid; border-color:red"> -->

                                <div class="card_image"><img src="<?php echo $row["image"]; ?>"></div>
                                <div class="card_content">
                                    <h2 class="card_title"><?php echo $row["pname"]; ?></h2>
                                    <div class="form-row">
                                        <div class="col">
                                            <p class="card_text">Price :</p>
                                        </div>
                                        <div class="col-5">
                                            <p style="text-align: center;" class="card_text">LKR <?php echo $row["price"]; ?>.00</p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <p class="card_text">Quantity :</p>
                                        </div>
                                        <div class="col-5">
                                            <input type="text" name="quantity" class="formStyle" value="1">
                                        </div>
                                    </div>
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                    <button class="btnC card_btn" name="add">Add to Cart</button>
                                </div>
                            </div>
                        </form>

                    </div>
            <?php
                }
            }
            ?>
            <?php
            $query = "SELECT * FROM product
            WHERE id = 1";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>

                    <!-- <div class="cards" style="border:solid; border-color:yellow"> -->


                    <div class="cards_item">
                        <!-- <div class="cards_item" style="border:solid; border-color:seagreen"> -->

                        <form method="post" action="TestCart.php?action=add&id=<?php echo $row["id"]; ?>">
                            <div class="card">
                                <!-- <div class="card" style="border:solid; border-color:red"> -->

                                <div class="card_image"><img src="<?php echo $row["image"]; ?>"></div>
                                <div class="card_content">
                                    <h2 class="card_title"><?php echo $row["pname"]; ?></h2>
                                    <div class="form-row">
                                        <div class="col">
                                            <p class="card_text">Price :</p>
                                        </div>
                                        <div class="col-5">
                                            <p style="text-align: center;" class="card_text">LKR <?php echo $row["price"]; ?>.00</p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <p class="card_text">Quantity :</p>
                                        </div>
                                        <div class="col-5">
                                            <input type="text" name="quantity" class="formStyle" value="1">
                                        </div>
                                    </div>
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                    <button class="btnC card_btn" name="add">Add to Cart</button>
                                </div>
                            </div>
                        </form>

                    </div>
            <?php
                }
            }
            ?>
            <?php
            $query = "SELECT * FROM product
            WHERE id = 3";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>

                    <!-- <div class="cards" style="border:solid; border-color:yellow"> -->


                    <div class="cards_item">
                        <!-- <div class="cards_item" style="border:solid; border-color:seagreen"> -->

                        <form method="post" action="TestCart.php?action=add&id=<?php echo $row["id"]; ?>">
                            <div class="card">
                                <!-- <div class="card" style="border:solid; border-color:red"> -->

                                <div class="card_image"><img src="<?php echo $row["image"]; ?>"></div>
                                <div class="card_content">
                                    <h2 class="card_title"><?php echo $row["pname"]; ?></h2>
                                    <div class="form-row">
                                        <div class="col">
                                            <p class="card_text">Price :</p>
                                        </div>
                                        <div class="col-5">
                                            <p style="text-align: center;" class="card_text">LKR <?php echo $row["price"]; ?>.00</p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <p class="card_text">Quantity :</p>
                                        </div>
                                        <div class="col-5">
                                            <input type="text" name="quantity" class="formStyle" value="1">
                                        </div>
                                    </div>
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                    <button class="btnC card_btn" name="add">Add to Cart</button>
                                </div>
                            </div>
                        </form>

                    </div>
            <?php
                }
            }
            ?>

        </div>

        <!-- </div> -->
        <div style='clear:both'>
        </div>
        <h3 class='title2'>shopping cart details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="30%">product name</th>
                    <th width="10%">Quantuty</th>
                    <th width="13%">Price details</th>
                    <th width="10%">Total price</th>
                    <th width="17%">Remove Items</th>
                </tr>
                <?php
                if (!empty($_SESSION["cart"])) {
                    $total = 0;
                    foreach ($_SESSION['cart'] as $key => $value) {
                ?>
                        <tr>
                            <td><?php echo $value['item_name']; ?></td>
                            <td><?php echo $value['item_quantity']; ?></td>
                            <td>$<?php echo $value['product_price']; ?></td>
                            <td>
                                $<?php echo number_format($value['item_quantity'] * $value['product_price'], 2); ?></td>
                            <td><a href="TestCart.php?action=delete&id=<?php echo $value['product_id']; ?>"><span class="text-danger">Remove Items</span></a></td>
                        </tr>
                    <?php
                        $total = $total + ($value['item_quantity'] * $value['product_price']);
                    }
                    ?>
                    <tr>





                    






                        <td colspan="3" align="right">Total</td>
                        <th align='right'>$<?php echo number_format($total, 2); ?></th>

                        <form method="post" action="CheckoutForm/create.php">
                        <input type="hidden" name="text" value="<?php echo $total; ?>">
                        <td colspan="3" align="middle"><button type="submit" class="btn btn-outline-success btn-lg">Checkout</button></td>
                        
                    </tr>
                <?php
                }

                ?>
            </table>
        </div>

    </div>
</body>

</html>