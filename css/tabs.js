function openpBsjava(evt, pbsProtect) {

    var i, pbstabbscontent, pbstablinks;

    pbstabbscontent = document.getElementsByClassName("pbstabbscontent");
    for (i = 0; i < pbstabbscontent.length; i++) {
        pbstabbscontent[i].style.display = "none";
    }


    pbstablinks = document.getElementsByClassName("pbstablinks");
    for (i = 0; i < pbstablinks.length; i++) {
        pbstablinks[i].className = pbstablinks[i].className.replace(" active", "");
    }

    document.getElementById(pbsProtect).style.display = "block";
    evt.currentTarget.className += " active";
}


