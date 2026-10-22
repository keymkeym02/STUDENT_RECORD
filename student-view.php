<?php
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <title>Student View</title>
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

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <span class="title-text"><i class="bi bi-person-vcard-fill"></i> Student View Details</span>
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

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label>Student Name</label>
                                            <p class="form-control">
                                                <?=$student['name'];?>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Student Email</label>
                                            <p class="form-control">
                                                <?=$student['email'];?>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Student Phone</label>
                                            <p class="form-control">
                                                <?=$student['phone'];?>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Student Course</label>
                                            <p class="form-control">
                                                <?=$student['course'];?>
                                            </p>
                                        </div>
                                    </div>

                                    <!-- SUBJECTS SECTION -->
                                    <hr class="my-4">
                                    <h5 class="section-title mt-0"><i class="bi bi-journal-bookmark-fill"></i> Subjects</h5>
                                    <div class="table-responsive table-wrap">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>Subject Code</th>
                                                <th>Subject Name</th>
                                                <th>Units</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sub_query = "SELECT * FROM student_subjects WHERE student_id='$student_id'";
                                            $sub_run = mysqli_query($con, $sub_query);

                                            if(mysqli_num_rows($sub_run) > 0) {
                                                while($subject = mysqli_fetch_assoc($sub_run)) {
                                                    echo "<tr>
                                                            <td><span class='course-pill'>{$subject['subject_code']}</span></td>
                                                            <td>{$subject['subject_name']}</td>
                                                            <td>{$subject['units']}</td>
                                                          </tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='3' class='empty-state'><i class='bi bi-journal-x'></i>No subjects found</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
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