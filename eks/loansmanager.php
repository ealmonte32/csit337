<?php
require_once('database.php');
 session_start();

if (!isAdmin()) {
     echo "You must be an admin";
    header("location: login.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
}

function isAdmin(){
    $user = $_SESSION['user'];
    if ($user['user_type']=="finance")
        return true;
    else
        return false;  
}

//fetch all cars from inventory
$query = 'SELECT * FROM inventory ORDER BY Make';
$statement = $db->prepare($query);
$statement->execute();
$inventory = $statement->fetchAll();
$statement->closeCursor();

//fetch all loan applications
$query = 'SELECT * FROM loans ORDER BY loan_id';
$statement = $db->prepare($query);
$statement->execute();
$loans = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html>
<head>
<title>EKS Auto Finance Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#1e2e47">
<center><header><h1>Finance/Loans Dashboard</h1></header></center>
<br>
<b><a href="login.php?logout='1'" style="color:red;">Log out</a></b>

<hr style="border: 1px dotted white;" />
    <section>
<!-- display a table of loan applications -->
        <table bgcolor="#5f6266">
            <h2>Current Loan Applications</h2>
            <h4><i>(After approval or rejection of application, remove from dashboard)</i></h4>
            <?php foreach ($loans as $loan) : ?>
            <tr>
                <td><b>Loan ID:</b> <?php echo $loan['loan_id']; ?><br>
                <p><b>Full Name:</b> <?php echo $loan['FullName']; ?><br>
                <b>Address:</b> <?php echo $loan['Address']; ?><br>
                <b>Social Security #:</b> <?php echo $loan['SSN']; ?><br>
                <b>Telephone:</b> <?php echo $loan['Telephone']; ?></td>
                <td><b>Employment:</b> <p><?php echo $loan['Employment']; ?></p>
                <b>Loan Amount: </b> <?php echo $loan['Loan_Amount']; ?></td>
                <td><form action="remove_loan.php" method="post">
                <input type="hidden" name="loan_id" value="<?php echo $loan['loan_id']; ?>">
                <input type="submit" value="Remove Loan Application">
                </form></td>
            </tr>
            <td colspan="3" bgcolor="#1e2e47"><br></td>
            <?php endforeach; ?> 
        </table>
    </section>
    <br><br>

<br><br>
<hr style="border: 1px dotted white;" />

<footer>
<center><h5>Copyright &copy; 2019 EKS Auto</h5></center>
</footer>
</body>
</html>