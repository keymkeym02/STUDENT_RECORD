<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts, Bootstrap CSS & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <title>Student Edit</title>
</head>
<body>

    <header class="app-topbar mb-4">
        <div class="container">
            <div class="brand">
                <i class="bi bi-mortarboard-fill"></i>
                Student Management System
            </div>
        </div>
    </header>
  
    <div class="container pb-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <span class="title-text"><i class="bi bi-pencil-square"></i> Student Edit</span>
                            <a href="index.php" class="btn btn-back"><i class="bi bi-arrow-left"></i> BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM students WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?= $student['id']; ?>">

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label>Student Name</label>
                                            <input type="text" name="name" value="<?=$student['name'];?>" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Student Email</label>
                                            <input type="email" name="email" value="<?=$student['email'];?>" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Student Phone</label>
                                            <input type="text" name="phone" value="<?=$student['phone'];?>" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Student Course</label>
                                            <input type="text" name="course" value="<?=$student['course'];?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" name="update_student" class="btn btn-primary">
                                            <i class="bi bi-check-lg"></i> Update Student
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<div class='empty-state'><i class='bi bi-exclamation-circle'></i><h5>No Such Id Found</h5></div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>