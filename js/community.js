var alliName = "---";
function toggleNameDisplay(){
    let temp = alliName;
    alliName = document.getElementById("name").value;
    document.getElementById("name").value = temp;
}

$(document).ready(function($){
    $("#commentForm").validate({
        rules: {
            "title": {
                required: true,
                minlength: 1,
                maxlength: 32
            },
            "content": {
                required: true,
                minlength: 1,
                maxlength: 512
            },
            "name": {
                required: true,
            }
        },
        messages: {
            "title": {
                required: "請輸入標題",
                minlength: "標題至少1個字元",
                maxlength: "標題超過32個字元"
            },
            "content": {
                required: "請輸入內容",
                minlength: "內容至少1個字元",
                maxlength: "內容超過512個字元"
            }
        },
        errorPlacement: function (error, element) {
            if(element.attr("name") == "title")
                error.insertAfter($("#title-error"))
            if(element.attr("name") == "content")
                error.insertAfter($("#content-error"))
        }
    });

    $("#commentForm").submit(function (e) {
        if($(this).valid()){
            alert("表單成功送出！");
            return true;
        }
        e.preventDefault();
        return false;
    });
});
