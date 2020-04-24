<?php
require_once('database.php');

// Get loan ID
$loan_id = filter_input(INPUT_POST, 'loan_id', FILTER_VALIDATE_INT);

// Delete the loan application from the database
if ($loan_id != false) {
    $query = 'DELETE FROM loans
              WHERE loan_id = :loan_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':loan_id', $loan_id);
    $success = $statement->execute();
    $statement->closeCursor();    
    
    header('Location: loansmanager.php');
}
?>