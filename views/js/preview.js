document.getElementById("file").onchange = function (e) {
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function () {
        let preview = document.getElementById("preview");
        preview.style.backgroundImage = "url(" + reader.result + ")";
    }
}
