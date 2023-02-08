<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universalmedica";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["boutton-valider"])) {
    $user = mysqli_real_escape_string($conn, $_POST["username"]);
    $pass = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT * FROM users WHERE username='$user' and password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION["id"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["user_type"] = $row["user_type"];
        header("Location: bienvenue.php");
    } else {
        $error = "Aucun utilisateur trouvé avec les informations fournies.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name "viewport" content="width=device-width, initial-scale=1.0"/>
<link href ="css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/css/FontUniversalMedica.css">
<title></title>
</head>

<body>
<img class="fond" src="iiisometric.svg">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<h1> MEMBER LOGIN </h1>

  <div class="input-group-mb-3">
      
    <h2> Login </h2>
	<div class="input-group-prepend">
	<span class="input-group-text"><i class="icon-user"></i></span>
	<input type="text" name="username" class="form-control" placeholder="Login"></div>
  
	
    <h2> Mot de passe </h2>
		      <div class="input-group-prepend">
<span class="input-group-text"><i class="icon-lock"></i></span>
	<input type="password" name="password" class="form-control" placeholder="Mot de passe"></div>
  
  <?php
if (

isset($error)) {
echo '<p style="color:red;">' . $error . '</p>';
}
?>

  <button type="submit" name="boutton-valider" class="">Se connecter</button>
</form>


</body>




</html>