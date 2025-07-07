<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Calcul de moyenne</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Calcul de Moyenne</h1>
        <form method="POST">
            <label for="nom">Nom de l'élève :</label>
            <input type="text" name="nom" required>

            <label for="note1">Note 1 :</label>
            <input type="number" name="note1" min="0" max="20" required>

            <label for="note2">Note 2 :</label>
            <input type="number" name="note2" min="0" max="20" required>

            <label for="note3">Note 3 :</label>
            <input type="number" name="note3" min="0" max="20" required>

            <input type="submit" value="Calculer">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nom = htmlspecialchars($_POST['nom']);
            $note1 = floatval($_POST['note1']);
            $note2 = floatval($_POST['note2']);
            $note3 = floatval($_POST['note3']);

            $moyenne = ($note1 + $note2 + $note3) / 3;
            $moyenne = round($moyenne, 2);

            // Appréciation
            if ($moyenne >= 16 && $moyenne <= 20) {
                $appreciation = "Excellent 👍";
            } elseif ($moyenne >= 12 && $moyenne < 16) {
                $appreciation = "Bien ✅";
            } elseif ($moyenne >= 10 && $moyenne < 12) {
                $appreciation = "Passable ⚠";
            } else {
                $appreciation = "Insuffisant ❌";
            }

            echo "<div class='resultat'>";
            echo "<h2>Résultats</h2>";
            echo "<p><strong>Nom :</strong> $nom</p>";
            echo "<p><strong>Moyenne :</strong> $moyenne / 20</p>";
            echo "<p><strong>Appréciation :</strong> $appreciation</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
