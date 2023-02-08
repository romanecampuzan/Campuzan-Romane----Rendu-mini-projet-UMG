<?php 
session_start();
?>

<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name "viewport" content="width=device-width, initial-scale=1.0"/>
<link href ="css/bootstrap.css" rel="stylesheet" type="text/css">


<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Back') { ?>
  <link rel="stylesheet" href="css/css/FontUniversalMedicaBack.css">
<?php } else { ?>
  <link rel="stylesheet" href="css/css/FontUniversalMedica.css">
<?php } ?>

<title></title>
</head>

<body>


<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Back') { ?>
  <img class="fond" src="img/iiisometric3.svg">
<?php } else { ?>
  <img class="fond" src="img/iiisometric.svg">
<?php } ?>

<form>

  <?php
  echo "<p class='message'>Bonjour " . $_SESSION['username'] . "</p>";
  ?>

<p> Merci pour le temps accordé à ma candidature. Retrouvez mon CV en cliquant sur le bouton.</p>


<div class="card">
  <span> Romane <br>Campuzan</span>
<button onclick="document.getElementById('downloadLink').click();">CV</button>
<a id="downloadLink" style="display: none;" href="img/CVRomaneCampuzan.pdf" download>Download CV</a>

</div>





</form>


</body>
</html>

