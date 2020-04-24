<?php
require_once('database.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>EKS Auto</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body bgcolor="#1e2e47">
<center>
<div>
<img src="logo_top.jpg" class="logo">
</div>
<div class="header">
    <a href=".">Home</a>
    <a href="inventory.php">Inventory</a>
    <a class="active" href="applyforloan.php">Loan Application</a>
    <a href="about.html">About Us</a>
    <a href="contactus.php">Contact Us</a>
    <a href="login.php">Dealer Login</a>
</div>

<div style="padding:20px">

        <h2>Loan Application</h2>
        <h3>Please fill out entire form and check all data before submitting.</h3>
        <table class="tableloans">
            <form action="submit_loan.php" method="post">

            <tr><td><label>Full Name:</label></td>
            <td><input type="text" name="FullName" size="40" required><br></td></tr>

            <tr><td><label>Address:</label></td>
            <td><input type="text" name="Address" size="40" required><br></td></tr>

            <tr><td><label>Social Security #:</label></td>
            <td><input type="text" name="SSN" size="40" required><br></td></tr>

            <tr><td><label>Telephone:</label></td>
            <td><input type="tel" name="Telephone" size="40" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Ex: 201-555-3344" required><br></td></tr>

            <tr><td><label>Employment:</label></td>
            <td><input type="text" name="Employment" size="40" required><br></td></tr>

            <tr><td><label>Loan Amount:</label></td>
            <td><input type="text" name="Loan_Amount" size="40" required><br></td></tr>
        </table>
            <input type="submit" value="Submit Application">
            <input type="reset" value="Clear">
        </form>
<br><br>
</table></div>


<footer>
<h5>Copyright &copy; 2019 EKS Auto</h5></center>
</footer>
</body>
</html>