<?php
require_once 'config.php';

$error = '';

if (isset($_POST['admin_login'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = md5($_POST['password']);

    $sql = "SELECT id, username, email, role FROM users 
            WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) === 1) {
        $admin = mysqli_fetch_assoc($result);

        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        $_SESSION['admin_email'] = $admin['email'];
        $_SESSION['admin_role'] = $admin['role'];

        // ✅ REDIRECT BEFORE ANY HTML
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}

// ✅ HTML STARTS ONLY HERE
include 'header.php';
?>


<style>
    .admin-login-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
    }
    
    .admin-login-card {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        max-width: 450px;
        margin: 0 auto;
    }
    
    .admin-login-card h2 {
        color: #2c3e50;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .admin-badge {
        background: #f39c12;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 25px;
        display: inline-block;
        margin-bottom: 1.5rem;
        font-weight: 600;
    }
    
    .form-control {
        border-radius: 10px;
        padding: 0.75rem;
        border: 2px solid #e9ecef;
    }
    
    .form-control:focus {
        border-color: #2c3e50;
        box-shadow: 0 0 0 0.2rem rgba(44,62,80,0.25);
    }
    
    .btn-admin-login {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        color: white;
        width: 100%;
        transition: all 0.3s;
    }
    
    .btn-admin-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(44,62,80,0.3);
    }
    
    .admin-icon {
        font-size: 4rem;
        color: #2c3e50;
        margin-bottom: 1rem;
    }
</style>

<section class="admin-login-section">
    <div class="container">
        <div class="admin-login-card">
            <div class="text-center">
                <i class="fas fa-user-shield admin-icon"></i>
                <h2>Admin Login</h2>
                <span class="admin-badge">
                    <i class="fas fa-lock"></i> Authorized Personnel Only
                </span>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label fw-bold">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>
                </div>
                
                <button type="submit" name="admin_login" class="btn-admin-login mt-3">
                    <i class="fas fa-sign-in-alt"></i> Login to Admin Panel
                </button>
                
                <div class="text-center mt-4">
                    <p class="text-muted">
                        <i class="fas fa-info-circle"></i> For donor login, 
                        <a href="signin.php" class="text-danger fw-bold">click here</a>
                    </p>
                </div>
            </form>
            
            <div class="mt-4 p-3 bg-light rounded">
                <small class="text-muted">
                    <strong>Test Admin Credentials:</strong><br>
                    Username: admin<br>
                    Password: admin123
                </small>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
