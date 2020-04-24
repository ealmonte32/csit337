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
    if ($user['user_type']=="admin")
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

//fetch all regular employees from inventory
$query = 'SELECT * FROM employees WHERE (user_type="sales" OR user_type="finance" OR user_type="clerk" OR user_type="maintenance") ORDER BY Personid';
$statement = $db->prepare($query);
$statement->execute();
$employees = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html>
<head>
<title>EKS Auto Manager Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body bgcolor="#1e2e47">
<center><header><h1>Manager Dashboard</h1></header></center>
<br>
<b><a href="login.php?logout='1'" style="color:red;">Log out</a></b>
<hr style="border: 1px dotted white;" />
    <section>
<!-- display a table of cars inventory with delete button -->
        <table bgcolor="#5f6266">
            <h2>Current Vehicle Inventory</h2>
            <?php foreach ($inventory as $cars) : ?>
            <tr>
                <td align="center"><img src="images/<?php echo $cars['car_image']; ?>" height="75" width="75"></td>
                <td>Make: <?php echo $cars['Make']; ?> <br> Model: <?php echo $cars['Model']; ?><br>
                    Year: <?php echo $cars['Year']; ?> <br> Mileage: <?php echo $cars['Mileage']; ?></td>
                <td>Price: $<?php echo $cars['Price']; ?><br> Condition: <?php echo $cars['Cond']; ?>
                <br>Availability: <?php echo $cars['car_availability']; ?>
                <br>Vehicle ID: <?php echo $cars['vehicle_id']; ?></td>
                <td><form action="delete_car.php" method="post">
                    <input type="hidden" name="vehicle_id" value="<?php echo $cars['vehicle_id']; ?>">
                    <input type="submit" value="Remove from Inventory">
                </form></td>
            </tr>
            <td colspan="4" bgcolor="#1e2e47"><br></td>
            <?php endforeach; ?> 
        </table>
    </section>
<br><br>

        <h2>Add Vehicle to Inventory</h2>
        <table class="tablelogin">
            <form action="add_car.php" method="post" enctype="multipart/form-data">

            <tr><td><label>Make:</label></td>
            <td><input type="text" name="carmake"><br></td></tr>

            <tr><td><label>Model:</label></td>
            <td><input type="text" name="carmodel"><br></td></tr>

            <tr><td><label>Year:</label></td>
            <td><input type="text" name="caryear"><br></td></tr>

            <tr><td><label>Mileage:</label></td>
            <td><input type="text" name="carmileage"><br></td></tr>

            <tr><td><label>Price:</label></td>
            <td><input type="text" name="carprice"><br></td></tr>

            <tr><td><label>Color:</label></td>
            <td><input type="text" name="carcolor"><br></td></tr>

            <tr><td><label>Condition:</label></td>
            <td><input type="text" name="carcondition" placeholder="New or Used"><br></td></tr>

            <tr><td><label>Select image of car:</label></td>
            <td><input type="file" name="imagefileforcar" id="imagefileforcar"><br></td></tr>
        </table>
            <input type="submit" value="Add Car" name="submit">
        </form>

<br><br>
<hr style="border: 1px dotted white;" />

    <section>
<!-- display a table of employees to manager -->
        <table bgcolor="#5f6266" class="tableemployee">
            <h2>Current Employee Database</h2>
            <?php foreach ($employees as $person) : ?>
            <tr>
                <td><img src="person_icon.jpg" height="50" width="50"></td>
                <td>Employee ID: <?php echo $person['Personid']; ?><br>Social Security # <?php echo $person['SSN']; ?>
                <p>First Name: <u><?php echo $person['FirstName']; ?></u><br>Last Name: <u><?php echo $person['LastName']; ?></u></td>
                <td>Job Type: <u><?php echo $person['Job']; ?></u><p> Hire date: <?php echo $person['Hire_Date']; ?><br>
                    Email: <u><?php echo $person['Email']; ?></u>
                <td><form action="remove_employee.php" method="post">
                <input type="hidden" name="Personid" value="<?php echo $person['Personid']; ?>">
                <input type="submit" value="Remove Employee">
                </form></td>
            </tr>
            <td colspan="4" bgcolor="#1e2e47"><br></td>
            <?php endforeach; ?> 
        </table>
    </section>
    <br><br>

            <h2>Add Employee to Database</h2>
        <table class="tableaddemployee">
            <form action="add_employee.php" method="post">

            <tr><td><label>First Name:</label></td>
            <td><input type="text" name="firstname" size="30"><br></td></tr>

            <tr><td><label>Last Name:</label></td>
            <td><input type="text" name="lastname" size="30"><br></td></tr>

            <tr><td><label>Social Security #:</label></td>
            <td><input type="text" name="ssn" size="30"><br></td></tr>

            <tr><td><label>Job Type:</label></td>
            <td>
            <select name="jobtypeselection">
            <option value="sales">Sales</option>
            <option value="finance">Finance</option>
            <option value="clerk">Clerk</option>
            <option value="maintenance">Maintenance</option>
            </select><br></td></tr>

            <tr><td><label>Hire Date:</label></td>
            <td><input type="date" name="hiredate" size="30"><br></td></tr>

            <tr><td><label>Email:</label></td>
            <td><input type="text" name="email" size="30"><br></td></tr>
            <tr><td><label>Password:</label></td>
            <td><input type="text" name="userpassword" size="30"><br></td></tr>
            </table>
            <input type="submit" value="Add Employee">
            <input type="reset" value="Clear">
            </form>

<br><br>
<hr style="border: 1px dotted white;" />

<footer>
<center><h5>Copyright &copy; 2019 EKS Auto</h5></center>
</footer>
</body>
</html>