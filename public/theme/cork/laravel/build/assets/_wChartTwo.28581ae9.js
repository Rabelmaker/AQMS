window.addEventListener("load", function () {
    try {
        let s = sessionStorage.getItem("theme");
        if (JSON.parse(s).settings.layout.darkMode) {
            var o = "dark";
            Apex.tooltip = {theme: o};
            var a = {
                chart: {type: "donut", width: 370, height: 430},
                colors: ["#622bd7", "#e2a03f", "#e7515a", "#e2a03f"],
                dataLabels: {enabled: !1},
                legend: {
                    position: "bottom",
                    horizontalAlign: "center",
                    fontSize: "14px",
                    markers: {width: 10, height: 10, offsetX: -5, offsetY: 0},
                    itemMargin: {horizontal: 10, vertical: 30}
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "75%",
                            background: "transparent",
                            labels: {
                                show: !0,
                                name: {
                                    show: !0,
                                    fontSize: "29px",
                                    fontFamily: "Nunito, sans-serif",
                                    color: void 0,
                                    offsetY: -10
                                },
                                value: {
                                    show: !0,
                                    fontSize: "26px",
                                    fontFamily: "Nunito, sans-serif",
                                    color: "#1ad271",
                                    offsetY: 16,
                                    formatter: function (t) {
                                        return t
                                    }
                                },
                                total: {
                                    show: !0,
                                    showAlways: !0,
                                    label: "Total",
                                    color: "#888ea8",
                                    formatter: function (t) {
                                        return t.globals.seriesTotals.reduce(function (n, e) {
                                            return n + e
                                        }, 0)
                                    }
                                }
                            }
                        }
                    }
                },
                stroke: {show: !0, width: 15, colors: "#0e1726"},
                series: [985, 737, 270],
                labels: ["Apparel", "Sports", "Others"],
                responsive: [{breakpoint: 1440, options: {chart: {width: 325}}}, {
                    breakpoint: 1199,
                    options: {chart: {width: 380}}
                }, {breakpoint: 575, options: {chart: {width: 320}}}]
            }
        } else {
            var o = "dark";
            Apex.tooltip = {theme: o};
            var a = {
                chart: {type: "donut", width: 370, height: 430},
                colors: ["#622bd7", "#e2a03f", "#e7515a", "#e2a03f"],
                dataLabels: {enabled: !1},
                legend: {
                    position: "bottom",
                    horizontalAlign: "center",
                    fontSize: "14px",
                    markers: {width: 10, height: 10, offsetX: -5, offsetY: 0},
                    itemMargin: {horizontal: 10, vertical: 30}
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: "75%",
                            background: "transparent",
                            labels: {
                                show: !0,
                                name: {
                                    show: !0,
                                    fontSize: "29px",
                                    fontFamily: "Nunito, sans-serif",
                                    color: void 0,
                                    offsetY: -10
                                },
                                value: {
                                    show: !0,
                                    fontSize: "26px",
                                    fontFamily: "Nunito, sans-serif",
                                    color: "#0e1726",
                                    offsetY: 16,
                                    formatter: function (e) {
                                        return e
                                    }
                                },
                                total: {
                                    show: !0,
                                    showAlways: !0,
                                    label: "Total",
                                    color: "#888ea8",
                                    formatter: function (e) {
                                        return e.globals.seriesTotals.reduce(function (i, l) {
                                            return i + l
                                        }, 0)
                                    }
                                }
                            }
                        }
                    }
                },
                stroke: {show: !0, width: 15, colors: "#fff"},
                series: [985, 737, 270],
                labels: ["Apparel", "Sports", "Others"],
                responsive: [{breakpoint: 1440, options: {chart: {width: 325}}}, {
                    breakpoint: 1199,
                    options: {chart: {width: 380}}
                }, {breakpoint: 575, options: {chart: {width: 320}}}]
            }
        }
        var r = new ApexCharts(document.querySelector("#chart-2"), a);
        r.render(), document.querySelector(".theme-toggle").addEventListener("click", function () {
            let t = sessionStorage.getItem("theme");
            JSON.parse(t).settings.layout.darkMode ? r.updateOptions({
                stroke: {colors: "#0e1726"},
                plotOptions: {pie: {donut: {labels: {value: {color: "#bfc9d4"}}}}}
            }) : r.updateOptions({
                stroke: {colors: "#fff"},
                plotOptions: {pie: {donut: {labels: {value: {color: "#0e1726"}}}}}
            })
        })
    } catch (s) {
        console.log(s)
    }
});
