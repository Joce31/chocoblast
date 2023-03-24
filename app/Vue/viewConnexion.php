<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <title>Document</title>
</head>
<body>
        <!--import du menu//ne pas oublier sur chaque page --> 

        <?php include './App/Vue/viewMenu.php';?>

<div class="form">
<form action="" method="post">
        <label for="mail_utilisateur"> Veuillez entrer votre E-mail </label>
        <p><input type="email" name="mail_utilisateur"></p>
        <label for="password_utilisateur"> Veuillez entrer votre Password </label>
        <p><input type="password" name="password_utilisateur"></p>
        <p><input type="submit" name="submit"></p>



</form>
<div id="error"><?php echo $valide; ?></div>
</div>
<?php include './App/Vue/viewFooter.php';?>
</body>
</html>




