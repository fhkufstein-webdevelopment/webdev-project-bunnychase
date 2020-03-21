var meinInterval;
function play() {
    meinInterval = setInterval(function () {
        var elem = document.createElement("img");
        elem.id = "egg";
        elem.src = 'easter-egg.png';
        elem.height = 35;
        elem.width = 30;
        var groesse = document.getElementById("container").offsetWidth;
        console.log(groesse);
        var pos = Math.floor(Math.random()*groesse)+11;
        elem.style.position = "absolute";
        elem.style.left = pos+'px';

        var newDiv = document.createElement("div");
        newDiv.appendChild(elem);
        document.body.insertBefore(newDiv, document.getElementById("container"));
    },3000);
}

function stop() {
    clearInterval(meinInterval);
}