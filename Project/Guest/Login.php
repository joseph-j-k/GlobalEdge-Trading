<?php
ob_start();

include('../Assets/Connection/Connection.php');
session_start();
include("Head.php");

$message="";
?>

<?php
if (isset($_POST["btn_submit"])) {
    $email = $_POST["txt_email"];
    $password = $_POST['txt_password'];

    $selAdmin = "SELECT * FROM tbl_admin WHERE admin_email='" . $email . "' AND admin_password='" . $password . "'";
    $resAdmin = $con->query($selAdmin);

    $selUser = "SELECT * FROM tbl_user WHERE user_email='" . $email . "' AND user_password='" . $password . "'";
    $resUser = $con->query($selUser);

    $selTrader = "SELECT * FROM tbl_trader WHERE trader_email='" . $email . "' AND trader_password='" . $password . "'";
    $resTrader = $con->query($selTrader);

    if ($dataAdmin = $resAdmin->fetch_assoc()) {
        $_SESSION['aid'] = $dataAdmin['admin_id'];
        $_SESSION['aname'] = $dataAdmin['admin_name'];
        header("location:../Admin/Dashboard.php");
        exit;
    } elseif ($dataUser = $resUser->fetch_assoc()) {
        $_SESSION['uid'] = $dataUser['user_id'];
        $_SESSION['uname'] = $dataUser['user_name'];
        header("location:../User/HomePage.php");
        exit;
    } else if ($dataTrader = $resTrader -> fetch_assoc()) {
        if ($dataTrader['trader_status'] == 2) {
            echo "<script>alert('Your shop has been Rejected.');</script>";
        } else if ($dataTrader['trader_status'] == 0) {
            echo "<script>alert('Your shop is Pending approval.');</script>";
        } else {
            $_SESSION['tid'] = $dataTrader['trader_id'];
            $_SESSION['tname'] = $dataTrader['trader_name'];
            header("location:../Trader/HomePage.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        /* CSS styles from Uiverse.io by jeel-sardhara */
        body {
            background-color: #FFFFFF; /* Optional: background color for the page */
        }

        .container {
            width: 500px;
            background: #f8f9fd;
            background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
            border-radius: 40px;
            padding: 25px 35px;
            border: 5px solid rgb(255, 255, 255);
            box-shadow: rgba(0, 126, 255, 0.2) 0px 20px 30px -10px, 
                rgba(0, 126, 255, 0.15) 0px 10px 20px -15px;
            margin: 20px; /* Can be adjusted if needed */
            margin-left: 450px;
            transition: all 0.3s ease-in-out;
        }

        .container:hover {
                transform: scale(1.02);
                box-shadow: rgba(0, 126, 255, 0.3) 0px 25px 35px -10px,
                            rgba(0, 126, 255, 0.2) 0px 15px 25px -15px; /* Stronger shadow on hover */
            }

        .heading {
            text-align: center;
            font-weight: 900;
            font-size: 30px;
            color: rgb(16, 137, 211);
        }

        .form {
            margin-top: 20px;
        }

        .form .input {
            width: 100%;
            background: white;
            border: none;
            padding: 15px 20px;
            border-radius: 20px;
            margin-top: 15px;
            box-shadow: #cff0ff 0px 10px 10px -5px;
            border-inline: 2px solid transparent;
        }

        .form .input::-moz-placeholder {
            color: rgb(170, 170, 170);
        }

        .form .input::placeholder {
            color: rgb(170, 170, 170);
        }

        .form .input:focus {
            outline: none;
            border-inline: 2px solid #12b1d1;
        }

        .form .forgot-password {
            display: block;
            margin-top: 10px;
            margin-left: 10px;
        }

        .form .forgot-password a {
            font-size: 11px;
            color: #0099ff;
            text-decoration: none;
        }

        .form .login-button {
            display: block;
            width: 100%;
            font-weight: bold;
            background: linear-gradient(45deg, rgb(16, 137, 211) 0%, rgb(18, 177, 209) 100%);
            color: white;
            padding-block: 15px;
            margin: 20px auto;
            border-radius: 20px;
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .form .login-button:hover {
            transform: scale(1.03);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px;
        }

        .form .login-button:active {
            transform: scale(0.95);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 15px 10px -10px;
        }

        .social-account-container {
            margin-top: 25px;
        }

        .social-account-container .title {
            display: block;
            text-align: center;
            font-size: 10px;
            color: rgb(170, 170, 170);
        }

        .social-account-container .social-accounts {
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 5px;
        }

        .social-account-container .social-accounts .social-button {
            background: linear-gradient(45deg, rgb(0, 0, 0) 0%, rgb(112, 112, 112) 100%);
            border: 5px solid white;
            padding: 5px;
            border-radius: 50%;
            width: 40px;
            aspect-ratio: 1;
            display: grid;
            place-content: center;
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 12px 10px -8px;
            transition: all 0.2s ease-in-out;
        }

        .social-account-container .social-accounts .social-button .svg {
            fill: white;
            margin: auto;
        }

        .social-account-container .social-accounts .social-button:hover {
            transform: scale(1.2);
        }

        .social-account-container .social-accounts .social-button:active {
            transform: scale(0.9);
        }

        .agreement {
            display: block;
            text-align: center;
            margin-top: 15px;
        }

        .agreement a {
            text-decoration: none;
            color: #0099ff;
            font-size: 15px;
			font-weight:bold;
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

        @keyframes professionalFadeIn {
            0% {
                transform: translateY(20px) scale(0.98);
                opacity: 0;
            }
            60% {
                transform: translateY(-5px) scale(1.01);
                opacity: 0.8;
            }
            100% {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }

        /* Apply the subtle animation */
        #container {
            padding: 30px 50px;
            animation: professionalFadeIn 1s ease-out; /* Smooth scaling and sliding effect */
        }

        .feedback {
            color: red;
            font-size: 0.9em;
            display: none;
            }
        .feedback.invalid {
            display: block;
            }
        .feedback.valid {
            color: green;
            display: block;
            }

    </style>

    <?php
// Database queries to fetch user details
$adminEmails = [];
$adminPasswords = [];
$userEmails = [];
$userPasswords = [];
$traderEmails = [];
$traderPasswords = [];

// Fetch all admin emails and passwords
$selectAdmin = "SELECT admin_email, admin_password FROM tbl_admin";
$resultAdmin = $con->query($selectAdmin);
while ($row = $resultAdmin->fetch_assoc()) {
    $adminEmails[] = $row["admin_email"];
    $adminPasswords[] = $row["admin_password"];
}

// Fetch all user emails and passwords
$selectUser = "SELECT user_email, user_password FROM tbl_user";
$resultUser = $con->query($selectUser);
while ($row = $resultUser->fetch_assoc()) {
    $userEmails[] = $row["user_email"];
    $userPasswords[] = $row["user_password"];
}

// Fetch all trader emails and passwords
$selectTrader = "SELECT trader_email, trader_password FROM tbl_trader";
$resultTrader = $con->query($selectTrader);
while ($row = $resultTrader->fetch_assoc()) {
    $traderEmails[] = $row["trader_email"];
    $traderPasswords[] = $row["trader_password"];
}
?>

<script>
    function checkEmailAndPassword() {
        const email = document.getElementById("txt_email").value;
        const password = document.getElementById("txt_password").value;
        const emailFeedback = document.getElementById("emailFeedback");
        const passwordFeedback = document.getElementById("passwordFeedback");

        // Email validation pattern
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (emailPattern.test(email)) {
            emailFeedback.textContent = "Valid email address.";
            emailFeedback.classList.add("valid");
            emailFeedback.classList.remove("invalid");
        } else {
            emailFeedback.textContent = "Please enter a valid email address.";
            emailFeedback.classList.add("invalid");
            emailFeedback.classList.remove("valid");
        }

        // Password validation requirements
        const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        if (passwordPattern.test(password)) {
            passwordFeedback.textContent = "Valid Password.";
            passwordFeedback.classList.add("valid");
            passwordFeedback.classList.remove("invalid");
        } else {
            passwordFeedback.textContent = "Password must be at least 8 characters, include uppercase, lowercase, and a number.";
            passwordFeedback.classList.add("invalid");
            passwordFeedback.classList.remove("valid");
        }
    }

    // Add event listeners for real-time validation
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("txt_email").addEventListener("input", checkEmailAndPassword);
        document.getElementById("txt_password").addEventListener("input", checkEmailAndPassword);

        // Form submission validation
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            checkEmailAndPassword();

            // Prevent form submission if there are invalid fields
            if (document.getElementById("emailFeedback").classList.contains("invalid") ||
                document.getElementById("passwordFeedback").classList.contains("invalid")) {
                event.preventDefault();
                alert("Please correct the errors before submitting.");
            }
        });
    });
</script>


</head>
<body>
    <div class="container"  id="container">
	<a href="../index.php" class="search">Home</a>
        <div class="heading">Sign In</div>
         <?php if ($message != "") { ?>
        <div class="text-center text-red-500 mb-4"><?php echo $message; ?></div>
      <?php } ?>
        <form class="form" action="" method="post">
            <input
                placeholder="E-mail"
                id="txt_email"
                name="txt_email"
                type="email"
                class="input"
                required
            />
            <span id="emailFeedback" class="feedback">Please enter a valid email address.</span>
            <input
                placeholder="Password"
                id="txt_password"
                name="txt_password" 
                type="password"
                class="input"
                required
            />
             <span id="passwordFeedback" class="feedback">Password must be at least 8 characters, include uppercase, lowercase, and a number.</span>
            <input value="Login" type="submit" name="btn_submit" id="btn_submit" class="login-button" />
        <div class="social-account-container">
            <div class="social-accounts">
                <button class="social-button google">
                    <svg
                        viewBox="0 0 488 512"
                        height="1em"
                        xmlns="http://www.w3.org/2000/svg"
                        class="svg"
                    >
                        <path
                            d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"
                        ></path>
                    </svg>
                </button>
                <button class="social-button apple">
                    <svg
                        viewBox="0 0 384 512"
                        height="1em"
                        xmlns="http://www.w3.org/2000/svg"
                        class="svg"
                    >
                        <path
                            d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"
                        ></path>
                    </svg>
                </button>
                <button class="social-button twitter">
                    <svg
                        viewBox="0 0 512 512"
                        height="1em"
                        xmlns="http://www.w3.org/2000/svg"
                        class="svg"
                    >
                        <path
                            d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"
                        ></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
	</form>
</body>
</html>
<?php
ob_end_flush(); // Output all buffered content
?>

<?php include("Foot.php"); ?>
