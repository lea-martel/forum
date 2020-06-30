<?php session_start();
$pageSelected = 'profil';
if (isset($_POST["deconnexion"])) {
    session_unset();
    session_destroy();
    header('Location:index.php');
}
?>

<head>
    <title>Le Bon Game</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes" />
    <script src="https://kit.fontawesome.com/5a25ce672a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link rel="stylesheet" href="src/css/index.css">
</head>

<body>
    <header>
        <?php include("include/header.php") ?>
    </header>
    <main>

        <?php

        $bdd = mysqli_connect("localhost", "root", "", "forum");
        $myId = $_GET['id_topics'];
        $requete = "SELECT categories.*, utilisateurs.*,topics.* 
                    FROM categories 
                    INNER JOIN utilisateurs ON categories.id_utilisateurs = utilisateurs.id
                    INNER JOIN topics ON categories.id_utilisateurs = topics.id_utilisateurs WHERE topics.id = $myId";
        $query = mysqli_query($bdd, $requete);
        $datas = mysqli_fetch_all($query);

        ?>
        <div class="center"> 
        <div class="table-center">
            <table width="500" border="1">
                <tr>
                    <th>
                        Titre topics
                    </th>
                    <th>
                        Titre catégorie
                    </th>
                    <th>
                        Login
                    </th>
                    <th>
                        Date, heure de poste
                    </th>
                </tr>
                <?php


                foreach ($datas as $key => $data) {
                    echo '<tr>';
                    echo '<td>';
                    echo htmlentities(trim($datas[$key][9]));


                    echo '</td>';
                    echo '<td>';

                    // echo htmlentities(trim($datas[$key][2]));
                    echo '<a href="message.php?id=2','">', htmlentities(trim($datas[$key][3])), '</a>';
                    echo '</td>';
                    echo '<td>';
                    echo htmlentities(trim($datas[$key][6]));



                    echo '</td>';
                    echo '<td>';
                    echo htmlentities(trim($datas[$key][2]));

                    echo '</td>';
                    echo '</tr>';

                ?>
                <?php } ?>

            </table>
            </div>
        </div>
        <?php
        mysqli_free_result($query);
        ?>
        </div>
    </main>
    <footer>
        <?php include("include/footer.php") ?>
    </footer>
</body>
</html>