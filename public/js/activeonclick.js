var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("_btn");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("_active");
        current[0].className = current[0].className.replace(" _active", "");
        this.className += " _active";
    });
}