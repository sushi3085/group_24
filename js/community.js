var alliName = "---";
function toggleNameDisplay(){
    let temp = alliName;
    alliName = document.getElementById("name").value;
    document.getElementById("name").value = temp;
}