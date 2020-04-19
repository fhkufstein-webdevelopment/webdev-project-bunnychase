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
                     <p>Bewege die Pfeiltasten um den Hasen nach links & rechts zu bewegen. </br>Fange ein Ei und bekomme Punkte. Fange eine Karotte und bekomme ein zusätzliches Leben.</p>

                        <table>
                            <thead>
                                <tr>
                                    <th><button onclick="play()" id="play" class="btn-primary">PLAY</button></th>
                                    <th id="points">Gefangen: 0</th>
                                </tr>
                                <tr>
                                    <th><button onclick="play()" id="play" class="btn btn-primary">PLAY</button></th>
                                    <th><button onclick="myGameArea.stop()" id="stop" class="btn btn-light" >Stop</button></th>
                                    <th><button onclick="myGameArea.stop()" id="stop">Stop</button></th>
                                    <th id="life">Leben: 3</th>
                                </tr>
                            </thead>
                        </table>
            </div>
        </div>
    </div>

    <script>
        function newLoad() {
            location.reload();
        }
    </script>

    </body>
<?php

echo $this->footer;

?>