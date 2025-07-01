
<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "g-30"; 

    $conn = mysqli_connect($host, $user, $password, $database);

    // Check connection
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }
    // echo "Connected successfully! <br /><br />";


    $showConfirm = false;

    // Step 1: When "Delete User" button is clicked
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_user'])) {

        $showConfirm = true;
        $userIDToDelete = $_POST['delete_user'];
    }


    // Step 2: When confirmation (yes/no) is clicked
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['confirm_delete'])) {

        if ($_POST['confirm_delete'] === 'yes' && isset($_POST['confirmed_user_id'])) {

            $userID = $_POST['confirmed_user_id'];
            $delete_user = "DELETE FROM users WHERE CustomerID = $userID";
            $conn->query($delete_user);
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="./src/admin_table.css"> -->
    <link rel="stylesheet" href="./src/admin_table.css?v=1">
</head>
<body>

<?php

    // query users from database 
    $table_user = "SELECT * FROM users";
    $result = mysqli_query($conn, $table_user);

    if ($result && mysqli_num_rows($result) > 0) {
        echo '
            <table border="1">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
        ';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '
                <tr>
                    <td>' . $row['CustomerName'] . '</td>
                    <td>' . $row['PhoneNumber'] . '</td>
                    <td>' . $row['CurrentAddress'] . '</td>
                    <td>' . $row['City'] . '</td>
                    <td>' . $row['Country'] . '</td>
                    <td id="delete_row"> 
                        <form id="delete_form" method="post">
                            <input type="hidden" name="delete_user" value='.$row['CustomerID'].' />
                            <button id="delete" type="submit">Delete User</button>
                        </form>
                    </td>
                </tr>
            ';
        }

        echo '
                </tbody>
            </table>
            <br /><br />
        ';
    } else {
        echo "No data found.";
    }

    // get file confirm pop up
    include 'confirm_pop_up.php';
?>

</body>
</html>