window.addEventListener("load", function () {
    try {
        let a = sessionStorage.getItem("theme");
        if (JSON.parse(a).settings.layout.darkMode) {
            var e = "dark";
            Apex.tooltip = {theme: e};
            var o = {
                chart: {
                    id: "sparkline1",
                    group: "sparklines",
                    type: "area",
                    height: 290,
                    sparkline: {enabled: !0}
                },
                stroke: {curve: "smooth", width: 2},
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
                },
                series: [{name: "Sales", data: [28, 40, 36, 52, 38, 60, 38, 52, 36, 40]}],
                labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
                yaxis: {min: 0},
                grid: {padding: {top: 125, right: 0, bottom: 0, left: 0}},
                tooltip: {x: {show: !1}, theme: e},
                colors: ["#00ab55"]
            }
        } else {
            var e = "dark";
            Apex.tooltip = {theme: e};
            var o = {
                chart: {
                    id: "sparkline1",
                    group: "sparklines",
                    type: "area",
                    height: 290,
                    sparkline: {enabled: !0}
                },
                stroke: {curve: "smooth", width: 2},
                fill: {opacity: 1},
                series: [{name: "Sales", data: [28, 40, 36, 52, 38, 60, 38, 52, 36, 40]}],
                labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
                yaxis: {min: 0},
                grid: {padding: {top: 125, right: 0, bottom: 0, left: 0}},
                tooltip: {x: {show: !1}, theme: e},
                colors: ["#00ab55"]
            }
        }
        var t = new ApexCharts(document.querySelector("#total-orders"), o);
        t.render(), document.querySelector(".theme-toggle").addEventListener("click", function () {
            let r = sessionStorage.getItem("theme");
            JSON.parse(r).settings.layout.darkMode ? t.updateOptions({
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
            }) : t.updateOptions({
                fill: {
                    type: "gradient",
                    opacity: .9,
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 1,
                        inverseColors: !1,
                        opacityFrom: .45,
                        opacityTo: .1,
                        stops: [100, 100]
                    }
                }
            })
        })
    } catch (a) {
        console.log(a)
    }
});
