<?php
include 'header.php';

$success = '';
$errors = [];

if (isset($_POST['register'])) {
    // Validate name
    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required';
    } elseif (!preg_match('/^[A-Za-z\s]+$/', $_POST['name'])) {
        $errors['name'] = 'Name can only contain letters and spaces';
    } else {
        $name = trim($_POST['name']);
    }
    
    // Validate email
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    } else {
        $email = trim($_POST['email']);
        // Check if email already exists
        $check = mysqli_query($connection, "SELECT id FROM donors WHERE email = '".mysqli_real_escape_string($connection, $email)."'");
        if (mysqli_num_rows($check) > 0) {
            $errors['email'] = 'Email already registered';
        }
    }
    
    // Validate password
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($_POST['password']) < 6) {
        $errors['password'] = 'Password must be at least 6 characters';
    } elseif ($_POST['password'] !== $_POST['confirm_password']) {
        $errors['password'] = 'Passwords do not match';
    } else {
        $password = md5($_POST['password']);
    }
    
    // Validate blood group
    if (empty($_POST['blood_group'])) {
        $errors['blood_group'] = 'Blood group is required';
    } else {
        $blood_group = $_POST['blood_group'];
    }
    
    // Validate gender
    if (empty($_POST['gender'])) {
        $errors['gender'] = 'Gender is required';
    } else {
        $gender = $_POST['gender'];
    }
    
    // Validate date of birth
    if (empty($_POST['dob'])) {
        $errors['dob'] = 'Date of birth is required';
    } else {
        $dob = $_POST['dob'];
        $age = date_diff(date_create($dob), date_create('today'))->y;
        if ($age < 18) {
            $errors['dob'] = 'You must be at least 18 years old';
        }
    }
    
    // Validate contact
    if (empty($_POST['contact'])) {
        $errors['contact'] = 'Contact number is required';
    } elseif (!preg_match('/^[0-9]{10}$/', $_POST['contact'])) {
        $errors['contact'] = 'Contact must be 10 digits';
    } else {
        $contact = $_POST['contact'];
    }
    
    // Validate city
    if (empty($_POST['city'])) {
        $errors['city'] = 'City is required';
    } else {
        $city = $_POST['city'];
    }
    
    // If no errors, insert into database
    if (empty($errors)) {
        $sql = "INSERT INTO donors (name, email, password, blood_group, gender, dob, contact, city) 
                VALUES ('$name', '$email', '$password', '$blood_group', '$gender', '$dob', '$contact', '$city')";
        
        if (mysqli_query($connection, $sql)) {
            $success = 'Registration successful! You can now <a href="signin.php">sign in</a>.';
            // Clear form
            $_POST = array();
        } else {
            $errors['general'] = 'Registration failed. Please try again.';
        }
    }
}
?>

<style>
    .register-section {
        padding: 60px 0;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }
    
    .register-card {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        max-width: 600px;
        margin: 0 auto;
    }
    
    .register-card h2 {
        color: #dc3545;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .register-card p {
        color: #6c757d;
        margin-bottom: 2rem;
    }
    
    .form-label {
        font-weight: 600;
        color: #2c3e50;
    }
    
    .form-control, .form-select {
        border-radius: 10px;
        padding: 0.75rem;
        border: 2px solid #e9ecef;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220,53,69,0.25);
    }
    
    .error-text {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    
    .btn-register {
        background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        color: white;
        width: 100%;
        transition: all 0.3s;
    }
    
    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(220,53,69,0.3);
    }
    
    .success-alert {
        background: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
    }
    
    .error-alert {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
        padding: 1rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
    }
</style>

<section class="register-section">
    <div class="container">
        <div class="register-card">
            <div class="text-center">
                <h2><i class="fas fa-user-plus"></i> Register as Donor</h2>
                <p>Join our community of life-savers</p>
            </div>
            
            <?php if ($success): ?>
                <div class="success-alert">
                    <i class="fas fa-check-circle"></i> <?php echo $success; ?>
                </div>
            <?php endif; ?>
            
            <?php if (isset($errors['general'])): ?>
                <div class="error-alert">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $errors['general']; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Full Name *</label>
                        <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" placeholder="Enter your full name">
                        <?php if (isset($errors['name'])): ?>
                            <div class="error-text"><?php echo $errors['name']; ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" placeholder="your@email.com">
                        <?php if (isset($errors['email'])): ?>
                            <div class="error-text"><?php echo $errors['email']; ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact Number *</label>
                        <input type="text" name="contact" class="form-control" value="<?php echo isset($_POST['contact']) ? htmlspecialchars($_POST['contact']) : ''; ?>" placeholder="10-digit number" maxlength="10">
                        <?php if (isset($errors['contact'])): ?>
                            <div class="error-text"><?php echo $errors['contact']; ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Blood Group *</label>
                        <select name="blood_group" class="form-select">
                            <option value="">Select Blood Group</option>
                            <option value="A+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group']=='A+') ? 'selected' : ''; ?>>A+</option>
                            <option value="A-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group']=='A-') ? 'selected' : ''; ?>>A-</option>
                            <option value="B+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group']=='B+') ? 'selected' : ''; ?>>B+</option>
                            <option value="B-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group']=='B-') ? 'selected' : ''; ?>>B-</option>
                            <option value="AB+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group']=='AB+') ? 'selected' : ''; ?>>AB+</option>
                            <option value="AB-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group']=='AB-') ? 'selected' : ''; ?>>AB-</option>
                            <option value="O+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group']=='O+') ? 'selected' : ''; ?>>O+</option>
                            <option value="O-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group']=='O-') ? 'selected' : ''; ?>>O-</option>
                        </select>
                        <?php if (isset($errors['blood_group'])): ?>
                            <div class="error-text"><?php echo $errors['blood_group']; ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Gender *</label>
                        <select name="gender" class="form-select">
                            <option value="">Select Gender</option>
                            <option value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender']=='Male') ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender']=='Female') ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?php echo (isset($_POST['gender']) && $_POST['gender']=='Other') ? 'selected' : ''; ?>>Other</option>
                        </select>
                        <?php if (isset($errors['gender'])): ?>
                            <div class="error-text"><?php echo $errors['gender']; ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date of Birth *</label>
                        <input type="date" name="dob" class="form-control" value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : ''; ?>" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>">
                        <?php if (isset($errors['dob'])): ?>
                            <div class="error-text"><?php echo $errors['dob']; ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">City *</label>
                        <select name="city" class="form-select">
                            <option value="">Select City</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Mohali">Mohali</option>
                            <option value="Panchkula">Panchkula</option>
                            <option value="Zirakpur">Zirakpur</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Bangalore">Bangalore</option>
                            <option value="Hyderabad">Hyderabad</option>
                            <option value="Pune">Pune</option>
                            <option value="Chennai">Chennai</option>
                        </select>
                        <?php if (isset($errors['city'])): ?>
                            <div class="error-text"><?php echo $errors['city']; ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password *</label>
                        <input type="password" name="password" class="form-control" placeholder="Min 6 characters">
                        <?php if (isset($errors['password'])): ?>
                            <div class="error-text"><?php echo $errors['password']; ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Confirm Password *</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Re-enter password">
                    </div>
                </div>
                
                <button type="submit" name="register" class="btn-register mt-3">
                    <i class="fas fa-user-plus"></i> Register Now
                </button>
                
                <div class="text-center mt-3">
                    <p>Already have an account? <a href="signin.php" class="text-danger fw-bold">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
