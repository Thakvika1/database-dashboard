
<?php

    include 'conn_db.php';

    $conn = mysqli_connect($host, $user, $password, $database);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // get valuse from input form 
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];

        // insert user 
        $create_user = "INSERT INTO users(CustomerName, PhoneNumber, CurrentAddress, City, Country)
                        VALUES('$name', '$phone_number', '$address', '$city', '$country')";

        $conn->query($create_user);
        header('Location: create_user.php');
        exit;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./src/style.css">
</head>
    <body>
        <form action="" method="post">
            <input type="text" placeholder="Name" name="name" required><br>
            <input type="text" placeholder="Phone Number" name="phone_number" required><br>
            <input type="text" placeholder="Address" name="address" required><br>
            <input type="text" placeholder="City" name="city" required><br>
            <input type="text" placeholder="Country" name="country" required><br>
            <input id="submit" type="submit" value="Submit">
        </form>
    </body>
</html>

    

