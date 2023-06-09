$(document).ready(function () {
    updateTotalCost();
});

function updateTotalCost(){
    let allInputs = $("input[type='number']");
    var totalPrice = 0;
    allInputs.each(function () {
        totalPrice += +$(this).closest("div").find("span")[1].innerHTML;
    });
    $("#totalCost").text(totalPrice);
}

function updateCost(x) {
    let amount = +$(x).val();
    // check input is positive integer
    if(amount < 0 || !Number.isInteger(amount)){
        $(x).val(0);
        amount = 0;
    }
    // calculate goods price
    let onePrice = +$(x).closest("div").find("span")[0].innerHTML;
    var priceHolder = $(x).closest("div").find("span")[1];
    $(priceHolder).text(amount * onePrice);

    updateTotalCost();
}

function cancelPurchase(btn){
    // double check
    let pName = $(btn).closest("div.card").find("h4").text();
    if(!confirm("確定將 ' "+pName+" ' 撤出購物車？")){
        alert("已取消撤出購物車");
        return;
    }
    // remove from db
    $.ajax({
        url: "cancelPurchase.php",
        type: "POST",
        data: {
            pName: pName
        },
        success: function (response) {
            if(response == "success"){
                alert(pName+"已從購物車撤出");
                // remove from website
                $(btn).closest("div.card").remove();
                // update total cost
                updateTotalCost();
            }else{
                alert("商品撤出購物車失敗");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("商品撤出購物車失敗");
        }
    });
}

