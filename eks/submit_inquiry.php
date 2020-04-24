<?php
require_once('database.php');

// Get the inquiry data
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$emailaddress = filter_input(INPUT_POST, 'emailaddress');
$telephone = filter_input(INPUT_POST, 'telephone');
$comment = filter_input(INPUT_POST, 'comment');

   $query = 'INSERT INTO contact_us (FirstName, LastName, Email, Telephone, inquiry) VALUES (:firstname, :lastname, :emailaddress, :telephone, :comment)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstname', $firstname);
    $statement->bindValue(':lastname', $lastname);
    $statement->bindValue(':emailaddress', $emailaddress);
    $statement->bindValue(':telephone', $telephone);
    $statement->bindValue(':comment', $comment);
    $statement->execute();
    $statement->closeCursor();

    header('Location: inquirysubmitted.php');
?>