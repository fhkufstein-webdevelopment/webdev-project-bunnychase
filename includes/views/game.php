<?php

echo $this->header;
?>
    <head>
        <link rel="stylesheet" type="text/css" href="css/design.css">
        <link rel="stylesheet" type="text/css" href="css/scoreTabelle.css">
        <meta charset="UTF-8">
        <title>Bunny Chase</title>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/game.js"></script>
    </head>
    <body onload="startGame()">
    <img src="js/Bilder/Bunnz-chace.png" alt="hallo" height="100" width="80" id="hase">
    <div class="bgmuster">
        <div class="container">
            <div class="container-inhalt">
                <h1>Play Bunny Chase</h1>
                     <p>Bewege die Pfeiltasten um den Hasen nach links & rechts zu bewegen. Fange ein Ei und bekomme Punkte. Fange eine Karotte und bekomme ein zusätzliches Leben</p>

                        <table>
                            <thead>
                                <tr>
                                    <th>Game</th>
                                    <th><a href="highscore" class="Overlay">Highscore </a></th>
                                </tr>
                                <tr>
                                    <th><button onclick="play()" id="play" class="btn-primary">PLAY</button></th>
                                    <th><button onclick="myGameArea.stop()" id="stop">Stop</button></th>
                                </tr>
                                <tr><th id="points">Gefangen: 0</th></tr>
                                <tr><th id="life">Leben: 3</th></tr>
                            </thead>
                        </table>
            </div>
        </div>
    </div>
    </body>
<?php

echo $this->footer;

?>