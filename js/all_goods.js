function addToCart(btn, pNo){
    let amount = -1;
    let input = $(btn).closest("div").find("input");
    $(input).each(function(index, element){
        amount = $(element).val();
    });
    if(amount <= 0){
        alert("請輸入大於零的數量");
        return false;
    }

    $.ajax({
        url: "add_to_cart_ajax.php",
        type: "POST",
        data: {
            pNo: pNo,
            amount: amount
        },
        success: function(result){
            if(result == "success"){
                alert("已加入購物車!\n請至購物車確認");
            }else if(result == "user_not_login"){
                alert("請先登入會員");
                window.location.href = "login.php";
            }else{
                alert("加入購物車失敗...");
            }
        },
        error: function(result){
            alert("加入購物車失敗...");
        }
    });

    $(input).each(function(index, element){
        element.value = 0;
    });
}