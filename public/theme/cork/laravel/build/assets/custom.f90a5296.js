window.checkall = function (c, t) {
    var e = $("#" + c), i = $("." + t);
    e.click(function () {
        i.prop("checked", $(this).prop("checked"))
    })
};
window.multiCheck = function (c) {
    c.on("change", ".chk-parent", function () {
        var t = $(this).closest("table").find("td:first-child .child-chk"), e = $(this).is(":checked");
        $(t).each(function () {
            e ? ($(this).prop("checked", !0), $(this).closest("tr").addClass("active")) : ($(this).prop("checked", !1), $(this).closest("tr").removeClass("active"))
        })
    }), c.on("change", "tbody tr .new-control", function () {
        $(this).parents("tr").toggleClass("active")
    })
};
