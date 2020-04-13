<?php

echo $this->header;
?>
    <head>
        <!--<link rel="stylesheet" type="text/css" href="css/design.css">-->
        <link rel="stylesheet" type="text/css" href="css/scoreTabelle.css">
        <meta charset="UTF-8">
        <title>Bunny Chase</title>
        <!--<script src="js/game.js"></script>-->
    </head>
    <body onload="startGame()">
    <img src="js/Bilder/Osterhase1.png" alt="logo" height="80" width="80" id="hasi">
    <table class="navbar-nav">
        <thead>
        <tr>
            <th class="nav-item<?php if($this -> current == "game"):?>active<?php endif;?>">
                <a class="nav-link" href="game">Game</a>
            </th>
            <th class="nav-item<?php if($this -> current == "highscore"):?>active<?php endif;?>">
                <a class="nav-link" href="highscore">Highscore</a>
            </th>
            <th class="nav-item<?php if($this -> current == "about"):?>active<?php endif;?>">
                <a class="nav-link" href="about">About</a>
            </th>
        </tr>
        </thead>
    </table>
    <img src="js/Bilder/Bunnz-chace.png" alt="hallo" height="100" width="80" id="hase">
    <button onclick="play()" id="play">PLAY</button>
    <button onclick="myGameArea.stop()" id="stop">Stop</button>

    <p id="points">Gefangen: 0</p>
    <p id="life">Leben: 3</p>

    <!--My Modal -->
    <div id="myModal" class="scoreModal">
        <div class="scoreModal-content">
            <span class="close">&times;</span>

            <table id="score">
                <thead id="thead">
                <tr>
                    <th class="el">User_id</th>
                    <th class="el">Nickname</th>
                    <th class="el">Score_id</th>
                    <th class="el">Score</th>
                </tr>
                </thead>
                <tbody id="tbody">
                <?php
                //muss verändert werden
                $sql = "SELECT u.`id`, u.`name`, s.`score_id`, s.`score`
                        FROM `user` AS u
                        JOIN score AS s
                        ON s.`userId` = u.`id`
                        ORDER BY s.`score` DESC";
                //to get the username?
                //$username = $_POST['username'];
                /*mit username kann man die id ermitteln
                In User.php login schauen
                Mit der id kann man in der score tabelle
                ein neues score erstellen wo count als score
                gespeichert wird mit der überprüfung userId = id
                Eine php Funktion erstellen?
                */


                $conn = (new Database)->getConn();
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row =  mysqli_fetch_assoc($result)) {
                        echo "<tr><th class='el'>" . $row["id"]. "</th>
                            <th class='el'>" . $row["name"]. "</th>
                            <th class='el'>" . $row["score_id"]. "</th>
                            <th class='el'>" . $row["score"]. "</th></tr>";
                    }
                } else {
                    echo "0 results";
                }
                @mysqli_close($conn);
                ?>
                </tbody>
            </table>
        </div>
    </div>
    </body>

<script>
    var modal = document.getElementById("myModal");

    var span = document.getElementsByClassName("close")[0];

    function openModal() {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<?php

echo $this->footer;

?>