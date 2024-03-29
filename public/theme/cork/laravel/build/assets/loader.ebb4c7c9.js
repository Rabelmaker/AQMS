window.addEventListener("load", function () {
    var n = document.getElementById("load_screen");
    document.body.removeChild(n);
    var s = "Modern Dark Menu";
    let e = "";
    var r = {admin: "Cork Admin Template", settings: {layout: {name: s, darkMode: !0}}, reset: !1};
    if (r.reset && sessionStorage.clear(), sessionStorage.length === 0) e = r; else {
        let o = sessionStorage.getItem("theme"), t = JSON.parse(o);
        o !== null ? t.admin === "Cork Admin Template" ? t.settings.layout.name === s ? e = t : e = r : t.admin === void 0 && (e = r) : e = r
    }
    if (e.settings.layout.darkMode) {
        sessionStorage.setItem("theme", JSON.stringify(e));
        let o = sessionStorage.getItem("theme");
        if (JSON.parse(o).settings.layout.darkMode) {
            let t = document.body.getAttribute("page") === "starter-pack";
            document.body.classList.add("layout-dark"), t && document.querySelector(".navbar-logo") && document.querySelector(".navbar-logo").setAttribute("src", "/images/logo.svg")
        }
    } else {
        sessionStorage.setItem("theme", JSON.stringify(e));
        let o = sessionStorage.getItem("theme");
        if (!JSON.parse(o).settings.layout.darkMode) {
            let t = document.body.getAttribute("page") === "starter-pack";
            document.body.classList.remove("layout-dark"), t && document.querySelector(".navbar-logo") && document.querySelector(".navbar-logo").setAttribute("src", "../../src/assets/img/logo2.svg")
        }
    }
    document.body.getAttribute("layout") === "full-width" && (document.body.classList.remove("layout-boxed"), document.querySelector(".header-container") && document.querySelector(".header-container").classList.remove("container-xxl"), document.querySelector(".middle-content") && document.querySelector(".middle-content").classList.remove("container-xxl"))
});
