<?php
require_once('database.php');

// Get Person / Employee ID
$Personid = filter_input(INPUT_POST, 'personid', FILTER_VALIDATE_INT);

// Delete the car from the database
if ($Personid != false) {
    $query = 'DELETE FROM employees
              WHERE Personid = :personid';
    $statement = $db->prepare($query);
    $statement->bindValue(':personid', $Personid);
    $success = $statement->execute();
    $statement->closeCursor();    

    header('Location: manager.php');
}
?>