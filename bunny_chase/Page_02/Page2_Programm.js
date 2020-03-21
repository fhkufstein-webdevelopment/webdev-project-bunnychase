var pos = 0;    //position auf der x-Axe des Hasen (am Anfang 0);
window.onkeydown = function (e) {
    var elem = document.getElementById("hase");
    var keyboardEvent = e.keyCode;
    var limit = document.getElementById("container").offsetWidth;
    if (keyboardEvent === 37 && pos>=10) {
        pos -= 10;
        elem.style.left = pos +'px';
    } else if(keyboardEvent === 39 && pos<=limit-elem.offsetWidth-10) {
        pos += 10;
        elem.style.left = pos + 'px';
    }
};