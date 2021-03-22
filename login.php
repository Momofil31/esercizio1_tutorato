<?php
  include_once './includes/config.inc.php';
  if (isset($_POST['login-submit'])) {
    if (!func::checkLoginState()) {
      if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
      
        $query = "SELECT * FROM users WHERE user_username = :username";
        $param = array('username' => $username);
        $stmt = $pdo->prepare($query);
        $stmt->execute($param);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
        if($row['user_id'] > 0) {
          // Faccio il controllo qui invece che nella select perchè mi serve se cripto la password
          if ($password == $row['user_password']) {
            func::createCookie($username, $row['user_id']);
          }
        }
        header("location:index.php");
      }
    }
  } else {
    if (func::checkLoginState()) {
      header("location:index.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <div>
    <form action="login.php" method="post">
      username:
      <input type="text" name="username" id="username"> <br>
      password:
      <input type="password" name="password" id="password">
      <button type="submit" name="login-submit">Login</button>
    </form>
  </div>

</body>

</html>