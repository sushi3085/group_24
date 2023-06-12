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
            },
            "newPassword": {
                required: false,
                minlength: 8,
            },
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
            "newPassword": {
                required: "　請再次輸入密碼",
                minlength: "　密碼至少要八個字",
            }
        },
        errorPlacement: function (error, element) {
            console.log($("#mail-exist").text());
            if (element.attr("name") == "userName")
                error.insertAfter($("#userName-error"))
            if (element.attr("name") == "email")
                error.insertAfter($("#email-error"))
            if (element.attr("name") == "birthday")
                error.insertAfter($("#birthday-error"))
            if (element.attr("name") == "password")
                error.insertAfter($("#password-error"))
            if (element.attr("name") == "newPassword")
                error.insertAfter($("#newPassword-error"))
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            if ($("#mail-exist").text() != "") {
                alert("電子郵件已被使用，請重新輸入");
                return;
            }
            let result = confirm("確定要修改個人資料嗎？");
            if (result) {
                alert("成功送出表單！");
                form.submit();
            } else {
                alert("已取消修改個人資料！");
            }
        }
    });

    $("#mail").keyup(function () {
        $.ajax({
            url: "checkEmail.php",
            type: "POST",
            data: {
                email: $("#mail").val(),
                originEmail: $("#mail").attr("value")
            },
            success: function (data) {
                if (data == "exist") {
                    $("#mail-exist").text("　此電子郵件已被使用");
                }
                else {
                    $("#mail-exist").text("");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error code:" + jqXHR.status);
            }
        });
    });
});
