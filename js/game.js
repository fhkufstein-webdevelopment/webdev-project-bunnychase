//Variablen die später gebraucht werden
var myGamePiece, myGamePiece2, interval1, interval2, mainInterval, carrotInterval, carrot;
var speed = 1.5;
var count = 0, life = 3;


//Die erste Funktion die beim Laden des Spieles ausgeführt wird
function startGame() {
    myGameArea.start(); //ich erstelle das Spielfeld
    var hase = document.getElementById("hase");
    var can = document.getElementById("canvas"); //Mein Spielfeld

    //Positionnierung des Hasen damit er im Spielfeld ist
    hase.style.top = can.offsetTop+can.offsetHeight-hase.offsetHeight-(hase.offsetHeight/2) +'px';
    hase.style.left = can.offsetLeft +'px';
}

//Funktion die den Hasen bewegt
window.onkeydown = function(e) {
    var hase = document.getElementById("hase");
    var can = document.getElementById("canvas");
    var keyboardEvent = e.keyCode;
    var leftHase = hase.offsetLeft;
    var rightHase = hase.offsetLeft + hase.offsetWidth;
    var leftCan = can.offsetLeft;
    var rightCan = can.offsetLeft + can.offsetWidth;
    if (keyboardEvent === 37 && leftHase-10>=leftCan) {
        if (hase.src === "http://localhost:63342/webdev-project-bunnychase/bunny_chase/Spiel_ohneDesign/Bunnz-chace.png") {
            hase.src = "http://localhost:63342/webdev-project-bunnychase/bunny_chase/Spiel_ohneDesign/Hase-korb-links.png";
        }
        hase.style.left = leftHase-10 +'px';
    } else if (keyboardEvent === 39 && rightHase+10<=rightCan) {
        if (hase.src === "http://localhost:63342/webdev-project-bunnychase/bunny_chase/Spiel_ohneDesign/Hase-korb-links.png") {
            hase.src = "http://localhost:63342/webdev-project-bunnychase/bunny_chase/Spiel_ohneDesign/Bunnz-chace.png";
        }
        hase.style.left = leftHase+10+'px';
    }
};



var create = {
    piece1 : function () {
        myGamePiece = new component(35, 40, Math.floor(Math.random() * (document.getElementById("canvas").offsetWidth-20)), 0);
    },
    piece2 : function () {
        myGamePiece2 = new component(35, 40, Math.floor(Math.random() * (document.getElementById("canvas").offsetWidth-20)), 0);
    },
    carrot : function () {
        carrot = new createCarrot(35, 40, Math.floor(Math.random()*(document.getElementById("canvas").offsetWidth/2))
            + document.getElementById("canvas").offsetWidth/4, 0);
    }
};


//Wird ausgeführt wenn man auf den Button Play drückt
function play() {
    var i = 0;
    mainInterval = setInterval(function () {
        if (i===0) {
            create.piece1();
            interval1 = setInterval(updateGameArea, 20);
            i++;
        } else if (i===1) {
            create.piece2();
            clearInterval(interval1);
            interval2 = setInterval(updateGameAreaMain, 20);
            i++;
        } else {
            clearInterval(this.interval);
        }
    },  3000);
}


//Mein Spielfeld
var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.id = "canvas";
        this.canvas.height = 500;
        this.canvas.width = 1200;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.getElementById('logo'));
    },
    stop : function() {
        clearInterval(mainInterval);
        clearInterval(interval1);
        clearInterval(interval2);
        clearInterval(carrotInterval);
    },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
};



function component(width, height, x, y) {
    var ran = Math.floor(Math.random()*4)+1;

    this.width = width;
    this.height = height;
    this.speed = speed;
    this.x = x;
    this.y = y;
    if (ran !== 1) {
        this.height += 5;
    }
    this.update = function() {
        ctx = myGameArea.context;
        ctx.save();
        ctx.translate(this.x, this.y);
        var img = document.createElement("img");
        if (ran === 1) {
            img.src = 'http://localhost:63342/webdev-project-bunnychase/js/Bilder/easter-egg.png';
        } else if (ran === 2) {
            img.src = 'http://localhost:63342/webdev-project-bunnychase/js/Bilder/Egg1.png';
        } else if (ran === 3) {
            img.src = 'http://localhost:63342/webdev-project-bunnychase/js/Bilder/Egg2.png';
        } else if (ran === 4) {
            img.src = 'http://localhost:63342/webdev-project-bunnychase/js/Bilder/Egg3.png';
        }
        console.log(img.src);
        ctx.drawImage(img, 0,0, this.width, this.height);
        ctx.restore();
    };
    this.newPos = function (piece) {
        this.y += this.speed;
        this.hitBottom(piece);
    };
    this.hitBottom = function (piece) {
        var bottom = myGameArea.canvas.height;
        if ((this.y + this.height)>= bottom) {
            document.getElementById("life").innerText = --life+"";
            if (life<=0) {
                myGameArea.stop();
                alert("Du hast keine Leben mehr!\nDu hast "+count+" Eier gefangen");

                $.ajax({
                    'url':    'game', //DasSpiel ---  Spiel   ?????
                    'method': 'post',
                    'data':    {'action': 'saveScore', 'score': count},
                    'success': function(receivedData) {
                        if(receivedData.result) {
                            //after save change url to scoreboard
                            location.href = 'scoreboard';
                        }
                    }
                });

            }
            myGameArea.context.clearRect(this.x, this.y, this.width, this.height);
            if (piece === "piece1") {
                create.piece1();
            } else if (piece === "piece2") {
                create.piece2();
            }
        }
    };
    this.hitCorb = function() {
        var can = document.getElementById("canvas");
        var hase = document.getElementById("hase");

        var eggTop = this.y + can.offsetTop;
        var eggBottom = eggTop+this.height;
        var eggLeft = this.x + can.offsetLeft;
        var eggRight = eggLeft+this.width;

        var corbLeft, corbRight;
        var corbBottom = hase.offsetTop+hase.offsetHeight;
        var corbTop = corbBottom-20;

        if (hase.src === "http://localhost:63342/webdev-project-bunnychase/bunny_chase/Spiel_ohneDesign/Bunnz-chace.png") {
            corbLeft = hase.offsetLeft+(hase.offsetWidth/2);
            corbRight = hase.offsetLeft+hase.offsetWidth;

        } else if (hase.src === "http://localhost:63342/webdev-project-bunnychase/bunny_chase/Spiel_ohneDesign/Hase-korb-links.png") {
            corbLeft = hase.offsetLeft;
            corbRight = corbLeft+(hase.offsetWidth/2);
        }
        return (corbTop <= eggBottom) && (corbLeft<= eggRight) &&
            (corbRight >= eggLeft) && (corbBottom >= eggTop);
    }
}



