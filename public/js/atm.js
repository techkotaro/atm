/* ↓ 口座番号の取り扱いのためのヒント */
let accountId;

$(function(){
    $(".menuItem").on("click", function(){
        switchingShowContent(this);
    });

    $("#accountOpning").on("click", function(){
        $("#accountOpningErea").addClass("none");
        $("#accountMenu").removeClass("none");
    });
});

// メニューを選択した時の画面表示の切り替え
// 引数はクリックされたDOM自身が入ってくるのを想定しておく
function switchingShowContent(targetElement)
{
    classInit();
    // id名を自身から取得して、removeClassする対象を決定する
    var idName = $(targetElement).attr("id");
    $("#" + idName + "Erea").removeClass("none");
    $("#" + idName + "Num").checkbalanceAPI();
}

// classがあるので、それを利用して一括でcss反映
function classInit(){
    $(".content").addClass("none");
}

//APIの利用
function checkbalanceAPI(){
    var request = new XMLHttpRequest();
    request.open('GET', 'http://localhost:8888/atm/public/balanceReference/', true);
    request.responseType = 'json';
 
    request.onload = function () {
      var data = this.response;
      console.log(data);
    };
    var deposit_balance = data.deposit.deposit_balance;
    request.send();
}