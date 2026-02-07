<?php
include 'header.php';

$success = '';
$error = '';

if (isset($_POST['book'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $state = mysqli_real_escape_string($connection, $_POST['state']);
    $date = mysqli_real_escape_string($connection, $_POST['date']);
    $time = mysqli_real_escape_string($connection, $_POST['time']);
    $bloodtype = mysqli_real_escape_string($connection, $_POST['bloodtype']);
    
    $sql = "INSERT INTO form (name, email, phone, city, state, date, time, bloodtype) 
            VALUES ('$name', '$email', '$phone', '$city', '$state', '$date', '$time', '$bloodtype')";
    
    if (mysqli_query($connection, $sql)) {
        $success = 'Appointment booked successfully! We will contact you soon.';
        $_POST = array(); // Clear form
    } else {
        $error = 'Failed to book appointment. Please try again.';
    }
}
?>

<style>
    .appointment-section {
        padding: 60px 0;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }
    
    .appointment-card {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        max-width: 700px;
        margin: 0 auto;
    }
    
    .appointment-card h2 {
        color: #f5576c;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .appointment-card p {
        color: #6c757d;
        margin-bottom: 2rem;
    }
    
    .btn-book {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        color: white;
        width: 100%;
        transition: all 0.3s;
    }
    
    .btn-book:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(245,87,108,0.3);
    }
</style>

<section class="appointment-section">
    <div class="container">
        <div class="appointment-card">
            <div class="text-center">
                <h2><i class="fas fa-calendar-check"></i> Book Appointment</h2>
                <p>Schedule your blood donation appointment</p>
            </div>
            
            <?php if ($success): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> <?php echo $success; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Full Name *</label>
                        <input type="text" name="name" class="form-control" required 
                               value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Email *</label>
                        <input type="email" name="email" class="form-control" required
                               value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Phone Number *</label>
                        <input type="text" name="phone" class="form-control" required maxlength="10"
                               value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Blood Type *</label>
                        <select name="bloodtype" class="form-select" required>
                            <option value="">Select Blood Type</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">City *</label>
                        <input type="text" name="city" class="form-control" required
                               value="<?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : ''; ?>">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">State</label>
                        <input type="text" name="state" class="form-control"
                               value="<?php echo isset($_POST['state']) ? htmlspecialchars($_POST['state']) : ''; ?>">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Preferred Date *</label>
                        <input type="date" name="date" class="form-control" required 
                               min="<?php echo date('Y-m-d'); ?>"
                               value="<?php echo isset($_POST['date']) ? $_POST['date'] : ''; ?>">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Preferred Time *</label>
                        <input type="time" name="time" class="form-control" required
                               value="<?php echo isset($_POST['time']) ? $_POST['time'] : ''; ?>">
                    </div>
                </div>
                
                <button type="submit" name="book" class="btn-book mt-3">
                    <i class="fas fa-calendar-check"></i> Book Appointment
                </button>
            </form>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
