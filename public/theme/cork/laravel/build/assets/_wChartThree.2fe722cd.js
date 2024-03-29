window.addEventListener("load", function () {
    try {
        let t = sessionStorage.getItem("theme");
        if (JSON.parse(t).settings.layout.darkMode) {
            var e = "dark";
            Apex.tooltip = {theme: e};
            var a = {
                chart: {height: 350, type: "bar", toolbar: {show: !1}},
                colors: ["#4361ee","#e7515a","#00ab55","#ffbb44"],
                plotOptions: {bar: {horizontal: !1, columnWidth: "55%", endingShape: "rounded", borderRadius: 10}},
                dataLabels: {enabled: !1},
                legend: {
                    position: "bottom",
                    horizontalAlign: "center",
                    fontSize: "14px",
                    markers: {width: 10, height: 10, offsetX: -5, offsetY: 0},
                    itemMargin: {horizontal: 10, vertical: 8}
                },
                grid: {borderColor: "#191e3a"},
                stroke: {show: !0, width: 2, colors: ["transparent"]},
                series: [
                    {name: "PM2.5", data: [58, 44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 63]},
                    {name: "PM10", data: [91, 76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 70]},
                    {name: "VOC", data: [91, 76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 70]},
                    {name: "Ozon", data: [91, 76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 70]}
                ],
                xaxis: {categories: ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu"]},
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: e,
                        type: "vertical",
                        shadeIntensity: .3,
                        inverseColors: !1,
                        opacityFrom: 1,
                        opacityTo: .8,
                        stops: [0, 100]
                    }
                },
                tooltip: {
                    marker: {show: !1}, theme: e, y: {
                        formatter: function (r) {
                            return r
                        }
                    }
                },
                responsive: [{breakpoint: 767, options: {plotOptions: {bar: {borderRadius: 0, columnWidth: "50%"}}}}]
            }
        } else {
            var e = "dark";
            Apex.tooltip = {theme: e};
            var a = {
                chart: {height: 350, type: "bar", toolbar: {show: !1}},
                colors: ["#e7515a", "#ffbb44","#4361ee","#00ab55"],
                plotOptions: {bar: {horizontal: !1, columnWidth: "55%", endingShape: "rounded", borderRadius: 10}},
                dataLabels: {enabled: !1},
                legend: {
                    position: "bottom",
                    horizontalAlign: "center",
                    fontSize: "14px",
                    markers: {width: 10, height: 10, offsetX: -5, offsetY: 0},
                    itemMargin: {horizontal: 10, vertical: 8}
                },
                grid: {borderColor: "#e0e6ed"},
                stroke: {show: !0, width: 2, colors: ["transparent"]},
                series: [
                    {name: "PM2.5", data: [58, 44, 55, 57, 56, 61, 58]},
                    {name: "PM10", data: [91, 76, 85, 101, 98, 87, 105]},
                    {name: "VOC", data: [91, 76, 85, 101, 98, 87, 105]},
                    {name: "Ozon", data: [91, 76, 85, 101, 98, 87, 105]},
                ],
                xaxis: {categories: ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu"]},
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: e,
                        type: "vertical",
                        shadeIntensity: .3,
                        inverseColors: !1,
                        opacityFrom: 1,
                        opacityTo: .8,
                        stops: [0, 100]
                    }
                },
                tooltip: {
                    marker: {show: !1}, theme: e, y: {
                        formatter: function (i) {
                            return i
                        }
                    }
                },
                responsive: [{breakpoint: 767, options: {plotOptions: {bar: {borderRadius: 0, columnWidth: "50%"}}}}]
            }
        }
        let o = new ApexCharts(document.querySelector("#uniqueVisits"), a);
        o.render(), document.querySelector(".theme-toggle").addEventListener("click", function () {
            let r = sessionStorage.getItem("theme");
            JSON.parse(r).settings.layout.darkMode ? o.updateOptions({grid: {borderColor: "#191e3a"}}) : o.updateOptions({grid: {borderColor: "#e0e6ed"}})
        })
    } catch (t) {
        console.log(t)
    }
});
