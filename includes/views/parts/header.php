<!DOCTYPE html>
<html lang="de">
<head>
    <title><?php echo $this->title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- Bootstrap Einbindung -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Abfrage nach Tab -->
    <?php if($this->current == "login"): ?>
     <link href="css/toastr.min.css" rel="stylesheet">
        <!--für warning, error,... Notifications-->
       <link href="css/bunny.css" rel="stylesheet">
    <?php elseif($this->current == "logout"): ?>
        <link href="css/main.css" rel="stylesheet">
        <link href="css/bunny.css" rel="stylesheet">
    <?php elseif($this->current == "highscore"): ?>
        <link href="css/main.css" rel="stylesheet">
        <link href="css/bunny.css" rel="stylesheet">
    <?php endif; ?>

    <link href="css/main.css" rel="stylesheet">


    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <?php if($this->current == "index"): ?>
        <script type="text/javascript" src="js/core.js"></script>
    <?php elseif($this->current == "register"): ?>
        <script type="text/javascript" src="js/register.js"></script>
    <?php elseif($this->current == "login"): ?>
        <script type="text/javascript" src="js/toastr.min.js"></script>
        <script type="text/javascript" src="js/login.js"></script>

    <?php endif; ?>

</head>
<body>
<header>

    <div class="inner">
        <div class="logo">
            <a  href="localhost"><img alt="Bunny-Chase" src="css/Bilder/Bunny-Chase.png" style="max-width: 150px"></a><br>
            <div class="version"> 1.0</div>
        </div>
        <?php if(LOGGED_IN == true): ?>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand active">Let's play Bunny-Chase</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="game">Game <span class="sr-only">(aktuell)</span></a></li>
                                <li><a href="highscore">Highscore</a></li>
                                <li><a href="#">Kontakt</a></li>
                            </ul>

                            <p class="navbar-text navbar-right">Angemeldet als <strong class="username"><?php echo $this->username; ?></strong></p>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                  <a href="logout" class="btn btn-default navbar-btn" style="margin: 10px; padding: 5px 10px" >Hier Abmelden</a>
                                </li>
                            </ul>

                    </div>
                </div>
            </nav>

        <?php else: ?>
            <nav class="mainnav">
                <ul class="nav nav-pills">
                    <li<?php if($this->current == "login"): ?>class="active"<?php endif; ?>><a href="login">Login</a></li>
                </ul>
            </nav>
        <?php endif; ?>

    </div>
</header>