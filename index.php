<?php
    session_start();
    require 'dbcon.php';
    
    if(!isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Please login to access the system";
    header("Location: login.php");
    exit(0);
}
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

    <title>Students 3D</title>
</head>
<body>

    <!-- Top bar -->
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
                            <span class="title-text"><i class="bi bi-people-fill"></i> Student BSIS3</span>
                            <a href="student-create.php" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Students</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive table-wrap">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM students";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><span class="id-pill">#<?= $student['id']; ?></span></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="avatar"><?= strtoupper(substr($student['name'], 0, 1)); ?></span>
                                                        <span class="fw-semibold"><?= $student['name']; ?></span>
                                                    </div>
                                                </td>
                                                <td><?= $student['email']; ?></td>
                                                <td><?= $student['phone']; ?></td>
                                                <td><span class="course-pill"><?= $student['course']; ?></span></td>
                                                <td class="text-end text-nowrap">
                                                    <a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> View</a>
                                                    <a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                        <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<tr><td colspan='6' class='empty-state'><i class='bi bi-inbox'></i>No Record Found</td></tr>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>