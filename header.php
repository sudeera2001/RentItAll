<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    header {
      position: fixed;
      display: flex;
      padding: 0;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      z-index: 1000;
    }

    .left-section {
      margin-left: 10px;
      display: flex;
      align-items: center;
    }

    .right-section {
      margin-right: 10px;
      display: flex;
      align-items: center;
      gap: 15px;
    }

    button {
      height: 40px;
      width: 100px;
    }

    .postad-button {
      background-color: rgb(163, 67, 67);
      border: none;
      border-radius: 5px;
      cursor: pointer;
      color: white;
    }

    .alladd-button {
      background-color: rgb(42, 165, 79);
      border: none;
      border-radius: 5px;
      cursor: pointer;
      color: white;
    }

    .account-menu-container {
      position: relative;
      display: inline-block;
    }

    /* Hide the checkbox */
    .account-menu-checkbox {
      display: none;
    }

    .account-icon {
      cursor: pointer;
      width: 50px;
      height: 50px;
      border-radius: 50%;
    }

    /* Initially hide the dropdown */
    .menu-dropdown {
      display: none;
      position: absolute;
      top: 60px;
      right: 0;
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      min-width: 150px;
      z-index: 100;
    }

    /* Show the dropdown when the checkbox is checked */
    .account-menu-checkbox:checked + .menu-dropdown {
      display: block;
    }

    .menu-dropdown a {
      display: block;
      padding: 10px 15px;
      text-decoration: none;
      color: black;
      font-size: 14px;
    }

    .menu-dropdown a:hover {
      background-color: #f4f4f4;
    }

    .menu-dropdown .welcome-message {
      font-weight: bold;
      padding: 10px 15px;
      text-align: center;
    }
  </style>
</head>
<body>
<header>
  <div class="left-section">
    <a href="index.html" target="_top">
      <img src="recources/logo.png" alt="logo" height="130px">
    </a>
    <h1>RENTITALL<h1 style="color:red;">.lk</h1></h1>
  </div>

  <div class="right-section">
    <a href="allads.php" target="_top">
      <button class="alladd-button">All ads</button>
    </a>
    <a href="postad.html" target="_top">
      <button class="postad-button" type="button">Post your ad</button>
    </a>
    <div class="account-menu-container">
      <!-- Hidden checkbox to control dropdown visibility -->
      <input type="checkbox" id="account-menu-checkbox" class="account-menu-checkbox">
      <label for="account-menu-checkbox">
        <img src="recources/account.png" alt="account" class="account-icon">
      </label>

      <!-- Dropdown menu -->
      <div class="menu-dropdown">
        <a href="Signin.php">Sign In</a>
        <a href="Signup.html">Sign Up</a>
      </div>
    </div>
  </div>
</header>
</body>
</html>
