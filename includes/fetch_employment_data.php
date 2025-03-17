<?php
include("config.php");

$course = isset($_GET['course']) ? $_GET['course'] : "all";

if ($course == "all") {
    $query = "SELECT year, SUM(CASE WHEN employment_status='Employed' THEN 1 ELSE 0 END) AS employed, 
                     SUM(CASE WHEN employment_status='Unemployed' THEN 1 ELSE 0 END) AS unemployed 
              FROM alumni_data 
              GROUP BY year";
} else {
    $query = "SELECT year, SUM(CASE WHEN employment_status='Employed' THEN 1 ELSE 0 END) AS employed, 
                     SUM(CASE WHEN employment_status='Unemployed' THEN 1 ELSE 0 END) AS unemployed 
              FROM alumni_data 
              WHERE course = '$course'
              GROUP BY year";
}

$result = mysqli_query($conn, $query);
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>
