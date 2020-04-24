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
    <a class="active" href="contactus.php">Contact Us</a>
	<a href="login.php">Dealer Login</a>
</div>

<div style="padding:20px">
<h3>Please Contact us for any inquiry:</h3>
<table class="tablecontactus">
<form action="submit_inquiry.php" method="post">
<tr>
<td>First Name:</td>
<td><input type="text" name="firstname" size="30" autofocus required><br></td>
</tr>
<tr>
<td>Last Name:</td>
<td><input type="text" name="lastname" size="30" required><br></td>
</tr>
<tr>
<td>E-Mail Address:</td>
<td><input type="email" name="emailaddress" size="30" required><br></td>
</tr>
<tr>
<td>Telephone:</td>
<td><input type="tel" name="telephone" size="30" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Ex: 201-555-3344"><br></td>
</tr>
<tr>
<td>Comments:</td>
<td>
<textarea name="comment" rows="6" cols="60"></textarea>
</td>
</tr>
</table>
<p><input type="submit" value="Submit"> <input type="reset" value="Clear"></p>
</form>
</div>
 
<br>
<h5>Copyright &copy; 2019 EKS Auto</h5>
</center>
</body>
</html>