<?php
session_start();

// Hardcoded credentials
$admin_email = "Admin";
$admin_pass  = "admin123";

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === $admin_email && $password === $admin_pass) {
        $_SESSION['auth'] = true;
        $_SESSION['auth_user'] = [
            'user_name' => "Administrator",
            'user_email' => $admin_email,
        ];
        $_SESSION['message'] = "Welcome Administrator";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message'] = "Invalid Email or Password";
        header("Location: login.php");
        exit();
    }
}
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
  <title>Login</title>
</head>
<body>
<div class="login-page">
<div class="container py-4">

    <div class="login-card">

        <!-- Display Session Message -->
        <?php
        if (isset($_SESSION['message'])) {
            echo '<div class="alert alert-info">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
        }
        ?>

        <div class="card">
            <div class="card-body p-4 p-md-5">

                <div class="text-center mb-4">
                    <div class="login-logo"><i class="bi bi-mortarboard-fill"></i></div>
                    <h4 class="fw-bold mb-1">Welcome Back</h4>
                    <p class="text-muted mb-0">Sign in to manage your students</p>
                </div>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label>Email</label>
                        <div class="input-icon">
                            <i class="bi bi-person"></i>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label>Password</label>
                        <div class="input-icon">
                            <i class="bi bi-lock"></i>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <button type="submit" name="login_btn" class="btn btn-primary w-100 py-2">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
</body>
</html>