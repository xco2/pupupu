var vm=avalon.define({
    $id:"post",
    name:"",
    code:"",
    pubkey:"",
    topost:function () {
        //alert(vm.name+","+vm.code+","+vm.pubkey);
        $.post("?cr=creat", {name: vm.name, code: vm.code, pubKey: vm.pubkey}, function (result) {
            //console.log(result);//输入相应的内容
            location.href='../index.html';
        });

    }
})
var sea=avalon.define({
    $id:"sea",
    code:"",
    serch:function () {
        //alert(sea.code);
        serchKeyByCode();
    }
})

var serchKeyByCode = function () {

    document.getElementById("answer").style.display="block";
    document.getElementById("mi").style.height="auto";
    var data = sea.code;
    //validateData(data);//验证数据
    //步骤一:创建异步对象
    var ajaxPost = new XMLHttpRequest();

    ajaxPost.open('post', 'serchKeyByCode.php');
    ajaxPost.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //步骤三:发送请求
    ajaxPost.send("codeForSearch=" + data);
    //步骤四:注册事件 onreadystatechange 状态改变就会调用
    ajaxPost.onreadystatechange = function () {

        if (ajaxPost.readyState == 4 && ajaxPost.status == 200) {
            //步骤五 如果能够进到这个判断 说明 数据 完美的回来了,并且请求的页面是存在的
            var result = ajaxPost.responseText
            console.log(result);//输入相应的内容
            result = JSON.parse(result);//把string 解释成js对象


            var name = result.name;

            $('#searchNameResult').text(name)

            var publicKey = result.publicKey;
            $('#searchKeyResult').text(publicKey)


        }
    };
}