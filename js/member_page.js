function cancelEdit() {
    alert("成功還原個人資料！")
}
$(document).ready(function ($) {
    $("form").validate({
        rules: {
            "userName": {
                required: true,
                minlength: 2
            },
            "email": {
                required: true,
                email: true
            },
            "birthday": {
                required: true,
                date: true
            },
            "password": {
                required: true,
                minlength: 8
            }
        },
        messages: {
            "userName": {
                required: "　請輸入姓名",
                minlength: " 　姓名至少要兩個字"
            },
            "email": {
                required: "　請輸入電子郵件",
                email: "　請輸入正確的電子郵件"
            },
            "birthday": {
                required: "　請輸入生日",
                date: "　請輸入正確的生日"
            },
            "password": {
                required: "　請輸入密碼",
                minlength: "　密碼至少要八個字"
            },
            "passwordConf": {
                required: "　請再次輸入密碼",
                minlength: "　密碼至少要八個字",
                equalTo: "　兩次輸入的密碼不一致"
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") == "userName")
                error.insertAfter($("#userName-error"))
            if (element.attr("name") == "email")
                error.insertAfter($("#email-error"))
            if (element.attr("name") == "birthday")
                error.insertAfter($("#birthday-error"))
            if (element.attr("name") == "password")
                error.insertAfter($("#password-error"))
            if (element.attr("name") == "passwordConf")
                error.insertAfter($("#passwordConf-error"))
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            let result = confirm("確定要修改個人資料嗎？");
            if (result) {
                alert("成功儲存個人資料！");
                form.submit();
            }
            else alert("已取消修改個人資料！");
        }
    });
});
