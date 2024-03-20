<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-delete {
            background-color: #f44336;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>CRUD Application</h2>

        <form id="crud-form" method="post">
            <input type="text" id="name" placeholder="Enter Name" name="Name">
            <input type="text" id="email" placeholder="Enter Email" name="Email">
            <input type="submit" value="Add Record" class="btn" name="send">
        </form>

        <table id="record-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="record-body">
                <!-- Records will be dynamically inserted here -->
            </tbody>
        </table>
    </div>

    <script>
        // JavaScript code for CRUD operations will be implemented here
    </script>

</body>

</html>


<?php
//INSERT INTO `form` (`name`, `email`) VALUES ('mohamed', 'xmmmx.com');
$dns = 'mysql:host=localhost;dbname=crud';
$user = 'root';
$pass = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // this option for write arabic
    // there many other options
);
try {

    $db = new PDO($dns, $user, $pass, $options); // start a new connection

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



} catch
(PDOException $e) {

    echo 'Failed' . $e->getMessage();
}

if (isset ($_POST["send"])) {
    $Name = $_POST["Name"];
    $Email = $_POST["Email"];

    try {
        $stmt = $db->prepare("INSERT INTO `form` (`name`, `email`) VALUES ('$Name', '$Email');");
        $stmt2 = $db->prepare("SELECT * FROM `form`;");
        $stmt->execute();
        $stmt2->execute();

    } catch (PDOException) {
        echo "<br> This Email has been taken";

    }
}
?>