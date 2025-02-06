<?php 
include "sidebar.php";

// Database connection (assuming $pdo is defined in a config file)
if (isset($_GET['id'])) {
    $profileId = htmlspecialchars($_GET['id']);

    $profileQuery = "SELECT * FROM profiles WHERE id = :id";
    $profileStatement = $pdo->prepare($profileQuery);
    $profileStatement->bindParam(':id', $profileId, PDO::PARAM_INT);
    $profileStatement->execute();
    
    $profile = $profileStatement->fetch(PDO::FETCH_ASSOC);
}

// Function to handle null values
function displayValue($value) {
    return !empty($value) ? htmlspecialchars($value) : '<span class="text-muted"><b>N/A</b></span>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }
        .profile-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }
        .mini-card {
            background:rgb(241, 241, 241);
            border-radius: 8px;
            padding: 12px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-weight: bold;
        }
        .btn-custom {
            width: 150px;
        }
    </style>
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-8">
        <div class="profile-card">
            <h2 class="mb-4 text-center">Profile Details</h2>
            <div class="row g-3">
                <div class="col-12">
                    <label class="label">Plantilla Number</label>
                    <div class="mini-card"><?php echo displayValue($profile["PN"]); ?></div>
                </div>
                <div class="col-md-6">
                    <label class="label">First Name</label>
                    <div class="mini-card"><?php echo displayValue($profile["first_name"]); ?></div>
                </div>
                <div class="col-md-6">
                    <label class="label">Last Name</label>
                    <div class="mini-card"><?php echo displayValue($profile["last_name"]); ?></div>
                </div>
                <div class="col-md-6">
                    <label class="label">Gender</label>
                    <div class="mini-card"><?php echo displayValue($profile["gender"]); ?></div>
                </div>
                <div class="col-md-6">
                    <label class="label">Birth Date</label>
                    <div class="mini-card"><?php echo displayValue($profile["birth_date"]); ?></div>
                </div>
                <div class="col-md-6">
                    <label class="label">Position</label>
                    <div class="mini-card"><?php echo displayValue($profile["position"]); ?></div>
                </div>
                <div class="col-md-6">
                    <label class="label">Employment Status</label>
                    <div class="mini-card"><?php echo displayValue($profile["employment_status"]); ?></div>
                </div>
                <div class="col-md-6">
                    <label class="label">Marital Status</label>
                    <div class="mini-card"><?php echo displayValue($profile["marital_status"]); ?></div>
                </div>
                <div class="col-md-6">
                    <label class="label">Salary Grade</label>
                    <div class="mini-card"><?php echo displayValue($profile["salary_grade"]); ?></div>
                </div>
                <div class="col-md-6">
                    <label class="label">Increment</label>
                    <div class="mini-card"><?php echo displayValue($profile["increment"]); ?></div>
                </div>
                <div class="col-md-6">
                    <label class="label">Date Hired</label>
                    <div class="mini-card"><?php echo displayValue($profile["date_hired"]); ?></div>
                </div>
            </div>

            <div class="mt-4 text-center">
                <a href="edit_profile.php?id=<?php echo $profile['id']; ?>" class="btn btn-primary btn-custom">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="index.php" class="btn btn-secondary btn-custom">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
