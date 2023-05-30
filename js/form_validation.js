$(document).ready(function ($) {
    $("form").validate({
        rules:{
            "name":{
                required: true,
            },
            "mail":{
                required: true,
                email: true,
            },
            "pswd":{
                required: true,
                minlength: 8,
            },
            "checkpswd":{
                required: true,
                equalTo: "#pswd",
            },
            "birthday":{
                required: true,
            },
            "registering":{
                required: true,
            }
        },
        messages:{
            "name":{
                required:"請輸入姓名作為使用者名稱",
            },
            "mail":{
                required:"請輸入電子郵件",
                email:"請輸入正確的電子郵件",
            },
            "pswd":{
                required:"請輸入密碼",
                minlength:"密碼長度至少8個字元",
            },
            "checkpswd":{
                required:"請再次輸入密碼",
                equalTo:"兩次輸入密碼不一致",
            },
            "birthday":{
                required:"請選擇生日",
            },
            "registering":{
                required:"請同意您喜歡可愛動物",
            }
        },
        errorPlacement: function (error, element) {
            if(element.attr("name") == "name")
                error.insertAfter($("#name-error"))
            if(element.attr("name") == "mail")
                error.insertAfter($("#mail-error"))
            if(element.attr("name") == "pswd")
                error.insertAfter($("#pswd-error"))
            if(element.attr("name") == "checkpswd")
                error.insertAfter($("#checkpswd-error"))
        }
    });

    $("form").submit(function (e) {
        if($(this).valid() && $("#registering").prop("checked")){
            alert("表單成功送出！");
            return true;
        }
        e.preventDefault();
        return false;
    });
});

// Ajax validate user name is exist
function checkUserExist () {
    var mail = $('input[name="mail"]').val();
    $.ajax({
        type:"POST",
        url:"user_exist_check.php",
        data:{
            mail:mail
        },
        dataType:"text",
        success: function(response){
            if(response == "exist") $("#msg_show").html("帳號已存在！");
            else $("#msg_show").html("");
        }
    });
}

$(function(){
    $("input[name='mail']").keyup(function(){
        checkUserExist();
    });
})