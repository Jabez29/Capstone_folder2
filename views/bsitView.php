<?php

include_once '../CAPSTONE/templates/dash.php';
include_once '../CAPSTONE/models/joining.php';
?>


<div class="container-fluid mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    List Managements
                </div>
                <table id="user-table" class="table table-striped table-success">
                    <thead class="table-dark">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Student Number</th>
                                <th>Course</th>
                                <th>Graduation Year</th>
                                <th>Employment Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php foreach ($graduates as $graduate): ?>

                        <tr>
                        <td><?= htmlspecialchars($graduate['first_name'] . ' ' . $graduate['middle_name'] . ' ' . $graduate['last_name']) ?></td>
<td><?= htmlspecialchars($graduate['student_number']) ?></td>
<td><?= htmlspecialchars($graduate['course']) ?></td>
<td><?= htmlspecialchars($graduate['graduation_year']) ?></td>
<td><?= isset($graduate['employment_status']) && !empty($graduate['employment_status']) 
    ? htmlspecialchars(ucwords($graduate['employment_status'])) // Capitalize first letter
    : 'Not Available'; ?>
</td>





                            <td>
                                <button class="btn btn-info btn-sm details-btn" data-bs-toggle="modal"
                                    data-bs-target="#detailsModal" data-id="<?= $graduate['id'] ?>">
                                    Details
                                </button>

                                <a href="delete.php?id=<?= $graduate['id'] ?>"
                                    onclick="return confirm('Are you sure you want to delete this record?');"
                                    class="btn btn-danger btn-sm">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>


                <?php
include_once __DIR__ . '/../templates/details.php'; 
// include_once __DIR__ . '/../templates/confirm.php'; 
// include_once __DIR__ . '/../templates/alert.php'; 
?>