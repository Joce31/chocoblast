<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Ajouter un Chocoblast</title>
</head>
<body>
    <!--import du menu -->
    <?php include './App/Vue/viewMenu.php';?>
    <div class="form">
        <h3>Ajouter un chocoblast :</h3>
        <form action="" method="post">
            <label for="slogan_chocoblast">Saisir votre Slogan :</label>
            <input type="text" name="slogan_chocoblast">
            <label for="date_chocoblast">saisir la date :</label>
            <input type="date" name="date_chocoblast">
            <label for="cible_chocoblast">Choisir votre Cible</label>
            <select name="cible_chocoblast">
                <?php
                foreach($data as $value)
                {
                    echo '<option value'.$value->id_utilisateur.'>'.$value->nom_utilisateur.'</option>';
                }
                ?>
            <!--generer liste des users en php--></select>
            <input type="submit" value="Ajouter" name="submit">
        </form>
        <div id="error"><?php echo $msg; ?></div>
    </div>

    
</body>
</html>