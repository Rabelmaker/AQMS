var y = function () {
    var i = {xl: 1200, lg: 992, md: 991, sm: 576}, t = {
        main: document.querySelector("html, body"),
        id: {container: document.querySelector("#container")},
        class: {
            navbar: document.querySelector(".navbar"),
            overlay: document.querySelector(".overlay"),
            search: document.querySelector(".toggle-search"),
            searchOverlay: document.querySelector(".search-overlay"),
            searchForm: document.querySelector(".search-form-control"),
            mainContainer: document.querySelector(".main-container"),
            mainHeader: document.querySelector(".header.navbar")
        }
    }, b = {
        scrollCat: function () {
            var e = document.querySelectorAll(".sidebar-wrapper li.active")[0], s = e.offsetTop - 12;
            setTimeout(() => {
                const o = document.querySelector(".menu-categories");
                o.scrollTop = s
            }, 50)
        }
    }, c = {
        sidebar: function (e) {
            var s = document.querySelectorAll(".sidebarCollapse");
            s.forEach(o => {
                o.addEventListener("click", function (a) {
                    a.preventDefault();
                    let r = document.querySelector(".sidebar-wrapper");
                    e === !0 && (document.querySelector(".collapse.submenu").classList.contains("show") ? (document.querySelector(".submenu.show").classList.add("mini-recent-submenu"), r.querySelector(".collapse.submenu").classList.remove("show"), r.querySelector(".collapse.submenu").classList.remove("show"), document.querySelector(".collapse.submenu").parentNode.querySelector(".dropdown-toggle").setAttribute("aria-expanded", "false")) : t.class.mainContainer.classList.contains("sidebar-closed") && (document.querySelector(".collapse.submenu").classList.contains("recent-submenu") ? (r.querySelector(".collapse.submenu.recent-submenu").classList.add("show"), document.querySelector(".collapse.submenu.recent-submenu").parentNode.querySelector(".dropdown-toggle").setAttribute("aria-expanded", "true"), document.querySelector(".submenu").classList.remove("mini-recent-submenu")) : (document.querySelector("li.active .submenu").classList.add("recent-submenu"), r.querySelector(".collapse.submenu.recent-submenu").classList.add("show"), document.querySelector(".collapse.submenu.recent-submenu").parentNode.querySelector(".dropdown-toggle").setAttribute("aria-expanded", "true"), document.querySelector(".submenu").classList.remove("mini-recent-submenu")))), t.class.mainContainer.classList.toggle("sidebar-closed"), t.class.mainHeader.classList.toggle("expand-header"), t.class.mainContainer.classList.toggle("sbar-open"), t.class.overlay.classList.toggle("show"), t.main.classList.toggle("sidebar-noneoverflow")
                })
            })
        }, onToggleSidebarSubmenu: function () {
            ["mouseenter", "mouseleave"].forEach(function (e) {
                document.querySelector(".sidebar-wrapper").addEventListener(e, function () {
                    document.querySelector("body").classList.contains("alt-menu") ? document.querySelector(".main-container").classList.contains("sidebar-closed") && (e === "mouseenter" ? (document.querySelector("li.menu .submenu").classList.remove("show"), document.querySelector("li.menu.active .submenu").classList.add("recent-submenu"), document.querySelector("li.menu.active").querySelector(".collapse.submenu.recent-submenu").classList.add("show"), document.querySelector(".collapse.submenu.recent-submenu").parentNode.querySelector(".dropdown-toggle").setAttribute("aria-expanded", "true")) : e === "mouseleave" && document.querySelectorAll("li.menu").forEach(o => {
                        var a = o.querySelector(".collapse.submenu.show");
                        a && a.classList.remove("show");
                        var r = o.querySelector('.dropdown-toggle[aria-expanded="true"]');
                        r && r.setAttribute("aria-expanded", "false")
                    })) : document.querySelector(".main-container").classList.contains("sidebar-closed") && (e === "mouseenter" ? (document.querySelector("li.menu .submenu").classList.remove("show"), document.querySelector("li.menu.active .submenu") && (document.querySelector("li.menu.active .submenu").classList.add("recent-submenu"), document.querySelector("li.menu.active").querySelector(".collapse.submenu.recent-submenu").classList.add("show"), document.querySelector(".collapse.submenu.recent-submenu").parentNode.querySelector(".dropdown-toggle").setAttribute("aria-expanded", "true"))) : e === "mouseleave" && document.querySelectorAll("li.menu").forEach(o => {
                        var a = o.querySelector(".collapse.submenu.show");
                        a && a.classList.remove("show");
                        var r = o.querySelector('.dropdown-toggle[aria-expanded="true"]');
                        r && r.setAttribute("aria-expanded", "false")
                    }))
                })
            })
        }, offToggleSidebarSubmenu: function () {
        }, overlay: function () {
            document.querySelector("#dismiss, .overlay").addEventListener("click", function () {
                t.class.mainContainer.classList.add("sidebar-closed"), t.class.mainContainer.classList.remove("sbar-open"), t.class.overlay.classList.remove("show"), t.main.classList.remove("sidebar-noneoverflow")
            })
        }, search: function () {
            t.class.search && (t.class.search.addEventListener("click", function (e) {
                this.classList.add("show-search"), t.class.searchOverlay.classList.add("show"), document.querySelector("body").classList.add("search-active")
            }), t.class.searchOverlay.addEventListener("click", function (e) {
                this.classList.remove("show"), t.class.search.classList.remove("show-search"), document.querySelector("body").classList.remove("search-active")
            }), document.querySelector(".search-close").addEventListener("click", function (e) {
                e.stopPropagation(), t.class.searchOverlay.classList.remove("show"), t.class.search.classList.remove("show-search"), document.querySelector("body").classList.remove("search-active"), document.querySelector(".search-form-control").value = ""
            }))
        }, themeToggle: function (e) {
            var s = document.querySelector(".theme-toggle");
            s.addEventListener("click", function () {
                var o = sessionStorage.getItem("theme"), a = JSON.parse(o);
                if (a.settings.layout.darkMode) {
                    var r = a.settings.layout, l = {...r, darkMode: !1}, u = {...a, settings: {layout: l}};
                    sessionStorage.setItem("theme", JSON.stringify(u));
                    var d = sessionStorage.getItem("theme"), m = JSON.parse(d);
                    m.settings.layout.darkMode || (document.body.classList.remove("layout-dark"), document.body.getAttribute("page") === "starter-pack" && document.querySelector(".navbar-logo").setAttribute("src", "../../src/assets/img/logo2.svg"))
                } else {
                    var r = a.settings.layout, l = {...r, darkMode: !0}, u = {...a, settings: {layout: l}};
                    sessionStorage.setItem("theme", JSON.stringify(u));
                    var d = sessionStorage.getItem("theme"), m = JSON.parse(d);
                    m.settings.layout.darkMode && (document.body.classList.add("layout-dark"), document.body.getAttribute("page") === "starter-pack" && document.querySelector(".navbar-logo").setAttribute("src", "../../src/assets/img/logo.svg"))
                }
            })
        }
    }, n = {
        mainCatActivateScroll: function () {
            document.querySelector(".menu-categories") && new PerfectScrollbar(".menu-categories", {
                wheelSpeed: .5,
                swipeEasing: !0,
                minScrollbarLength: 40,
                maxScrollbarLength: 300
            })
        }, notificationScroll: function () {
            document.querySelector(".notification-scroll") && new PerfectScrollbar(".notification-scroll", {
                wheelSpeed: .5,
                swipeEasing: !0,
                minScrollbarLength: 40,
                maxScrollbarLength: 300
            })
        }, preventScrollBody: function () {
            var e = document.querySelectorAll("#sidebar, .user-profile-dropdown .dropdown-menu, .notification-dropdown .dropdown-menu,  .language-dropdown .dropdown-menu"),
                s = function (o) {
                    o = o || window.event, o.preventDefault && o.preventDefault(), o.returnValue = !1, e.scrollTop -= o.wheelDeltaY
                };
            e.forEach(o => {
                o.addEventListener("mousewheel", s), o.addEventListener("DOMMouseScroll", s)
            })
        }, searchKeyBind: function () {
            t.class.search && Mousetrap.bind("ctrl+/", function () {
                return document.body.classList.add("search-active"), t.class.search.classList.add("show-search"), t.class.searchOverlay.classList.add("show"), t.class.searchForm.focus(), !1
            })
        }, bsTooltip: function () {
            var e = document.querySelectorAll(".bs-tooltip");
            for (let s = 0; s < e.length; s++) new bootstrap.Tooltip(e[s])
        }, bsPopover: function () {
            var e = document.querySelectorAll(".bs-popover");
            for (let s = 0; s < e.length; s++) new bootstrap.Popover(e[s])
        }, onCheckandChangeSidebarActiveClass: function () {
            document.body.classList.contains("alt-menu") && document.querySelector('.sidebar-wrapper li.menu.active [aria-expanded="true"]').setAttribute("aria-expanded", "false")
        }, MaterialRippleEffect: function () {
            document.querySelectorAll("button.btn, a.btn").forEach(s => {
                s.classList.contains("_no--effects") || s.classList.add("_effect--ripple")
            }), document.querySelector("._effect--ripple") && (Waves.attach("._effect--ripple", "waves-light"), Waves.init())
        }
    }, v = {
        onRefresh: function () {
            var e = window.innerWidth;
            e <= i.md && (b.scrollCat(), c.sidebar())
        }, onResize: function () {
            window.addEventListener("resize", function (e) {
                e.preventDefault()
            })
        }
    }, f = {
        onRefresh: function () {
            var e = window.innerWidth;
            e > i.md && (b.scrollCat(), c.sidebar(), c.onToggleSidebarSubmenu())
        }, onResize: function () {
            window.addEventListener("resize", function (e) {
                e.preventDefault();
                var s = window.innerWidth;
                s > i.md && c.onToggleSidebarSubmenu()
            })
        }
    };

    function p() {
        function e() {
            window.innerWidth <= 991 ? document.querySelector("body").classList.contains("alt-menu") ? (t.class.navbar.classList.remove("expand-header"), t.class.overlay.classList.remove("show"), t.id.container.classList.remove("sbar-open"), t.main.classList.remove("sidebar-noneoverflow")) : (t.id.container.classList.add("sidebar-closed"), t.class.overlay.classList.remove("show")) : window.innerWidth > 991 && (document.querySelector("body").classList.contains("alt-menu") ? (t.main.classList.add("sidebar-noneoverflow"), t.id.container.classList.add("sidebar-closed"), t.class.navbar.classList.add("expand-header"), t.class.overlay.classList.add("show"), t.id.container.classList.add("sbar-open"), document.querySelector('.sidebar-wrapper [aria-expanded="true"]').parentNode.querySelector(".collapse").classList.remove("show")) : (t.id.container.classList.remove("sidebar-closed"), t.class.navbar.classList.remove("expand-header"), t.class.overlay.classList.remove("show"), t.id.container.classList.remove("sbar-open"), t.main.classList.remove("sidebar-noneoverflow")))
        }

        function s() {
            if (window.innerWidth <= 991) {
                if (document.querySelector(".main-container").classList.contains("sbar-open")) return;
                e()
            } else window.innerWidth > 991 && e()
        }

        e(), window.addEventListener("resize", function (o) {
            s()
        })
    }

    return {
        init: function (e) {
            c.overlay(), c.search(), c.themeToggle(e), f.onRefresh(), f.onResize(), v.onRefresh(), v.onResize(), p(), n.mainCatActivateScroll(), n.notificationScroll(), n.preventScrollBody(), n.searchKeyBind(), n.bsTooltip(), n.bsPopover(), n.onCheckandChangeSidebarActiveClass(), n.MaterialRippleEffect()
        }
    }
}();
window.addEventListener("load", function () {
    y.init("layout")
});
