<?php
// Get the employee data
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$ssn = filter_input(INPUT_POST, 'ssn');
$jobtype = filter_input(INPUT_POST, 'jobtypeselection');
$hiredate = filter_input(INPUT_POST, 'hiredate');
$email = filter_input(INPUT_POST, 'email');
$userpassword = filter_input(INPUT_POST, 'userpassword');

// Validate inputs
if ($firstname == null || $lastname == null || $ssn == null || $email == null || $userpassword == null) {
    $error = "Invalid data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

// add the employee to database
   $query = 'INSERT INTO employees (FirstName, LastName, SSN, Job, Hire_Date, Email, Password, user_type) VALUES (:firstname, :lastname, :ssn, :jobtype, :hiredate, :email, :userpassword, :jobtype)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstname', $firstname);
    $statement->bindValue(':lastname', $lastname);
    $statement->bindValue(':ssn', $ssn);
    $statement->bindValue(':jobtype', $jobtype);
    $statement->bindValue(':hiredate', $hiredate);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':userpassword', $userpassword);
    $statement->execute();
    $statement->closeCursor();

    header('Location: manager.php');
}
?>