<?php
include('../includes/connect.php');
if(isset($_POST['insert_services'])){
    if(!empty($_POST['services_title'])){
        $services_title = $_POST['services_title'];

        // Convert the input to lowercase
        $services_title_lower = strtolower($services_title);

        // Select data from database with case-insensitive comparison
        $select_query = "SELECT * FROM `services` WHERE LOWER(services_title) = '$services_title_lower'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);
        if($number > 0){
            echo "<script>alert('This service is already present in the database')</script>";
        } else {
            $insert_query = "INSERT INTO `services` (services_title) VALUES ('$services_title')";
            $result = mysqli_query($con, $insert_query);
            if($result){
                echo "<script>alert('Service has been inserted successfully')</script>";
            }
        }
    } else {
        echo "<script>alert('Please enter a service title')</script>";
    }
}
?>


<h2 class="text-center">Inserte Servicio</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info"><i class="fa-solid fa-receipt"></i></span>
        <div class="form-floating">
            <input type="text" class="form-control" name="services_title" id="floatingInputGroup1" placeholder="Inserte Servicio" aria-label="servicios">
        </div>
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_services" id="floatingInputGroup1" value="Insert Services">
    </div>
</form>