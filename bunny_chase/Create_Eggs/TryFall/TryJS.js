var myGamePiece = [];
var myInterval;
var i = 0;

function startGame() {
    myGameArea.start();
    var hase = document.getElementById("hase");
    var can = document.getElementById("canvas");
    hase.style.top = can.offsetTop+can.offsetHeight-hase.offsetHeight +'px';
    hase.style.left = can.offsetLeft +'px';
}


var pos = 25;    //position auf der x-Axe des Hasen (am Anfang 0);
window.onkeydown = function (e) {
    var elem = document.getElementById("hase");
    var keyboardEvent = e.keyCode;
    var limit = document.getElementById("canvas").offsetWidth;
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
        this.canvas.width = 1644;
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
        if (this.y > bottom) {
            this.y = bottom;
        }
    }
}

function updateGameArea() {
    myGameArea.clear();
    for (var j = 0; j <= i; j++) {
        myGamePiece[j].newPos();
        myGamePiece[j].update();
    }
}