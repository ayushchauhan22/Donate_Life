<?php
include 'header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit;
}

// Get user details
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM donors WHERE id = $user_id";
$result = mysqli_query($connection, $sql);
$user = mysqli_fetch_assoc($result);

// Get user's appointments
$appointments_sql = "SELECT * FROM form WHERE email = '{$user['email']}' ORDER BY date DESC, time DESC";
$appointments_result = mysqli_query($connection, $appointments_sql);
?>

<style>
    .profile-section {
        padding: 60px 0;
        background: #f8f9fa;
    }
    
    .profile-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
    }
    
    .profile-header {
        text-align: center;
        padding: 2rem;
        background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
        color: white;
        border-radius: 20px;
        margin-bottom: 2rem;
    }
    
    .profile-avatar {
        width: 120px;
        height: 120px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 3rem;
        color: #dc3545;
    }
    
    .info-row {
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
        display: flex;
        justify-content: space-between;
    }
    
    .info-row:last-child {
        border-bottom: none;
    }
    
    .info-label {
        font-weight: 600;
        color: #6c757d;
    }
    
    .info-value {
        color: #2c3e50;
        font-weight: 500;
    }
    
    .appointment-item {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1rem;
        border-left: 4px solid #dc3545;
    }
    
    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 15px;
        font-size: 0.875rem;
        font-weight: 600;
    }
    
    .status-pending {
        background: #ffc107;
        color: #000;
    }
    
    .status-confirmed {
        background: #28a745;
        color: white;
    }
</style>

<section class="profile-section">
    <div class="container">
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="fas fa-user-circle"></i>
            </div>
            <h2><?php echo htmlspecialchars($user['name']); ?></h2>
            <p class="mb-0"><i class="fas fa-tint"></i> Blood Group: <strong><?php echo htmlspecialchars($user['blood_group']); ?></strong></p>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="profile-card">
                    <h4 class="mb-3"><i class="fas fa-user"></i> Personal Information</h4>
                    
                    <div class="info-row">
                        <span class="info-label">Name:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user['name']); ?></span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">Email:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user['email']); ?></span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">Contact:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user['contact']); ?></span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">Gender:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user['gender']); ?></span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">Date of Birth:</span>
                        <span class="info-value"><?php echo date('d M Y', strtotime($user['dob'])); ?></span>
                    </div>
                    
                    <div class="info-row">
                        <span class="info-label">City:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user['city']); ?></span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="profile-card">
                    <h4 class="mb-3"><i class="fas fa-calendar-alt"></i> My Appointments</h4>
                    
                    <?php if (mysqli_num_rows($appointments_result) > 0): ?>
                        <?php while ($appointment = mysqli_fetch_assoc($appointments_result)): ?>
                            <div class="appointment-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="fw-bold"><?php echo date('d M Y', strtotime($appointment['date'])); ?></div>
                                        <div class="text-muted"><?php echo date('h:i A', strtotime($appointment['time'])); ?></div>
                                        <div class="mt-1">
                                            <i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($appointment['city']); ?>
                                        </div>
                                    </div>
                                    <span class="status-badge status-<?php echo strtolower($appointment['status']); ?>">
                                        <?php echo ucfirst($appointment['status']); ?>
                                    </span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="text-center text-muted py-4">
                            <i class="fas fa-calendar-times" style="font-size: 2rem;"></i>
                            <p class="mt-2">No appointments yet</p>
                            <a href="appointment.php" class="btn btn-danger">Book Appointment</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="logout.php" class="btn btn-outline-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
