<?php
require_once('database.php');

// Get Vehicle ID
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);

// Delete the car from the database
if ($vehicle_id != false) {
    $query = 'DELETE FROM inventory
              WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $success = $statement->execute();
    $statement->closeCursor();    

    header('Location: manager.php');
}
?>