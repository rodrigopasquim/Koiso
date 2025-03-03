/*ALTERAR A COR DO BACKGROUND*/
const colorPicker = document.getElementById("colorPicker");
const body = document.body;
const picture = document.getElementById("picture");
const tags = document.getElementById("tags");

colorPicker.addEventListener("input", () => {
    body.style.backgroundColor = colorPicker.value;
    picture.style.borderColor = colorPicker.value;
    tags.style.color = colorPicker.value;
});