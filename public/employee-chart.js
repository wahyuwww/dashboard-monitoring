// public/js/employee-chart.js

document.addEventListener("DOMContentLoaded", function () {
    fetch("/employee/chart")
        .then((response) => response.json())
        .then((data) => {
            const ctx = document
                .getElementById("employeeChart")
                .getContext("2d");

            // Line Chart
            new Chart(ctx, {
                type: "line",
                data: {
                    labels: data.map((entry) => entry.city),
                    datasets: [
                        {
                            label: "Number of Employees",
                            data: data.map((entry) => entry.count),
                            backgroundColor: "rgba(75, 192, 192, 0.2)",
                            borderColor: "rgba(75, 192, 192, 1)",
                            borderWidth: 1,
                        },
                    ],
                },
            });

            // Pie Chart
            const pieCtx = document
                .getElementById("employeePieChart")
                .getContext("2d");
            new Chart(pieCtx, {
                type: "pie",
                data: {
                    labels: data.map((entry) => entry.city),
                    datasets: [
                        {
                            data: data.map((entry) => entry.count),
                            backgroundColor: [
                                "rgba(255, 99, 132, 0.2)",
                                "rgba(255, 205, 86, 0.2)",
                                "rgba(54, 162, 235, 0.2)",
                                "rgba(255, 159, 64, 0.2)",
                                "rgba(153, 102, 255, 0.2)",
                                "rgba(201, 203, 207, 0.2)",
                            ],
                            borderColor: [
                                "rgba(255, 99, 132, 1)",
                                "rgba(255, 205, 86, 1)",
                                "rgba(54, 162, 235, 1)",
                                "rgba(255, 159, 64, 1)",
                                "rgba(153, 102, 255, 1)",
                                "rgba(201, 203, 207, 1)",
                            ],
                            borderWidth: 1,
                        },
                    ],
                },
            });

            // Bar Chart
            const barCtx = document
                .getElementById("employeeBarChart")
                .getContext("2d");
            new Chart(barCtx, {
                type: "bar",
                data: {
                    labels: data.map((entry) => entry.city),
                    datasets: [
                        {
                            label: "Number of Employees",
                            data: data.map((entry) => entry.count),
                            backgroundColor: "rgba(75, 192, 192, 0.2)",
                            borderColor: "rgba(75, 192, 192, 1)",
                            borderWidth: 1,
                        },
                    ],
                },
            });
        });
});
