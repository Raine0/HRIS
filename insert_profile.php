<?php 
include "sidebar.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pn = $_POST['pn'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $position = $_POST['position'];
    $status = $_POST['status'];
    $salary = $_POST['salary'];
    $increment = $_POST['increment'];
    $date_hired = $_POST['date_hired'];

    $insertQuery = "INSERT INTO profiles (PN, first_name, last_name, gender, birth_date, position, status, salary, increment, date_hired) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($insertQuery);
    
    if ($stmt->execute([$pn, $first_name, $last_name, $gender, $birth_date, $position, $status, $salary, $increment, $date_hired])) {
        echo "<div class='alert alert-success'>Profile added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error adding profile.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Remove number input arrows */
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <title>Add Profile</title>
</head>
<body style="padding-top: 70px;">
    <div class="container mt-5">
        <h2 class="mb-4">Add New Profile</h2>
        <div class="card p-4 shadow-lg">
            <form method="POST">
                <!-- No need for hidden ID since this is for insert -->
                <div class="mb-3">
                    <label class="form-label">Plantilla Number</label>
                    <input type="text" name="pn" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Birth Date</label>
                        <input type="date" name="birth_date" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date Hired</label>
                        <input type="date" name="date_hired" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Position</label>
                    <input type="text" name="position" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Employment Status</label>
                    <input type="text" name="employment_status" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Marital Status</label>
                    <input type="text" name="marital_status" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Salary Grade</label>
                        <input type="text" name="salary_grade" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Increment</label>
                        <input type="text" name="increment" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>