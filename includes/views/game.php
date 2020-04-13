<?php

echo $this->header;
?>
    <head>
        <link rel="stylesheet" type="text/css" href="css/design.css">
        <meta charset="UTF-8">
        <title>Bunny Chase</title>
        <script src="js/game.js"></script>
    </head>
    <body onload="startGame()">
    <h1 id="logo">Logo</h1>
    <table>
        <thead>
        <tr>
            <th>Game</th>
            <th>Highscore</th>
            <th>Register</th>
            <th>Kontakt</th>
            <th>About</th>
        </tr>
        </thead>
    </table>
    <img src="js/Bilder/Bunnz-chace.png" alt="hallo" height="100" width="80" id="hase">
    <button onclick="play()" id="play">PLAY</button>
    <button onclick="myGameArea.stop()" id="stop">Stop</button>

    <p id="points">0</p>
    <p id="life">3</p>
    </body>
<?php

echo $this->footer;

?>