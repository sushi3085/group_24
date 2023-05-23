$(document).ready(function ($) {
    $("form").validate({
        rules:{
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
            if(element.attr("name") == "mail")
                error.insertAfter($("#mail-error"))
            if(element.attr("name") == "pswd")
                error.insertAfter($("#pswd-error"))
            if(element.attr("name") == "checkpswd")
                error.insertAfter($("#checkpswd-error"))
        }
    });
});