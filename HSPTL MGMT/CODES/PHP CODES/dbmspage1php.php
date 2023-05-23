<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "hms1";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $full_name = isset($_POST['name']) ? $_POST['name'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $block = isset($_POST['block']) ? $_POST['block'] : '';

    $sql_query = "INSERT INTO hms1_details (full_name,age,gender,id,block)
                  VALUES ('$full_name', '$age', '$gender', '$id', '$block')";

    if (mysqli_query($conn, $sql_query)) {
        header("Location:./dbmspage3.html");
    } else {
        echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
