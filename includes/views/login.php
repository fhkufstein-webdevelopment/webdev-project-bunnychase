<?php

echo $this->header;

?>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" CONTENT="ie=edge">
        <title>Bunny chase</title>
        <link rel="schortcut icon" type="image/png" href="css/Bilder/easter-egg.png">

    </head>
    <body>
    <div id="main">
        <p class="bunny">BUNNY</p>
        <p class="chase">CHASE</p>
        <div class="row">
            <h1 class="col-6 col-md-4">Login</h1>

            <form method="post" action="login" class="form-horizontal col-xs-12">
                <?php if ($this->errorPasswd == true): ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4>Benutzername und/oder Passwort sind falsch</h4>
                        <p>Prüfen Sie bitte ob Sie sich nicht vertippt haben und versuchen Sie es erneut!</p>
                    </div>
                <?php endif; ?>


                <div class="form-group">
                    <label for="username" class="col-6 col-md-4">Benutzername</label>
                    <div class="col-xs-12 col-md-4">
                        <input type="text" name="username" id="username" class="text form-control" value=""
                               placeholder="Benutzername">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-6 col-md-4">Passwort</label>
                    <div class="col-xs-12 col-md-4">
                        <input type="password" name="password" id="password" class="text form-control" value=""
                               placeholder="Passwort">
                    </div>
                </div>
                <button type="submit" class="">Anmelden</button>
                <input type="hidden" name="action" value="login">
            </form>

            </br>
            <p class="form-check col-xs-12">
                Melden Sie sich bitte an um den Dienst nutzen zu können. Sie besitzen noch keinen Account? Dann können
                Sie sich <a href="login#registrierung" class="registerOverlay">hier registrieren</a>.
            </p>
        </div>
    </div>

    <div class="modal fade<?php if ($registerError): ?> in<?php endif; ?>" id="registerModal" tabindex="-1"
         role="dialog" aria-labelledby="registerModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="registerModalLabel">Registrierung</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <p class="col-xs-12">
                            Wir benötigen folgende Angaben um Sie für unseren Dienst registrieren zu können:
                        </p>

                        <form method="post" action="login" class="col-xs-12">

                            <div class="form-group">
                                <label for="name">Benutzername:</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="Benutzernamen eingeben">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Passwort (mindestens 8 Zeichen):</label>
                                <input type="password" name="pwd" class="form-control" id="pwd"
                                       placeholder="Bitte Passwort eingeben (mind. 8 Zeichen)">
                            </div>
                            <div class="form-group">
                                <label for="pwd2">Passwort (wiederholen):</label>
                                <input type="password" name="pwd2" class="form-control" id="pwd2"
                                       placeholder="Bitte das Passwort wiederholen">
                            </div>

                            <input type="hidden" name="action" value="register">

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="" data-dismiss="modal">Abbrechen</button>
                    <button type="button" class="">Registrieren</button>
                </div>
            </div>
        </div>
    </div>

    <section>

        <div class="set">

            <div><img src="./css/Bilder/EGG-4.png" alt="Egg4"/></div>
            <div><img src="./css/Bilder/EGG-1.png" alt="Egg1"/></div>
            <div><img src="./css/Bilder/EGG-2.png" alt="Egg2"/></div>
            <div><img src="./css/Bilder/EGG-3.png" alt="Egg3"/></div>
            <div><img src="./css/Bilder/EGG-4.png" alt="Egg4"/></div>
            <div><img src="./css/Bilder/EGG-1.png" alt="Egg1"/></div>
            <div><img src="./css/Bilder/EGG-2.png" alt="Egg2"/></div>
            <div><img src="./css/Bilder/EGG-3.png" alt="Egg3"/></div>
        </div>
        <div class="set set2">

            <div><img src="./css/Bilder/EGG-4.png" alt="Egg4"/></div>
            <div><img src="./css/Bilder/EGG-1.png" alt="Egg1"/></div>
            <div><img src="./css/Bilder/EGG-2.png" alt="Egg2"/></div>
            <div><img src="./css/Bilder/EGG-3.png" alt="Egg3"/></div>
            <div><img src="./css/Bilder/EGG-4.png" alt="Egg4"/></div>
            <div><img src="./css/Bilder/EGG-1.png" alt="Egg1"/></div>
            <div><img src="./css/Bilder/EGG-2.png" alt="Egg2"/></div>
            <div><img src="./css/Bilder/EGG-3.png" alt="Egg3"/></div>
        </div>
        <div class="set set3">

            <div><img src="./css/Bilder/EGG-4.png" alt="Egg4"/></div>
            <div><img src="./css/Bilder/EGG-1.png" alt="Egg1"/></div>
            <div><img src="./css/Bilder/EGG-2.png" alt="Egg2"/></div>
            <div><img src="./css/Bilder/EGG-3.png" alt="Egg3"/></div>
            <div><img src="./css/Bilder/EGG-4.png" alt="Egg4"/></div>
            <div><img src="./css/Bilder/EGG-1.png" alt="Egg1"/></div>
            <div><img src="./css/Bilder/EGG-2.png" alt="Egg2"/></div>
            <div><img src="./css/Bilder/EGG-3.png" alt="Egg3"/></div>
        </div>
    </section>
    </body>
<?php

echo $this->footer;

?>