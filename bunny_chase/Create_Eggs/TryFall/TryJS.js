var myGamePiece = [];
var myInterval;
var i = 0;

function startGame() {
    myGameArea.start();
    var hase = document.getElementById("hase");
    var can = document.getElementById("canvas");
    hase.style.top = can.offsetTop+can.offsetHeight-hase.offsetHeight +'px';
    hase.style.left = can.offsetLeft +'px';
    console.log(hase.style.left);
}


var pos = 25; //position auf der x-Axe des Hasen (am Anfang 0);
//var pos = 240;
window.onkeydown = function (e) {
    var elem = document.getElementById("hase");
    var keyboardEvent = e.keyCode;
    var limit = document.getElementById("canvas").offsetWidth;
    //console.log(elem.style.left);
    //var jetzt = parseInt(elem.style.left.substring(0,2));
    //console.log(jetzt);
    if (keyboardEvent === 37 && pos>25) {
        pos -= 10;
        elem.style.left = pos +'px';
    } else if(keyboardEvent === 39 && pos<limit-62) {
        pos += 10;
        elem.style.left = pos + 'px';
    }
};



function create() {
    myGamePiece[i] = new component(35, 40, Math.floor(Math.random()*document.getElementById("canvas").offsetWidth), 0);
    //console.log(myGamePiece[0].y+myGamePiece[0].height);
    i++;
}

function play() {
    myInterval = setInterval(create, 3000);
    myGameArea.interval = setInterval(updateGameArea, 20);
}

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.id = "canvas";
        this.canvas.height = 500;
        //this.canvas.width = 1644;
        this.canvas.width = 1200;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.getElementById('play'));
    },
    stop : function() {
        clearInterval(this.interval);
        clearInterval(myInterval);
    },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
};

function component(width, height, x, y) {
    this.width = width;
    this.height = height;
    this.speed = 2;
    this.x = x;
    this.y = y;
    /*if (count >= 5) {
        this.speed = 2.5;
    }*/
    this.update = function() {
        ctx = myGameArea.context;
        ctx.save();
        ctx.translate(this.x, this.y);
        var img = document.createElement("img");
        img.src = 'easter-egg.png';
        ctx.drawImage(img, this.width / -2, this.height / -2, this.width, this.height);
        ctx.restore();
    };
    this.newPos = function() {
        this.y += this.speed;
        this.hitBottom();
    };
    this.hitBottom = function () {
        var bottom = myGameArea.canvas.height - this.height/2;
        if (this.y === bottom) {
            this.y = bottom+10;
            this.x = -30;
            document.getElementById("life").innerText = --life+"";
            if (life<=0) {
                myGameArea.stop();
            }
        }
    };
    this.crashWith = function(otherobj) { //überprüft ob irgendeine Seite des Ei's ein Object berührt
        var myleft = this.x;
        var myright = this.x + (this.width);
        //var mytop = this.y;
        var mybottom = this.y + (this.height);
        var otherleft = otherobj.x;
        var otherright = otherobj.x + (otherobj.width);
        var othertop = otherobj.y;
        //console.log(othertop+";"+otherobj.style.top);
        //var otherbottom = otherobj.y + (otherobj.height);
        var crash = true;
        if ((mybottom < othertop) || /*(mytop > otherbottom) ||*/ (myright < otherleft) || (myleft > otherright)) {
            crash = false;
            //console.log(myleft+","+myright+","+mybottom+";"+otherleft+","+otherright+","+othertop);
        }
        return crash;
    }
}

var count = 0, life = 3;
function updateGameArea() {
    /*if (happend) {
        j += 1;
        happend = false;
    }*/
    myGameArea.clear();
    /*while(j<=i) {
        if (myGamePiece[j].crashWith(document.getElementById("hase"))) {
            document.getElementById("count").innerText = ++count+"";
            myGameArea.context.clearRect(myGamePiece[j].x, myGamePiece[j].y, myGamePiece[j].width, myGamePiece[j].height);  //das ei verschwindet
            happend = true;
        } else {
            myGamePiece[j].newPos();
            myGamePiece[j].update();
        }
        j++;
    }*/
    for (var j = 0; j < i; j++) {
        if (myGamePiece[j].crashWith(document.getElementById("hase"))) {
            document.getElementById("count").innerText = ++count+"";
            myGameArea.context.clearRect(myGamePiece[j].x, myGamePiece[j].y, myGamePiece[j].width, myGamePiece[j].height);  //das ei verschwindet
            //myGamePiece[j].style.zIndex = "-1";
            //myGamePiece[j].y = 0;
            myGamePiece[j].x = -30;
            myGamePiece[j].y = myGameArea.canvas.height + 10;
            //nicht die beste Lösung -> ich bewege die Eier nach rechts und unten damit sie nicht mehr im Weg sind
        }
        else {
            myGamePiece[j].newPos();
            myGamePiece[j].update();
        }

    }
}


/*
canvas design:
    margin: auto;
    display: block;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    border: 1px solid black;
    position: relative;
 */
