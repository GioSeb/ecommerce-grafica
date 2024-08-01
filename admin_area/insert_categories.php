<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
    if(!empty($_POST['cat_title'])){
        $category_title = $_POST['cat_title'];

        // Convert the input to lowercase
        $category_title_lower = strtolower($category_title);

        // Select data from database with case-insensitive comparison
        $select_query = "SELECT * FROM `categories` WHERE LOWER(category_title) = '$category_title_lower'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);
        if($number > 0){
            echo "<script>alert('This category is already present in the database')</script>";
        } else {
            $insert_query = "INSERT INTO `categories` (category_title) VALUES ('$category_title')";
            $result = mysqli_query($con, $insert_query);
            if($result){
                echo "<script>alert('Category has been inserted successfully')</script>";
            }
        }
    } else {
        echo "<script>alert('Please enter a category title')</script>";
    }
}
?>


<h2 class="text-center">Inserte Categoría</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info"><i class="fa-solid fa-receipt"></i></span>
        <div class="form-floating">
            <input type="text" class="form-control" name="cat_title" id="floatingInputGroup1" placeholder="Insert Categories" aria-label="categories">
        </div>
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" id="floatingInputGroup1" value="Insert Categories">
    </div>
</form>