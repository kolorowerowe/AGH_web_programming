function onload2() {
    var cookies = document.cookie;
    //alert(cookies);
    swapStyleSheet(cookies.split("=")[1].split(";")[0]);
    var uList = document.createElement('ul');
    var stylesList = ["style.css", "styleAlt.css", "stylePrint"];
    for (var i = 0; i < stylesList.length; i++) {
        var liElem = document.createElement('li');
        liElem.innerHTML = stylesList[i].split(".")[0];
        liElem.setAttribute("styleName", stylesList[i]);
        liElem.addEventListener("click", liOnclick);
        uList.appendChild(liElem);
    }
    document.body.appendChild(uList);
}


function swapStyleSheet(sheet) {
    document.getElementById("pagestyle").setAttribute("href", sheet);
}

function liOnclick(event) {
    var liElem = event.target;
    var stylename = liElem.getAttribute("styleName");
    swapStyleSheet(stylename);
    document.cookie = "defaultStyle=" + stylename;
}
