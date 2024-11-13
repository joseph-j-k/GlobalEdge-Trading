<?php 
include('../Assets/Connection/Connection.php');
include("Head.php");

if(isset($_GET['acid'])) {
    $delqry="update tbl_trader set trader_status='1' where trader_id='".$_GET['acid']."'";
    if($con->query($delqry)) {
        echo "<script>alert('Accepted'); window.location='TraderVerification.php';</script>";
    }
}

if(isset($_GET['rejid'])) {
    $delqry="update tbl_trader set trader_status='2' where trader_id='".$_GET['rejid']."'";
    if($con->query($delqry)) {
        echo "<script>alert('Rejected'); window.location='TraderVerification.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trader Verification</title>
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

    .actions a {
        padding: 5px 10px;
        background-color: #2196F3;
        color: white;
        border-radius: 4px;
        transition: opacity 0.3s ease;
    }

    .actions a.delete {
        background-color: #f44336;
    }
</style>
</head>

<body>

<h3>Trader List (New)</h3>
<table align="center">
    <tr>
        <th>Si No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Photo</th>
        <th>Proof</th>
        <th>Place</th>
        <th>Action</th>
    </tr>
    <?php
    $i=0;
    $SelQry="SELECT * FROM tbl_trader t INNER JOIN tbl_place p ON t.place_id=p.place_id WHERE t.trader_status='0'";
    $result=$con->query($SelQry);
    while($row=$result->fetch_assoc()) {
        $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['trader_name']?></td>
        <td><?php echo $row['trader_email'] ?></td>
        <td><?php echo $row['trader_contact']?></td>
        <td><?php echo $row['trader_address'] ?></td>
        <td><img src="../Assets/Files/AgencyDocs/<?php echo $row['trader_photo']?>" width="75" height="75" /></td>
        <td><img src="../Assets/Files/AgencyDocs/<?php echo $row['trader_proof']?>" width="75" height="75" /></td>
        <td><?php echo $row['place_name']?></td>
        <td class="actions">
            <a href="TraderVerification.php?acid=<?php echo $row['trader_id']; ?>">Accept</a> /
            <a href="TraderVerification.php?rejid=<?php echo $row['trader_id']; ?>" class="delete">Reject</a>  
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<h3>Accepted List</h3>
<table align="center">
    <tr>
        <th>Si No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Photo</th>
        <th>Proof</th>
        <th>Place</th>
        <th>Action</th>
    </tr>
    <?php
    $i=0;
    $SelQry="SELECT * FROM tbl_trader t INNER JOIN tbl_place p ON t.place_id=p.place_id WHERE t.trader_status='1'";
    $result=$con->query($SelQry);
    while($row=$result->fetch_assoc()) {
        $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['trader_name']?></td>
        <td><?php echo $row['trader_email'] ?></td>
        <td><?php echo $row['trader_contact']?></td>
        <td><?php echo $row['trader_address'] ?></td>
        <td><img src="../Assets/Files/AgencyDocs/<?php echo $row['trader_photo']?>" width="75" height="75" /></td>
        <td><img src="../Assets/Files/AgencyDocs/<?php echo $row['trader_proof']?>" width="75" height="75" /></td>
        <td><?php echo $row['place_name']?></td>
        <td class="actions">
            <a href="TraderVerification.php?rejid=<?php echo $row['trader_id']; ?>" class="delete">Reject</a>  
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<h3>Rejected List</h3>
<table align="center">
    <tr>
        <th>Si No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Photo</th>
        <th>Proof</th>
        <th>Place</th>
        <th>Action</th>
    </tr>
    <?php
    $i=0;
    $SelQry="SELECT * FROM tbl_trader t INNER JOIN tbl_place p ON t.place_id=p.place_id WHERE t.trader_status='2'";
    $result=$con->query($SelQry);
    while($row=$result->fetch_assoc()) {
        $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['trader_name']?></td>
        <td><?php echo $row['trader_email'] ?></td>
        <td><?php echo $row['trader_contact']?></td>
        <td><?php echo $row['trader_address'] ?></td>
        <td><img src="../Assets/Files/AgencyDocs/<?php echo $row['trader_photo']?>" width="75" height="75" /></td>
        <td><img src="../Assets/Files/AgencyDocs/<?php echo $row['trader_proof']?>" width="75" height="75" /></td>
        <td><?php echo $row['place_name']?></td>
        <td class="actions">
            <a href="TraderVerification.php?acid=<?php echo $row['trader_id']; ?>">Accept</a>  
        </td>
    </tr>
    <?php
    }
    ?>
</table>
</body>
</html>

<?php include("Foot.php"); ?>
