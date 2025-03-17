<?php
include_once '../CAPSTONE/templates/dash.php';

?>



<style>
.container {
    width: 90%;
    max-width: 1200px;
    margin: 70px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.chart-container {
    width: 100%;
    max-width: 1000px;
    margin: auto;
}
</style>
</head>

<body>
    <div class="container">
        <h2>BSIT Alumni Employment & Unemployment Trends (2010-2024)</h2>
        <div class="chart-container">
            <canvas id="employmentChart"></canvas>
        </div>
    </div>