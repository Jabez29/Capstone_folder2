<?php

require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/Udf.php';

$db = new Database(); // Instantiate the Database class
$pdo = $db->pdo;      // Access the $pdo property

try {
    $stmt = $pdo->prepare("
    SELECT 
        g.id, g.first_name, g.middle_name, g.last_name,
        g.student_number, g.course, g.graduation_year,
        g.permanent_address,
        eb.degree, eb.college,
        pe.name_of_exam, pe.date_taken, pe.rating,
        es.graduate_id, es.employment_status, es.company_name
    FROM graduates g
    LEFT JOIN educational_background eb ON g.id = eb.graduate_id
    LEFT JOIN professional_exams pe ON g.id = pe.graduate_id
    LEFT JOIN employment_survey es ON g.id = es.graduate_id
");

    $stmt->execute();
    $graduates = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 🔍 Debug: Check if employment_status is retrieved without breaking the page
    foreach ($graduates as $grad) {
        if ($grad['id'] == 6) { // Change 6 to any test ID
            error_log("Employment Status for " . $grad['first_name'] . ": " . $grad['employment_status']);
        }
    }

} catch (PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
}

?>