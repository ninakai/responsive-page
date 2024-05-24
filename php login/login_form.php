<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Аутентификация</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="container">
  <h2>Authentification</h2>
  <form id="loginForm" method="post" action="login.php">
    <div class="form-group">
      <input type="text" id="username" name="username"placeholder="Login">
    </div>
    <div class="form-group">
      <input type="password" id="password" name="password"placeholder="Password">
    </div>
    <div id="message">
      <?php if (isset($_SESSION['error']))
    {
      echo $_SESSION['error'];
    } ?>
    </div>
    <button type="submit">Sign in</button>
  </form>
</div>


</body>
</html>

