<?php
// Get the form data
$FullName = filter_input(INPUT_POST, 'FullName');
$Address = filter_input(INPUT_POST, 'Address');
$SSN = filter_input(INPUT_POST, 'SSN');
$Telephone = filter_input(INPUT_POST, 'Telephone');
$Employment = filter_input(INPUT_POST, 'Employment');
$Loan_Amount = filter_input(INPUT_POST, 'Loan_Amount');

// Validate inputs
if ($FullName == null || $Address == null || $SSN == false || $Telephone == null || $Employment == null || $Loan_Amount == false) {
    $error = "Invalid data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

// add the loan application information to database
   $query = 'INSERT INTO loans (FullName, Address, SSN, Telephone, Employment, Loan_Amount) VALUES (:FullName, :Address, :SSN, :Telephone, :Employment, :Loan_Amount)';
    $statement = $db->prepare($query);
    $statement->bindValue(':FullName', $FullName);
    $statement->bindValue(':Address', $Address);
    $statement->bindValue(':SSN', $SSN);
    $statement->bindValue(':Telephone', $Telephone);
    $statement->bindValue(':Employment', $Employment);
    $statement->bindValue(':Loan_Amount', $Loan_Amount);
    $statement->execute();
    $statement->closeCursor();

    header('Location: loansubmitted.php');
}
?>