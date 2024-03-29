window.addEventListener("load", function () {
    try {
        let a = sessionStorage.getItem("theme");
        if (JSON.parse(a).settings.layout.darkMode) {
            var e = "dark";
            Apex.tooltip = {theme: e};
            var s = {
                chart: {height: 160, type: "bar", stacked: !0, stackType: "100%", toolbar: {show: !1}},
                dataLabels: {enabled: !1},
                stroke: {show: !0, width: [3, 4], curve: "smooth"},
                colors: ["#e2a03f", "#e0e6ed"],
                series: [{name: "Sales", data: [44, 55, 41, 67, 22, 43, 21]}, {
                    name: "Last Week",
                    data: [13, 23, 20, 8, 13, 27, 33]
                }],
                xaxis: {
                    labels: {show: !1},
                    categories: ["Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat"],
                    crosshairs: {show: !1}
                },
                yaxis: {show: !1},
                fill: {opacity: 1},
                plotOptions: {bar: {horizontal: !1, columnWidth: "25%", borderRadius: 8}},
                legend: {show: !1},
                grid: {show: !1, xaxis: {lines: {show: !1}}, padding: {top: -20, right: 0, bottom: -40, left: 0}},
                responsive: [{breakpoint: 575, options: {plotOptions: {bar: {borderRadius: 5, columnWidth: "35%"}}}}]
            }
        } else {
            var e = "dark";
            Apex.tooltip = {theme: e};
            var s = {
                chart: {height: 160, type: "bar", stacked: !0, stackType: "100%", toolbar: {show: !1}},
                dataLabels: {enabled: !1},
                stroke: {show: !0, width: [3, 4], curve: "smooth"},
                colors: ["#e2a03f", "#e0e6ed"],
                series: [{name: "Sales", data: [44, 55, 41, 67, 22, 43, 21]}, {
                    name: "Last Week",
                    data: [13, 23, 20, 8, 13, 27, 33]
                }],
                xaxis: {
                    labels: {show: !1},
                    categories: ["Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat"],
                    crosshairs: {show: !1}
                },
                yaxis: {show: !1},
                fill: {opacity: 1},
                plotOptions: {bar: {horizontal: !1, columnWidth: "25%", borderRadius: 8}},
                legend: {show: !1},
                grid: {show: !1, xaxis: {lines: {show: !1}}, padding: {top: -20, right: 0, bottom: -40, left: 0}},
                responsive: [{breakpoint: 575, options: {plotOptions: {bar: {borderRadius: 5, columnWidth: "35%"}}}}]
            }
        }
        var t = new ApexCharts(document.querySelector("#daily-sales"), s);
        t.render()
    } catch (a) {
        console.log(a)
    }
});
