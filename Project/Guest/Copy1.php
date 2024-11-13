<?php
include('../Assets/Connection/Connection.php');

if(isset($_POST["txt_submit"]))
{
	$name= $_POST["txt_name"];
	$email = $_POST["txt_email"];
	$contact=$_POST['txt_contact'];
	$addrs=$_POST['txt_address'];
	$password =$_POST['txt_password'];
	
	$photo=$_FILES['txt_photo']['name'];
	$path=$_FILES['txt_photo']['tmp_name'];
	move_uploaded_file($path,'../Assets/Files/User/'.$photo);
	
	$place=$_POST['sel_place'];
	$insQry = "insert  into tbl_trader(trader_name, trader_email, trader_contact, trader_address, trader_photo, trader_proof, trader_password, place_id)
  values('".$name."', '".$email."', '".$contact."', '".$addrs."', '".$password."', '".$photo."', '".$place."')";
	
	if($con->query($insQry))
	{
		?>
    <script>
		alert("Inserted");
		window.location="Trader.php"
		</script>
    <?php
	}
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Registration Form</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>

    body {
        height: 100%;
        background: #f0f2f5;
        background-size: 200% 200%;
        animation: gradientAnimation 6s infinite alternate;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        animation: fadeIn 1s ease-in-out; /* Fade in animation */
    }

   @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .container {
        width: auto;
        max-width: 900px; /* Limit the max width */
        background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
        padding: 30px; /* Increased padding */
        height: auto; /* Allow height to adjust based on content */
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: slideUp 0.5s ease-out; /* Add slide-up effect */
    }


    @keyframes slideUp {
        0% {
            transform: translateY(20px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    header {
        font-size: 2rem;
        font-weight: 600;
        color: #444;
        text-align: center;
        margin-bottom: 30px;
        letter-spacing: 1px;
    }

    .form {
        margin-top: 10px;
    }

    .input-box {
        position: relative;
        margin-top: 5px;
        margin-left:20px;
    }

    .input-box input,
    .input-box textarea,
    .select-box select {
        width: 100%;
        padding: 18px 12px;
        border: 1px solid #ddd;
        border-radius: 10px;
        outline: none;
        background: #f9f9f9;
        transition: 0.4s;
        margin-top:20px;
        resize: vertical;
        
    }

    .input-box input:hover,
    .input-box textarea:hover,
    .select-box select:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1); /* Adjust shadow on hover */
    }

    .input-box input:focus,
    .input-box textarea:focus,
    .select-box select:focus {
        border-color: #EE4E34;
        background: #fff;
        box-shadow: 0 0 5px rgba(238, 78, 52, 0.4); /* Slightly darker shadow on focus */
    }

    .select-box{
      margin-left:20px;
    }

    .input-box textarea {
    height: auto;
    resize: none; /* Disable resizing if not needed */
    }

    .input-box label {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #888;
        font-size: 1rem;
        transition: 0.3s;
        pointer-events: none;
    }

    .input-box textarea:focus + label,
    .input-box textarea:not(:placeholder-shown) + label,
    .input-box input:focus + label,
    .input-box input:not(:placeholder-shown) + label {
        top: 8px;
        font-size: 0.85rem;
        color: #EE4E34;
    }

    .column {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .file-input {
        margin-top: 20px;
        position: relative;
        cursor: pointer;
    }


    .file-input input[type="file"] {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .file-input label {
        display: block;
        width: 100%;
        padding: 15px;
        text-align: center;
        border: 1px dashed #ddd;
        border-radius: 10px;
        background: #f9f9f9;
        transition: background 0.3s, transform 0.3s;
        color: #666;
        font-weight: 500;
    }


    .file-input:hover label {
        background: #fff;
        transform: scale(1.02);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .form button {
        margin-top: 30px;
        width: 100%;
        padding: 14px 0;
        border: none;
        border-radius: 10px;
        background: linear-gradient(135deg, #EE4E34, #D63C2A);
        color: white;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.4s, transform 0.3s; /* Add transform on button hover */
        margin-left:20px;
    }

    .form button:hover {
        background: linear-gradient(135deg, #d63c2a, #EE4E34);
        box-shadow: 0 5px 15px rgba(238, 78, 52, 0.3);
        transform: translateY(-2px); /* Button lift effect on hover */
    }

    .address-group {
        margin-top: 20px;
    }


   /* Image preview style */
    #imagePreviewContainer {
        margin-top: 15px;
    }

    #imagePreview {
        display: none;
        max-width: 150px;
        height: auto;
        border-radius: 10px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .column {
            flex-direction: column;
        }
    }


     /* Style for feedback messages */
    .feedback {
      font-size: 0.9em;
      margin-top: 5px;
    }

    /* Style for invalid feedback (red) */
    .feedback.invalid {
      color: red;
    }

    /* Style for valid feedback (green) */
    .feedback.valid {
      color: green;
    }
</style>
 <script type="text/javascript">
    // Validate Name
    function validateName() {
        const name = document.getElementById("txt_name").value;
        const nameFeedback = document.getElementById("nameFeedback");
        
        if (name.length >= 3) {
            nameFeedback.textContent = "Valid name.";
            nameFeedback.className = "feedback valid";
            return true;
        } else {
            nameFeedback.textContent = "Name must be at least 3 characters.";
            nameFeedback.className = "feedback invalid";
            return false;
        }
    }

    // Validate Contact Number
    function validateContactNumber() {
        const contact = document.getElementById("txt_contact").value;
        const contactFeedback = document.getElementById("contactFeedback");

        if (/^\d{10}$/.test(contact)) {
            contactFeedback.textContent = "Valid contact number.";
            contactFeedback.className = "feedback valid";
            return true;
        } else {
            contactFeedback.textContent = "Contact number must be 10 digits.";
            contactFeedback.className = "feedback invalid";
            return false;
        }
    }

    // Validate Email Format
    function validateEmailFormat() {
        const email = document.getElementById("txt_email").value;
        const emailFeedback = document.getElementById("emailFeedback");

        if (/^[\w-.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email)) {
            emailFeedback.textContent = "Valid email.";
            emailFeedback.className = "feedback valid";
            return true;
        } else {
            emailFeedback.textContent = "Please enter a valid email address.";
            emailFeedback.className = "feedback invalid";
            return false;
        }
    }

    // Check Password Strength
    function checkPasswordStrength() {
        const password = document.getElementById("txt_password").value;
        const passwordFeedback = document.getElementById("passwordFeedback");

        if (password.length >= 6) {
            passwordFeedback.textContent = "Strong password.";
            passwordFeedback.className = "feedback valid";
            return true;
        } else {
            passwordFeedback.textContent = "Password must be at least 6 characters.";
            passwordFeedback.className = "feedback invalid";
            return false;
        }
    }

    // Validate Confirm Password
    function validateConfirmPassword() {
        const password = document.getElementById("txt_password").value;
        const confirmPassword = document.getElementById("txt_confirm_password").value;
        const confirmPasswordFeedback = document.getElementById("confirmPasswordFeedback");

        if (confirmPassword === password) {
            confirmPasswordFeedback.textContent = "Passwords match.";
            confirmPasswordFeedback.className = "feedback valid";
            return true;
        } else {
            confirmPasswordFeedback.textContent = "Passwords do not match.";
            confirmPasswordFeedback.className = "feedback invalid";
            return false;
        }
    }

    // Validate Address
    function validateAddress() {
        const address = document.getElementById("txt_address").value;
        const addressFeedback = document.getElementById("addressFeedback");

        if (address.length >= 10) {
            addressFeedback.textContent = "Valid address.";
            addressFeedback.className = "feedback valid";
            return true;
        } else {
            addressFeedback.textContent = "Address must be at least 10 characters.";
            addressFeedback.className = "feedback invalid";
            return false;
        }
    }

       // Show Image Preview
    function showImagePreview() {
      const fileInput = document.getElementById('profile-pic');
      const imagePreview = document.getElementById('imagePreview');
      const file = fileInput.files[0];

      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          imagePreview.src = e.target.result;
          imagePreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
      }
    }


    // Validate Dropdown
    function validateDropdown(dropdownId) {
        const dropdown = document.getElementById(dropdownId);
         const feedbackElement = document.getElementById('dropdownFeedback_' + dropdownId);

        // Check if a valid option is selected
        if (dropdown.value !== "" && dropdown.value !== "default") {
            feedbackElement.textContent = "Valid selection.";
            feedbackElement.className = "feedback valid";
            return true;
        } else {
            feedbackElement.textContent = "Please select a valid option.";
            feedbackElement.className = "feedback invalid";
            return false;
        }
    }


    function validateImage() {
    const fileInput = document.getElementById('profile-pic');
    const file = fileInput.files[0];
    if (!file) {
        alert("Please upload a profile photo.");
        return false;
    }
    const validTypes = ['image/jpeg', 'image/png', 'image/jpg']; // Acceptable file types
    if (!validTypes.includes(file.type)) {
        alert("Please upload a valid image (JPG, PNG).");
        return false;
    }
    // You can also check for file size here, for example:
    const maxSize = 5 * 1024 * 1024; // 5MB max size
    if (file.size > maxSize) {
        alert("Image size must be less than 5MB.");
        return false;
    }
    return true;
}

    // Validate all fields before submission
    function validateForm() {
        return (
            validateName() &&
            validateContactNumber() &&
            validateEmailFormat() &&
            checkPasswordStrength() &&
            validateConfirmPassword() &&
            validateAddress() &&
            validateImage() &&
            validateDropdown('sel_country') &&   // Country validation
            validateDropdown('sel_state') &&     // State validation
            validateDropdown('sel_district') &&  // District validation
            validateDropdown('sel_place')        // Place validation
        );
    }
  </script>
</head>
<body>
  <section class="container">
    <header>Register Now as a Trader</header>
    <form class="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
      <div class="input-box">
        <input type="text" name="txt_name" id="txt_name" required placeholder=" " oninput="validateName()"/>
        <label>Full Name</label>
        <div id="nameFeedback" class="feedback"></div>
      </div>
      <div class="column">
        <div class="input-box">
          <input type="tel" name="txt_contact" id="txt_contact" required placeholder=" " oninput="validateContactNumber()"/>
          <label>Phone Number</label>
          <div id="contactFeedback" class="feedback"></div>
        </div>
        <div class="input-box">
          <input type="text" name="txt_email" id="txt_email" placeholder=" " required oninput="validateEmailFormat()"/>
          <label>Email</label>
          <div id="emailFeedback" class="feedback"></div>
        </div>
        <div class="input-box">
          <input type="text" name="txt_password" id="txt_password" placeholder=" " required  oninput="checkPasswordStrength()"/>
          <label>Password</label>
          <div id="passwordFeedback" class="feedback"></div>
        </div>
      </div>
       <div class="input-box">
        <input type="password" name="txt_confirm_password" id="txt_confirm_password" required placeholder=" " oninput="validateConfirmPassword()" />
        <label>Confirm Password</label>
        <div id="confirmPasswordFeedback" class="feedback"></div>
      </div>
      <div class="address-group">
        <div class="input-box">
          <textarea name="txt_address" id="txt_address" required placeholder=" " rows="4"  oninput="validateAddress()"></textarea>
          <label>Street Address</label>
          <div id="addressFeedback" class="feedback"></div>
        </div>
          <div class="select-box">
            <select name="sel_country" id="sel_country" onChange="getState(this.value)" required onchange="validateDropdown('sel_country')">
              <option hidden>Country</option>
              <?php 
              $sel = "select * from tbl_country"; 
              $result = $con -> query($sel);
              while($data = $result -> fetch_assoc())
              {
              ?>
                <option value="<?php echo $data["country_id"] ?>"><?php echo $data["country_name"] ?></option>
                <?php } ?>
            </select>
            <div id="dropdownFeedback_sel_country" class="feedback"></div>
          </div>
          <div class="select-box">
            <select name="sel_state" id="sel_state" onChange="getDistrict(this.value)" required onchange="validateDropdown('sel_state')">
              <option hidden>State</option>
            </select>
            <div id="dropdownFeedback_sel_state" class="feedback"></div>
          </div>
        </div>
          <div class="select-box">
            <select name="sel_district"id="sel_district" onChange="getPlace(this.value)" required onchange="validateDropdown('sel_district')">
              <option hidden>District</option>
            </select>
            <div id="dropdownFeedback_sel_district" class="feedback"></div>
        </div>
          <div class="select-box">
            <select  name="sel_place"id="sel_place" required onchange="validateDropdown('sel_place')">
              <option hidden>Place</option>
            </select>
            <div id="dropdownFeedback_sel_place" class="feedback"></div>
        </div>
        
        <div class="file-input">
        <input type="file" id="profile-pic" name="txt_photo" required accept="image/jpeg, image/png, image/gif" onchange="validateImage(); showImagePreview()" />
        <label for="profile-pic">Upload Profile Picture (JPG, PNG, GIF)</label>
        <div id="photoFeedback" class="feedback"></div>
        </div>

    <!-- Preview Section for Image -->
    <div id="imagePreviewContainer" style="margin-top: 15px;">
        <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 150px; height: auto; border-radius: 10px;" />
    </div>



    <div class="file-input">
        <input type="file" id="proof" name="txt_proof" required accept="image/jpeg, image/png, image/gif" onchange="validateImage(); showImagePreview()" />
        <label for="proof">Upload Proof (JPG, PNG, GIF)</label>
        <div id="proofFeedback" class="feedback"></div>
        </div>

    <!-- Preview Section for Image -->
    <div id="proofPreviewContainer" style="margin-top: 15px;">
        <img id="proofPreview" src="#" alt="Image Preview" style="display: none; max-width: 150px; height: auto; border-radius: 10px;" />
    </div>

      <button type="submit" name="txt_submit" id="txt_submit">Submit</button>
    </form>
  </section>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getState(sid)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxState.php?sid="+sid,
		success: function(html)
		{
			$("#sel_state").html(html)
			
			}
		
		});
	
	
	}
</script>
<script>
function getDistrict(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxDistrict.php?did="+did,
		success: function(html)
		{
			$("#sel_district").html(html)
			
			}
		
		});
	
	
	}
</script>

<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
		success: function(html)
		{
			$("#sel_place").html(html)
			
			}
		
		});
	
	
	}
</script>
</html>
