<?php
include('../controllers/cart.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="/ITECA3-Project/include/globalStyles.css" rel="stylesheet" />
    <style>

    </style>


</head>


<body class="backColor">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-7">
                                <div cl ass="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Shopping cart</p>
                                        <p class="mb-0">You have <span><?php echo count($cart) ?> items in your cart </span></p>
                                    </div>
                                </div>

                                <?php
                                for ($i = 0; $i < count($cart); $i++) {
                                    //calculate subtotal
                                    //total without operationsCost etc
                                    $subTotal += ($cart[$i]->price * $cart[$i]->quantity);
                                ?>
                                    <div class="card mb-3" id="cartItem <?php echo $cart[$i]->id ?>">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div>
                                                        <img style="width: 80px;" src="<?php echo $cart[$i]->imageUrl ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                    </div>
                                                    <div class="px-5">
                                                        <h5 class="pl-5" style="width: 100px;"><?php echo $cart[$i]->name ?></h5>
                                                        <p class="small mb-0">Size: <?php echo $cart[$i]->size ?></p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <label for="amount">Qty</label>
                                                    <form method="post" name="updateCartItemQuantityForm" action="cart.php" class="container">
                                                        <div class="container" style="width: 150px;">
                                                            <select class="form-select" name="quantity" id="quantity">
                                                                <option value="1" <?= ($cart[$i]->quantity == '1') ? 'selected' : ''; ?>>1</option>
                                                                <option value="2" <?= ($cart[$i]->quantity == '2') ? 'selected' : ''; ?>>2</option>
                                                                <option value="3" <?= ($cart[$i]->quantity == '3') ? 'selected' : ''; ?>>3</option>
                                                                <option value="4" <?= ($cart[$i]->quantity == '4') ? 'selected' : ''; ?>>4</option>
                                                                <option value="5" <?= ($cart[$i]->quantity == '5') ? 'selected' : ''; ?>>5</option>
                                                                <option value="6" <?= ($cart[$i]->quantity == '6') ? 'selected' : ''; ?>>6</option>
                                                                <option value="7" <?= ($cart[$i]->quantity == '7') ? 'selected' : ''; ?>>7</option>
                                                                <option value="8" <?= ($cart[$i]->quantity == '8') ? 'selected' : ''; ?>>8</option>
                                                                <option value="9" <?= ($cart[$i]->quantity == '9') ? 'selected' : ''; ?>>9</option>
                                                                <option value="10" <?= ($cart[$i]->quantity == '10') ? 'selected' : ''; ?>>10</option>
                                                            </select>
                                                            <input type="hidden" name="id" value="<?php echo $cart[$i]->id ?>">
                                                            <button type='submitFORM' name="updateCartItemQuantity" class='btn btn-primary'>
                                                                <i class="bi bi-list-ol"></i>Update</button>
                                                        </div>
                                                    </form>
                                                    <form method="post" name="deleteCartItemForm" action="cart.php" class="container d-flex">
                                                        <input type="hidden" name="id" value="<?php echo $cart[$i]->id ?>">
                                                        <button type='submit' name="deleteCartItem" class='btn btn-danger'>
                                                            <i class="bi bi-x-circle"> Remove</i></button>
                                                    </form>
                                                    <div style="width: 80px;">
                                                        <h5 class="mb-0">R<?php echo $cart[$i]->price * $cart[$i]->quantity ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                <?php
                                }
                                ?>
                                <div class="container d-flex-column">
                                    <?php
                                    //calculate total
                                    if ($subTotal != 0) {
                                        $total = $subTotal + $fixedOperationsCost;
                                    }
                                    ?>
                                    <p class="my-3">Subtotal : R<?php echo $subTotal ?></p>
                                    <p class="mb-2">Operations Cost : <?php echo $fixedOperationsCost ?></p>
                                    <h3>Total : R<?php echo $total ?></h3>
                                    <?php
                                    if ($subTotal != 0) {
                                        echo '
                                        <div class="d-flex">
                                            <span><a class="btn btn-outline-success" href="checkout.php">Checkout</a></span>
                                            <form method="post" name="clearCartForm" action="cart.php" class="container d-flex">
                                                <button type="submit" name="clearCart" class="btn btn-outline-warning">Clear Cart </button>
                                            </form>
                                        </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../../include/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>