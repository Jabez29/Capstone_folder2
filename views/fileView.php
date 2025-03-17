<?php
include_once '../CAPSTONE/templates/dash.php';

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course-Job Misalignment Pie Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    .card {
        top: 80px;
        width: 50%;
        margin: auto;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="card">
        <canvas id="misalignmentChart"></canvas>
    </div>
    <script>
    const ctx = document.getElementById('misalignmentChart').getContext('2d');
    const misalignmentData = {
        labels: ['BSIT', 'BSBA', 'BSED', 'BSHM'], // Course Names
        datasets: [{
            data: [30, 25, 20, 15], // Number of graduates in unrelated jobs
            backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0'],
            hoverOffset: 4
        }]
    };

    new Chart(ctx, {
        type: 'pie',
        data: misalignmentData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
    </script>
</body>

</html>