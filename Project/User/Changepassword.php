<?php
include("../Assets/connection/connection.php");
session_start();

$selqry = "SELECT * FROM tbl_user WHERE user_id='" . $_SESSION['uid'] . "'";
$row = $con->query($selqry);
$data = $row->fetch_assoc();
$dbpassword = $data['user_password'];

if (isset($_POST["btn_changepass"])) {
    $OldPassword = $_POST["txt_old"];
    $NewPassword = $_POST["txt_new"];
    $ReTypePassword = $_POST["txt_confirm"];

    if ($OldPassword == $dbpassword) {
        if ($NewPassword == $ReTypePassword) {
            $up = "UPDATE tbl_user SET user_password='" . $NewPassword . "' WHERE user_id=" . $_SESSION['uid'];
            if ($con->query($up)) {
                echo "<script>
                        alert('Password Changed');
                        window.location='Changepassword.php';
                      </script>";
            }
        } else {
            echo "<script>alert('Passwords Do Not Match');</script>";
        }
    } else {
        echo "<script>alert('Incorrect Current Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS Styles -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: #FFF8E1;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-card {
            width: 400px;
            background: #D2D6CA;
            border-radius: 15px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
            padding: 30px;
            animation: fadeIn 0.6s ease-out;
        }

        .form-card h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            outline: none;
            font-size: 14px;
        }

        .form-group input:focus {
            border-color: #6a11cb;
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background: #9BA5E8;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background: #9BA5E8;
        }

        .cancel-btn {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            color: white;
            background: #9BA5E8;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .cancel-btn:hover {
            background: #9BA5E8;
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
    <div class="form-card">
        <h2>Change Password</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="txt_old">Current Password</label>
                <input type="password" name="txt_old" id="txt_old" required />
            </div>
            <div class="form-group">
                <label for="txt_new">New Password</label>
                <input type="password" name="txt_new" id="txt_new" required />
            </div>
            <div class="form-group">
                <label for="txt_confirm">Confirm Password</label>
                <input type="password" name="txt_confirm" id="txt_confirm" required />
            </div>
            <button type="submit" name="btn_changepass" class="submit-btn">Change Password</button>
            <button type="button" class="cancel-btn" onclick="window.location='Myprofile.php'">Back</button>
        </form>
    </div>
</body>

</html>
