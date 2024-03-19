type = ["primary", "info", "success", "warning", "danger"];

demo = {
    initPickColor: function () {
        $(".pick-class-label").click(function () {
            var new_class = $(this).attr("new-class");
            var old_class = $("#display-buttons").attr("data-class");
            var display_div = $("#display-buttons");
            if (display_div.length) {
                var display_buttons = display_div.find(".btn");
                display_buttons.removeClass(old_class);
                display_buttons.addClass(new_class);
                display_div.attr("data-class", new_class);
            }
        });
    },

    initDocChart: function () {
        chartColor = "#FFFFFF";

        // General configuration for the charts with Line gradientStroke
        gradientChartOptionsConfiguration = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
            tooltips: {
                bodySpacing: 4,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10,
            },
            responsive: true,
            scales: {
                yAxes: [
                    {
                        display: 0,
                        gridLines: 0,
                        ticks: {
                            display: false,
                        },
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawTicks: false,
                            display: false,
                            drawBorder: false,
                        },
                    },
                ],
                xAxes: [
                    {
                        display: 0,
                        gridLines: 0,
                        ticks: {
                            display: false,
                        },
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawTicks: false,
                            display: false,
                            drawBorder: false,
                        },
                    },
                ],
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 15,
                    bottom: 15,
                },
            },
        };

        ctx = document.getElementById("lineChartExample").getContext("2d");

        gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
        gradientStroke.addColorStop(0, "#80b6f4");
        gradientStroke.addColorStop(1, chartColor);

        gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
        gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");

        myChart = new Chart(ctx, {
            type: "line",
            responsive: true,
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                datasets: [
                    {
                        label: "Active Users",
                        borderColor: "#f96332",
                        pointBorderColor: "#FFF",
                        pointBackgroundColor: "#f96332",
                        pointBorderWidth: 2,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 1,
                        pointRadius: 4,
                        fill: true,
                        backgroundColor: gradientFill,
                        borderWidth: 2,
                        data: [
                            542, 480, 430, 550, 530, 453, 380, 434, 568, 610,
                            700, 630,
                        ],
                    },
                ],
            },
            options: gradientChartOptionsConfiguration,
        });
    },

    initDashboardPageCharts: function () {
        gradientChartOptionsConfigurationWithTooltipBlue = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },

            tooltips: {
                backgroundColor: "#f5f5f5",
                titleFontColor: "#333",
                bodyFontColor: "#666",
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
            },
            responsive: true,
            scales: {
                yAxes: [
                    {
                        barPercentage: 1.6,
                        gridLines: {
                            drawBorder: false,
                            color: "rgba(29,140,248,0.0)",
                            zeroLineColor: "transparent",
                        },
                        ticks: {
                            suggestedMin: 60,
                            suggestedMax: 125,
                            padding: 20,
                            fontColor: "#2380f7",
                        },
                    },
                ],

                xAxes: [
                    {
                        barPercentage: 1.6,
                        gridLines: {
                            drawBorder: false,
                            color: "rgba(29,140,248,0.1)",
                            zeroLineColor: "transparent",
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "#2380f7",
                        },
                    },
                ],
            },
        };

        gradientChartOptionsConfigurationWithTooltipPurple = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },

            tooltips: {
                backgroundColor: "#f5f5f5",
                titleFontColor: "#333",
                bodyFontColor: "#666",
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
            },
            responsive: true,
            scales: {
                yAxes: [
                    {
                        barPercentage: 1.6,
                        gridLines: {
                            drawBorder: false,
                            color: "rgba(29,140,248,0.0)",
                            zeroLineColor: "transparent",
                        },
                        ticks: {
                            suggestedMin: 60,
                            suggestedMax: 125,
                            padding: 20,
                            fontColor: "#9a9a9a",
                        },
                    },
                ],

                xAxes: [
                    {
                        barPercentage: 1.6,
                        gridLines: {
                            drawBorder: false,
                            color: "rgba(225,78,202,0.1)",
                            zeroLineColor: "transparent",
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "#9a9a9a",
                        },
                    },
                ],
            },
        };

        gradientChartOptionsConfigurationWithTooltipOrange = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },

            tooltips: {
                backgroundColor: "#f5f5f5",
                titleFontColor: "#333",
                bodyFontColor: "#666",
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
            },
            responsive: true,
            scales: {
                yAxes: [
                    {
                        barPercentage: 1.6,
                        gridLines: {
                            drawBorder: false,
                            color: "rgba(29,140,248,0.0)",
                            zeroLineColor: "transparent",
                        },
                        ticks: {
                            suggestedMin: 50,
                            suggestedMax: 110,
                            padding: 20,
                            fontColor: "#ff8a76",
                        },
                    },
                ],

                xAxes: [
                    {
                        barPercentage: 1.6,
                        gridLines: {
                            drawBorder: false,
                            color: "rgba(220,53,69,0.1)",
                            zeroLineColor: "transparent",
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "#ff8a76",
                        },
                    },
                ],
            },
        };

        gradientChartOptionsConfigurationWithTooltipGreen = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },

            tooltips: {
                backgroundColor: "#f5f5f5",
                titleFontColor: "#333",
                bodyFontColor: "#666",
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
            },
            responsive: true,
            scales: {
                yAxes: [
                    {
                        barPercentage: 1.6,
                        gridLines: {
                            drawBorder: false,
                            color: "rgba(29,140,248,0.0)",
                            zeroLineColor: "transparent",
                        },
                        ticks: {
                            suggestedMin: 50,
                            suggestedMax: 125,
                            padding: 20,
                            fontColor: "#9e9e9e",
                        },
                    },
                ],

                xAxes: [
                    {
                        barPercentage: 1.6,
                        gridLines: {
                            drawBorder: false,
                            color: "rgba(0,242,195,0.1)",
                            zeroLineColor: "transparent",
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "#9e9e9e",
                        },
                    },
                ],
            },
        };

        gradientBarChartConfiguration = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },

            tooltips: {
                backgroundColor: "#f5f5f5",
                titleFontColor: "#333",
                bodyFontColor: "#666",
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
            },
            responsive: true,
            scales: {
                yAxes: [
                    {
                        gridLines: {
                            drawBorder: false,
                            color: "rgba(29,140,248,0.1)",
                            zeroLineColor: "transparent",
                        },
                        ticks: {
                            suggestedMin: 60,
                            suggestedMax: 120,
                            padding: 20,
                            fontColor: "#9e9e9e",
                        },
                    },
                ],

                xAxes: [
                    {
                        gridLines: {
                            drawBorder: false,
                            color: "rgba(29,140,248,0.1)",
                            zeroLineColor: "transparent",
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "#9e9e9e",
                        },
                    },
                ],
            },
        };
        // Make AJAX request to retrieve data
        fetch("/getTypeWiseGivingData")
            .then((response) => response.json())
            .then((data) => {
                // Extract types and total amounts from data
                const types = data.map((entry) => entry.type);
                const totalAmounts = data.map((entry) => entry.total_amount);

                // Create chart
                var ctx = document
                    .getElementById("GivingChart1")
                    .getContext("2d");
                var myChart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: types, // Ensure correct labels are used
                        datasets: [
                            {
                                label: "Total Amount Received",
                                backgroundColor: "#00d6b4",
                                borderColor: "#00d6b4",
                                borderWidth: 1,
                                data: totalAmounts,
                            },
                        ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true,
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: "Total Amount Received",
                                    },
                                },
                            ],
                            xAxes: [
                                {
                                    scaleLabel: {
                                        display: true,
                                        labelString: "Type",
                                    },
                                    // Specify the x-axis type as "category" to ensure correct label display
                                    type: "category",
                                },
                            ],
                        },
                        title: {
                            display: true,
                            text: "Total Amount Received per Type",
                        },
                    },
                });
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });

        $(document).ready(function () {
            // Make AJAX request to retrieve data
            $.ajax({
                url: "/getGenderAndAgesData",
                type: "GET",
                success: function (response) {
                    // Parse response data
                    var maleAverageAge = response.maleAverageAge;
                    var femaleAverageAge = response.femaleAverageAge;

                    // Create chart
                    var ctx = document
                        .getElementById("chartLinePurple")
                        .getContext("2d");
                    var myChart = new Chart(ctx, {
                        type: "bar",
                        data: {
                            labels: ["Male", "Female"],
                            datasets: [
                                {
                                    label: "Average Age",
                                    data: [maleAverageAge, femaleAverageAge],
                                    backgroundColor: [
                                        "rgba(54, 162, 235, 0.5)",
                                        "rgba(255, 99, 132, 0.5)",
                                    ],
                                    borderColor: [
                                        "rgba(54, 162, 235, 1)",
                                        "rgba(255, 99, 132, 1)",
                                    ],
                                    borderWidth: 1,
                                },
                            ],
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                            scales: {
                                yAxes: [
                                    {
                                        ticks: {
                                            beginAtZero: true,
                                            stepSize: 10,
                                            max: 70,
                                        },
                                        scaleLabel: {
                                            display: true,
                                            labelString: "Age",
                                        },
                                    },
                                ],
                                xAxes: [
                                    {
                                        scaleLabel: {
                                            display: true,
                                            labelString: "Gender",
                                        },
                                    },
                                ],
                            },
                            title: {
                                display: true,
                                text: "Average Ages by Gender",
                            },
                            legend: {
                                display: false,
                            },
                        },
                    });
                },
                error: function (xhr, status, error) {
                    console.error(error);
                },
            });
        });

        var ctxGreen = document
            .getElementById("attendanceChart")
            .getContext("2d");

        // Make AJAX request to retrieve data
        fetch("/getYearlyAttendanceData")
            .then((response) => response.json())
            .then((data) => {
                // Extract years and attendance counts from data
                const years = data.map((entry) => entry.year);
                const attendanceCounts = data.map(
                    (entry) => entry.attendance_count
                );

                // Create chart
                var myChart = new Chart(ctxGreen, {
                    type: "line",
                    data: {
                        labels: years,
                        datasets: [
                            {
                                label: "Yearly Attendance",
                                fill: true,
                                backgroundColor: gradientStroke,
                                borderColor: "#00d6b4",
                                borderWidth: 2,
                                borderDash: [],
                                borderDashOffset: 0.0,
                                pointBackgroundColor: "#00d6b4",
                                pointBorderColor: "rgba(255,255,255,0)",
                                pointHoverBackgroundColor: "#00d6b4",
                                pointBorderWidth: 20,
                                pointHoverRadius: 4,
                                pointHoverBorderWidth: 15,
                                pointRadius: 4,
                                data: attendanceCounts,
                            },
                        ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true,
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: "Attendance Count",
                                    },
                                },
                            ],
                            xAxes: [
                                {
                                    scaleLabel: {
                                        display: true,
                                        labelString: "Year",
                                    },
                                },
                            ],
                        },
                        title: {
                            display: true,
                            text: "Yearly Attendance",
                        },
                    },
                });
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
        // Make AJAX request to retrieve data
        fetch("/getYearlyGivingData")
            .then((response) => response.json())
            .then((data) => {
                // Extract years and total amounts from data
                const years = data.map((entry) => entry.year);
                const totalAmounts = data.map((entry) => entry.total_amount);

                // Create chart
                var ctx = document
                    .getElementById("GivingChart")
                    .getContext("2d");
                var myChart = new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: years,
                        datasets: [
                            {
                                label: "Total Amount Received",
                                fill: true,
                                backgroundColor: gradientStroke,
                                borderColor: "#00d6b4",
                                borderWidth: 2,
                                borderDash: [],
                                borderDashOffset: 0.0,
                                pointBackgroundColor: "#00d6b4",
                                pointBorderColor: "rgba(255,255,255,0)",
                                pointHoverBackgroundColor: "#00d6b4",
                                pointBorderWidth: 20,
                                pointHoverRadius: 4,
                                pointHoverBorderWidth: 15,
                                pointRadius: 4,
                                data: totalAmounts,
                            },
                        ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true,
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: "Total Amount Received",
                                    },
                                },
                            ],
                            xAxes: [
                                {
                                    scaleLabel: {
                                        display: true,
                                        labelString: "Year",
                                    },
                                },
                            ],
                        },
                        title: {
                            display: true,
                            text: "Total Amount Received per Year",
                        },
                    },
                });
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
        var ctx = document.getElementById("CountryChart").getContext("2d");

        var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

        gradientStroke.addColorStop(1, "rgba(29,140,248,0.2)");
        gradientStroke.addColorStop(0.4, "rgba(29,140,248,0.0)");
        gradientStroke.addColorStop(0, "rgba(29,140,248,0)"); //blue colors

        var myChart = new Chart(ctx, {
            type: "bar",
            responsive: true,
            legend: {
                display: false,
            },
            data: {
                labels: ["USA", "GER", "AUS", "UK", "RO", "BR"],
                datasets: [
                    {
                        label: "Countries",
                        fill: true,
                        backgroundColor: gradientStroke,
                        hoverBackgroundColor: gradientStroke,
                        borderColor: "#1f8ef1",
                        borderWidth: 2,
                        borderDash: [],
                        borderDashOffset: 0.0,
                        data: [53, 20, 10, 80, 100, 45],
                    },
                ],
            },
            options: gradientBarChartConfiguration,
        });
    },

    initGoogleMaps: function () {
        var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
        var mapOptions = {
            zoom: 13,
            center: myLatlng,
            scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
            styles: [
                {
                    elementType: "geometry",
                    stylers: [
                        {
                            color: "#1d2c4d",
                        },
                    ],
                },
                {
                    elementType: "labels.text.fill",
                    stylers: [
                        {
                            color: "#8ec3b9",
                        },
                    ],
                },
                {
                    elementType: "labels.text.stroke",
                    stylers: [
                        {
                            color: "#1a3646",
                        },
                    ],
                },
                {
                    featureType: "administrative.country",
                    elementType: "geometry.stroke",
                    stylers: [
                        {
                            color: "#4b6878",
                        },
                    ],
                },
                {
                    featureType: "administrative.land_parcel",
                    elementType: "labels.text.fill",
                    stylers: [
                        {
                            color: "#64779e",
                        },
                    ],
                },
                {
                    featureType: "administrative.province",
                    elementType: "geometry.stroke",
                    stylers: [
                        {
                            color: "#4b6878",
                        },
                    ],
                },
                {
                    featureType: "landscape.man_made",
                    elementType: "geometry.stroke",
                    stylers: [
                        {
                            color: "#334e87",
                        },
                    ],
                },
                {
                    featureType: "landscape.natural",
                    elementType: "geometry",
                    stylers: [
                        {
                            color: "#023e58",
                        },
                    ],
                },
                {
                    featureType: "poi",
                    elementType: "geometry",
                    stylers: [
                        {
                            color: "#283d6a",
                        },
                    ],
                },
                {
                    featureType: "poi",
                    elementType: "labels.text.fill",
                    stylers: [
                        {
                            color: "#6f9ba5",
                        },
                    ],
                },
                {
                    featureType: "poi",
                    elementType: "labels.text.stroke",
                    stylers: [
                        {
                            color: "#1d2c4d",
                        },
                    ],
                },
                {
                    featureType: "poi.park",
                    elementType: "geometry.fill",
                    stylers: [
                        {
                            color: "#023e58",
                        },
                    ],
                },
                {
                    featureType: "poi.park",
                    elementType: "labels.text.fill",
                    stylers: [
                        {
                            color: "#3C7680",
                        },
                    ],
                },
                {
                    featureType: "road",
                    elementType: "geometry",
                    stylers: [
                        {
                            color: "#304a7d",
                        },
                    ],
                },
                {
                    featureType: "road",
                    elementType: "labels.text.fill",
                    stylers: [
                        {
                            color: "#98a5be",
                        },
                    ],
                },
                {
                    featureType: "road",
                    elementType: "labels.text.stroke",
                    stylers: [
                        {
                            color: "#1d2c4d",
                        },
                    ],
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry",
                    stylers: [
                        {
                            color: "#2c6675",
                        },
                    ],
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry.fill",
                    stylers: [
                        {
                            color: "#9d2a80",
                        },
                    ],
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry.stroke",
                    stylers: [
                        {
                            color: "#9d2a80",
                        },
                    ],
                },
                {
                    featureType: "road.highway",
                    elementType: "labels.text.fill",
                    stylers: [
                        {
                            color: "#b0d5ce",
                        },
                    ],
                },
                {
                    featureType: "road.highway",
                    elementType: "labels.text.stroke",
                    stylers: [
                        {
                            color: "#023e58",
                        },
                    ],
                },
                {
                    featureType: "transit",
                    elementType: "labels.text.fill",
                    stylers: [
                        {
                            color: "#98a5be",
                        },
                    ],
                },
                {
                    featureType: "transit",
                    elementType: "labels.text.stroke",
                    stylers: [
                        {
                            color: "#1d2c4d",
                        },
                    ],
                },
                {
                    featureType: "transit.line",
                    elementType: "geometry.fill",
                    stylers: [
                        {
                            color: "#283d6a",
                        },
                    ],
                },
                {
                    featureType: "transit.station",
                    elementType: "geometry",
                    stylers: [
                        {
                            color: "#3a4762",
                        },
                    ],
                },
                {
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [
                        {
                            color: "#0e1626",
                        },
                    ],
                },
                {
                    featureType: "water",
                    elementType: "labels.text.fill",
                    stylers: [
                        {
                            color: "#4e6d70",
                        },
                    ],
                },
            ],
        };

        var map = new google.maps.Map(
            document.getElementById("map"),
            mapOptions
        );

        var marker = new google.maps.Marker({
            position: myLatlng,
            title: "Hello World!",
        });

        // To add the marker to the map, call setMap();
        marker.setMap(map);
    },

    showNotification: function (from, align) {
        color = Math.floor(Math.random() * 4 + 1);

        $.notify(
            {
                icon: "tim-icons icon-bell-55",
                message:
                    "Welcome to <b>Black Dashboard</b> - a beautiful freebie for every web developer.",
            },
            {
                type: type[color],
                timer: 8000,
                placement: {
                    from: from,
                    align: align,
                },
            }
        );
    },
};
