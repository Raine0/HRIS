<?php
session_start(); // Start session at the top of your script
include "sidebar.php";

// GET PROFILE
if (isset($_GET['id'])) {
    $profileId = htmlspecialchars($_GET['id']);
    $profileQuery = "SELECT * FROM profiles WHERE id = :id";
    $profileStatement = $pdo->prepare($profileQuery);
    $profileStatement->bindParam(':id', $profileId, PDO::PARAM_INT);
    $profileStatement->execute();
    $profile = $profileStatement->fetch(PDO::FETCH_ASSOC);
}

// UPDATE PROFILE
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $profileId = $_POST['id'];
    $pn = $_POST['pn'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $position = $_POST['position'];
    $employment_status = $_POST['employment_status'];
    $salary = $_POST['salary_grade'];
    $increment = $_POST['increment'];
    $date_hired = $_POST['date_hired'];
    $marital_status = $_POST['marital_status'];
    $salary_grade = $_POST['salary_grade'];

    // Update query
    $updateQuery = "UPDATE profiles SET PN = ?, first_name = ?, last_name = ?, gender = ?, birth_date = ?, position = ?, marital_status = ?, salary_grade = ?, employment_status = ?, increment = ?, date_hired = ? WHERE id = ?";
    $stmt = $pdo->prepare($updateQuery);

    // Execute the statement with the provided values
    if ($stmt->execute([$pn, $first_name, $last_name, $gender, $birth_date, $position, $marital_status, $salary_grade, $employment_status, $increment, $date_hired, $profileId])) {
        // Store success message in session
        $_SESSION['success_message'] = 'Profile updated successfully!';
        
        // Redirect the page after successful update
        header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $profileId);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<!-- Display success message if it exists -->
<?php
if (isset($_SESSION['success_message'])) {
    echo "<div class='alert alert-success'>
            {$_SESSION['success_message']}
            <button type='button' class='btn-close' data-bs-dismiss='alert' style='position: absolute; right: 0; margin-right: 20px;' aria-label='Close'></button>
            </div>";
    unset($_SESSION['success_message']); // Clear the message after displaying
}
?>
<body style="padding-top: 70px;">
    <div class="container mt-5">
        <h2 class="mb-4">Edit Profile</h2>
        <div class="card p-4 shadow-lg">
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $profile['id']; ?>">
                <div class="mb-3">
                    <label class="form-label">Plantilla Number</label>
                    <input type="text" name="pn" class="form-control" value="<?php echo htmlspecialchars($profile['PN']); ?>" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo htmlspecialchars($profile['first_name']); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo htmlspecialchars($profile['last_name']); ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="Male" <?php echo ($profile['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo ($profile['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Birth Date</label>
                        <input type="date" name="birth_date" class="form-control" value="<?php echo htmlspecialchars($profile['birth_date']); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date Hired</label>
                        <input type="date" name="date_hired" class="form-control" value="<?php echo htmlspecialchars($profile['date_hired']); ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Position</label>
                    <input type="text" name="position" class="form-control" value="<?php echo htmlspecialchars($profile['position']); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Employment Status</label>
                    <input type="text" name="employment_status" class="form-control" value="<?php echo htmlspecialchars($profile['employment_status']); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Marital Status</label>
                    <input type="text" name="marital_status" class="form-control" value="<?php echo htmlspecialchars($profile['marital_status']); ?>">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Salary Grade</label>
                        <input type="text" name="salary_grade" class="form-control" value="<?php echo htmlspecialchars($profile['salary_grade']); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Increment</label>
                        <input type="text" name="increment" class="form-control" value="<?php echo htmlspecialchars($profile['increment']); ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
