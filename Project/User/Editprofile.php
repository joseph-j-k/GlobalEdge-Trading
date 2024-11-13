<?php
include("../Assets/connection/connection.php");
session_start();
$sel = "SELECT * FROM tbl_user WHERE user_id='" . $_SESSION['uid'] . "'";
$row = $con->query($sel);
$data = $row->fetch_assoc();

if (isset($_POST["btn_submit"])) {
    $name = $_POST['txt_name'];
    $email = $_POST['txt_email'];
    $contact = $_POST['txt_contact'];
    $address = $_POST['txt_address'];
    
    $upqry = "UPDATE tbl_user SET user_name='$name', user_email='$email', user_contact='$contact', user_address='$address' WHERE user_id='" . $_SESSION['uid'] . "'";
    
    if ($con->query($upqry)) {
        echo "<script>
                alert('Profile updated successfully!');
                window.location='Editprofile.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

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
            background:  #9BA5E8;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background:  #9BA5E8;
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
        <h2>Edit Profile</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="txt_name">Name</label>
                <input type="text" name="txt_name" id="txt_name" value="<?php echo $data['user_name']; ?>" required />
            </div>
            <div class="form-group">
                <label for="txt_email">Email</label>
                <input type="email" name="txt_email" id="txt_email" value="<?php echo $data['user_email']; ?>" required />
            </div>
            <div class="form-group">
                <label for="txt_contact">Contact</label>
                <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data['user_contact']; ?>" required />
            </div>
            <div class="form-group">
                <label for="txt_address">Address</label>
                <input type="text" name="txt_address" id="txt_address" value="<?php echo $data['user_address']; ?>" required />
            </div>
            <button type="submit" name="btn_submit" class="submit-btn">Update Profile</button>
            <button type="button" class="cancel-btn" onclick="window.location='Myprofile.php'">Back</button>
        </form>
    </div>
</body>

</html>
