$(document).ready(function ($) {
    const tabLinks = $(".nav-link").slice(5);// Explite the header links

    // initialize the form
    $("form.modalForm").each((index, form) => {
        if(index != 0) $(form).hide();
    });

    tabLinks.each((index, tabLink) => {
        $(tabLink).click(() => {
            // Hide all tab panes
            $('.tab-pane').each((index, tabPane) => {
                $(tabPane).removeClass('show active');
            });

            // Show the corresponding tab pane
            $('.tab-pane').eq(index).addClass('show active');
            // Highlight the corresponding tab link
            tabLinks.each((index, tabLink) => {
                $(tabLink).removeClass('active');
            });
            $(tabLink).addClass('active');

            /*******************************/
            /* Show the corresponding form */
            /*******************************/
            let formId = "#"+tabLink.id.replace("SectionBtn", "Form");
            let addForm = "#" + tabLink.id.replace("SectionBtn", "AddForm");
            $("form").each((index, form) => {
                $(form).hide();
            });
            $(formId).show();
            $(addForm).show();
        });
    });

});

function getActivateFormIndex() {
    let result = -1;
    $("form.modalForm").each((index, form) => {
        if($(form).css("display") == "block") result = index;
    });
    return result;
}

function showModal(button) {
    let tr = $(button).closest("tr");
    let td = $(tr).children("td");
    let displayFormIndex = getActivateFormIndex();
    console.log(displayFormIndex);
    
    if(displayFormIndex == 0){
        // 12456
        let id = $(td[0]).text();
        let name = $(td[1]).text();
        let mail = $(td[2]).text();
        let birthday = $(td[3]).text();
        let dataArr = [id, name, mail];
        
        // fill the form
        let curForm = $("form.modalForm")[0];
        for(let i=0; i<dataArr.length; i++){
            $(curForm).find("input")[i].value = dataArr[i];
        }
        $("#memberBirthday").val(birthday);
    }else if(displayFormIndex == 1){
        // TODO: fiinish this part
        let goodsId = $(td[0]).text();
        let goodsName = $(td[1]).text();
        let goodsPrice = $(td[2]).text();
        let goodsCategory = $(td[3]).text();
        let goodsDescription = $(td[5]).text();
        let dataArr = [
            goodsId, goodsName, goodsPrice, goodsCategory
        ];

        let curForm = $("form.modalForm")[1];
        $(curForm).find("input").each((index, input) => {
            if(index >= dataArr.length) return;
            $(input).val(dataArr[index]);
        });
        $("textarea#goodsDescription").val(goodsDescription);
    }else if(displayFormIndex == 2){
        let orderId = $(td[0]).text();
        let orderMemberName = $(td[1]).text();
        let orderTime = $(td[2]).text();
        let receiver = $(td[3]).text();
        let address = $(td[4]).text();
        let dataArr = [orderId, orderMemberName, orderTime, receiver, address];

        let curForm = $("form.modalForm")[2];
        $(curForm).find("input").each((index, input) => {
            if(index >= dataArr.length) return;
            $(input).val(dataArr[index]);
        });
        // insert goods list
        let tableBody = $("#orderGoods > tbody")[0];
        $(tableBody).empty();
        $.ajax({
            url: "adminEditHandle.php",
            type: "POST",
            data: {
                "editType": "qryOrder",
                "orderId": orderId,
            },
            success: function (data) {
                let goodsList = JSON.parse(data);
                goodsList.forEach((goods) => {
                    let tr = document.createElement("tr");
                    let td = document.createElement("td");
                    $(td).text(goods["goodsId"]);
                    $(tr).append(td);
                    td = document.createElement("td");
                    $(td).text(goods["goodsName"]);
                    $(tr).append(td);
                    td = document.createElement("td");
                    $(td).text(goods["goodsPrice"]);
                    $(tr).append(td);
                    td = document.createElement("td");
                    $(td).text(goods["goodsQuantity"]);
                    $(tr).append(td);
                    $(tableBody).append(tr);
                });
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    $("dialog")[0].showModal();
}

function closeModal() {
    $("dialog")[0].close();
}

function submitEdit(){
    // confirm edit
    let response = confirm("確定要送出修改嗎？");
    if(!response){
        alert("取消送出");
        return;
    }
    let displayFormIndex = getActivateFormIndex();
    if (displayFormIndex == 0){
        let editType = "member";
        let form = $("form.modalForm")[0];
        let inputs = $(form).find("input");
        // prepare the data
        let id = inputs[0].value;
        let name = inputs[1].value;
        let mail = inputs[2].value;
        let birthday = inputs[3].value;
        $.ajax({
            url: "adminEditHandle.php",
            type: "POST",
            data: {
                "editType": editType,
                "id": id,
                "name": name,
                "mail": mail,
                "birthday": birthday,
            },
            success: function (data) {
                if(data == "success"){
                    alert("修改成功");
                    location.reload();
                }
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            },
        });
    }
    else if(displayFormIndex == 1){
        editType = "goods";
        let form = $("form.modalForm")[1];
        let inputs = $(form).find("input");
        let textareaText = $(form).find("textarea").val();
        $.ajax({
            url: "adminEditHandle.php",
            type: "POST",
            data: {
                "editType": editType,
                "goodsId": inputs[0].value,
                "goodsName": inputs[1].value,
                "goodsPrice": inputs[2].value,
                "goodsCategory": inputs[3].value,
                "goodsImgPath": inputs[4].value,
                "goodsDescription": textareaText,
            },
            success: function (data) {
                if(data == "success"){
                    alert("修改成功");
                    location.reload();
                }
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
    else if(displayFormIndex == 2) {
        editType = "order";
        let form = $("form.modalForm")[2];
        let inputs = $(form).find("input");
        $.ajax({
            url: "adminEditHandle.php",
            type: "POST",
            data: {
                "editType": editType,
                "orderId": inputs[0].value,
                "memberName": inputs[1].value,
                "goodsPrice": inputs[2].value,
                "goodsCategory": inputs[3].value,
                "goodsImgPath": inputs[4].value,
                "goodsState": inputs[5].value,
                "goodsDescription": textarea[0].value,
            },
            success: function (data) {
                if(data == "success"){
                    alert("修改成功");
                    location.reload();
                }
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    closeModal();
}

function deleteUser(btn){
    let mId = $(btn).closest("tr").find("td")[0].innerText;
    let name = $(btn).closest("tr").find("td")[1].innerText;
    if(!confirm("確定要刪除 "+name+" 嗎？")) return;
    $.ajax({
        url: "adminEditHandle.php",
        type: "POST",
        data: {
            "editType": "deleteUser",
            "mId": mId,
        },
        success: function (data) {
            if(data == "success"){
                alert("刪除成功");
                location.reload();
            }
            console.log(data);
        }
    });
}

function deleteGoods(btn){
    let goodsId = $(btn).closest("tr").find("td")[0].innerText;
    let name = $(btn).closest("tr").find("td")[1].innerText;
    if(!confirm("確定要刪除 "+name+" 嗎？")) return;
    $.ajax({
        url: "adminEditHandle.php",
        type: "POST",
        data: {
            "editType": "deleteGoods",
            "goodsId": goodsId,
        },
        success: function (data) {
            if(data == "success"){
                alert("刪除成功");
                location.reload();
            }
        }
    });
}

function deleteOrder(btn){
    let orderId = $(btn).closest("tr").find("td")[0].innerText;
    if(!confirm("確定要刪除訂單 #"+orderId+" 嗎？")) return;
    $.ajax({
        url: "adminEditHandle.php",
        type: "POST",
        data: {
            "editType": "deleteOrder",
            "orderId": orderId,
        },
        success: function (data) {
            if(data == "success"){
                alert("刪除成功");
                location.reload();
            }
        }
    });
}

function addUser(btn){
    let form = $(btn).closest("form")[0];
    let inputs = $(form).find("input");
    let memberName = inputs[0].value;
    let memberMail = inputs[1].value;
    let memberPassword = inputs[2].value;
    let memberBirthday = inputs[3].value;
    /* check all fields are filled */
    if(memberName == "" || memberMail == "" ||
       memberPassword == "" || memberBirthday == ""){
        alert("請填寫所有欄位");
        return;
    }
    // check email format
    let emailFormat = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)*$/;
    if(!emailFormat.test(memberMail)){
        alert("信箱格式錯誤");
        return;
    }
    // check password length
    if(memberPassword.length < 8){
        alert("密碼長度不足");
        return;
    }

    let result = $.ajax({
        async: false,
        url: "checkEmail.php",
        type: "POST",
        data: {
            email: memberMail,
            originEmail: "",
        }
    }).responseText;

    if(result == "exist"){
        alert("此信箱已被註冊");
        return;
    }
    
    $.ajax({
        url: "adminEditHandle.php",
        type: "POST",
        data: {
            "editType": "addUser",
            "name": memberName,
            "mail": memberMail,
            "password": memberPassword,
            "birthday": memberBirthday,
        },
        success: function (data) {
            if(data == "success"){
                alert("新增成功");
                location.reload();
            }
        }
    });
}