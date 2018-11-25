$(document).ready(function () {
    var hh = document.documentElement.clientHeight;
    var ww = document.documentElement.clientWidth;
    var ho = hh * 0.7;

    document.getElementById("showfile_back").style.height = ho + "px";
    document.getElementById("showfile_back").style.top = (hh - ho) / 2 + "px";
    document.getElementById("showfile_back").style.left = ww * 0.1 - 25 + "px";
    document.getElementsByTagName("body")[0].style.height = hh + "px";

    //切换类型时隐藏其他
    var yinchang = function () {
        document.getElementById("jpg").style.cssText = "display:none !important;";
        document.getElementById("png").style.cssText = "display:none !important;";
        document.getElementById("pdf").style.cssText = "display:none !important;";
        document.getElementById("rar").style.cssText = "display:none !important;";
        document.getElementById("apk").style.cssText = "display:none !important;";
        document.getElementById("psd").style.cssText = "display:none !important;";
        document.getElementById("docx").style.cssText = "display:none !important;";
    }

    //上传时获取文件名
    $("#photo").change(function () {
            var jp = $(this).val() + "";
            var filePath = jp.split('\\');
            document.getElementById("filename").innerText = filePath[2];
        }
    );
    //切换类型
    $("#filetype").change(function () {
        var type = $("#filetype").val();
        switch (type) {
            case "jpg":
                yinchang();
                document.getElementById("jpg").style.cssText = "display:block !important;";
                break;
            case "png":
                yinchang();
                document.getElementById("png").style.cssText = "display:block !important;";
                break;
            case "pdf":
                yinchang();
                document.getElementById("pdf").style.cssText = "display:block !important;";
                break;
            case "rar":
                yinchang();
                document.getElementById("rar").style.cssText = "display:block !important;";
                break;
            case "apk":
                yinchang();
                document.getElementById("apk").style.cssText = "display:block !important;";
                break;
            case "psd":
                yinchang();
                document.getElementById("psd").style.cssText = "display:block !important;";
                break;
            case "docx":
                yinchang();
                document.getElementById("docx").style.cssText = "display:block !important;";
                break;
        }
    })


    $(".tupian").click(function () {
        var img=this.children;
        window.open(img[0].src);
    })
});

$("#jpg").ready(function () {
    var per = document.getElementById("jpg");
    var pw = per.offsetWidth;//div的宽度
    var mun = Math.floor(pw / 220);//一行放多少个
    var h = [];//各行高度
    var item = per.children;
    var maxh = 0;
    for (var i = 0; i < mun; i++) {
        h[i] = 0;
    }
    for (var i = 2; i < item.length; i++) {
        if (i - 2 < mun) {
            item[i].style.left = (i - 2) * 220 + 5 + "px";
            item[i].style.top = 53 + "px";
            h[i - 2] = item[i].offsetHeight;
        } else {
            var minh = 0;
            for (var j = 0; j < h.length; j++) {
                if (h[j] < h[minh]) {
                    minh = j;
                }
            }
            item[i].style.left = minh * 220 + 5 + "px";
            item[i].style.top = h[minh] + 53 + "px";
            h[minh] = h[minh] + item[i].offsetHeight;
        }
    }

    for (var i = 0; i < mun; i++) {
        if (h[i] > maxh) {
            maxh = h[i];
        }
    }
    document.getElementById("jpg").style.height = maxh + "px";
})

$("#png").ready(function () {
    var per = document.getElementById("png");
    var pw = per.offsetWidth;//div的宽度
    var mun = Math.floor(pw / 220);//一行放多少个
    var h = [];//各行高度
    var item = per.children;
    var maxh = 0;
    for (var i = 0; i < mun; i++) {
        h[i] = 0;
    }
    for (var i = 2; i < item.length; i++) {
        if (i - 2 < mun) {
            item[i].style.left = (i - 2) * 220 + 5 + "px";
            item[i].style.top = 53 + "px";
            h[i - 2] = item[i].offsetHeight;
        } else {
            var minh = 0;
            for (var j = 0; j < h.length; j++) {
                if (h[j] < h[minh]) {
                    minh = j;
                }
            }
            item[i].style.left = minh * 220 + 5 + "px";
            item[i].style.top = h[minh] + 53 + "px";
            h[minh] = h[minh] + item[i].offsetHeight;
        }
    }

    for (var i = 0; i < mun; i++) {
        if (h[i] > maxh) {
            maxh = h[i];
        }
    }
    document.getElementById("png").style.height = maxh + "px";
    document.getElementById("png").style.display="none";
})


