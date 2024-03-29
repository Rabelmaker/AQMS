window.addEventListener("load", function () {
    try {
        let o = sessionStorage.getItem("theme");
        if (JSON.parse(o).settings.layout.darkMode) {
            var e = "dark";
            Apex.tooltip = {theme: e};
            var a = {
                chart: {
                    fontFamily: "Nunito, sans-serif",
                    height: 365,
                    type: "area",
                    zoom: {enabled: !1},
                    dropShadow: {enabled: !0, opacity: .2, blur: 10, left: -7, top: 22},
                    toolbar: {show: !1}
                },
                colors: ["#e7515a", "#2196f3"],
                dataLabels: {enabled: !1},
                markers: {
                    discrete: [{
                        seriesIndex: 0,
                        dataPointIndex: 7,
                        fillColor: "#000",
                        strokeColor: "#000",
                        size: 5
                    }, {seriesIndex: 2, dataPointIndex: 11, fillColor: "#000", strokeColor: "#000", size: 4}]
                },
                subtitle: {
                    text: "$10,840",
                    align: "left",
                    margin: 0,
                    offsetX: 100,
                    offsetY: 20,
                    floating: !1,
                    style: {fontSize: "18px", color: "#00ab55"}
                },
                title: {
                    text: "Total Profit",
                    align: "left",
                    margin: 0,
                    offsetX: -10,
                    offsetY: 20,
                    floating: !1,
                    style: {fontSize: "18px", color: "#bfc9d4"}
                },
                stroke: {show: !0, curve: "smooth", width: 2, lineCap: "square"},
                series: [{
                    name: "Expenses",
                    data: [16800, 16800, 15500, 14800, 15500, 17e3, 21e3, 16e3, 15e3, 17e3, 14e3, 17e3]
                }, {
                    name: "Income",
                    data: [16500, 17500, 16200, 17300, 16e3, 21500, 16e3, 17e3, 16e3, 19e3, 18e3, 19e3]
                }],
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                xaxis: {
                    axisBorder: {show: !1},
                    axisTicks: {show: !1},
                    crosshairs: {show: !0},
                    labels: {
                        offsetX: 0,
                        offsetY: 5,
                        style: {fontSize: "12px", fontFamily: "Nunito, sans-serif", cssClass: "apexcharts-xaxis-title"}
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function (s, i) {
                            return s / 1e3 + "K"
                        },
                        offsetX: -15,
                        offsetY: 0,
                        style: {fontSize: "12px", fontFamily: "Nunito, sans-serif", cssClass: "apexcharts-yaxis-title"}
                    }
                },
                grid: {
                    borderColor: "#191e3a",
                    strokeDashArray: 5,
                    xaxis: {lines: {show: !0}},
                    yaxis: {lines: {show: !1}},
                    padding: {top: -50, right: 0, bottom: 0, left: 5}
                },
                legend: {
                    position: "top",
                    horizontalAlign: "right",
                    offsetY: -50,
                    fontSize: "16px",
                    fontFamily: "Quicksand, sans-serif",
                    markers: {
                        width: 10,
                        height: 10,
                        strokeWidth: 0,
                        strokeColor: "#fff",
                        fillColors: void 0,
                        radius: 12,
                        onClick: void 0,
                        offsetX: -5,
                        offsetY: 0
                    },
                    itemMargin: {horizontal: 10, vertical: 20}
                },
                tooltip: {theme: e, marker: {show: !0}, x: {show: !1}},
                fill: {
                    type: "gradient",
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 1,
                        inverseColors: !1,
                        opacityFrom: .19,
                        opacityTo: .05,
                        stops: [100, 100]
                    }
                },
                responsive: [{breakpoint: 575, options: {legend: {offsetY: -50}}}]
            }
        } else {
            var e = "dark";
            Apex.tooltip = {theme: e};
            var a = {
                chart: {
                    fontFamily: "Nunito, sans-serif",
                    height: 365,
                    type: "area",
                    zoom: {enabled: !1},
                    dropShadow: {enabled: !0, opacity: .2, blur: 10, left: -7, top: 22},
                    toolbar: {show: !1}
                },
                colors: ["#1b55e2", "#e7515a"],
                dataLabels: {enabled: !1},
                markers: {
                    discrete: [{
                        seriesIndex: 0,
                        dataPointIndex: 7,
                        fillColor: "#000",
                        strokeColor: "#000",
                        size: 5
                    }, {seriesIndex: 2, dataPointIndex: 11, fillColor: "#000", strokeColor: "#000", size: 4}]
                },
                subtitle: {
                    text: "$10,840",
                    align: "left",
                    margin: 0,
                    offsetX: 100,
                    offsetY: 20,
                    floating: !1,
                    style: {fontSize: "18px", color: "#4361ee"}
                },
                title: {
                    text: "Total Profit",
                    align: "left",
                    margin: 0,
                    offsetX: -10,
                    offsetY: 20,
                    floating: !1,
                    style: {fontSize: "18px", color: "#0e1726"}
                },
                stroke: {show: !0, curve: "smooth", width: 2, lineCap: "square"},
                series: [{
                    name: "Expenses",
                    data: [16800, 16800, 15500, 14800, 15500, 17e3, 21e3, 16e3, 15e3, 17e3, 14e3, 17e3]
                }, {
                    name: "Income",
                    data: [16500, 17500, 16200, 17300, 16e3, 21500, 16e3, 17e3, 16e3, 19e3, 18e3, 19e3]
                }],
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                xaxis: {
                    axisBorder: {show: !1},
                    axisTicks: {show: !1},
                    crosshairs: {show: !0},
                    labels: {
                        offsetX: 0,
                        offsetY: 5,
                        style: {fontSize: "12px", fontFamily: "Nunito, sans-serif", cssClass: "apexcharts-xaxis-title"}
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function (r, f) {
                            return r / 1e3 + "K"
                        },
                        offsetX: -15,
                        offsetY: 0,
                        style: {fontSize: "12px", fontFamily: "Nunito, sans-serif", cssClass: "apexcharts-yaxis-title"}
                    }
                },
                grid: {
                    borderColor: "#e0e6ed",
                    strokeDashArray: 5,
                    xaxis: {lines: {show: !0}},
                    yaxis: {lines: {show: !1}},
                    padding: {top: -50, right: 0, bottom: 0, left: 5}
                },
                legend: {
                    position: "top",
                    horizontalAlign: "right",
                    offsetY: -50,
                    fontSize: "16px",
                    fontFamily: "Quicksand, sans-serif",
                    markers: {
                        width: 10,
                        height: 10,
                        strokeWidth: 0,
                        strokeColor: "#fff",
                        fillColors: void 0,
                        radius: 12,
                        onClick: void 0,
                        offsetX: -5,
                        offsetY: 0
                    },
                    itemMargin: {horizontal: 10, vertical: 20}
                },
                tooltip: {theme: e, marker: {show: !0}, x: {show: !1}},
                fill: {
                    type: "gradient",
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 1,
                        inverseColors: !1,
                        opacityFrom: .19,
                        opacityTo: .05,
                        stops: [100, 100]
                    }
                },
                responsive: [{breakpoint: 575, options: {legend: {offsetY: -50}}}]
            }
        }
        var t = new ApexCharts(document.querySelector("#revenueMonthly"), a);
        t.render(), document.querySelector(".theme-toggle").addEventListener("click", function () {
            let s = sessionStorage.getItem("theme");
            JSON.parse(s).settings.layout.darkMode ? t.updateOptions({
                colors: ["#e7515a", "#2196f3"],
                subtitle: {style: {color: "#00ab55"}},
                title: {style: {color: "#bfc9d4"}},
                grid: {borderColor: "#191e3a"}
            }) : t.updateOptions({
                colors: ["#1b55e2", "#e7515a"],
                subtitle: {style: {color: "#4361ee"}},
                title: {style: {color: "#0e1726"}},
                grid: {borderColor: "#e0e6ed"}
            })
        })
    } catch (o) {
        console.log(o)
    }
});
