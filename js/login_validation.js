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
        },
        errorPlacement: function (error, element) {
            if(element.attr("name") == "mail")
                error.insertAfter($("#mail-error"))
            if(element.attr("name") == "pswd")
                error.insertAfter($("#pswd-error"))
        }
    });
});