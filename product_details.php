<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
/* cart function */
cart();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Grafica</title>
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
                    <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item() ?></sup></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Precio</a>
                    </li>
                </ul>
                <form class="d-flex" action="search_product.php" method="get">
                    <input type="search" class="form-control me-2" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product">
                </form>
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

        <div class="row px-1">
            <div class="col md-10">
                <!-- products -->
                <div class="row">
                    
                    <!-- Fetching products -->
                    <?php
                    // Calling function to get products
                    viewDetails();
                    getUniqueCategories();

                    ?>
                </div>
            </div>
          <!-- sidenav -->
            <div class="col md-2 bg-secondary p-0">
                <!--Categorias-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="navbar-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categorias</h4></a>
                    </li>
                    <!-- DISPLAY categories -->
                    <?php

                    // Calling display categories
                    getCategories();

                    ?>
                </ul>
                <!--Servicios-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="navbar-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Servicios</h4></a>
                    </li>
                    <!-- DISPLAY SERVICES -->
                    <?php

                    // Calling get services
                    getServices();                        


                    ?>
                </ul>
            </div>
        </div>

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