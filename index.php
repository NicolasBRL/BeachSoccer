<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeachSoccer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">

</head>
<body>
    <?php require 'db.php'; ?>

    <div class="main__container">
        <header>
            <img src="assets/img/logo.png">
            <nav>
                <ul>
                    <li><a href="#" class="active">Discover</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">How it Works</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <div class="left__col">
            <?php 
                // Vérifie si le terrain existe
                $findTerrain = false;
                if(isset($_POST['search'])){
                    $search = $_POST['search'];
                    $stmt = $pdo->prepare("SELECT * FROM terrains WHERE nom LIKE '%".$search."%'");
                    $stmt->execute(); 
                    $terrains = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $findTerrain = $terrains;
                    
                } ?>

                <?php if($findTerrain) : ?>
                    <a class="back-link" href=".">Retour</a>
                    <h1>Résultat  </h1>
                    <?php
                        foreach ($terrains as $row => $terrain) {
                            echo  "<p>".$terrain['nom']."</p>";
                        }
                    ?>
                <?php else : ?>
                    <span>Make New Friends over</span>
                    <h1>Beach Football</h1>
                    <p>Challenge your friends and play together a game 
                    of Beach Football at your nearest beach.</p>

                    <form method="POST">
                        <div class="input__search">
                            <input type="text" name="search" placeholder="Search beach arenas">
                            <button type="submit">
                                <img src="assets/img/arrow.svg">
                            </button>
                        </div>
                        <?php if (isset($_POST['search']) && !$findTerrain) : ?><p class="error">Aucun terrain trouvé</p><?php endif; ?>
                    </form>

                    <p class="text_petit"><strong>Popular Beach Arenas:</strong> Virginia, California, Texas</p>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <img src="assets/img/tree.png" class="tree">
</body>
</html>