<?php 
include('../Assets/Connection/Connection.php');
include("Head.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }

    h3 {
        text-align: center;
        color: #4CAF50;
        padding-bottom: 20px;
        margin-top: 20px;
    }

    table {
        width: 80%;
        margin: 0 auto 40px;
        border-collapse: collapse;
        background-color: #9ABFAB;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    th, td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        color: white;
        background-color: #4CAF50;
    }

    tr:nth-child(even) td {
        background-color: #b0c7a1;
    }

    a {
        text-decoration: none;
        color: #2196F3;
        font-weight: bold;
    }

    a:hover {
        opacity: 0.8;
    }

    img {
        border-radius: 8px;
    }
</style>
</head>

<body>
<h3>User List</h3>
<table align="center">
    <tr>
        <th>Si No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Photo</th>
        <th>Place</th>
    </tr>
    <?php
    $i = 0;
    $SelQry = "SELECT * FROM tbl_user t INNER JOIN tbl_place p ON t.place_id=p.place_id";
    $result = $con->query($SelQry);
    while($row = $result->fetch_assoc()) {
        $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['user_name']; ?></td>
        <td><?php echo $row['user_email']; ?></td>
        <td><?php echo $row['user_contact']; ?></td>
        <td><?php echo $row['user_address']; ?></td>
        <td><img src="../Assets/Files/User/<?php echo $row['user_photo']; ?>" width="75" height="75" /></td>
        <td><?php echo $row['place_name']; ?></td>
    </tr>
    <?php
    }
    ?>
</table>
</body>
</html>
<?php include("Foot.php"); ?>
