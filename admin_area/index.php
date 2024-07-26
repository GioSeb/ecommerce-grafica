<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">
     <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- BUG -->
    <style>
        .admin_image {
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <a href="#">Logo</a>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Bienvenido Invitado</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
         <div class="bg-light">
            <h3 class="text-center p-2">Manager details</h3>
         </div>
         <!-- third child -->
          <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href=""><img src="" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin name</p>
                </div>
                <div class="button text-center">
                    <button><a href="" class="nav-link text-light bg-info m-1">Insert Products</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">View products</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">View Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">Insert Servicios</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">View Servicios</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1">Logout</a></button>
                </div>
            </div>
          </div>
     </div>




    <!-- Last child -->
    <div class="bg-info p-3 text-center">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores omnis vero aliquid porro esse, fuga quae quos cumque officiis, obcaecati est delectus deserunt perspiciatis sequi. Fuga harum veritatis nostrum blanditiis.</p>
        </div>
    </div>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>