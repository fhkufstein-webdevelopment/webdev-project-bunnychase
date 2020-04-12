<?php

echo $this->header;
?>
    <head>
        <!--<link rel="stylesheet" type="text/css" href="css/design.css">-->
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
    </body>
<?php

echo $this->footer;

?>