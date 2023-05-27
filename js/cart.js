$(document).ready(function () {
    updateTotalCost();
});

function updateTotalCost(){
    let allInputs = $("input[type='number']");
    var totalPrice = 0;
    allInputs.each(function () {
        totalPrice += +$(this).closest("div").find("span")[1].innerHTML;
    });
    $("#totalCost").text(totalPrice);
}

function updateCost(x) {
    let amount = +$(x).val();
    // calculate goods price
    let onePrice = +$(x).closest("div").find("span")[0].innerHTML;
    var priceHolder = $(x).closest("div").find("span")[1];
    $(priceHolder).text(amount * onePrice);

    updateTotalCost();
}
