(() => {
    function e(e) {
        var t = $(e).attr("data-colors");
        return (t = JSON.parse(t)).map(function (e) {
            var t = e.replace(" ", "");
            if (-1 == t.indexOf("--")) return t;
            var r = getComputedStyle(document.documentElement).getPropertyValue(t);
            return r || void 0;
        });
    }
    var t = { series: [60, 40], chart: { type: "donut", height: 110 }, colors: e("#mini-chart1"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart1"), t).render();
    t = { series: [30, 55], chart: { type: "donut", height: 110 }, colors: e("#mini-chart2"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart2"), t).render();
    t = { series: [65, 45], chart: { type: "donut", height: 110 }, colors: e("#mini-chart3"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart3"), t).render();
    t = { series: [30, 70], chart: { type: "donut", height: 110 }, colors: e("#mini-chart4"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart4"), t).render();
    t = { series: [30, 70], chart: { type: "donut", height: 110 }, colors: e("#mini-chart5"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart5"), t).render();
    t = { series: [30, 70], chart: { type: "donut", height: 110 }, colors: e("#mini-chart6"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart6"), t).render();
    t = { series: [30, 70], chart: { type: "donut", height: 110 }, colors: e("#mini-chart7"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart7"), t).render();
    t = { series: [30, 70], chart: { type: "donut", height: 110 }, colors: e("#mini-chart8"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart8"), t).render();
    t = { series: [30, 70], chart: { type: "donut", height: 110 }, colors: e("#mini-chart9"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart9"), t).render();
    t = { series: [30, 70], chart: { type: "donut", height: 110 }, colors: e("#mini-chart10"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart10"), t).render();
    t = { series: [30, 70], chart: { type: "donut", height: 110 }, colors: e("#mini-chart11"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart11"), t).render();
    t = { series: [30, 70], chart: { type: "donut", height: 110 }, colors: e("#mini-chart12"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart12"), t).render();
    t = { series: [30, 70], chart: { type: "donut", height: 110 }, colors: e("#mini-chart13"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart13"), t).render();
    t = { series: [30, 70], chart: { type: "donut", height: 110 }, colors: e("#mini-chart14"), legend: { show: !1 }, dataLabels: { enabled: !1 } };
    new ApexCharts(document.querySelector("#mini-chart14"), t).render();
    t = {
        series: [
            { name: "Profit", data: [12.45, 16.2, 8.9, 11.42, 12.6, 18.1, 18.2, 14.16, 11.1, 8.09, 16.34, 12.88] },
            { name: "Loss", data: [-11.45, -15.42, -7.9, -12.42, -12.6, -18.1, -18.2, -14.16, -11.1, -7.09, -15.34, -11.88] },
        ],
        chart: { type: "bar", height: 400, stacked: !0, toolbar: { show: !1 } },
        plotOptions: { bar: { columnWidth: "20%" } },
        colors: e("#market-overview"),
        fill: { opacity: 1 },
        dataLabels: { enabled: !1 },
        legend: { show: !1 },
        yaxis: {
            labels: {
                formatter: function (e) {
                    return e.toFixed(0) + "%";
                },
            },
        },
        xaxis: { categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], labels: { rotate: -90 } },
    };
    new ApexCharts(document.querySelector("#market-overview"), t).render();
    // var r = e("#sales-by-locations");
    // $("#sales-by-locations").vectorMap({
    //     map: "world_mill_en",
    //     normalizeFunction: "polynomial",
    //     hoverOpacity: 0.7,
    //     hoverColor: !1,
    //     regionStyle: { initial: { fill: "#e9e9ef" } },
    //     markerStyle: { initial: { r: 9, fill: r, "fill-opacity": 0.9, stroke: "#fff", "stroke-width": 7, "stroke-opacity": 0.4 }, hover: { stroke: "#fff", "fill-opacity": 1, "stroke-width": 1.5 } },
    //     backgroundColor: "transparent",
    //     markers: [
    //         { latLng: [41.9, 12.45], name: "USA" },
    //         { latLng: [12.05, -61.75], name: "Russia" },
    //         { latLng: [1.3, 103.8], name: "Australia" },
    //     ],
    // });
})();
