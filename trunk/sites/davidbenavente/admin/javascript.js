function showCategory() {
    form = document.getElementById("categoryForm");
    form.submit();
}
function deleteItem(id) {
    var ok = confirm(<?= _("\"¿Seguro que desea borrar el producto con identificador\" + id + \"?\"") ?>);
    if (ok) {
	    form = document.getElementById("deleteForm");
        form['deleteId'].value = id;
	    form.submit();
    }
}
function changeLanguage(lang) {
    href = window.location.href;
    if (href.indexOf("?") >= 0) {
        i = href.indexOf("LANG=");
        if (i >= 0) {
            href = href.substring(0, i+5) + lang + href.substring(i+10);
        } else
            href += "&LANG=" + lang;
    } else {
        i = href.indexOf("LANG=");
        if (i >= 0) { 
            href = href.substring(0, i+5) + lang + href.substring(i+10);
        } else
            href += "?LANG=" + lang;
    }
    window.location.href = href;
}	