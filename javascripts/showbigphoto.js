$(document).ready(function () {
    autosize();
})

window.onresize = function () {
    autosize();
};

function autosize() {
    var hh = document.documentElement.clientHeight;
    var ww = document.documentElement.clientWidth;
    var div = document.getElementById("imgdiv");
    var img = $("#imgdiv img")[0];
    var wh = img.offsetWidth / img.offsetHeight;
    if (img.offsetHeight > img.offsetWidth) {
        var imgh = hh * 0.8;
        var imgw = (hh * 0.8) * wh;
        if (imgw >= ww) {
            imgw = ww * 0.8;
            imgh = (ww * 0.8) / wh;
        }
        img.style.height = imgh + "px";
        img.style.width = imgw + "px";
    } else {
        var imgw = ww * 0.8;
        var imgh = (ww * 0.8) / wh;
        if (imgh >= hh) {
            imgh = hh * 0.8;
            imgw = (hh * 0.8) * wh;
        }
        img.style.width = imgw + "px";
        img.style.height = imgh + "px";
    }
    div.style.height = img.offsetHeight + "px";
    div.style.width = img.offsetWidth + "px";
    div.style.top = (hh - img.offsetHeight - 10) / 2 + "px";
    div.style.left = (ww - img.offsetWidth - 10) / 2 + "px";
}