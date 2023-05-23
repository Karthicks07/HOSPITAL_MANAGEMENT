<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-image: url(https://img.rawpixel.com/s3fs-private/rawpixel_images/website_content/rm222batch5-kul-06.jpg?w=800&dpr=1&fit=default&crop=default&q=65&vib=3&con=3&usm=15&bg=F4F4F3&ixlib=js-2.2.1&s=d2728bc971ba2c85ca97ed9a99875cf7);
      background-size: cover;
      background-attachment: fixed;
    }

    .btn {
      font-size: 18px;
      padding: 8px 20px;
      margin-left: 670px;
      position: relative;
      z-index: 1;
      color: white;
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      text-decoration: none;
    }

    .btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #007bff;
      opacity: 0.7;
      z-index: -1;
      border-radius: 5px;
    }

    h1 {
      color: black;
      text-align: center;
    }

    .order-details {
      background-color: none;
      padding: 20px;
      margin-bottom: 20px;
      color: blanchedalmond;
      border-radius: 5px;
    }

    .order-details p {
      margin: 0;
    }

    .karthi {
      color: black;
      padding-left: 600px;
    }

    .karthick {
      font-size: 18px;
      color: aliceblue;
      width: 30px;
      height: 20px;
    }

    .horizontal-line {
      border: none;
      border-top: 2px solid black; /* Adjust the color of the line (e.g., #ff0000 for red) */
      height: 5px; /* Adjust the height of the line */
      width: 80%; /* Adjust the width of the line */
      margin: 20px 0; /* Add margin as needed */
    }

    table {
  width: 80%; /* Adjust the width of the table as needed */
  margin-left: -170px; /* Add this line to center-align the table */
  border-collapse: collapse;
}


    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: none    ;
    }
  </style>
</head>
<body>
  <h1>Patient Details</h1>
  <br>
  <br>
  <div id="orderDetailsContainer" class="karthi">
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

    // Retrieve order details from the database
    $sql_query = "SELECT * FROM hms1_details";
    $result = mysqli_query($conn, $sql_query);

    if (mysqli_num_rows($result) > 0) {
        // Output order details
        echo "<table>";
        echo "<tr>
                <th>Name</th>
                <th>Age</th>
                <th>ID</th>
                <th>Gender</th>
                <th>Block</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['block'] . "</td>";
            echo "</tr>";
            echo "<tr><td colspan='5'><hr class='horizontal-line'></td></tr>";
        }

        echo "</table>";
    } else {
        echo "No order details found.";
    }

    mysqli_close($conn);
    ?>
  </div>
  <a href="./dbmspage1.html" class="btn">Logout</a>
</body>
</html>
