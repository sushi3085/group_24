$(document).ready(function () {
    const tabLinks = $(".nav-link").slice(5);// Explite the header links

    // initialize the form
    $("form").each((index, form) => {
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
            console.log(formId);
            $("form").each((index, form) => {
                $(form).hide();
            });
            $(formId).show();
        });
    });

});

function getActivateFormIndex() {
    let result = -1;
    $("form").each((index, form) => {
        if($(form).css("display") != "none") result = index;
    });
    return result;
}

function showModal(button) {
    let tr = $(button).closest("tr");
    let td = $(tr).children("td");
    let displayFormIndex = getActivateFormIndex();
    
    if(displayFormIndex == 0){
        // 12456
        let id = $(td[0]).text();
        let name = $(td[1]).text();
        let mail = $(td[2]).text();
        let phone = $(td[4]).text();
        let address = $(td[5]).text();
        let birthday = $(td[6]).text();
        let dataArr = [id, name, mail, phone, address, birthday];
        
        // fill the form
        let curForm = $("form")[0];
        for(let i=0; i<dataArr.length; i++){
            $(curForm).find("input")[i].value = dataArr[i];
        }
    }else if(displayFormIndex == 1){
        // TODO: fiinish this part
        let goodsId = $(td[0]).text();
        let goodsName = $(td[1]).text();
        let goodsPrice = $(td[2]).text();
        let goodsCategory = $(td[3]).text();
        let goodsImgPath = $(td[4]).text();
        let goodsState = $(td[5]).text();
        let goodsDescription = $(td[6]).text();
        let dataArr = [
            goodsId, goodsName, goodsPrice,
            goodsCategory, goodsImgPath, goodsState
        ];

        let curForm = $("form")[1];
        $(curForm).find("input").each((index, input) => {
            if(index >= dataArr.length) return;
            $(input).val(dataArr[index]);
        });
        $("textarea#goodsDescription").val(goodsDescription);
    }else{
        // TODO: finish this part
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
        let form = $("form")[0];
        let inputs = $(form).find("input");
        // prepare the data
        let id = inputs[0].value;
        let name = inputs[1].value;
        let mail = inputs[2].value;
        let phone = inputs[3].value;
        let address = inputs[4].value;
        let birthday = inputs[5].value;
        $.ajax({
            url: "adminEditHandle.php",
            type: "POST",
            data: {
                "editType": editType,
                "id": id,
                "name": name,
                "mail": mail,
                "phone": phone,
                "address": address,
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
        let form = $("form")[1];
        let inputs = $(form).find("input");
        let textarea = $(form).find("textarea");
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
    else if(displayFormIndex == 2) {
        editType = "order";
    }

    closeModal();
}

function editMember(){
    $.ajax({
    });
}