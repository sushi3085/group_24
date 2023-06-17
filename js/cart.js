$(document).ready(function () {
    updateTotalCost();
    $("#modalForm").validate({
        rules: {
            name: {
                required: true,
            },
            phone: {
                required: true,
                digits: true,
                minlength: 9,
                maxlength: 11,
                regex: /^09\d{8}$/
            },
            address: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "請輸入姓名",
            },
            phone: {
                required: "請輸入手機號碼",
                digits: "請輸入數字",
                minlength: "請輸入10位數字",
                maxlength: "請輸入10位數字",
                regex: "請輸入正確的格式"
            },
            address: {
                required: "請輸入地址",
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") == "name")
                error.insertAfter($("#name-error"))
            if (element.attr("name") == "phone")
                error.insertAfter($("#phone-error"))
            if (element.attr("name") == "address")
                error.insertAfter($("#address-error"))
        }
    });

    jQuery.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    });

    $("#modalForm").submit(function (e) {
        if (!$("#modalForm").valid()) {
            e.preventDefault();
            return false;
        }
        if(!confirm("確定要購買？")){
            alert("已取消購買");
            e.preventDefault();
            return false;
        }
        // ajax to update db
        $.ajax({
            url: "purchase.php",
            type: "POST",
            data: {
                "name": $("input[name='name']").val(),
                "phone": $("input[name='phone']").val(),
                "address": $("input[name='address']").val(),
            },
            success: function (response) {
                console.log(response);
                if(response == "success"){
                    alert("購買成功");
                }else{
                    alert("購買失敗");
                }
                // refresh page, put this code in here
                // because $.ajax is asynchronous
                window.location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("購買失敗");
            }
        });
        return true;
    });
});

function updateTotalCost(){
    let allInputs = $("input.amount[type='number']");
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
    // if input is 0, ask whether remove from cart
    if(amount == 0){
        let pName = $(x).closest("div.card").find("h4").text();
        if(!confirm("確定將 ' "+pName+" ' 撤出購物車？")){
            $(x).val(1);
            amount = 1;
            return;
        }
        removeProductAjax(x, pName);
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
    removeProductAjax(btn, pName);
}

function removeProductAjax(btn, pName, isAlert=true){
    // remove from db
    $.ajax({
        url: "cancelPurchase.php",
        type: "POST",
        data: {
            pName: pName
        },
        success: function (response) {
            if(response == "success"){
                if(isAlert) alert("' "+pName+"' 已從購物車撤出");
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

function removeWholeCart(){
    if(!confirm("確定將購物車內所有商品撤出？")){
        alert("已取消撤出購物車");
        return;
    }
    $(".card").each(function(i, e){
        let pName = $(e).find("h4").text();
        let btn = $(e).find("button");
        removeProductAjax(btn, pName, isAlert=false);
    });
}

function showPurchaseModal(){
    // check if cost is 0
    if(+$("#totalCost").text() == 0){
        alert("購物車內沒有商品");
        return;
    }
    // add goods in cart to modal, create new table row
    let allInputs = $("input.amount[type='number']");
    let tBody = $("#modalTableBody");
    tBody.empty();
    allInputs.each(function () {
        let amount = +$(this).val();
        if(amount == 0) return;
        let pName = $(this).closest("div.card").find("h4").first().text();
        let price = +$(this).closest("div.card").find("span").first().text();
        let newRow = $("<tr></tr>");
        newRow.append($("<td></td>").text(pName));
        newRow.append($("<td></td>").text(price));
        newRow.append($("<td></td>").text(amount));
        newRow.append($("<td></td>").text(price * amount));
        // update goods with its current amount in the cart
        $.ajax({
            url: "updateCart.php",
            type: "POST",
            data: {
                pName: pName,
                amount: amount
            },
            success: function (response) {
                console.log(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("update cart error");
            }
        });
        tBody.append(newRow);
    });
    $("#modalTotalCost").text($("#totalCost").text());

    // show modal to fill in address, phone, etc.
    $("dialog")[0].showModal();
}

function closeModal(){
    $("dialog")[0].close();
}
