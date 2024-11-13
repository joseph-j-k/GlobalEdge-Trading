<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Registration Form</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      background: linear-gradient(135deg, #EE4E34, #FCEDDA);
      background-size: 200% 200%;
      animation: gradientAnimation 6s infinite alternate;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;
    }

    @keyframes gradientAnimation {
      0% {
        background-position: left;
      }
      100% {
        background-position: right;
      }
    }

    .container {
      max-width: 500px;
      width: 100%;
      background: #fff;
      padding: 50px;
      height:700px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
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
    }

    .input-box:hover {
      transform: scale(1.05);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .input-box input,
    .select-box select {
      width: 100%;
      padding: 18px 12px;
      border: 1px solid #ddd;
      border-radius: 10px;
      outline: none;
      background: #f9f9f9;
      transition: 0.4s;
    }

    .input-box input,
    .select-box select:hover{
        transform: scale(1.05);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .input-box input:focus,
    .select-box select:focus {
      border-color: #EE4E34;
      background: #fff;
      box-shadow: 0 0 5px rgba(238, 78, 52, 0.2);
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

    .input-box input:focus + label,
    .input-box input:not(:placeholder-shown) + label {
      top: 8px;
      font-size: 0.85rem;
      color: #EE4E34;
    }

    .column {
      display: flex;
      gap: 15px;
    }

    .gender-box {
      margin-top: 20px;
      color: #555;
    }

    .gender-option {
      display: flex;
      gap: 25px;
      margin-top: 8px;
    }

    .gender input {
      accent-color: #EE4E34;
    }

    .gender input:hover{
        transform: scale(1.05);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
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
      transition: background 0.4s;
    }

    .form button:hover {
      background: linear-gradient(135deg, #d63c2a, #EE4E34);
      box-shadow: 0 5px 15px rgba(238, 78, 52, 0.3);
    }

    .address-group {
      margin-top: 25px;
    }

    .column{
        margin-top: 25px;
    }

    .file-input {
      margin-top: 25px;
      position: relative;
      cursor: pointer;
      overflow: hidden;
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
      transform: scale(1.05);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    @media (max-width: 480px) {
      .column {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <section class="container">
    <header>Register Now</header>
    <form class="form" action="#">
      <div class="input-box">
        <input type="text" required placeholder=" " />
        <label>Full Name</label>
      </div>
      <div class="column">
        <div class="input-box">
          <input type="tel" required placeholder=" " />
          <label>Phone Number</label>
        </div>
        <div class="input-box">
          <input type="date" required />
          <label>Birth Date</label>
        </div>
      </div>
      </div>
      <div class="address-group">
        <div class="input-box">
          <input type="text" required placeholder=" " />
          <label>Street Address</label>
        </div>
        <div class="column">
          <div class="select-box">
            <select required>
              <option hidden>Country</option>
              <option>USA</option>
              <option>UK</option>
              <option>Germany</option>
              <option>Japan</option>
            </select>
          </div>
          <div class="select-box">
            <select required>
              <option hidden>State</option>
              <option>California</option>
              <option>Texas</option>
              <option>New York</option>
              <option>Florida</option>
            </select>
          </div>
        </div>
        <div class="column">
          <div class="select-box">
            <select required>
              <option hidden>District</option>
              <option>District 1</option>
              <option>District 2</option>
              <option>District 3</option>
            </select>
          </div>
          <div class="select-box">
            <select required>
              <option hidden>Place</option>
              <option>Place A</option>
              <option>Place B</option>
              <option>Place C</option>
            </select>
          </div>
        </div>
        <div class="file-input">
        <input type="file" id="profile-pic" required />
        <label for="profile-pic">Upload Profile Picture</label>
      </div>
      </div>
      <button type="submit">Submit</button>
    </form>
  </section>
</body>
</html>
