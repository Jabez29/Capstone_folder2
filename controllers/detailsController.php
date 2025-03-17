<?php
include 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("
            SELECT 
                g.first_name, g.middle_name, g.last_name, 
                g.student_number, g.course, g.graduation_year,
                eb.degree, eb.college,
                pe.name_of_exam, pe.date_taken, pe.rating,
                es.employment_status, es.company_name
            FROM graduates g
            LEFT JOIN educational_background eb ON g.id = eb.graduate_id
            LEFT JOIN professional_exams pe ON g.id = pe.graduate_id
            LEFT JOIN employment_survey es ON g.id = es.graduate_id
            WHERE g.id = :id
        ");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $graduate = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($graduate) {
            echo "<p><strong>Name:</strong> " . htmlspecialchars(($graduate['first_name'] ?? 'Not Available') . ' ' . ($graduate['middle_name'] ?? '') . ' ' . ($graduate['last_name'] ?? '')) . "</p>";
            echo "<p><strong>Student Number:</strong> " . htmlspecialchars($graduate['student_number'] ?? 'Not Available') . "</p>";
            echo "<p><strong>Course:</strong> " . htmlspecialchars($graduate['course'] ?? 'Not Available') . "</p>";
            echo "<p><strong>Graduation Year:</strong> " . htmlspecialchars($graduate['graduation_year'] ?? 'Not Available') . "</p>";
            echo "<p><strong>Degree:</strong> " . htmlspecialchars($graduate['degree'] ?? 'Not Available') . "</p>";
            echo "<p><strong>College:</strong> " . htmlspecialchars($graduate['college'] ?? 'Not Available') . "</p>";
            echo "<p><strong>Professional Exam:</strong> " . htmlspecialchars($graduate['name_of_exam'] ?? 'Not Available') . "</p>";
            echo "<p><strong>Date Taken:</strong> " . htmlspecialchars($graduate['date_taken'] ?? 'Not Available') . "</p>";
            echo "<p><strong>Rating:</strong> " . htmlspecialchars($graduate['rating'] ?? 'Not Available') . "</p>";
            echo "<p><strong>Employment Status:</strong> " . htmlspecialchars($graduate['employment_status'] ?? 'Not Available') . "</p>";
            echo "<p><strong>Company Name:</strong> " . htmlspecialchars($graduate['company_name'] ?? 'Not Available') . "</p>";
        } else {
            echo "<p>No details found for this record.</p>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "<p>Invalid ID provided.</p>";
}
?>
