<?php
include("../includes/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employment Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js for graphs -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery for AJAX -->
</head>

<body>
    <h2>BSIT Alumni Employment & Unemployment Trends (2010-2024)</h2>

    <!-- Course Selection Dropdown -->
    <label for="course">Select Course:</label>
    <select id="course">
        <option value="all">All Courses</option>
        <option value="BSIT">BSIT</option>
        <option value="BSCS">BSCS</option>
        <option value="BSBA">BSBA</option>
    </select>

    <!-- Canvas for Graph -->
    <canvas id="employmentChart"></canvas>

    <script>
        $(document).ready(function() {
            function loadGraph(course) {
                $.ajax({
                    url: "../includes/fetch_employment_data.php",
                    type: "GET",
                    data: { course: course },
                    dataType: "json",
                    success: function(response) {
                        let years = [];
                        let employed = [];
                        let unemployed = [];

                        response.forEach(data => {
                            years.push(data.year);
                            employed.push(data.employed);
                            unemployed.push(data.unemployed);
                        });

                        // Update Chart
                        updateChart(years, employed, unemployed);
                    }
                });
            }

            function updateChart(years, employed, unemployed) {
                let ctx = document.getElementById('employmentChart').getContext('2d');
                
                if (window.myChart) {
                    window.myChart.destroy();
                }

                window.myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: years,
                        datasets: [{
                                label: "Employed",
                                data: employed,
                                backgroundColor: "green",
                                borderColor: "green",
                                fill: false
                            },
                            {
                                label: "Unemployed",
                                data: unemployed,
                                backgroundColor: "red",
                                borderColor: "red",
                                fill: false
                            }
                        ]
                    }
                });
            }

            // Load Graph on Page Load
            loadGraph("all");

            // Update Graph When Dropdown Changes
            $("#course").change(function() {
                let selectedCourse = $(this).val();
                loadGraph(selectedCourse);
            });
        });
    </script>
</body>

</html>
