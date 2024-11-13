<?php
include("../Assets/connection/connection.php");
session_start();
$selqry = "SELECT * FROM tbl_user WHERE user_id='" . $_SESSION['uid'] . "'";
$row = $con->query($selqry);
$data = $row->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Material+Icons&display=swap" rel="stylesheet">

    <!-- CSS Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #FFF8E1;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .profile-card {
            width: 400px;
            height:500px;
            background: #C5D6C4;
            border-radius: 15px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .profile-card:hover {
            transform: scale(1.05);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.3);
        }

        .profile-header {
            position: relative;
            width: 100%;
            height: 180px;
            background: #D2D6CA;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid white;
            position: absolute;
            bottom: -60px;
            left: 50%;
            transform: translateX(-50%);
        }

        .profile-content {
            padding: 80px 20px 20px;
            text-align: center;
        }

        .profile-content h2 {
            margin-bottom: 5px;
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }

        .profile-content p {
            margin-bottom: 10px;
            font-size: 14px;
            color: #777;
        }

        .profile-content p strong {
            color: #444;
        }

        .profile-actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }

        .profile-actions a {
            text-decoration: none;
            font-size: 14px;
            color: white;
            background: #9BA5E8;
            padding: 10px 20px;
            border-radius: 30px;
            transition: background 0.3s ease;
        }

        .profile-actions a:hover {
            background: #9BA5E8;
        }


        .search {
            display: inline-block;
            background-color: #869897; /* Green background */
            color: white; /* White text */
            padding: 10px 20px; /* Padding */
            font-size: 16px; /* Font size */
            text-align: center; /* Center text */
            text-decoration: none; /* Remove underline */
            position: relative;
            border-radius: 5px 0 0 5px; /* Rounded corners on left */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Light shadow */
            transition: background-color 0.3s, transform 0.3s; /* Smooth transitions */
        }

        .search::after {
            content: '';
            position: absolute;
            top: 0;
            right: -20px;
            width: -155px;
            height: 0;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;
            border-left: 20px solid #869897; /* Arrow tip background color */
            transition: border-left-color 0.4s;
        }

        .search:hover {
            background-color: #869897; /* Darker green on hover */
            transform: translateY(-3px); /* Lift effect on hover */
        }

        .search:hover::after {
            border-left-color: #869897; /* Arrow tip color on hover */
        }

        .search:active {
            background-color: #869897; /* Even darker green when clicked */
            transform: translateY(0); /* Return to normal position */
        }

        .search:active::after {
            border-left-color: #869897; /* Arrow tip color on click */
        }


        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="profile-card" style="animation: fadeIn 0.6s ease-out;">
        <div class="profile-header">
        <a href="HomePage.php" class="search">Back</a>
            <img src="../Assets/Files/User/<?php echo $data['user_photo']; ?>" alt="User Photo">
        </div>
        <div class="profile-content">
            <h2><?php echo $data['user_name']; ?></h2>
            <p><strong>Email:</strong> <?php echo $data['user_email']; ?></p>
            <p><strong>Contact:</strong> <?php echo $data['user_contact']; ?></p>
            <p><strong>Address:</strong> <?php echo $data['user_address']; ?></p>
        </div>
        <div class="profile-actions">
            <a href="Editprofile.php">Edit Profile</a>
            <a href="Changepassword.php">Change Password</a>
        </div>
    </div>
</body>

</html>
