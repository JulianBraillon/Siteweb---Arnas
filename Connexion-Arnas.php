<?php
$n = 0;
$erreur_nom = $erreur_mdp = '';

if (isset($_POST["bouton"])) {
    $nom = $_POST["nom"] ?? '';
    $mdp = $_POST["mdp"] ?? '';

    if (empty($nom)) {
        $erreur_nom = "Nom d'utilisateur manquant";
    } elseif ($nom !== "jean-pierre-laforet") {
        $erreur_nom = "Mauvais nom d'utilisateur";
    }

    if (empty($mdp)) {
        $erreur_mdp = "Mot de passe manquant";
    } elseif ($mdp !== "Gpse34_5") {
        $erreur_mdp = "Mauvais mot de passe";
    }

    if ($erreur_nom === '' && $erreur_mdp === '') {
        $n = 1;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion-arnas.css">
    <title>Connexion - Arnas</title>
</head>

<body>
    <header>
        <div class="header">
            <div class="card-1">
                <img src="Images - Arnas/Logo_Arnas.svg" id="logoArnas">
            </div>
            <div class="card-2">
                <a href="Accueil-Arnas.php">accueil</a>
                <a href="#">vie municipale</a>
                <a href="#">vie quotidienne</a>
                <a href="Demarches-Arnas.php">demarches</a>
            </div>
        </div>
    </header>

    <div class="body">
        <h1>Connexion</h1>
        <form action="Connexion-Arnas.php" method="post">
            <div>
                <?php if ($erreur_nom): ?>
                    <p style="color: red;"><?= $erreur_nom ?></p>
                <?php endif; ?>
                <input type="text" placeholder="Nom d'utilisateur" name="nom"
                    value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>">
            </div>

            <div>
                <?php if ($erreur_mdp): ?>
                    <p style="color: red;"><?= $erreur_mdp ?></p>
                <?php endif; ?>
                <input type="password" placeholder="Mot de passe" name="mdp">
            </div>

            <button name="bouton">Connexion</button>

            <?php if ($n === 1): ?>
                <p style="color: green;">Bravo ! Connexion réussie.</p>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>