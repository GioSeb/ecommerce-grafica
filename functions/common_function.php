<?php

//Including connect file
include('./includes/connect.php');

// getting products
function getProducts(){
    global $con;
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
                <a href='#' class='btn btn-info'>Agregar al carrito</a>
                <a href='#' class='btn btn-secondary'>Ver más</a>
            </div>
        </div>
    </div>";
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

?>