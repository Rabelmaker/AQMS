window.addEventListener("load", function () {
    try {
        let e = sessionStorage.getItem("theme");
        if (JSON.parse(e).settings.layout.darkMode) {
            var t = "dark";
            Apex.tooltip = {theme: t};
            var o = {
                chart: {
                    id: "unique-visits",
                    group: "sparks2",
                    type: "line",
                    height: 80,
                    sparkline: {enabled: !0},
                    dropShadow: {enabled: !0, top: 1, left: 1, blur: 2, color: "#e2a03f", opacity: .7}
                },
                series: [{data: [21, 9, 36, 12, 44, 25, 59, 41, 66, 25]}],
                stroke: {curve: "smooth", width: 2},
                markers: {size: 0},
                grid: {padding: {top: 35, bottom: 0, left: 40}},
                colors: ["#e2a03f"],
                tooltip: {
                    x: {show: !1}, y: {
                        title: {
                            formatter: function (a) {
                                return ""
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1351,
                    options: {chart: {height: 95}, grid: {padding: {top: 35, bottom: 0, left: 0}}}
                }, {
                    breakpoint: 1200,
                    options: {chart: {height: 80}, grid: {padding: {top: 35, bottom: 0, left: 40}}}
                }, {breakpoint: 576, options: {chart: {height: 95}, grid: {padding: {top: 45, bottom: 0, left: 0}}}}]
            }, r = {
                chart: {
                    id: "total-users",
                    group: "sparks1",
                    type: "line",
                    height: 80,
                    sparkline: {enabled: !0},
                    dropShadow: {enabled: !0, top: 3, left: 1, blur: 3, color: "#009688", opacity: .7}
                },
                series: [{data: [22, 19, 30, 47, 32, 44, 34, 55, 41, 69]}],
                stroke: {curve: "smooth", width: 2},
                markers: {size: 0},
                grid: {padding: {top: 35, bottom: 0, left: 40}},
                colors: ["#009688"],
                tooltip: {
                    x: {show: !1}, y: {
                        title: {
                            formatter: function (a) {
                                return ""
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1351,
                    options: {chart: {height: 95}, grid: {padding: {top: 35, bottom: 0, left: 0}}}
                }, {
                    breakpoint: 1200,
                    options: {chart: {height: 80}, grid: {padding: {top: 35, bottom: 0, left: 40}}}
                }, {breakpoint: 576, options: {chart: {height: 95}, grid: {padding: {top: 35, bottom: 0, left: 0}}}}]
            }
        } else {
            var t = "dark";
            Apex.tooltip = {theme: t};
            var o = {
                chart: {
                    id: "unique-visits",
                    group: "sparks2",
                    type: "line",
                    height: 80,
                    sparkline: {enabled: !0},
                    dropShadow: {enabled: !0, top: 1, left: 1, blur: 2, color: "#e2a03f", opacity: .7}
                },
                series: [{data: [21, 9, 36, 12, 44, 25, 59, 41, 66, 25]}],
                stroke: {curve: "smooth", width: 2},
                markers: {size: 0},
                grid: {padding: {top: 35, bottom: 0, left: 40}},
                colors: ["#e2a03f"],
                tooltip: {
                    x: {show: !1}, y: {
                        title: {
                            formatter: function (s) {
                                return ""
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1351,
                    options: {chart: {height: 95}, grid: {padding: {top: 35, bottom: 0, left: 0}}}
                }, {
                    breakpoint: 1200,
                    options: {chart: {height: 80}, grid: {padding: {top: 35, bottom: 0, left: 40}}}
                }, {breakpoint: 576, options: {chart: {height: 95}, grid: {padding: {top: 45, bottom: 0, left: 0}}}}]
            }, r = {
                chart: {
                    id: "total-users",
                    group: "sparks1",
                    type: "line",
                    height: 80,
                    sparkline: {enabled: !0},
                    dropShadow: {enabled: !0, top: 3, left: 1, blur: 3, color: "#009688", opacity: .7}
                },
                series: [{data: [22, 19, 30, 47, 32, 44, 34, 55, 41, 69]}],
                stroke: {curve: "smooth", width: 2},
                markers: {size: 0},
                grid: {padding: {top: 35, bottom: 0, left: 40}},
                colors: ["#009688"],
                tooltip: {
                    x: {show: !1}, y: {
                        title: {
                            formatter: function (s) {
                                return ""
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1351,
                    options: {chart: {height: 95}, grid: {padding: {top: 35, bottom: 0, left: 0}}}
                }, {
                    breakpoint: 1200,
                    options: {chart: {height: 80}, grid: {padding: {top: 35, bottom: 0, left: 40}}}
                }, {breakpoint: 576, options: {chart: {height: 95}, grid: {padding: {top: 35, bottom: 0, left: 0}}}}]
            }
        }
        new ApexCharts(document.querySelector("#total-users"), o).render(), new ApexCharts(document.querySelector("#paid-visits"), r).render()
    } catch (e) {
        console.log(e)
    }
});
