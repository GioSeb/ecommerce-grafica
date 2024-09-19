<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
/* calling cart function */
cart();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cart details</title>
</head>
<body>
    <!--navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="display_all.php">Productos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Registrarse</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item() ?></sup></a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

<!-- Second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Bienvenido Invitado</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">login</a>
            </li>
            </ul>
        </nav>

    <!-- Third child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communications is the heart of an ecommerce and community</p>
        </div>

    <!-- Fourth child -->
     <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">
            
                    <!-- php code to display dinamic data -->
                    <?php
                        global $con;
                        $total_price=0;
                        $get_ip_add = getIPAddress();
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count=mysqli_num_rows($result);
                        if($result_count>0){
                            echo "
                <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th>
                    </tr>
                </thead>
                <tbody>";
                        while($row=mysqli_fetch_array($result)){
                            $product_id=$row['product_id'];
                            $select_products="SELECT * FROM `products` WHERE product_id='$product_id'";
                            $result_products=mysqli_query($con,$select_products);
                    
                            while($row_product_price=mysqli_fetch_array($result_products)){
                                $product_price=array($row_product_price['product_price']);
                                $price_table=$row_product_price['product_price'];
                                $product_tittle=$row_product_price['product_title'];
                                $product_image=$row_product_price['product_image'];
                                $product_values=array_sum($product_price);
                                $total_price+=$product_values;
                            
                    ?>
                    <tr>
                        <td><?php echo $product_tittle ?></td>
                        <td><img src="./admin_area/product_images/<?php echo $product_image ?>" alt="" class="cart_img"></td>
                        <td><input type="text" name="qty" class="form-input w-50"></td>
                        <?php
                        global $con;
                        $get_ip_add = getIPAddress();
                        if(isset($_POST['update_cart'])){
                            $quantities=$_POST['qty'];
                            $update_cart="UPDATE `cart_details` SET quantity=$quantities WHERE ip_address='$get_ip_add'";
                            $result_products_quantity=mysqli_query($con,$update_cart);
                            $total_price=$total_price*$quantities;
                        }

                        ?>
                        <td><?php echo $price_table ?></td>
                        <td>
                            
                            <input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                        <td>
                            <!-- <button class="bg-info px-3 py-2 mb-2 border-0 mx-3">Update</button> -->
                             <input type="submit" value="Update quantity" class="bg-info px-3 py-2 mb-2 border-0 mx-3" name="update_cart">
                            <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                            <input type="submit" value="Remove cart" class="bg-info px-3 py-2 mb-2 border-0 mx-3" name="remove_cart">
                            <?php

                                function remove_cart_item(){
                                    global $con;
                                    if(isset($_POST['remove_cart'])){
                                        foreach($_POST['removeitem'] as $remove_id){
                                            echo $remove_id;
                                            $delete_query="DELETE FROM `cart_details` WHERE `product_id`='$remove_id'";
                                            $run_delete=mysqli_query($con, $delete_query);
                                            if($run_delete){
                                                echo "<script>window.open('cart.php','self')</script>";
                                            }
                                        }
                                    }
                                }
                                

                            ?>
                        </td>
                    </tr>
                    <?php }}}
                    else{
                        echo "<h2 class='text-center text-danger>Cart is empty</h2>";
                    }?>
                </tbody>
            </table>
            <!-- subtotal -->
             <?php

                if($result_count>0){
                            echo "<div class='d-flex mb-5'>
                <h4 class='px-3'>Subtotal:<strong class='text-info'>$total_price</strong></h4>
                <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                <button class='bg-secondary p-3 py-2  border-0 text-light'><a href='./users_area/checkout.php' class='text-light text-decoration-none''>Checkout</a></button>";
                }else{
                    echo "<h2 class='text-center text-danger>Cart is empty</h2>";
                    echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                }
                if(isset($_POST['continue_shopping'])){
                    echo "<script>window.open('index.php','_self')</script>";
                }
             ?>
            
            </div>
        </div>
     </div>
     </form>

<!-- Last child -->
        <!-- include footer -->
        <?php
            include("./includes/footer.php");
        ?>
    </div>



    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>