function updateGameAreaMain() {
    if (myGamePiece.hitCorb()) {
        document.getElementById("points").innerText = ++count + "";
        myGameArea.context.clearRect(myGamePiece.x, myGamePiece.y,
            myGamePiece.width, myGamePiece.height);
        create.piece1();
        if ((count%10) === 0) {
            create.carrot();
            speed += 0.15;
            clearInterval(interval2);
            carrotInterval = setInterval(updateGameAreaWithCarrot, 20);
        }
    } else if (myGamePiece2.hitCorb()) {
        document.getElementById("points").innerText = ++count + "";
        myGameArea.context.clearRect(myGamePiece2.x, myGamePiece2.y,
            myGamePiece2.width, myGamePiece2.height);
        create.piece2();
        if ((count%10) === 0) {
            create.carrot();
            speed += 0.15;
            clearInterval(interval2);
            carrotInterval = setInterval(updateGameAreaWithCarrot, 20);
        }
    } else {
        myGameArea.clear();
        myGamePiece.newPos("piece1");
        myGamePiece2.newPos("piece2");
        myGamePiece.update();
        myGamePiece2.update();
    }
}

function updateGameArea() {
    if (myGamePiece.hitCorb()) {
        document.getElementById("points").innerText = ++count + "";
        myGameArea.context.clearRect(myGamePiece.x, myGamePiece.y,
            myGamePiece.width, myGamePiece.height);
        create.piece1();
    } else {
        myGameArea.clear();
        myGamePiece.newPos("piece1");
        myGamePiece.update();
    }
}

function updateGameAreaWithCarrot() {
    if (myGamePiece.hitCorb()) {
        document.getElementById("points").innerText = ++count + "";
        myGameArea.context.clearRect(myGamePiece.x, myGamePiece.y,
            myGamePiece.width, myGamePiece.height);
        create.piece1();
    } else if (myGamePiece2.hitCorb()) {
        document.getElementById("points").innerText = ++count + "";
        myGameArea.context.clearRect(myGamePiece2.x, myGamePiece2.y,
            myGamePiece2.width, myGamePiece2.height);
        create.piece2();
    } else if (carrot.hitCorb()) {
        document.getElementById("life").innerText = ++life+"";
        myGameArea.context.clearRect(carrot.x, carrot.y,
            carrot.width, carrot.height);
        clearInterval(carrotInterval);
        interval2 = setInterval(updateGameAreaMain, 20);
    } else {
        myGameArea.clear();
        myGamePiece.newPos("piece1");
        myGamePiece2.newPos("piece2");
        carrot.newPos();
        myGamePiece.update();
        myGamePiece2.update();
        carrot.update();
    }
}



function createCarrot(width, height, x, y) {
    this.width = width;
    this.height = height;
    this.speed = 1.2;
    this.x = x;
    this.y = y;
    this.update = function() {
        ctx = myGameArea.context;
        ctx.save();
        ctx.translate(this.x, this.y);
        var img = document.createElement("img");
        img.src = 'http://localhost:63342/webdev-project-bunnychase/js/Bilder/carrot.png';
        ctx.drawImage(img, 0,0, this.width, this.height);
        ctx.restore();
    };
    this.newPos = function () {
        this.y += this.speed;
        this.hitBottom();
    };
    this.hitBottom = function () {
        var bottom = myGameArea.canvas.height;
        if ((this.y + this.height)>= bottom) {
            clearInterval(carrotInterval);
            interval2 = setInterval(updateGameAreaMain, 20);
        }
    };
    this.hitCorb = function() {
        var can = document.getElementById("canvas");
        var hase = document.getElementById("hase");

        var carrotTop = this.y + can.offsetTop;
        var carrotBottom = carrotTop+this.height;
        var carrotLeft = this.x + can.offsetLeft;
        var carrotRight = carrotLeft+this.width;

        var corbLeft, corbRight;
        var corbBottom = hase.offsetTop+hase.offsetHeight;
        var corbTop = corbBottom-20;

        if (hase.src === "http://localhost:63342/webdev-project-bunnychase/bunny_chase/Spiel_ohneDesign/Bunnz-chace.png") {
            corbLeft = hase.offsetLeft+(hase.offsetWidth/2);
            corbRight = hase.offsetLeft+hase.offsetWidth;
        } else if (hase.src === "http://localhost:63342/webdev-project-bunnychase/bunny_chase/Spiel_ohneDesign/Hase-korb-links.png") {
            corbLeft = hase.offsetLeft;
            corbRight = corbLeft+(hase.offsetWidth/2);
        }
        return (corbTop <= carrotBottom) && (corbLeft <= carrotRight) &&
            (corbRight >= carrotLeft) && (corbBottom >= carrotTop);
    }
}