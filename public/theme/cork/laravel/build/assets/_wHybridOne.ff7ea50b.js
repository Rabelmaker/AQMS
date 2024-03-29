window.addEventListener("load", function () {
    try {
        let t = sessionStorage.getItem("theme");
        if (JSON.parse(t).settings.layout.darkMode) {
            var e = "dark";
            Apex.tooltip = {theme: e};
            var r = {
                chart: {id: "sparkline1", type: "area", height: 160, sparkline: {enabled: !0}},
                stroke: {curve: "smooth", width: 2},
                series: [{name: "Sales", data: [38, 60, 38, 52, 36, 40, 28]}],
                labels: ["1", "2", "3", "4", "5", "6", "7"],
                yaxis: {min: 0},
                colors: ["#4361ee"],
                tooltip: {x: {show: !1}},
                grid: {show: !1, xaxis: {lines: {show: !1}}, padding: {top: 5, right: 0, left: 0}},
                fill: {
                    type: "gradient",
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 1,
                        inverseColors: !1,
                        opacityFrom: .3,
                        opacityTo: .05,
                        stops: [100, 100]
                    }
                }
            }, o = {
                chart: {id: "sparkline1", type: "area", height: 160, sparkline: {enabled: !0}},
                stroke: {curve: "smooth", width: 2},
                series: [{name: "Sales", data: [60, 28, 52, 38, 40, 36, 38]}],
                labels: ["1", "2", "3", "4", "5", "6", "7"],
                yaxis: {min: 0},
                colors: ["#e7515a"],
                tooltip: {x: {show: !1}},
                grid: {show: !1, xaxis: {lines: {show: !1}}, padding: {top: 5, right: 0, left: 0}},
                fill: {
                    type: "gradient",
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 1,
                        inverseColors: !1,
                        opacityFrom: .3,
                        opacityTo: .05,
                        stops: [100, 100]
                    }
                }
            }, l = {
                chart: {id: "sparkline1", type: "area", height: 160, sparkline: {enabled: !0}},
                stroke: {curve: "smooth", width: 2},
                fill: {opacity: 1},
                series: [{name: "Sales", data: [28, 50, 36, 60, 38, 52, 38]}],
                labels: ["1", "2", "3", "4", "5", "6", "7"],
                yaxis: {min: 0},
                colors: ["#00ab55"],
                tooltip: {x: {show: !1}},
                grid: {show: !1, xaxis: {lines: {show: !1}}, padding: {top: 5, right: 0, left: 0}},
                fill: {
                    type: "gradient",
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 1,
                        inverseColors: !1,
                        opacityFrom: .3,
                        opacityTo: .05,
                        stops: [100, 100]
                    }
                }
            }, p = {
                chart: {id: "sparkline1", type: "area", height: 160, sparkline: {enabled: !0}},
                stroke: {curve: "smooth", width: 2},
                fill: {opacity: 1},
                series: [{name: "Sales", data: [28, 50, 36, 60, 38, 52, 38]}],
                labels: ["1", "2", "3", "4", "5", "6", "7"],
                yaxis: {min: 0},
                colors: ["#ffbb44"],
                tooltip: {x: {show: !1}},
                grid: {show: !1, xaxis: {lines: {show: !1}}, padding: {top: 5, right: 0, left: 0}},
                fill: {
                    type: "gradient",
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 1,
                        inverseColors: !1,
                        opacityFrom: .3,
                        opacityTo: .05,
                        stops: [100, 100]
                    }
                }
            }
        } else {
            var e = "dark";
            Apex.tooltip = {theme: e};
            var r = {
                chart: {id: "sparkline1", type: "area", height: 160, sparkline: {enabled: !0}},
                stroke: {curve: "smooth", width: 2},
                series: [{name: "Sales", data: [38, 60, 38, 52, 36, 40, 28]}],
                labels: ["1", "2", "3", "4", "5", "6", "7"],
                yaxis: {min: 0},
                colors: ["#4361ee"],
                tooltip: {x: {show: !1}},
                grid: {show: !1, xaxis: {lines: {show: !1}}, padding: {top: 5, right: 0, left: 0}},
                fill: {
                    type: "gradient",
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 1,
                        inverseColors: !1,
                        opacityFrom: .4,
                        opacityTo: .05,
                        stops: [100, 100]
                    }
                }
            }, o = {
                chart: {id: "sparkline1", type: "area", height: 160, sparkline: {enabled: !0}},
                stroke: {curve: "smooth", width: 2},
                series: [{name: "Sales", data: [60, 28, 52, 38, 40, 36, 38]}],
                labels: ["1", "2", "3", "4", "5", "6", "7"],
                yaxis: {min: 0},
                colors: ["#e7515a"],
                tooltip: {x: {show: !1}},
                grid: {show: !1, xaxis: {lines: {show: !1}}, padding: {top: 5, right: 0, left: 0}},
                fill: {
                    type: "gradient",
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 1,
                        inverseColors: !1,
                        opacityFrom: .4,
                        opacityTo: .05,
                        stops: [100, 100]
                    }
                }
            }, l = {
                chart: {id: "sparkline1", type: "area", height: 160, sparkline: {enabled: !0}},
                stroke: {curve: "smooth", width: 2},
                fill: {opacity: 1},
                series: [{name: "Sales", data: [28, 50, 36, 60, 38, 52, 38]}],
                labels: ["1", "2", "3", "4", "5", "6", "7"],
                yaxis: {min: 0},
                colors: ["#00ab55"],
                tooltip: {x: {show: !1}},
                grid: {show: !1, xaxis: {lines: {show: !1}}, padding: {top: 5, right: 0, left: 0}},
                fill: {
                    type: "gradient",
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 1,
                        inverseColors: !1,
                        opacityFrom: .4,
                        opacityTo: .05,
                        stops: [100, 100]
                    }
                }
            }, p = {
                chart: {id: "sparkline1", type: "area", height: 160, sparkline: {enabled: !0}},
                stroke: {curve: "smooth", width: 2},
                fill: {opacity: 1},
                series: [{name: "Sales", data: [28, 50, 36, 60, 38, 52, 38]}],
                labels: ["1", "2", "3", "4", "5", "6", "7"],
                yaxis: {min: 0},
                colors: ["#ffbb44"],
                tooltip: {x: {show: !1}},
                grid: {show: !1, xaxis: {lines: {show: !1}}, padding: {top: 5, right: 0, left: 0}},
                fill: {
                    type: "gradient",
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 1,
                        inverseColors: !1,
                        opacityFrom: .3,
                        opacityTo: .05,
                        stops: [100, 100]
                    }
                }
            }
        }
        let a = new ApexCharts(document.querySelector("#hybrid_followers"), r);
        a.render();
        let i = new ApexCharts(document.querySelector("#hybrid_followers1"), o);
        i.render();
        let s = new ApexCharts(document.querySelector("#hybrid_followers3"), l);
        s.render();
        let u = new ApexCharts(document.querySelector("#hybrid_followers4"), p);
        u.render(), document.querySelector(".theme-toggle").addEventListener("click", function () {
            let n = sessionStorage.getItem("theme");
            JSON.parse(n).settings.layout.darkMode ? (a.updateOptions({
                fill: {
                    type: "gradient",
                    gradient: {opacityFrom: .3}
                }
            }), i.updateOptions({
                fill: {
                    type: "gradient",
                    gradient: {opacityFrom: .3}
                }
            }), s.updateOptions({
                fill: {
                    type: "gradient",
                    gradient: {opacityFrom: .3}
                }
            })) : (a.updateOptions({
                fill: {
                    type: "gradient",
                    gradient: {opacityFrom: .4}
                }
            }), i.updateOptions({
                fill: {
                    type: "gradient",
                    gradient: {opacityFrom: .4}
                }
            }), s.updateOptions({fill: {type: "gradient", gradient: {opacityFrom: .4}}}))
        })
    } catch (t) {
        console.log(t)
    }
});
