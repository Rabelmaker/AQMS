function t() {
    var e = document.querySelector(".main-content > .container"), n = e.currentStyle || window.getComputedStyle(e);
    document.querySelector(".sidenav").style.right = n.marginRight, document.querySelector(".sidenav").style.display = "block"
}

window.addEventListener("load", t, !1);
window.addEventListener("resize", t);
