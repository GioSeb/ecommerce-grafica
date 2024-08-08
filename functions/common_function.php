<?php

//Including connect file
include('./includes/connect.php');

// getting products
function getProducts(){
    global $con;

    // condition to check  category isset or not
    if(!isset($_GET['category'])){
    $select_query="SELECT * FROM `products` ORDER BY product_title LIMIT 0,6";
    $result_query=mysqli_query($con,$select_query);
    //$row=mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Agregar al carrito</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ver más</a>
            </div>
        </div>
    </div>";
    }
    }
}

// getting all products

function getAllProducts(){
    global $con;

    // condition to check  category isset or not
    if(!isset($_GET['category'])){
    $select_query="SELECT * FROM `products` ORDER BY product_title ORDER BY rand()";
    $result_query=mysqli_query($con,$select_query);
    //$row=mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Agregar al carrito</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ver más</a>
            </div>
        </div>
    </div>";
    }
    }
}

// getting unique categories
function getUniqueCategories(){
    global $con;

    // condition to check  category isset or not
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
    $select_query="SELECT * FROM `products` WHERE category_id=$category_id LIMIT 0,6";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
    }
    //$row=mysqli_fetch_assoc($result_query);
    //echo $row['product_title'];
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price/-</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Agregar al carrito</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ver más</a>
            </div>
        </div>
    </div>";
    }
    }
}

// Displaying Services

function getCategories(){
    global $con;
    $select_category="SELECT * FROM `categories`";
    $result_category=mysqli_query($con,$select_category);
    //$row_data=mysqli_fetch_assoc($result_category);
    while($row_data=mysqli_fetch_assoc($result_category)){
        $category_title=$row_data['category_title'];
        $category_id=$row_data['category_id'];
        echo "<li class='navbar-item'>
        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
        </li>";
    }
}

// Displaying services

function getServices(){
    global $con;
    $select_services="SELECT * FROM `services`";
        $result_services=mysqli_query($con,$select_services);
        //$row_data=mysqli_fetch_assoc($result_services);
        while($row_data=mysqli_fetch_assoc($result_services)){
            $services_title=$row_data['services_title'];
            $services_id=$row_data['services_id'];
            echo "<li class='navbar-item'>
            <a href='index.php?services=$services_id' class='nav-link text-light'>$services_title</a>
            </li>";
        }
}

// searching products

function search_product(){
    global $con;

    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_query="SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
        $result_query=mysqli_query($con,$search_query);
        //$row=mysqli_fetch_assoc($result_query);
        //echo $row['product_title'];
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No stock for the product.</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            echo "<div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Agregar al carrito</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ver más</a>
                </div>
            </div>
        </div>";
        }
    }
}

//view details

function viewDetails(){
    // EXPANDIR. DEPENDE DE NECESIDAD
    global $con;

    // condition to check  category isset or not
    if(isset($_GET['product_id'])){
        if(!isset($_GET['category'])){
            $product_id=$_GET['product_id'];
            $select_query="SELECT * FROM `products` WHERE product_id=$product_id";
            $result_query=mysqli_query($con,$select_query);
            //$row=mysqli_fetch_assoc($result_query);
            //echo $row['product_title'];
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image=$row['product_image'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Agregar al carrito</a>
                            
                        </div>
                    </div>
                </div>
                <div class='col-md-8'>
                                <!-- related  -->
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <h4 class='text-center text-info mb-5'>Related products</h4>
                                    </div>
                                    <div class='col-md-6'>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio sapiente quos temporibus aperiam blanditiis quam et, aliquam officia nam nostrum, quae incidunt. Expedita, distinctio magni totam repellendus doloremque molestias ad.</p>
                                    </div>
                                    <div class='col-md-6'>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio sapiente quos temporibus aperiam blanditiis quam et, aliquam officia nam nostrum, quae incidunt. Expedita, distinctio magni totam repellendus doloremque molestias ad.</p>
                                    </div>
                                </div>
                </div>";
            }
        }
    }
}

// get ip address function

 function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
/* $ip = getIPAddress();  
echo 'User Real IP Address - '.$ip;   */

// cart function

function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;

        $ip = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip' and product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('This item is already present inside the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            $insert_query="INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$ip', 0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('Items is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

// function to get cart item numbers

function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;

        $ip = getIPAddress();
        $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        }else{
        global $con;

        $ip = getIPAddress();
        $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        }
        echo $num_of_rows;
    }

?>