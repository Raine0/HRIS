<?php 
include "sidebar.php";

// GET PROFILES
$profilesQuery = "SELECT * FROM profiles";
$profileStatement = $pdo->prepare($profilesQuery);
$profileStatement->execute();
$profiles = $profileStatement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <title>Profiles</title>
</head>
<body>
    <header class="bg-dark text-white text-center py-2 mb-2">
        <h1 class="fs-2">Human Resource Information System</h1>
    </header>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Profiles</h2>
        <div class="card shadow-lg p-4 profile-table">
            <div class="table-responsive">
                <table id="profilesTable" class="table table-striped table-hover">
                    <thead class="table-dark bg-dark">
                        <tr>
                            <th>Plantilla Number</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Birth Date</th>
                            <th>Position</th>
                            <th>Employment Status</th>
                            <th>Marital Status</th>
                            <th>Salary Grade</th>
                            <th>Increment</th>
                            <th>Date Hired</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($profiles)): ?>
                            <?php foreach ($profiles as $profile): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($profile["PN"]); ?></td>
                                    <td><?php echo htmlspecialchars($profile["first_name"]); ?></td>
                                    <td><?php echo htmlspecialchars($profile["last_name"]); ?></td>
                                    <td><?php echo htmlspecialchars($profile["gender"]); ?></td>
                                    <td><?php echo htmlspecialchars($profile["birth_date"]); ?></td>
                                    <td><?php echo htmlspecialchars($profile["position"] ?? 'N/A'); ?></td>
                                    <td><?php echo htmlspecialchars($profile["employment_status"] ?? 'N/A'); ?></td>
                                    <td><?php echo htmlspecialchars($profile["marital_status"] ?? 'N/A'); ?></td>
                                    <td><?php echo htmlspecialchars($profile["salary_grade"]); ?></td>
                                    <td><?php echo htmlspecialchars($profile["increment"]); ?></td>
                                    <td><?php echo htmlspecialchars($profile["date_hired"]); ?></td>
                                    <td style="text-align: center; width: 100px;">
                                        <a href="view_profile.php?id=<?php echo $profile['id']; ?>" class="btn btn-primary btn-sm">
                                            View
                                        </a>
                                        <a href="edit_profile.php?id=<?php echo $profile['id']; ?>" class="btn btn-secondary btn-sm">
                                            Edit
                                        </a> 
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="11" class="text-center">No records found</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $('#profilesTable').DataTable();
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>