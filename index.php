<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>BeachSoccer</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

</head>

<body>
    <?php require 'db.php'; ?>
    <?php
        if(isset($_POST['search_arena'])) {
            $id_city = $_POST['search_arena'];
            $stmt = $pdo->prepare("SELECT maps_url FROM terrains WHERE id=".$id_city.";");
            $stmt->execute();
            $terrains = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <script>
                    $(document).ready(function(){
                        window.open('<?= $terrains[0]['maps_url'] ?>', "_blank"); // will open new tab on document ready
                    });
                </script>
            <?php
        }
    ?>
    
    <script>
        $(function() {
            $.get("get-arenas.php", function(data) {
                $.each(JSON.parse(data), function(k, v) {
                    $("#seach_arena").append($('<option>', {
                        value: v.id,
                        text: v.nom
                    }));
                })
            });
        })
    </script>

    
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
                <span>Make New Friends over</span>
                <h1>Beach Football</h1>
                <p>Challenge your friends and play together a game
                    of Beach Football at your nearest beach.</p>

                <form method="POST">
                    <div class="input__search">
                        <select id="seach_arena" name="search_arena" placeholder="Search beach arenas">
                            <option value="" disabled selected>Search beach arenas</option>
                        </select>
                        <button type="submit">
                            <img src="assets/img/arrow.svg">
                        </button>
                    </div>
                </form>

                <p class="text_petit"><strong>Popular Beach Arenas:</strong> Virginia, California, Texas</p>

            </div>
        </main>
    </div>

    <img src="assets/img/tree.png" class="tree">
</body>

</html>