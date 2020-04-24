<?php
require_once('database.php');

// Get inquiry ID
$inquiry_id = filter_input(INPUT_POST, 'inquiry_id', FILTER_VALIDATE_INT);

// Delete the inquiry from the database/contact_us
if ($inquiry_id != false) {
    $query = 'DELETE FROM contact_us
              WHERE inquiry_id = :inquiry_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':inquiry_id', $inquiry_id);
    $success = $statement->execute();
    $statement->closeCursor();    
    
    header('Location: salesperson.php');
}
?>