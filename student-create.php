<?php
session_start();
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

    <title>Create Student</title>
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
                            <span class="title-text"><i class="bi bi-person-plus-fill"></i> Add Student</span>
                            <a href="index.php" class="btn btn-back"><i class="bi bi-arrow-left"></i> BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <!-- Student Details -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label>Student Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Full name" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Student Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Student Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone number" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Student Course</label>
                                    <input type="text" name="course" class="form-control" placeholder="e.g. BSIS" required>
                                </div>
                            </div>

                            <hr class="my-4">
                            <h5 class="section-title mt-0"><i class="bi bi-journal-bookmark-fill"></i> Subjects</h5>
                            <div id="subjects-area">
                                <div class="row g-2 subject-field mb-3">
                                    <div class="col-md-3">
                                        <input type="text" name="subject_code[]" class="form-control" placeholder="Subject Code" required>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="subject_name[]" class="form-control" placeholder="Subject Name" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="units[]" class="form-control" placeholder="Units" required>
                                    </div>
                                    <div class="col-md-1 text-end">
                                        <button type="button" class="btn btn-remove btn-sm" onclick="removeSubject(this)" title="Remove subject"><i class="bi bi-x-lg"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 mt-2">
                                <button type="button" class="btn btn-success" onclick="addSubject()"><i class="bi bi-plus-lg"></i> Add Subject</button>
                                <button type="submit" name="save_student" class="btn btn-primary"><i class="bi bi-check-lg"></i> Save Student</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
function addSubject() {
    let div = document.createElement('div');
    div.classList.add('row','g-2','subject-field','mb-3');
    div.innerHTML = `
        <div class="col-md-3">
            <input type="text" name="subject_code[]" class="form-control" placeholder="Subject Code" required>
        </div>
        <div class="col-md-5">
            <input type="text" name="subject_name[]" class="form-control" placeholder="Subject Name" required>
        </div>
        <div class="col-md-3">
            <input type="number" name="units[]" class="form-control" placeholder="Units" required>
        </div>
        <div class="col-md-1 text-end">
            <button type="button" class="btn btn-remove btn-sm" onclick="removeSubject(this)" title="Remove subject"><i class="bi bi-x-lg"></i></button>
        </div>
    `;
    document.getElementById('subjects-area').appendChild(div);
}

// Removes a subject row (always keeps at least one)
function removeSubject(btn) {
    let rows = document.querySelectorAll('#subjects-area .subject-field');
    if (rows.length > 1) {
        btn.closest('.subject-field').remove();
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>