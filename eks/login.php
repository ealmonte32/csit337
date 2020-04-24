<?php
include('functions.php');
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
    <a href="applyforloan.php">Loan Application</a>
    <a href="about.html">About Us</a>
    <a href="contactus.php">Contact Us</a>
	<a class="active" href="login.php">Dealer Login</a>
</div>

<div style="padding:20px">

<main>
<h1>Employee Login</h1>
<form action="login.php" method="post">
<table border="0" class="tablelogin">
<tr>
<td align="right" class="tdlogin"><label>Email:</label></td>
<td class="tdlogin"><input type="email" name="Email" size="25"></td>
</tr>
<tr>
<td align="right" class="tdlogin"><label>Password:</label></td>
<td class="tdlogin"><input type="password" name="Password" size="25"></td>
</tr>
</table>
<br>
<input type="submit" value="Login" name="login_button">
<input type="reset" value="Clear">
</form>
</main>
</div>
 

<br>
<h5>Copyright &copy; 2019 EKS Auto</h5>
</center>
</body>
</html>