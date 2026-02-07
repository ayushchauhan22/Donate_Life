<?php
require_once 'config.php';

$error = '';

if (isset($_POST['signin'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = md5($_POST['password']);
    
    $sql = "SELECT id, name, email FROM donors WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        
        header('Location: profile.php');
        exit;
    } else {
        $error = 'Invalid email or password';
    }
}
include 'header.php';
?>

<style>
    .signin-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
    }
    
    .signin-card {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        max-width: 450px;
        margin: 0 auto;
    }
    
    .signin-card h2 {
        color: #667eea;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .signin-card p {
        color: #6c757d;
        margin-bottom: 2rem;
    }
    
    .form-control {
        border-radius: 10px;
        padding: 0.75rem;
        border: 2px solid #e9ecef;
    }
    
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102,126,234,0.25);
    }
    
    .btn-signin {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        color: white;
        width: 100%;
        transition: all 0.3s;
    }
    
    .btn-signin:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102,126,234,0.3);
    }
    
    .divider {
        text-align: center;
        margin: 1.5rem 0;
        position: relative;
    }
    
    .divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #dee2e6;
    }
    
    .divider span {
        background: white;
        padding: 0 1rem;
        position: relative;
        color: #6c757d;
    }
</style>

<section class="signin-section">
    <div class="container">
        <div class="signin-card">
            <div class="text-center">
                <h2><i class="fas fa-sign-in-alt"></i> Welcome Back</h2>
                <p>Sign in to your donor account</p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label fw-bold">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="your@email.com" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                </div>
                
                <button type="submit" name="signin" class="btn-signin mt-3">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>
                
                <div class="divider">
                    <span>Don't have an account?</span>
                </div>
                
                <a href="register.php" class="btn btn-outline-danger w-100">
                    <i class="fas fa-user-plus"></i> Register as Donor
                </a>
            </form>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
