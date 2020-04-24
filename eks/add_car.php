<?php
// Get the car data
$carmake = filter_input(INPUT_POST, 'carmake');
$carmodel = filter_input(INPUT_POST, 'carmodel');
$caryear = filter_input(INPUT_POST, 'caryear', FILTER_VALIDATE_INT);
$carmileage = filter_input(INPUT_POST, 'carmileage', FILTER_VALIDATE_INT);
$carprice = filter_input(INPUT_POST, 'carprice', FILTER_VALIDATE_FLOAT);
$carcolor = filter_input(INPUT_POST, 'carcolor');
$carcondition = filter_input(INPUT_POST, 'carcondition');

//$target_dir = '';
$target_file_for_image = basename($_FILES['imagefileforcar']['name']);


// Validate inputs
if ($carmake == null || $carmodel == null || $caryear == false || $carmileage == null || $carprice == null || $carcondition == false) {
    $error = "Invalid car data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

// add the car to database
   $query = 'INSERT INTO inventory (Year, Make, Model, Mileage, Price, Color, Cond, car_image) VALUES (:caryear, :carmake, :carmodel, :carmileage, :carprice, :carcolor, :carcondition, :carimage)';
    $statement = $db->prepare($query);
    $statement->bindValue(':caryear', $caryear);
    $statement->bindValue(':carmake', $carmake);
    $statement->bindValue(':carmodel', $carmodel);
    $statement->bindValue(':carmileage', $carmileage);
    $statement->bindValue(':carprice', $carprice);
    $statement->bindValue(':carcolor', $carcolor);
    $statement->bindValue(':carcondition', $carcondition);
    $statement->bindValue(':carimage', $target_file_for_image);
    $statement->execute();
    $statement->closeCursor();

    header('Location: manager.php');
}
?>