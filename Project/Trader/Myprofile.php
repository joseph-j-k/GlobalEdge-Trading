<?php
include("Head.php");

$selqry="select * from tbl_trader where trader_id='".$_SESSION['tid']."'";
$row=$con->query($selqry);
$data=$row->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Trader Profile</title>
<style>

    body{
        background-color: #FFF8E1;
    }

    /* Animation for Fade-in */
    .profile-container {
        width: 100%;
        max-width: 400px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeIn 1s ease-out forwards;
    }

    /* Profile Image Styling */
    .profile-container img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin-bottom: 20px;
        animation: popIn 0.8s ease-out forwards;
    }

    /* Table Styling */
    .profile-table {
        width: 100%;
        margin-top: 10px;
        border-collapse: collapse;
    }
    .profile-table td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
    .profile-table td:first-child {
        font-weight: bold;
        text-align: left;
        width: 40%;
    }
    .profile-table td:last-child {
        text-align: right;
        color: #555;
    }

    /* Link Styling with Hover Animation */
    .profile-links {
        margin-top: 20px;
    }
    .profile-links a {
        text-decoration: none;
        color: #007bff;
        margin: 0 10px;
        font-size: 14px;
        position: relative;
    }
    .profile-links a::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 100%;
        height: 2px;
        background: #007bff;
        transform: scaleX(0);
        transform-origin: bottom right;
        transition: transform 0.3s ease-out;
    }
    .profile-links a:hover::after {
        transform: scaleX(1);
        transform-origin: bottom left;
    }

    /* Keyframes for Animations */
    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes popIn {
        from {
            opacity: 0;
            transform: scale(0.5);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>
</head>

<body>
<div class="profile-container" style="margin-left:500px">
    <img src="../Assets/Files/AgencyDocs/<?php echo $data['trader_photo']?>" alt="Trader Photo"/>
    <table class="profile-table">
        <tr>
            <td>Name</td>
            <td><?php echo htmlspecialchars($data['trader_name']); ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo htmlspecialchars($data['trader_email']); ?></td>
        </tr>
        <tr>
            <td>Contact</td>
            <td><?php echo htmlspecialchars($data['trader_contact']); ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo htmlspecialchars($data['trader_address']); ?></td>
        </tr>
    </table>
    <div class="profile-links">
        <a href="Editprofile.php">Edit Profile</a>
        <a href="Changepassword.php">Change Password</a>
    </div>
</div>
</body>
</html>
<?php include("Foot.php"); ?>
